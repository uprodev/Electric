<?php

$actions = [
    'ajax_registration',
    'ajax_login',
    'ajax_reset',
    'qty_cart',
    'remove_item_from_cart',
    'apply_coupon',
    'order_viewed',
    'save_personal_data',
    'add_ticket',
    'add_to_fav',
    'add_to_cart'

];
foreach ($actions as $action) {
    add_action("wp_ajax_{$action}", $action);
    add_action("wp_ajax_nopriv_{$action}", $action);
}


function ajax_registration()
{

    // First check the nonce, if it fails the function will break
    //  check_ajax_referer( 'ajax-registration-nonce', 'security' );

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array(
            'update' => false,
            'status' => '<p class="error">Email address ' . $_POST['email'] . ' is incorrect</p>',
        ));
        wp_die();
    }

    if ($_POST['email']  ) {


        $login = $_POST['email'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'] ?: 'subscriber';

        $i = 1;

        while (username_exists($login)) {
            ++$i;
            $login = $login . $i;
        }

        $user = get_user_by('email', $email);


        if (empty($user)) {

            $password =  wp_generate_password( 8, false );

           // $user_id = register_new_user( $login, $email );
           // $user_id = wp_create_user( $login, $password, $email );


            $userdata = [
                'user_login' =>$login,
                'user_pass'  => $password,
                'user_email' => $login,
            ];

            /**
             * Проверять/очищать передаваемые поля не обязательно,
             * WP сделает это сам.
             */

            $user_id = wp_insert_user( $userdata ) ;
            wp_new_user_notification( $user_id, 'both' );

            if ($user_id) {
                $data = array(
                    'update' => true,
                    'status' => '<p class="success">' . __('Регистрация успешная', 'sage') . '</p>',
                    'redirect' => get_permalink(444),
                    'user_id' => $user_id,
                );

            }

        } else {
            $data = array(
                'update' => false,
                'status' => '<p class="error">' . __('<br>Un compte existe déjà pour cette adresse email. Identifiez-vous ou utilisez un mot de passe oublié', 'sage') . '</p>',
            );
        }
    } else {
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Email and password fields are required', 'sage') . '</p>',
        );
    }

    if (empty($data))
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Unknow error', 'sage') . '</p>',
        );

    echo json_encode($data);

    wp_die();
}

add_filter('wp_new_user_notification_email', 'change_notification_message', 10, 3);

function change_notification_message( $wp_new_user_notification_email, $user, $blogname ) {


    $password =  wp_generate_password( 8, false );
    wp_update_user([
        'ID' => $user->ID,
        'user_pass' => $password
    ]);

    $message  .= sprintf( __( 'Username: %s' ), $user->user_login ) . "\r\n\r\n";
    $message = __( 'Пароль: ' ) . $password. "\r\n\r\n";

    // Set the email's message
    $wp_new_user_notification_email['message'] = $message;

    return $wp_new_user_notification_email;
}

function ajax_login()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-login-nonce', 'security');

    // Nonce is checked, get the POST data and sign user on
    $email = $_POST['login'];
    $password = $_POST['password'];

    $auth = wp_authenticate($email, $password);

    if (is_wp_error($auth)) {
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Неверные логин или пароль', 'sage') . '</p>',
        );
    } else {


        wp_set_current_user($auth->ID);
        wp_set_auth_cookie($auth->ID, true);
        do_action('wp_login', $auth->user_login, $auth);
        $data = array(
            'update' => true,
            'status' => '<p class="success">' . __('Подождите...', 'sage') . '</p>',
            'redirect' => '/',
        );
    }

    if (empty($data))
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Unknow error', 'sage') . '</p>',
        );

    echo json_encode($data);

    wp_die();
}


function validate_email()
{
    if (($_GET['email'])) {
        if (!email_exists($_GET['email']))
            echo "true";
        else
            echo "false";

    }

    die();
}

function ajax_reset()
{

    // First check the nonce, if it fails the function will break
    check_ajax_referer('ajax-reset-nonce', 'security');

    if ($_POST['email']) {

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array(
                'update' => false,
                'status' => '<p class="error">Email address ' . $_POST['email'] . ' is incorrect</p>',
            ));
            wp_die();
        }

        if ($user = get_user_by('email', $_POST['email'])) {

            $pass = wp_generate_password();

            wp_mail($_POST['email'], 'Reset password', 'Новый пароль ' . $pass);

            $data = array(
                'update' => true,
                'status' => '<p>Новый пароль отправлен на email.</p>',
                'data' => $user
            );


            wp_send_json($data);

        } else {
            $data = array(
                'update' => false,

                'status' => '<p class="error">' . sprintf(__('User with email %s does not exist', 'sage'), $_POST['email']) . '</p>',
            );
        }

    }


    if (empty($data))
        $data = array(
            'update' => false,
            'status' => '<p class="error">' . __('Unknow email', 'sage') . '</p>',
        );

    echo json_encode($data);

    wp_die();

}



function qty_cart()
{

    $cart_item_key = $_POST['hash'];
    $product_values = WC()->cart->get_cart_item($cart_item_key);
    $product_quantity = apply_filters('woocommerce_stock_amount_cart_item', apply_filters('woocommerce_stock_amount', preg_replace("/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT))), $cart_item_key);
    $passed_validation  = apply_filters('woocommerce_update_cart_validation', true, $cart_item_key, $product_values, $product_quantity);


    if ($passed_validation) {
        WC()->cart->set_quantity($cart_item_key, $product_quantity, true);
    }

    die();
}

function remove_item_from_cart()
{
    $cart_item_keys = $_POST['hash'];

    foreach ($cart_item_keys as $cart_item_key) {
        WC()->cart->remove_cart_item($cart_item_key);
        $count = WC()->cart->get_cart_contents_count();
    }
    wp_send_json(
        [
            'count' => $count,
        ]
    );
    die();
}


function apply_coupon()
{
    $coupon = $_POST['coupon'];

    WC()->cart->apply_coupon( $coupon );


    wp_send_json(
        [
            'coupon' => $coupon,
        ]
    );
    die();
}


function order_viewed()
{


    $user_id = $_GET['user_id'];
    $orderby = $_GET['order'];
    $viewed = get_field('viewed', 'user_'.$user_id);


    if ($viewed)
        $viewed = json_decode($viewed, true);

    $post__in = array_keys($viewed);

    if ( 'price' === $orderby ) {
        $rlv_wc_order = 'asc';
    }
    if ( 'price-desc' === $orderby ) {
        $rlv_wc_order = 'desc';
    }

    if ( in_array( $orderby, array( 'price', 'price-desc' ), true ) ) {
        $orderby = 'meta_value_num';
        $meta_key = '_price';
    }

    if ( 'date' === $orderby ) {
        $orderby = 'post__in';
    }
    if ( 'popularity' === $orderby ) {

        $orderby = 'meta_value_num';
        $rlv_wc_order = 'desc';
        $meta_key = 'total_sales';
    }



    $args = [
        'post_type' => 'product',
        'post__in' => $post__in,
        'posts_per_page' => 30,
        'orderby' => $orderby,
        'order' => $rlv_wc_order,
        'meta_key' => $meta_key

    ];

    $q = new WP_query($args);

    ob_start();

    if ($q->have_posts() ) {
        while ($q->have_posts()) {
            $q->the_post();
            wc_get_template_part('content', 'product');
        }
    } else {
        get_template_part( 'parts/account/empty', 'viewed' );
    }



    $html = ob_get_clean();

    wp_send_json(
        [
            'result' => $html,
            'found' => $q->found_posts
        ]
    );
    die();
}



function save_personal_data()
{

//    print_r($_POST);
//
//    die();
    $user_id = $_POST['user_id'];
    $key = $_POST['field_name'];
    $value = $_POST['field_value'];

    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $bank = $_POST['bank'];


    if ($user_id > 0 && $key && $value) {

        if ('billing_email' == $key) {
            $fail = is_email($value);
            $fail_message = 'Введите корректный E-mail';
        }


        update_user_meta($user_id, $key, sanitize_text_field( $value ));
      //  update_field($key,  sanitize_text_field( $value ), 'user_' .$user_id  );
    }

    if ($user_id > 0 && $pass) {
        if ($pass2 !== $pass3) {
            $fail = true;
            $fail_message = 'Пароли не совпадают';
        } elseif (strlen($pass3) < 8) {
            $fail = true;
            $fail_message = 'Минимальная длина должна быть 8 симоволов ';
        } else {
            wp_update_user([
                'ID' => $user_id,
                'user_pass' => $pass3
            ]);

        }

    }

    if ($user_id > 0 && !empty($bank)) {

        foreach ($bank as $key => $value) {
            update_field($key,  sanitize_text_field( $value ), 'user_' . $user_id  );
        }

        $bacs_meta = bacs_meta();
        ob_start(); ?>

        <?php foreach ($bacs_meta as $key=>$item) { ?>
            <li>
                <p><span><?= $item ?></span></p>
                <p><?= get_field($key, 'user_'. $user_id) ?></p>
            </li>
        <?php } ?>
        <?php

        $html = ob_get_clean();

        wp_send_json(
            [
                'html' => $html,

            ]
        );

        die();
    }



    wp_send_json(
        [
            'fail' => $fail,
            'fail_message' => $fail_message,
            'data' => $_POST
        ]
    );
    die();
}


function add_ticket() {


    check_ajax_referer( 'add_ticket', 'security' );

    $post_id = wp_insert_post([
        'post_type' => 'ticket',
        'post_status' => 'publish',
        'post_title' => $_POST['message'],
        'post_author' => $_POST['user_id'],
    ]);

    update_field('status', 'В процессе', $post_id);
    update_field('order_id', $_POST['order_id'], $post_id);


    wp_send_json(
        [
            'post_id' => $post_id,

        ]
    );

    wp_die();

}


function add_to_fav() {
    $user_id = $_POST['user_id'];
    $fav = $_POST['fav'];
    update_field('fav',$fav, 'user_'.$user_id);


    wp_die();
}

/**
 * add_to_cart
 */


function add_to_cart()
{

    $product_id = (int)$_GET['product_id'];
    $variation_id = (int)$_GET['variation_id'];
    $qty = $_GET['qty'] > 0 ? (int)$_GET['qty'] : 1;
    $added = WC()->cart->add_to_cart($product_id, $qty, $variation_id);



    $count = WC()->cart->get_cart_contents_count();

    wp_send_json_success(
        [
            'count' => $count,
        ]
    );

 //   WC_AJAX::get_refreshed_fragments();
    wp_die();
}
