<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
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

/*
 * @hooked wc_empty_cart_message - 10
 */
//do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
    <?php
    get_template_part('parts/breadcrumbs');
    ?>

    <section class="empty-block">
        <div class="content-width">
            <h1>Корзина</h1>
            <div class="border-block">
                <figure>
                    <img src="<?= get_template_directory_uri() ?>/img/icon-67.svg" alt="">
                </figure>
                <h2>Корзина пуста</h2>
                <p>Но это никогда не поздно исправить</p>
                <div class="btn-wrap">
                    <a href="/shop" class="btn-red btn-big">Перейти к покупкам <img src="<?= get_template_directory_uri() ?>/img/icon-56.svg" alt=""></a>
                </div>
            </div>
        </div>
    </section>



<?php endif; ?>
