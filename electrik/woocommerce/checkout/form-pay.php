<?php
/**
 * Pay for order form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-pay.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

$totals = $order->get_order_item_totals(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
?>


<?php
get_template_part('parts/breadcrumbs');
$pickups = get_field('pickup', 'options');
$method = explode(':', WC()->session->get('chosen_shipping_methods')[0])[0];

?>

<section class="cart-block checkout-block">
    <div class="content-width">
        <form action="#"  id="order_review" method="post" class="  form-icon"   >


            <?php // do_action( 'woocommerce_before_checkout_form', $checkout ); ?>


            <div class="top">
                <div class="title">
                    <h1>Оплата заказа</h1>
                </div>
                <div class="btn-wrap">
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-68.svg" alt=""></a>
                </div>
            </div>
            <div class="content">
                <div class="cart-content">

                    <div class="step step-2 is-open" >
                        <div class="head-mod">
                            <a href="#" class="prev-step-1"><i class="fas fa-chevron-left"></i>Шаг 2 из 3</a>
                        </div>
                        <h2>Способ оплаты</h2>
                        <div class="wrap-step">



                            <div id="payment" class="woocommerce-checkout-payment" style="background: transparent">
                                <?php if ( $order->needs_payment() ) : ?>
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

                                        <div class="select select-2">
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



                            <div class="wrap-hide-show-2">
                                <div class="select-item"  style="display:<?=  WC()->session->get('chosen_payment_method') === 'bacs' ? 'block' : 'none'; ?>">
                                    <h2>Реквизиты</h2>
                                    <div class="props-wrap">
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-1"><img src="<?= get_template_directory_uri() ?>/img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-1" id="bank-1" placeholder="УНП">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-2"><img src="<?= get_template_directory_uri() ?>/img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-2" id="bank-2" placeholder="Юридическое название">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-3"><img src="<?= get_template_directory_uri() ?>/img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-3" id="bank-3" placeholder="Название банка">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-4"><img src="<?= get_template_directory_uri() ?>/img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-4" id="bank-4" placeholder="БИК">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-5"><img src="<?= get_template_directory_uri() ?>/img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-5" id="bank-5" placeholder="Номер расчетного счета IBAN">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-6"><img src="<?= get_template_directory_uri() ?>/img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-6" id="bank-6" placeholder="Юридический адрес">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="aside">
                    <div class="item">



                        <div id="order_review" class="woocommerce-checkout-review-order">


                            <div class="shop_table woocommerce-checkout-review-order-table">

                                <ul class="characteristics">
                                    <li>
                                        <p><?= $order->get_item_count() ?> <?= _n( 'товар', 'товаров', $order->get_item_count()  ); ?></p>
                                        <p><?= $order->get_formatted_order_total() ; ?></p>
                                    </li>
                                    <?php foreach ( $order->get_coupon_codes()  as $code => $coupon ) : ?>

                                        <li class="red">
                                            <p><?php wc_cart_totals_coupon_label( $coupon ); ?></p>
                                            <p><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
                                        </li>

                                    <?php endforeach; ?>

                                    <?php foreach ( $order->get_fees() as $fee ) : ?>
                                        <li>
                                            <p><?php echo esc_html( $fee->name ); ?></p>
                                            <p data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></p>
                                        </li>
                                    <?php endforeach; ?>

                                    <?php if ($order->get_total_shipping() > 0) { ?>
                                        <li class="">
                                            <p>Доставка</p>
                                            <p><?= $order->get_total_shipping() ?></p>
                                        </li>
                                    <?php } ?>

                                    <li class="total">
                                        <p>Итого</p>
                                        <p><?= $order->get_formatted_order_total() ?></p>
                                    </li>
                                </ul>






                            </div>


                        </div>




                        <div class="btn-wrap">
                            <button type="submit" class="btn-big btn-red  "><img src="<?= get_template_directory_uri() ?>/img/icon-71.svg" alt="">Подтвердить заказ</button>

                        </div>

                    </div>
                </div>

            </div>

            <input type="hidden" name="woocommerce_pay" value="1" />
            <?php do_action( 'woocommerce_pay_order_after_submit' ); ?>

            <?php wp_nonce_field( 'woocommerce-pay', 'woocommerce-pay-nonce' ); ?>

        </form>
    </div>
</section>

