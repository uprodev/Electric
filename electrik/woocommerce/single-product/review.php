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
<div class="review-item" id="li-comment-<?php comment_ID(); ?>">
    <div class="head-reviews">
        <div class="name">
            <p><?php comment_author(); ?></p>

            <?php do_action( 'woocommerce_review_before_comment_meta', $comment );?>


        </div>
        <div class="date">
            <p><?= esc_html( get_comment_date( 'j.d.Y', comment_ID() ) ); ?></p>
        </div>
    </div>
    <div class="reviews-body">
        <div class="text">
            <?php do_action( 'woocommerce_review_comment_text', $comment );?>
        </div>
        <div class="sub-line">
            <p><a href="#">Ответить</a></p>
            <div class="up-down">
                <a href="#" class="down"><img src="img/icon-42-1.svg" alt=""></a>
                <a href="#" class="up"><img src="img/icon-42-2.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>

	<div id="comment-<?php comment_ID(); ?>" class="comment_container">


		<div class="comment-text">

			<?php
			/**
			 * The woocommerce_review_before_comment_meta hook.
			 *
			 * @hooked woocommerce_review_display_rating - 10
			 */
			do_action( 'woocommerce_review_before_comment_meta', $comment );

			/**
			 * The woocommerce_review_meta hook.
			 *
			 * @hooked woocommerce_review_display_meta - 10
			 */
			do_action( 'woocommerce_review_meta', $comment );

			//do_action( 'woocommerce_review_before_comment_text', $comment );

			/**
			 * The woocommerce_review_comment_text hook
			 *
			 * @hooked woocommerce_review_display_comment_text - 10
			 */
			//do_action( 'woocommerce_review_comment_text', $comment );

			//do_action( 'woocommerce_review_after_comment_text', $comment );
			?>

