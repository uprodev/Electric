<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

    <section class="hot-product product">
        <div class="content-width">
            <h2><?= __('Похожие товары', 'electrik');?> <img src="<?= get_template_directory_uri();?>/img/icon-44.svg" alt=""></h2>
            <div class="slider-wrap">
                <div class="nav-wrap">
                    <div class="swiper-button-next product-next-2"></div>
                    <div class="swiper-button-prev product-prev-2"></div>
                </div>
                <div class="swiper product-slider product-slider-2">
                    <div class="swiper-wrapper">
                        <?php foreach ( $related_products as $related_product ) : ?>

                            <?php $post_object = get_post( $related_product->get_id() );

                            setup_postdata( $GLOBALS['post'] =& $post_object );?>

                           <div class="swiper-slide"><?php  wc_get_template_part( 'content', 'product' );?></div>

                        <?php endforeach; wp_reset_postdata();?>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php endif;