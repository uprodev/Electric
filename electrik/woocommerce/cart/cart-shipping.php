<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.3.0
 */

defined( 'ABSPATH' ) || exit;

$formatted_destination    = isset( $formatted_destination ) ? $formatted_destination : WC()->countries->get_formatted_address( $package['destination'], ', ' );
$has_calculated_shipping  = ! empty( $has_calculated_shipping );
$show_shipping_calculator = ! empty( $show_shipping_calculator );
$calculator_text          = '';



?>
<div class="select-step-1 select-step woocommerce-shipping-totals shipping">
    <?php if ( $available_methods ) : ?>

        <?php foreach ( $available_methods as $method ) : ?>

            <div class="select select-1 <?= $method->id == $chosen_method ?  'is-active' : "" ?> ">
                    <?php

                    $icon = $method->id == 'flat_rate' ? 4 : 3;
                    $class = $method->id == 'flat_rate' ? 'when' : 'shipping-point';

                    $pickups = get_field('pickup', 'options');
                    $when = $method->id == 'flat_rate:3' ? 'Завтра, после 11:00' : 'Завтра, в течении дня';


                    $from =  $method->id == 'flat_rate:3' ? ' от 6р.' : '';
                    if ( 1 < count( $available_methods ) ) {
                        printf( '<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ) ); // WPCS: XSS ok.
                    } else {
                        printf( '<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); // WPCS: XSS ok.
                    }
                  //  printf( '<label for="shipping_method_%1$s_%2$s">%3$s</label>', $index, esc_attr( sanitize_title( $method->id ) ), wc_cart_totals_shipping_method_label( $method ) ); // WPCS: XSS ok.
                    do_action( 'woocommerce_after_shipping_rate', $method, $index );
                    ?>

                <label for="shipping_method_<?= $index ?>_<?= esc_attr( sanitize_title( $method->id ) ) ?>">
                    <span class="icon-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-7<?= $icon ?>.svg" alt="">
                    </span>
                    <span class="h6"><?= $method->get_label() ?><?= $from ?></span>
                    <span class="p <?= $class ?>"><?= $when ?></span>
                </label>
            </div>

        <?php endforeach; ?>


    <?php endif; ?>
</div>
