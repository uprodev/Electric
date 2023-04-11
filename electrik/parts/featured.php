<?php

global $wp_query;
$user_id = get_current_user_id();
$fav = get_field('fav', 'user_'.$user_id);
if ($fav)
    $post__in = explode('|', $fav);


$orderby = $_GET['orderby'];
if ( 'price' === $orderby ) {
    $rlv_wc_order = 'asc';
}
if ( 'price-desc' === $orderby ) {
    $rlv_wc_order = 'desc';
}

if ( in_array( $orderby, array( 'price', 'price-desc' ), true ) ) {
    $orderby = 'meta_value_num';
    $meta_key = '_price';
}

if ( 'date' === $orderby ) {
    $orderby = 'post__in';
}
if ( 'popularity' === $orderby ) {

    $orderby = 'meta_value_num';
    $rlv_wc_order = 'desc';
    $meta_key = 'total_sales';
}


$args = [
    'post_type' => 'product',
    'post__in' => $post__in,
    'posts_per_page' => 30,
    'orderby' => $orderby,
    'order' => $rlv_wc_order,
    'meta_key' => $meta_key

];
$args = berocket_filter_query_vars_hook($args);

$wp_query = new WP_query($args);





?>


<div class="content-product product ">
    <div class="title-table">
        <div class="data data-1">
            <p>Фото</p>
        </div>
        <div class="data data-2">
            <p>Название товара</p>
        </div>
        <div class="data data-3">
            <p>Цена без НДС</p>
        </div>
        <div class="data data-4">
            <p>Цена с НДС</p>
        </div>
        <div class="data data-5">
            <p>На складе</p>
        </div>
        <div class="data data-6">
            <p>Упаковка</p>
        </div>
        <div class="data data-7">
            <p>Заказ</p>
        </div>
    </div>
    <div class="wrap products-loop">
        <?php

        while ( $wp_query->have_posts() ) {
            $wp_query->the_post();


            wc_get_template_part( 'content', 'product' );
        }

        ?>
    </div>
</div>



<div id="filter-favorites" style="display:none;" class="popup-filter popup-favorites">

    <div class="left-filter">
        <div class="title-wrap">
            <h3>Категория</h3>
        </div>
        <div class="close-filter">
            <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-28.svg" alt=""></a>
        </div>
        <div class="wrap">
            <div class="item item-0 item-list ">
                <div class="filter filter-0">
                    <?= do_shortcode('[br_filter_single filter_id=433]') ?>
                </div>

            </div>
        </div>
    </div>

</div>
