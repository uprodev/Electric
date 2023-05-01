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

$comments = get_comments( array('post_id' => get_the_id()) );

$count = $product->get_review_count();


$average_rating =  $product->get_average_rating();
?>

<?php

if ( $comments ) : ?>

    <div class="reviews ">
        <h2><?= __('Отзывы', 'electrik');?></h2>
        <div class="reviews-form">
          <div class="btn-wrap btn-wrap-mob">
            <h2><?= __('Средняя оценка', 'electrik');?></h2>
            <p><?= $count ?> <?= _n( 'отзыв', 'отзыва', $count  ); ?></p>
            <div class="stars-wrap">
              <div class="wrap">

                <?php
                foreach (range(1, 5) as $star) {
                  $icon = '1';
                  if ($star - $average_rating > 1)
                    continue;

                  if ($star - $average_rating < 1 && $star - $average_rating >= 0.5)
                    $icon = '2';

                  ?>
                  <img src="<?= get_template_directory_uri(); ?>/img/icon-37-<?= $icon ?>.svg" alt="">
                <?php } ?>

              </div>
            </div>
            <a href="#popup-review" class="fancybox btn-border-red btn-big"><img src="<?= get_template_directory_uri();?>/img/icon-41.svg" alt=""><?= __('Оставить отзыв', 'electrik');?></a>
          </div>
            <div class="reviews-left commentlist">


                <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ), $comments ); ?>


            </div>
            <div class="btn-wrap">
                <h2><?= __('Средняя оценка', 'electrik');?></h2>
                <p><?= plural(   $count  ); ?></p>
                <div class="stars-wrap">
                    <div class="wrap">

                        <?php
                        foreach (range(1, 5) as $star) {
                            $icon = '1';
//                            if ($star - $average_rating > 1)
//                                continue;

                            if ($average_rating - $star  < 0  || $star - $average_rating >= 0.5)
                                $icon = '2';

                            ?>
                            <img src="<?= get_template_directory_uri(); ?>/img/icon-37-<?= $icon ?>.svg" alt="">
                        <?php } ?>

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



<div id="popup-review" style="display:none;" class="popup-login popup-review width-820">
    <div class="popup-main">
        <h3>Ваш отзыв о <?= $product->get_title() ?></h3>

        <div id="review_form_wrapper">
            <div id="review_form ">
                <?php
                $commenter    = wp_get_current_commenter();
                $comment_form = array(
                    /* translators: %s is product title */
                    'title_reply'         => '',
                    /* translators: %s is product title */
                    'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
                    'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
                    'title_reply_after'   => '</span>',
                    'comment_notes_after' => '',
                    'label_submit'        => esc_html__( 'Submit', 'woocommerce' ),
                    'logged_in_as'        => '',
                    'comment_field'       => '',
                    'comment_notes_before' => '',
                    'class_form'           => 'form-icon',
                    'submit_button' =>  '<div class="input-wrap-submit">
                                            <button name="%1$s" type="submit" id="%2$s" class="%3$s btn-red add-reviews0"><img src="'.get_template_directory_uri() .'img/icon-47.svg" alt=""> %4$s </button>
                                        </div> '
                );

                $name_email_required = (bool) get_option( 'require_name_email', 1 );
                $fields              = array(
                    'author' => array(
                        'label'    => __( 'Name', 'woocommerce' ),
                        'type'     => 'text',
                        'value'    => $commenter['comment_author'],
                        'required' => $name_email_required,
                    ),
                    'email'  => array(
                        'label'    => __( 'Email', 'woocommerce' ),
                        'type'     => 'email',
                        'value'    => $commenter['comment_author_email'],
                        'required' => $name_email_required,
                    ),

                );

                $comment_form['fields'] = array();

                foreach ( $fields as $key => $field ) {
                    $field_html  = '<div class="input-wrap input-wrap-50 comment-form-' . esc_attr( $key ) . '">';
                    $field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

                    if ( $field['required'] ) {
                        $field_html .= '&nbsp;<span class="required">*</span>';
                    }

                    $field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></div>';

                    if ($key == 'cookies')
                        continue;
                    $comment_form['fields'][ $key ] = $field_html;
                }


                $account_page_url = wc_get_page_permalink( 'myaccount' );
                if ( $account_page_url ) {
                    /* translators: %s opening and closing link tags respectively */
                    $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
                }

                if ( wc_review_ratings_enabled() ) {
                    $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
                }

                $comment_form['comment_field'] .= '<div  class="input-wrap comment-form-comment"><textarea placeholder="Ваш отзыв" id="comment" name="comment" cols="45" rows="8" required></textarea></div>';

                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                ?>
            </div>
        </div>


        <div class="info">
            <p>Нажимая кнопку «Оставить отзыв», я соглашаюсь с условиями <a href="#">политики конфиденциальности</a> и <a href="#">пользовательского соглашения</a>.</p>
        </div>
    </div>
</div>


