<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;

$icons = [
    'shipping_city' => 2,
    'shipping_address_1' => 1,
    'shipping_address_2' => 3,
    'shipping_postcode' => 4,
];

?>

	<?php if ( true === WC()->cart->needs_shipping_address() ) : ?>


        <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" checked type="checkbox" name="ship_to_different_address" value="1" />


			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>


				<?php
				$fields = $checkout->get_checkout_fields( 'shipping' );

				foreach ( $fields as $key => $field ) {

                    if ($key == 'shipping_country')
                        continue;
                    ?>

                    <div class="input-wrap input-wrap-50">

                        <?php

                        $field['placeholder'] =  $field['label'];
                        $field['optional'] =  '';
                        $field['label'] = '<img src="'.get_template_directory_uri().'/img/icon-76-'.$icons[$key].'.svg" alt="">';
                        woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                    </div>
                    <?php
				}
				?>


			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>



	<?php endif; ?>


	<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>



    <div class="input-wrap">
        <label for="message-delivery"></label>
        <textarea id="message-delivery" name="order_comments" placeholder="Комментарий"></textarea>
    </div>


	<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>

<input type="hidden" name="shipping_country" id="shipping_country" value="BY" autocomplete="country" class="country_to_state" readonly="readonly">

