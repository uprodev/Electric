<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$user_id = get_current_user_id();
$customer = new WC_Customer($user_id);
$args = array(
    'customer_id' => $user_id,
    'status' => ['processing', 'pending'],
);
$orders_active = count(wc_get_orders($args));


$user_id = get_current_user_id();
$customer = new WC_Customer($user_id);
$args = array(
    'customer_id' => $user_id,
);
$orders_all = count(wc_get_orders($args));

$cart_count = WC()->cart->get_cart_contents_count();

$fav = get_field('fav', 'user_'.$user_id);
if ($fav)
    $post__in = explode('|', $fav);
$post__in = array_filter($post__in);


do_action( 'woocommerce_before_account_navigation' );


global $wp;


$var = array_keys($wp->query_vars);
?>

<div class="aside">
    <div class="btn-tab">
        <a href="#">Личный кабинет</a>

    </div>
    <div class="item ">
        <h6><a href="/my-account/"><img src="<?= get_template_directory_uri() ?>/img/icon-83.svg" alt="">Личный кабинет</a></h6>
    </div>
    <div class="item  <?= in_array('orders', $var) ? 'is-current' : '' ?>">
        <h6><a href="/my-account/orders/?type=all"><img src="<?= get_template_directory_uri() ?>/img/icon-81.svg" alt="">Заказы</a></h6>
        <ul>
            <li class="<?= in_array('orders', $var) && $_GET['active'] ? 'active' : '' ?>"><a href="/my-account/orders/?type=active">Активные заказы <span><?= $orders_active ?></span></a></li>
            <li class="<?= in_array('orders', $var) && $_GET['all'] ? 'active' : '' ?>" ><a href="/my-account/orders/?type=all">Все заказы <span><?= $orders_all ?></span></a></li>
        </ul>
    </div>
    <div class="item">
        <h6><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-83.svg" alt="">Товары</a></h6>
        <ul>
            <li class="<?= in_array('cart', $var)   ? 'active' : '' ?>"><a href="/my-account/cart/">Корзина <span><?= $cart_count ?></span></a></li>
            <li class="<?= in_array('favorites', $var)   ? 'active' : '' ?>"><a href="/my-account/favorites/">Избранное <span><?= count($post__in) ?></span></a></li>
            <li class="<?= in_array('viewed', $var)   ? 'active' : '' ?>"><a href="/my-account/viewed/">Просмотренные товары</a></li>
        </ul>
    </div>
    <div class="item">
        <h6><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-82.svg" alt="">Сервисное обслуживание</a></h6>
        <ul>
            <li class="<?= in_array('service', $var)   ? 'active' : '' ?>"><a href="/my-account/service/">Обмен и возврат</a></li>
            <li class="<?= in_array('repair', $var)   ? 'active' : '' ?>"><a href="/my-account/repair/">Ремонт и диагностика</a></li>
            <li class="<?= in_array('repair-active', $var)   ? 'active' : '' ?>"><a href="/my-account/repair-active/">Мои обращения <span>2</span></a></li>
        </ul>
    </div>
    <div class="item">
        <h6><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-1.svg" alt="">Профиль</a></h6>
        <ul>
            <li><a href="/my-account/edit-account/">Личные данные</a></li>
            <li><a href="#">Отзывы <span>2</span></a></li>
            <li class="out"><a href="<?= wc_logout_url() ?>">Выход</a></li>
        </ul>
    </div>





</div>




