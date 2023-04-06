<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
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
	exit; // Exit if accessed directly
}
?>

<div <?php comment_class('review-item comment'); ?> id="comment-<?php comment_ID(); ?>">
    <div class="head-reviews">
        <div class="name">
            <p><?php comment_author(); ?></p>

            <?php do_action( 'woocommerce_review_before_comment_meta', $comment );?>


        </div>
        <div class="date">
            <p><?=  ( get_comment_date( 'j.m.Y'  ) ); ?></p>
        </div>
    </div>
    <div class="reviews-body">
        <div class="text">
            <?php do_action( 'woocommerce_review_comment_text', $comment );?>
        </div>
        <div class="sub-line">

                <?= comment_reply_link( array_merge( $args, array(
                    'depth'     => 1,
                    'max_depth' => 2,
                    'before'    => '<p class="reply">',
                    'after'     => '</p>'
                ) ) );  ?>

<!--            <div class="up-down">-->
<!--                <a href="#" class="down"><img src="img/icon-42-1.svg" alt=""></a>-->
<!--                <a href="#" class="up"><img src="img/icon-42-2.svg" alt=""></a>-->
<!--            </div>-->
        </div>
    </div>
</div>

