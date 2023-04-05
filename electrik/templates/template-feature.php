<?php

/*
 *
 Template Name: Feature
*/

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


$catalog_orderby_options = apply_filters(
    'woocommerce_catalog_orderby',
    array(
        'menu_order' => __( 'Default sorting', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
        'rating'     => __( 'Sort by average rating', 'woocommerce' ),
        'date'       => __( 'Sort by latest', 'woocommerce' ),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
    )
);
$default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
$orderby = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby;




get_header();



get_template_part('parts/breadcrumbs');

?>

    <section class="catalog favorites">
        <div action="#" class="filter-form" >
            <div class="content-width">
                <div class="top">
                    <h1>Избранное</h1>

                </div>

                <div class="catalog-content">
                    <div class="left-filter">
                        <div class="wrap">
                            <div class="item-list item-0 item ">
                                <div class="filter filter-0">

                                    <?= do_shortcode('[br_filter_single filter_id=432]') ?>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="right-content">
                        <div class="sort-line-2">


                            <div class="sort-2">


                                <?php wc_get_template(
                                      'loop/orderby.php',
                                      array(
                                        'catalog_orderby_options' => $catalog_orderby_options,
                                        'orderby'                 => $orderby,

                                      )
                                    ); ?>


                            </div>
                            <div class="favorites-btn">
                                <a href="#" class="btn-border-black "><img src="<?= get_template_directory_uri() ?>/img/icon-34.svg" alt="">Категория</a>
                            </div>
                        </div>
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



                    </div>
                </div>
            </div>
        </div>

    </section>


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


<?php get_footer();
