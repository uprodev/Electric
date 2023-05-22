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

//defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals  ">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>


    <ul class="characteristics">
        <li>
            <p><?= count(WC()->cart->get_cart_contents()) ?> <?= _n( 'товар', 'товаров', count(WC()->cart->get_cart_contents())  ); ?></p>
            <p><?php wc_cart_totals_subtotal_html(); ?></p>
        </li>

        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>

            <li class="red">
                <p><?php wc_cart_totals_coupon_label( $coupon ); ?></p>
                <p><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
            </li>

        <?php endforeach; ?>


        <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
            <li>
                <p><?php echo esc_html( $fee->name ); ?></p>
                <p data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></p>
            </li>
        <?php endforeach; ?>


        <li class="">
            <p>Доставка</p>
            <p><?= WC()->cart->shipping_total > 0 ? WC()->cart->get_cart_shipping_total() : 'Бесплатно'; ?></p>
        </li>


        <li class="total">
            <p>Итого</p>
            <p><?php wc_cart_totals_order_total_html(); ?></p>
        </li>
    </ul>

    <?php do_action( 'woocommerce_after_cart_totals' ); ?>





</div>
