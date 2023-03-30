<?php

$actions = [
    'ajax_registration',
    'ajax_login',
    'ajax_reset',
    'qty_cart',
    'remove_item_from_cart'
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


            $user_id = register_new_user( $login, $email );



            if ($user_id) {


                $data = array(
                    'update' => true,
                    'status' => '<p class="success">' . __('Регистрация успешная', 'sage') . '</p>',
                    'redirect' => get_permalink(444),
                    'user_id' => $user_id,

                );


                if ($user = get_user_by('id', $user_id)) {
//                    wp_set_current_user($user->ID);
//                    wp_set_auth_cookie($user->ID, true);
//                    do_action('wp_login', $user->user_login, $user);
                }

                $user_name = get_userdata($user_id)->first_name ?: $login;


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
