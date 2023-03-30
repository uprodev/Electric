<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals   <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>


    <ul class="characteristics">
        <li>
            <p><?= WC()->cart->get_cart_contents_count() ?> <?= _n( 'товар', 'товаров', WC()->cart->get_cart_contents_count()  ); ?></p>
            <p><?php wc_cart_totals_subtotal_html(); ?></p>
        </li>

        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>

            <li class="red">
                <p>Скидка <?php wc_cart_totals_coupon_label( $coupon ); ?></p>
                <p><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
            </li>

        <?php endforeach; ?>



        <li class="total">
            <p>Итого</p>
            <p><?php wc_cart_totals_order_total_html(); ?></p>
        </li>
    </ul>

    <?php do_action( 'woocommerce_after_cart_totals' ); ?>





</div>
