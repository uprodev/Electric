<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $wp_query;
get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>

<?php
get_template_part('parts/breadcrumbs');
?>

    <section class="catalog">
        <div action="#" class="filter-form" >
            <div class="content-width">
                <div class="top">
                    <h1><?php woocommerce_page_title(); ?> <img src="<?= get_template_directory_uri() ?>/img/icon-31.svg" alt=""></h1>
                    <div class="find">
                        <p><img src="<?= get_template_directory_uri() ?>/img/icon-32.svg" alt="">
                            <span>
                                <?= _n( 'Найден', 'Найдено', $wp_query->found_posts  ); ?>

                            </span><b class="total-find"><?= $wp_query->found_posts ?> <span><?= _n( 'товар', 'товаров', $wp_query->found_posts  ); ?></span></b></p>
                    </div>
                </div>

                <div class="catalog-content">
                    <div class="left-filter" >
                        <div class="wrap popup-filter-side" id="filter" >
                            <span class="mob-wrap">

                              <?= do_shortcode('[br_filters_group group_id=270]') ?>
                            </span>


                            <div class="btn-wrap">
                                <?= do_shortcode('[br_filter_single filter_id=358]') ?>

                            </div>
                        </div>
                        <div class="item-wrap">
                            <?php get_template_part( 'parts/banners' ); ?>
                        </div>
                    </div>
                    <div class="right-content">
                        <div class="sort-line">
                            <div class="sort-1">
                                <?= do_shortcode('[br_filter_single filter_id=273]') ?>

                            </div>
                            <div class="filter-btn">
                                <a href="#" class="btn-border-black"><img src="<?= get_template_directory_uri() ?>/img/icon-34.svg" alt="">Фильтр</a>
                            </div>
                        </div>
                        <div class="sort-line-2">

                                <?php woocommerce_catalog_ordering() ?>

                            <ul class="view-item">
                                <li class="in-grid <?= wp_is_mobile() ? 'is-active' : ''  ?>"><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-35-1.svg" alt=""></a></li>
                                <li class="in-line <?= wp_is_mobile() ? '' : 'is-active'  ?>"><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-35-2.svg" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="content-product product <?= wp_is_mobile() ? '' : 'is-line'  ?>">
                            <div class="title-table">
                                <div class="data data-1">
                                    <p>Фото</p>
                                </div>
                                <div class="data data-2">
                                    <p>Название товара</p>
                                </div>

                                <div class="data data-4">
                                    <p>Цена с НДС</p>
                                </div>
                                <div class="data data-6">
                                    <p>Ед. измерения</p>
                                </div>
                                <div class="data data-5">
                                    <p>На складе</p>
                                </div>
                                <div class="data data-7">
                                    <p>Количество</p>
                                </div>
                            </div>
                            <div class="wrap products-loop">
                                <?php
                                if ( wc_get_loop_prop( 'total' ) ) {
                                    while ( have_posts() ) {
                                        the_post();

                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action( 'woocommerce_shop_loop' );

                                        wc_get_template_part( 'content', 'product' );
                                    }
                                }
                                ?>
                            </div>
                        </div>


                        <div class="pagination-wrap">
                            <div class="pagination">
                                <?php woocommerce_pagination() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <?php

    $info =   is_product_category() ? get_queried_object()->description : get_post(8)->post_content ;


    if ($info) {   ?>


    <section class="info-section">
        <div class="content-width">
            <h2>Полезная информация <img src="<?= get_template_directory_uri() ?>/img/icon-36.svg" alt=""></h2>
            <div class="text-wrap">

                <?= $info ?>
               <div class="show-text">
                    <a href="#">
                        <span>Показать весь текст</span>
                        <span>Скрыть весь текст</span>
                        <i class="fas fa-chevron-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <?php } ?>


<?php

get_footer();




