<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $comments;

if ( ! comments_open() ) {
	return;
}


if ( have_comments() ) : ?>

    <div class="reviews ">
        <h2><?= __('Отзывы', 'electrik');?></h2>
        <div class="reviews-form">
            <div class="reviews-left">
                <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
            </div>
            <div class="btn-wrap">
                <h2><?= __('Средняя оценка', 'electrik');?></h2>
                <p>3 отзыва</p>
                <div class="stars-wrap">
                            <div class="wrap">
                                <img src="img/icon-37-1.svg" alt="">
                                <img src="img/icon-37-1.svg" alt="">
                                <img src="img/icon-37-1.svg" alt="">
                                <img src="img/icon-37-1.svg" alt="">
                                <img src="img/icon-37-2.svg" alt="">
                            </div>
                </div>
                <a href="#popup-review" class="fancybox btn-border-red btn-big"><img src="<?= get_template_directory_uri();?>/img/icon-41.svg" alt=""><?= __('Оставить отзыв', 'electrik');?></a>
            </div>
        </div>
    </div>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif; ?>
<?php else : ?>
    <div class="reviews none">
        <h2><?= __('Отзывы', 'electrik');?></h2>

        <div class="reviews-content">
            <div class="left">
                <h6><?= __('У данного товара еще нет отзывов', 'electrik');?></h6>
                <p><?= __('Станьте первым, кто оставит отзыв на данный товар. Это поможет другим посетителям сделать свой выбор.', 'electrik');?></p>
            </div>
            <div class="btn-wrap">
                <a href="#popup-review" class="fancybox btn-border-red btn-big"><img src="<?= get_template_directory_uri();?>/img/icon-41.svg" alt=""><?= __('Оставить отзыв', 'electrik');?></a>
            </div>
        </div>
    </div>
<?php endif; ?>


