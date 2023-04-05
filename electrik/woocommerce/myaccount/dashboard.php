<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);

$user_id = get_current_user_id();
$customer = new WC_Customer($user_id);
$args = array(
    'customer_id' => $user_id,
    'status' => ['processing', 'pending'],
    'limit' => 4, // to retrieve _all_ orders by this user
);
$orders = wc_get_orders($args);



?>

    <section class="cabinet">
        <div class="content-width">
            <div class="content">
                <h2 class="tab-h1">Личный кабинет</h2>

                <?php do_action( 'woocommerce_account_navigation' ); ?>

                <div class="cabinet-content">

                <h1>Личный кабинет</h1>
                <div class="wrap-content">
                    <div class="item">
                        <div class="title">
                            <h2>Активные заказы <img src="<?= get_template_directory_uri() ?>/img/icon-84.svg" alt=""></h2>
                        </div>

                        <?php if ($orders) { ?>
                            <ul class="bg-list">
                                <?php foreach ($orders as $order) { ?>
                                    <li>
                                        <p>№<?= $order->get_id() ?></p>
                                        <p><?= $order->get_formatted_order_total() ?></p>
                                    </li>
                                    <li class="info">
                                        <p><?= wc_get_order_status_name($order->get_status());  ?></p>

                                        <?php if ( $order->is_paid()) { ?>
                                            <div class="paid" >
                                                <p><img src="<?= get_template_directory_uri() ?>/img/icon-85.svg" alt=""><?=  $order->get_payment_method() == 'cod' ? 'Оплата при получении' : 'Оплачен' ?></p>
                                            </div>
                                        <?php } else { ?>
                                            <div class="no-paid">
                                                <p><img src="<?= get_template_directory_uri() ?>/img/icon-86.svg" alt="">Не оплачен</p>
                                                <p><a href="<?= $order->get_checkout_payment_url() ?>">Оплатить</a></p>
                                            </div>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <div class="link-bottom">
                            <a href="#">Посмотреть все<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <h2>Личные данные <img src="<?= get_template_directory_uri() ?>/img/icon-87.svg" alt=""></h2>
                        </div>
                        <ul class="characteristics">
                            <li>
                                <p>Имя</p>
                                <p><?= $customer->get_first_name() ?></p>
                            </li>
                            <li >
                                <p>Телефон</p>
                                <p><?= $customer->get_billing_phone() ?></p>
                            </li>
                            <li>
                                <p>Электронная почта</p>
                                <p><?= $customer->get_billing_email() ?></p>
                            </li>
                        </ul>
                        <div class="link-bottom">
                            <a href="#">Изменить<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <h2>Моя корзина <img src="<?= get_template_directory_uri() ?>/img/icon-88.svg" alt=""></h2>
                        </div>

                        <?php if (WC()->cart->get_cart_contents_count() > 0) {?>
                            <ul class="bg-list">
                                <li>
                                    <p><?= WC()->cart->get_cart_contents_count() ?> <?= _n( 'товар', 'товаров', WC()->cart->get_cart_contents_count()  ); ?></p>
                                    <p><?php wc_cart_totals_order_total_html(); ?></p>
                                </li>

                            </ul>
                        <?php } else { ?>
                            <div class="empty">
                                <p>У Вас нет добавленных товаров в корзину</p>
                            </div>
                        <?php } ?>
                        <div class="link-bottom">
                            <a href="<?= wc_get_cart_url();?>">Перейти в корзину<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">
                            <h2>Избранные товары <img src="<?= get_template_directory_uri() ?>/img/icon-88.svg" alt=""></h2>
                        </div>
                        <div class="empty">
                            <p>У Вас нет добавленных товаров в Избранное</p>
                        </div>
                        <div class="link-bottom">
                            <a href="#">Перейти в избранное<i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>



                </div>
            </div>

        </div>

    </section>


<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	if ( wc_shipping_enabled() ) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	}
	printf(
		wp_kses( $dashboard_desc, $allowed_html ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
	?>
</p>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
