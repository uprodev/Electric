<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

setlocale(LC_ALL, 'ru_RU.UTF-8  ');

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}


$pickups = get_field('pickup', 'options');
$method = explode(':', WC()->session->get('chosen_shipping_methods')[0])[0];

?>

<?php
get_template_part('parts/breadcrumbs');


?>

<section class="cart-block checkout-block">
    <div class="content-width">
        <form action="#"  name="checkout" method="post" class="checkout woocommerce-checkout form-icon" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">


            <?php // do_action( 'woocommerce_before_checkout_form', $checkout ); ?>


            <div class="top">
                <div class="title">
                    <h1>Оформление заказа</h1>
                </div>
                <div class="btn-wrap">
                    <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-68.svg" alt=""></a>
                </div>
            </div>
            <div class="content">
                    <div class="cart-content">
                        <div class="step step-1 is-open">
                            <div class="head-mod">
                                <a href="#"><i class="fas fa-chevron-left"></i>Шаг 1 из 3</a>
                            </div>
                            <h2><b>1</b>Где и как Вы хотите получить заказ?</h2>
                            <div class="wrap-step">

                                <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

                                    <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

                                    <?php wc_cart_totals_shipping_html(); ?>

                                    <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

                                <?php endif; ?>

                                <div class="wrap-hide-show-1">
                                    <div class="select-item select-city tabs-wrap" style="<?= $method == 'flat_rate' ? 'display:none' : 'display:block' ?>">
                                        <div class="head">
                                            <h2>Ваш город:</h2>
                                            <ul class="tab-menu-popup">
                                                <?php foreach ($pickups as $pickup) {
                                                    $i++;
                                                    ?>
                                                    <li class="<?= $i == 1 ? 'is-active' : ''  ?>"><?= $pickup['city'] ?></li>
                                                <?php } ?>
                                            </ul>
                                            <div class="btn">
                                                <a href="#">Скоро</a>
                                            </div>

                                        </div>
                                        <div class="tabs-content-popup">

                                            <?php
                                            $i = 0;
                                            foreach ($pickups as $pickup) { $i++; ?>
                                                <div class="tab-item-popup">
                                                    <div class="wrap">
                                                        <?php
                                                        $k = 0;
                                                        foreach ($pickup['places'] as $place) { $k++; ?>
                                                            <p>
                                                                <input <?= ($i == $k && $k == 1) ? 'checked' : ''  ?> type="radio" name="select-city" value="<?= $place['address'] ?>" id="select-city-2-1">
                                                                <label for="select-city-2-1"><?= $place['address'] ?> <i><?= $place['time'] ?> </i></label>
                                                            </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="select-item select-delivery" style="<?= $method == 'flat_rate' ? 'display:block' : '' ?>">
                                        <h2>Адрес доставки</h2>
                                        <div class="delivery-wrap">

                                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>

                                        </div>
                                        <div class="select-date">
                                            <h2><img src="<?= get_template_directory_uri() ?>/img/icon-77.svg" alt="">Желаемое время доставки</h2>
                                            <div class="date-wrap">
                                                <div class="select-block ">
                                                    <label class="form-label" for="select-date-1"></label>
                                                    <select id="select-date-1" name="shipping-date" class="select-list">
                                                        <?php foreach (range(1,4) as $day) {
                                                            $date = strftime('%A, %d %h', strtotime("+$day day"));

                                                            ?>

                                                            <option <?php selected(1, $day) ?> value="<?= $date ?>"><?= $date ?></option>
                                                        <?php } ?>


                                                    </select>
                                                </div>
                                                <div class="select-block ">
                                                    <label class="form-label" for="select-date-2"></label>
                                                    <select id="select-date-2" name="shipping-time" class="select-list">
                                                        <option value="09:00-12:00" selected>09:00-12:00</option>
                                                        <option value="12:00-19:00">12:00-19:00</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-red-full-wrap">
                                    <a href="#" class="btn-red btn-big next-step">Далее <img src="<?= get_template_directory_uri() ?>/img/icon-75.svg" alt=""></a>
                                </div>
                            </div>

                        </div>
                        <div class="step step-2">
                            <div class="head-mod">
                                <a href="#" class="prev-step-1"><i class="fas fa-chevron-left"></i>Шаг 2 из 3</a>
                            </div>
                            <h2><b>2</b>Способ оплаты</h2>
                            <div class="wrap-step">

                                <?php do_action('woocommerce_payment_placement') ?>

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
                                <div class="btn-red-full-wrap">
                                    <a href="#" class="btn-red btn-big next-step">Далее <img src="<?= get_template_directory_uri() ?>/img/icon-75.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="step step-3">
                            <div class="head-mod">
                                <a href="#" class="prev-step-2"><i class="fas fa-chevron-left"></i>Шаг 2 из 3</a>
                            </div>
                            <h2><b>3</b>Укажите данные получателя заказа</h2>
                            <div class="wrap-step">
                                <div class="recipient">

                                    <?php do_action( 'woocommerce_checkout_billing' ); ?>




                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aside">
                        <div class="item">

                            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                            </div>

                            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

                            <div class="wrap">

                                <?php if ( wc_coupons_enabled() ) { ?>

                                    <div class="coupon">
                                        <div class="input-wrap">
                                            <label for="code"><img src="<?= get_template_directory_uri() ?>/img/icon-70.svg" alt=""></label>
                                            <input type="text" name="coupon_code" id="code" placeholder="Введите промокод">
                                            <button class="button" name="apply_coupon_chekout" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>

                                        </div>

                                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                    </div>
                                <?php } ?>

                            </div>

                            <ul class="delivery-info">
                                <li>
                                    <p class="shipping_method_text"></p>
                                    <h6 class="shipping-point_text"></h6>
                                </li>
                                <li>
                                    <p>Дата</p>
                                    <h6 class="shipping-date_text"></h6>
                                </li>
                                <li>
                                    <p>Оплата</p>
                                    <h6 class="payment_method_text"></h6>
                                </li>
                            </ul>


                            <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

                            <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

                            <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>

                            <div class="btn-wrap">
                                <button type="submit" class="btn-big btn-red  "><img src="<?= get_template_directory_uri() ?>/img/icon-71.svg" alt="">Подтвердить заказ</button>
                                <a href="<?= wc_get_cart_url() ?>" class="btn-big btn-border-black">Изменить заказ</a>
                            </div>

                        </div>
                    </div>

                </div>

        </form>
    </div>
</section>


<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
