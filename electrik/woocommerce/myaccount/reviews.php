
<?php

$comments = get_comments(
    array(

        'user_id' => get_current_user_id()
    ) );


?>


<section class="cabinet ">
    <div class="content-width">
        <div class="content">

            <h2 class="tab-h1">Отзывы</h2>
            <?php do_action( 'woocommerce_account_navigation' ); ?>
            <div class="cabinet-content">
                <h1>Отзывы</h1>

                <div class="wrap-testimonials">

                    <?php foreach( $comments as $comment ){
                        $product = new WC_Product($comment->comment_post_ID);

                        $average_rating = get_field('rating', 'comment_' . $comment->comment_ID)

                        ?>
                    <div class="item-testimonials">
                        <div class="head">
                            <div class="left">
                                <h6><?= $product->get_title() ?></h6>
                                <div class="stars-wrap">
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
                            <p><?= $comment->comment_date ?></p>
                        </div>
                        <div class="text">
                            <p><?= $comment->comment_content ?></p>
                        </div>
                    </div>
                    <?php } ?>

                </div>

            </div>
        </div>

    </div>

</section>