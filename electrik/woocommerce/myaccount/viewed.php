<?php

$user_id = get_current_user_id();
$viewed = get_field('viewed', 'user_'.$user_id);
if ($viewed) {
    $viewed = json_decode($viewed, true);
    $post__in = array_keys($viewed);
}


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


?>

<section class="cabinet cabinet-breadcrumb">
    <div class="content-width">
        <div class="content">
            <div class="breadcrumb-back">
                <a href="#"><i class="fas fa-chevron-left"></i>Просмотренные товары</a>
            </div>
            <h2 class="tab-h1">Просмотренные товары</h2>
            <?php do_action( 'woocommerce_account_navigation' ); ?>
            <div class="cabinet-content">
                <h1>Просмотренные товары</h1>


                <?php if (!$wp_query->have_posts() || !$viewed) { ?>

                    <?php  get_template_part( 'parts/account/empty', 'viewed' ); ?>

                <?php } else { ?>

                    <section class="catalog favorites">

                        <div action="#" class="filter-form filter-form-viewed" >
                        <div class="catalog-content">
                            <div class="right-content">
                                <div class="sort-line-2">
                                    <div class="sort-2">

                                        <?php wc_get_template(
                                            'loop/orderby.php'

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
                                    <div class="wrap viewed-result products-loop">



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
                            <input type="hidden" name="action" value="order_viewed">
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                    </div>

                    </section>

                <?php } ?>
            </div>
        </div>

    </div>

</section>

<?php get_template_part('parts/filter-fav') ?>
