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