<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">


    <section class="pay-ok">
        <div class="content-width">
            <div class="content">
                <div class="bg">
                    <img src="<?= get_template_directory_uri() ?>/img/bg-5-1.png" alt="">
                    <img src="<?= get_template_directory_uri() ?>/img/bg-5-2.png" alt="" class="tab">
                    <img src="<?= get_template_directory_uri() ?>/img/bg-5-3.png" alt="" class="mob">
                </div>
                <div class="wrap">
                    <h1>Спасибо, <br>ваш заказ оформлен</h1>
                    <p><span>Номер заказа:</span> <?= $order->get_id() ?></p>
                    <div class="btn-wrap">
                        <a href="/" class="btn-red btn-big"><img src="<?= get_template_directory_uri() ?>/img/icon-56.svg" alt=""> Перейти на главную </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
