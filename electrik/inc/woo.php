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
    return '<div class="line-info"><ul><li class="sale">-' . $percentage . '</li></ul></div>';
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
       // 'shipping_postcode' => '<b>Имя для выставления счета</b> является обязательным полем.',
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

    }
        
}