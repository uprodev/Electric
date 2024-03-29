<?php

/* Percenage sale */

add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {
    if( $product->is_type('variable')){
        $percentages = array();

        $prices = $product->get_variation_prices();

        foreach( $prices['price'] as $key => $price ){
            if( $prices['regular_price'][$key] !== $price ){
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            }
        }
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
    }

    if ($product->is_featured())
        $hot = '<li class="hot">
            <img src="'. get_template_directory_uri().'/img/icon-10.svg" alt="">
        </li>';
    return '<div class="line-info"><ul>'.$hot.'<li class="sale">-' . $percentage . '</li></ul></div>';
}


/* min variation price */

add_filter( 'woocommerce_variable_price_html', 'min_variation_price', 20, 2 );

function min_variation_price( $price, $product ) {

    $min_regular_price = $product->get_variation_regular_price( 'min', true );
    $min_sale_price = $product->get_variation_sale_price( 'min', true );
    $max_regular_price = $product->get_variation_regular_price( 'max', true );
    $max_sale_price = $product->get_variation_sale_price( 'max', true );

    if ( ! ( $min_regular_price == $max_regular_price && $min_sale_price == $max_sale_price ) ) {
        if ( $min_sale_price < $min_regular_price ) {
            $price = sprintf( '<del>%1$s</del><ins>%2$s</ins>', wc_price( $min_regular_price ), wc_price( $min_sale_price ) );
        } else {
            $price = sprintf( '%1$s', wc_price( $min_regular_price ) );
        }
    }

    return $price;

}


remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
add_action('woocommerce_payment_placement', 'woocommerce_checkout_payment', 20);




add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{

    $fields['shipping']['shipping_city']['required'] = false;
    $fields['shipping']['shipping_address_1']['required'] = false;
    $fields['shipping']['shipping_postcode']['required'] = false;

    $fields['shipping']['shipping_city']['label'] = "Город";

    $fields['shipping']['shipping_postcode']['label'] = "Этаж";
    $fields['shipping']['shipping_address_1']['label'] = "Квартира";
    $fields['shipping']['shipping_address_2']['label'] = "Улица, дом";


    $fields['shipping']['shipping_city']['priority'] = 1;
    $fields['shipping']['shipping_address_2']['priority'] = 2;





    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_state']);
    unset($fields['billing']['billing_last_name']);

    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_city']);


//    $fields['billing']['billing_company']['placeholder'] = 'Business Name';
//    $fields['billing']['billing_company']['label'] = 'Business Name';
//    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
//    $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
//    $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
//    $fields['shipping']['shipping_company']['placeholder'] = 'Company Name';
//    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
//    $fields['billing']['billing_email']['placeholder'] = 'Email Address ';
//    $fields['billing']['billing_phone']['placeholder'] = 'Phone ';
    return $fields;
}


add_filter( 'woocommerce_form_field' , 'elex_remove_checkout_optional_text', 10, 4 );
function elex_remove_checkout_optional_text( $field, $key, $args, $value ) {
    if( is_checkout() && ! is_wc_endpoint_url() ) {
        $optional = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
        $field = str_replace( $optional, '', $field );
    }
    return $field;
}


add_action( 'woocommerce_after_checkout_validation', 'custom_validation', 10, 2 );

function custom_validation( $fields, $errors ){

    $method = explode(':', WC()->session->get('chosen_shipping_methods')[0])[0];
    $post_fields = [
        'shipping_city' => '<b>Город доставки</b> является обязательным полем.',
        'shipping_address_1' => '<b>Адрес доставки</b> является обязательным полем.',
    ];


    if ($method == 'flat_rate') {

        foreach ($post_fields as $field => $error) {
            if (!$_POST[$field])
                $errors->add( 'validation',   $error );

        }

    }

}


add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if (  $_POST['payment_method'] == 'bacs' ) {
        $bacs_meta = bacs_meta();

        foreach ($bacs_meta as $key=>$item) {
            if (!$_POST[$key]) {
                wc_add_notice( "<b>$item</b> является обязательным полем.", 'error' );
            }
        }

    }

}


add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    $bacs_meta = bacs_meta();

    $user_id = get_current_user_id();
    foreach ($bacs_meta as $key=>$item) {
        if ( ! empty( $_POST[$key] ) ) {
            update_post_meta( $order_id, $key, sanitize_text_field( $_POST[$key] ) );
            if ($user_id > 0) {
                update_field($key, sanitize_text_field( $_POST[$key] ), 'user_' .$user_id  );
            }
        }
    }

    if ( ! empty( $_POST['select-city'] ) )
        update_post_meta( $order_id, 'select_city', sanitize_text_field( $_POST['select-city'] ) );

    if ( ! empty( $_POST['shipping-date'] ) )
        update_post_meta( $order_id, 'shipping-date', sanitize_text_field( $_POST['shipping-date'] ) );

    if ( ! empty( $_POST['shipping-time'] ) )
        update_post_meta( $order_id, 'shipping-time', sanitize_text_field( $_POST['shipping-time'] ) );


}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );


function my_custom_checkout_field_display_admin_order_meta($order){
    $bacs_meta = bacs_meta();
    foreach ($bacs_meta as $key=>$item) {
        echo '<p><strong>' . $item . ':</strong> ' . get_post_meta($order->id, $key, true) . '</p>';
    }

    echo '<p><strong>Самовывоз:</strong> ' . get_post_meta($order->id, 'select_city', true) . '</p>';
    echo '<p><strong>Время доставки:</strong> ' . get_post_meta($order->id, 'shipping-date', true) . '</p>';
    echo '<p><strong>Дата доставки:</strong> ' . get_post_meta($order->id, 'shipping-time', true) . '</p>';

}


function bacs_meta() {

    return [
        'bank-1' => 'УНП',
        'bank-2' => 'Юридическое название',
        'bank-3' => 'Название банка',
        'bank-4' => 'БИК',
        'bank-5' => 'Номер расчетного счета IBAN',
        'bank-6' => 'Юридический адрес',
    ];
}

add_filter( 'woocommerce_bacs_process_payment_order_status','filter_bacs_process_payment_order_status_callback', 10, 2 );
function filter_bacs_process_payment_order_status_callback( $status, $order ) {
    return 'pending';
}


add_action('init', function() {
    add_rewrite_endpoint('viewed', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('cart', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('repair', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('repair-active', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('service', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('favorites', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('reviews', EP_ROOT | EP_PAGES);


});
add_action('woocommerce_account_viewed_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user

    wc_get_template('myaccount/viewed.php', [
        'viewed' => $endpoint
    ]);
});

add_action('woocommerce_account_repair_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user

    wc_get_template('myaccount/repair.php', [
        'repair' => $endpoint
    ]);
});


add_action('woocommerce_account_repair-active_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user

    wc_get_template('myaccount/repair-active.php', [
        'repair_active' => $endpoint
    ]);
});


add_action('woocommerce_account_service_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user

    wc_get_template('myaccount/service.php', [
        'service' => $endpoint
    ]);
});

add_action('woocommerce_account_cart_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user

    wc_get_template('myaccount/cart.php', [
        'cart' => $endpoint
    ]);
});

add_action('woocommerce_account_favorites_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user

    wc_get_template('myaccount/favorites.php', [
        'favorites' => $endpoint
    ]);
});

add_action('woocommerce_account_reviews_endpoint', function() {
    $endpoint = [];  // Replace with function to return licenses for current logged in user

    wc_get_template('myaccount/reviews.php', [
        'reviews' => $endpoint
    ]);
});




add_filter( 'woocommerce_account_menu_items', function($items) {

    $items['cart'] = 'Корзина';
    $items['viewed'] = 'Просмотренные товары';
    $items['repair'] = 'Ремонт и диагностика';
    $items['service'] = 'Обмен и возврат';
    $items['favorites'] = 'Избранное';

    return $items;
});


function add_points_widget_to_fragment( $fragments ) {
    $fragments['.cart-header'] =  '<p class="cart-header">'.  WC()->cart->get_cart_total() . '</p>';

    ob_start();
    woocommerce_mini_cart();
    $fragments['.mini-cart'] = ob_get_clean();

    $fragments['.count-mob'] = '<span class="count-mob">'. count(WC()->cart->get_cart_contents()) .'</span>';



    return $fragments;
}
add_filter('add_to_cart_fragments', 'add_points_widget_to_fragment');


function is_favorite($product_id) {

    if (is_user_logged_in() ) {
        $fav = get_field('fav', 'user_'. get_current_user_id()) ? get_field('fav', 'user_'. get_current_user_id()) :[];
    } else {
        $fav =  $_COOKIE['fav'] ? $_COOKIE['fav'] : [];
    }


    if ($fav)
        $fav = explode('|', $fav);

    if (in_array($product_id, $fav))
        return 'is-like';
}

remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );


function ask_percentage_sale(  $product ) {
    $discount = 0;
    if ( $product->get_type() == 'variable' ) {
        $available_variations = $product->get_available_variations();
        $maximumper = 0;
        for ($i = 0; $i < count($available_variations); ++$i) {
            $variation_id=$available_variations[$i]['variation_id'];
            $variable_product1= new WC_Product_Variation( $variation_id );
            $regular_price = $variable_product1->get_regular_price();
            $sales_price = $variable_product1->get_sale_price();

            if (!$sales_price)
                continue;

            if( $sales_price ) {
                $percentage= round( ( ( $regular_price - $sales_price ) / $regular_price ) * 100 ) ;
                if ($percentage > $maximumper) {
                    $maximumper = $percentage;
                }
            }
        }
        if ($maximumper)
            $text = '<li class="sale">' . $maximumper  . '%</li>';
    } elseif ( $product->get_type() == 'simple' ) {
        if (!$product->get_sale_price())
            return;

        $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
        $text = '<li class="sale">' . $percentage . '%</li>';
    }

    return $text;
}



add_action( 'woocommerce_cart_calculate_fees', 'wpf_wc_add_cart_fees_by_product_meta' );
function wpf_wc_add_cart_fees_by_product_meta( $cart ) {

    $discount = get_field('discount', 'options');
    $total = WC()->cart->get_cart_contents_total();
    if ($discount) {
        if ($discount['min'] <= $total) {
            $fee = -round($total * ($discount['percent'] / 100));
            $cart->add_fee( 'Скидка' , $fee  );
        }
    }

}


add_action( 'after_setup_theme', function() {
    WC_Cache_Helper::get_transient_version( 'shipping', true );
} );
add_filter( 'woocommerce_package_rates', 'custom_shipping_costs', 10, 2 );
function custom_shipping_costs( $rates, $package ) {
    // New shipping cost (can be calculated)

    $free_shipping = get_field('free_shipping', 'options');
    $total = WC()->cart->get_cart_contents_total();

    $post_data = [];
    parse_str( $_POST['post_data'], $post_data );
    $city = $post_data['shipping_city'];
    $costs = get_field('shipping', 'options');

    foreach ($costs as $item) {
        if ($city === $item['city'])  {
            $new_cost = $item['price'];
            foreach( $rates as $rate_key => $rate ){
                if ($rate_key === 'flat_rate:3')
                    $rates[$rate_key]->cost = $new_cost;

            }


          //  WC()->cart->calculate_shipping();
//            WC()->session->set( 'shipping_calculated_cost', $rates[$rate_key]->cost );

        //    return $rates;
        }
    }

    if ($new_cost > 0)
        $free_shipping = $free_shipping/2;


    if ($free_shipping <= $total) {
        $new_cost = 0;
        foreach( $rates as $rate_key => $rate ){
            $rates[$rate_key]->cost = $new_cost;
        }
    }

    return $rates;
}



add_action('template_redirect', function(){
    if (is_account_page() && !is_user_logged_in()) {
        wp_redirect('/');
    }
});


function wc_get_formatted_cart_item_data2( $cart_item, $flat = false ) {
    $item_data = array();

    // Variation values are shown only if they are not found in the title as of 3.0.
    // This is because variation titles display the attributes.

   // print_r( $cart_item ['variation'] );
    if ( $cart_item['data']->is_type( 'variation' ) && is_array( $cart_item['variation'] ) ) {
        foreach ( $cart_item['variation'] as $name => $value ) {
            $taxonomy = wc_attribute_taxonomy_name( str_replace( 'attribute_pa_', '', urldecode( $name ) ) );

            if ( taxonomy_exists( $taxonomy ) ) {
                // If this is a term slug, get the term's nice name.
                $term = get_term_by( 'slug', $value, $taxonomy );
                if ( ! is_wp_error( $term ) && $term && $term->name ) {
                    $value = $term->name;
                }
                $label = wc_attribute_label( $taxonomy );
            } else {
                // If this is a custom option slug, get the options name.
                $value = apply_filters( 'woocommerce_variation_option_name', $value, null, $taxonomy, $cart_item['data'] );
                $label = wc_attribute_label( str_replace( 'attribute_', '', $name ), $cart_item['data'] );
            }

            // Check the nicename against the title.
            if ( '' === $value || wc_is_attribute_in_product_name( $value, $cart_item['data']->get_name() ) ) {
              //  continue;
            }

            $item_data[] = array(
                'key'   => $label,
                'value' => $value,
            );
        }
    }

    // Filter item data to allow 3rd parties to add more to the array.
  //  $item_data = apply_filters( 'woocommerce_get_item_data', $item_data, $cart_item );


    // Format item data ready to display.
    foreach ( $item_data as $key => $data ) {
        // Set hidden to true to not display meta on cart.
        if ( ! empty( $data['hidden'] ) ) {
            unset( $item_data[ $key ] );
            continue;
        }
        $item_data[ $key ]['key']     = ! empty( $data['key'] ) ? $data['key'] : $data['name'];
        $item_data[ $key ]['display'] = ! empty( $data['display'] ) ? $data['display'] : $data['value'];
    }

    // Output flat or in list format.
    if ( count( $item_data ) > 0 ) {
        ob_start();

        if ( $flat ) {
            foreach ( $item_data as $data ) {
                echo esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['display'] ) . "\n";
            }
        } else {
            wc_get_template( 'cart/cart-item-data.php', array( 'item_data' => $item_data ) );
        }

        return ob_get_clean();
    }

    return '';
}


/**
 * Trim zeros in price decimals
 **/
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );


/**
 * Set a minimum order amount for checkout
 */
add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );

function wc_minimum_order_amount() {
    // Set this variable to specify a minimum order value
    $minimum = get_field('minimum', 'options');

    if ( $minimum > 0 && WC()->cart->total < $minimum ) {

        if( is_cart() ) {

            wc_print_notice(
                sprintf( 'Ваш текущий заказ на %s — минимальная сумма заказа составляет %s' ,
                    wc_price( WC()->cart->total ),
                    wc_price( $minimum )
                ), 'error'
            );

        } else {

            wc_add_notice(
                sprintf( 'Ваш текущий заказ на %s — минимальная сумма заказа составляет %s' ,
                    wc_price( WC()->cart->total ),
                    wc_price( $minimum )
                ), 'error'
            );

        }
    }
}
