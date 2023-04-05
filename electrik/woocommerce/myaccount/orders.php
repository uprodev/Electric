<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
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

do_action( 'woocommerce_before_account_orders', $has_orders );

$user_id = get_current_user_id();
$customer = new WC_Customer($user_id);

$type = $_GET['type'];


$args = array(
    'customer_id' => $user_id,
    'status' => $type == 'all' ? 'all' : ['processing', 'pending'],
    'limit' => 60, // to retrieve _all_ orders by this user
);
$orders = wc_get_orders($args);

?>



<section class="cabinet cabinet-breadcrumb <?= $type == 'all' ? 'cabinet-all-orders' : '' ?> ">
    <div class="content-width">
        <div class="content">
            <div class="breadcrumb-back">
                <a href="#"><i class="fas fa-chevron-left"></i>Заказы</a>
            </div>
            <h2 class="tab-h1">Активные заказы</h2>

            <?php do_action( 'woocommerce_account_navigation' ); ?>
            
            <div class="cabinet-content">
                <h1>Все заказы</h1>

                <div class="wrap-content">
                    <?php if ($orders) { ?>
                        <?php foreach ($orders as $order) {
                            $order_items = $order->get_items();
                            $order_item = reset($order_items)->get_product();
                            $img = get_the_post_thumbnail_url($order_item->get_id(), 'small');
                            ?>
                            <div class="item-order item-wrap">
                        <div class="data data-1">
                            <p><b>№<?= $order->get_id() ?></b></p>
                            <p><?= wc_get_order_status_name($order->get_status());  ?></p>
                        </div>
                        <div class="data data-2">
                            <p><span>Дата заказа/получения:</span> <?= $order->get_date_completed() ?></p>
                            <p><?= $order->get_shipping_method() ?></p>
                        </div>
                        <div class="data data-3">
                            <p><span>Сумма заказа:</span> <?= $order->get_formatted_order_total() ?></p>

                            <?php if ( $order->get_status() !== 'cancelled'   ) { ?>
                                <?php if ( $order->is_paid()   ) { ?>
                                    <div class="paid" >
                                        <p><img src="<?= get_template_directory_uri() ?>/img/icon-85.svg" alt=""><?=  $order->get_payment_method() == 'cod' ? 'Оплата при получении' : 'Оплачен' ?></p>
                                    </div>
                                <?php } else { ?>
                                    <div class="no-paid">
                                        <p><img src="<?= get_template_directory_uri() ?>/img/icon-86.svg" alt="">Не оплачен</p>
                                        <p><a href="<?= $order->get_checkout_payment_url() ?>">Оплатить</a></p>
                                    </div>
                                <?php } ?>
                            <?php } ?>

                        </div>
                        <div class="data data-4">
                            <figure>
                                <a href="#">	<img src="<?= $img ?>" alt=""></a>
                            </figure>
                        </div>
                        <div class="order-detail item-open">

                            <?php foreach ($order_items as $item) {
                                $product = $item->get_product();

                                ?>
                                <div class="detail-item">
                                    <div class="detail-data detail-data-1">
                                        <figure>
                                            <a href="<?= get_permalink($product->get_id()) ?>">
                                                <img src="<?= get_the_post_thumbnail_url($product->get_id(), 'small') ?>" alt=""></a>
                                        </figure>
                                    </div>
                                    <div class="detail-data detail-data-2">
                                        <h6><a href="<?= get_permalink($product->get_id()) ?>"><?=  $item->get_name() ?></a></h6>
                                        <p><?= wc_display_item_meta( $item );  ?></p>
                                    </div>
                                    <div class="detail-data detail-data-3">
                                        <p><?= $item->get_quantity() ?> <?= get_field('unit', $item->get_id()) ?: 'шт.' ?></p>
                                    </div>
                                    <div class="detail-data detail-data-4">
                                        <p><?= $order->get_formatted_line_subtotal( $item ) ?></p>
                                    </div>

                                </div>
                            <?php } ?>

                        </div>
                        <div class="info-bottom-link">
                            <a href="#"><span>Открыть заказ</span><span>Скрыть заказ</span><i class="fas fa-chevron-down"></i></a>
                        </div>

                    </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

</section>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
