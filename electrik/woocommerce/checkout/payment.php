<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>
<div id="payment" class="woocommerce-checkout-payment" style="background: transparent">
	<?php if ( WC()->cart->needs_payment() ) : ?>
		<div class="wc_payment_methods payment_methods methods select-step-2 select-step">
			<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
                    $i++;
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway, 'i' => $i ) );
				}
			} else {
				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
			}
			?>

            <div class="select select-2"  style="visibility: hidden">
                <input type="radio" name="select-2-1" id="select-2-2">
                <label for="select-2-2">
                    <span class="icon-wrap">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-78-2.svg" alt="">
                    </span>
                    <span class="h6">Онлайн-оплата</span>
                    <span class="p">Картами Visa, MasterCard, Мир. Без комиссии</span>
                </label>
            </div>
		</div>
	<?php endif; ?>

</div>
<?php
if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
