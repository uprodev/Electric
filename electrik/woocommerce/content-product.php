<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$pcats = get_the_terms(get_the_ID(), 'product_cat');
$cat = $pcats[0]->term_id;

$unit = get_field('_woo_uom_input');

?>





<div class="product-item">

    <?php woocommerce_show_product_loop_sale_flash();?>



    <div class="like">
        <a class="add_to_fav <?= is_favorite($product->get_id()) ?>" data-liked="<?= is_favorite($product->get_id()) ?>" data-user_id="<?= get_current_user_id() ?>" data-product_id="<?= $product->get_id() ?>" href="#">
            <img src="<?= get_template_directory_uri();?>/img/icon-11-1.svg" alt="">
        </a>


    </div>
    <figure>
        <a href="<?php the_permalink();?>">
            <?php woocommerce_template_loop_product_thumbnail();?>
        </a>
    </figure>
    <div class="text-wrap">
        <div class="wrap-title">
            <h6><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
        </div>
        <div class="info-product">
            <?php if($product->is_in_stock() ): ?>
                <p><img src="<?= get_template_directory_uri();?>/img/icon-12.svg" alt=""><i><?= __('В наличии ', 'electrik');?> </i>
                    <?php if($product->get_stock_quantity() != 0): ?>
                     > <?= $product->get_stock_quantity() ?> <?= $unit ? $unit : __('шт.', 'electrik');?> </p>
                    <?php endif;?>
            <?php else:?>
                <p><?= __('Нет в наличии', 'electrik');?></p>
            <?php endif;?>
            <?php if($product->get_sku()):?>
                <p><span><?= __('арт.', 'electrik');?></span><?= $product->get_sku(); ?></p>
            <?php endif;?>
        </div>


        <div class="cost-wrap">
            <div class="cost">
                <p class="new"><span>Цена с НДС</span>
                <?php woocommerce_template_loop_price();?>
                </p>
            </div>
            <div class="line-cost">
                <?php if($product->is_in_stock() ) { ?>
                    <p class="package"> <?= $unit ? $unit : __('шт.', 'electrik');?></p>
                <?php } ?>
                <p class="quantity">
                    <?php if($product->is_in_stock() ) { ?>
                    <span>На складе</span>  <span><?= $product->get_stock_quantity() ?> <?= $unit ? $unit : __('шт.', 'electrik');?></span>
                    <?php } else { ?>
                        <?= __('Нет в наличии', 'electrik');?>
                    <?php } ?>
                </p>

            </div>
            <div class="buy">
                <div class="input-number ">
                    <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri();?>/img/minus.svg" alt=""></div>
                    <input type="text" name="count" value="1" class="form-control"/>
                    <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri();?>/img/plus.svg" alt=""></div>
                </div>
                <div class="card-product">
                    <?php woocommerce_template_loop_add_to_cart();?>
                </div>

            </div>

        </div>
    </div>
</div>
