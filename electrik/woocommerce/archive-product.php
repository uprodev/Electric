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
                    <div class="left-filter">
                        <div class="wrap">

                            <?= do_shortcode('[br_filters_group group_id=270]') ?>



                            <div class="btn-wrap">

                                <?= do_shortcode('[br_filter_single filter_id=358]') ?>

                            </div>
                        </div>
                        <div class="item-wrap">
                            <div class="item item-white">
                                <div class="bg">
                                    <img src="<?= get_template_directory_uri() ?>/img/bg-3-1.jpg" alt="">
                                    <img src="<?= get_template_directory_uri() ?>/img/bg-3-1-1.jpg" alt="" class="mob">
                                </div>
                                <h6>Поможем Вам собрать щиток</h6>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-border">Подробнее</a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="bg">
                                    <img src="<?= get_template_directory_uri() ?>/img/bg-3-2.jpg" alt="">
                                    <img src="<?= get_template_directory_uri() ?>/img/bg-3-2-1.jpg" alt="" class="mob">
                                </div>
                                <h6>Товар дня</h6>
                                <p>Инструмент обжимной АСКО-УКРЕМ SN-06WF</p>
                                <p class="cost">6 300₽</p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-border-black">Купить</a>
                                </div>
                            </div>
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
                                <li class="in-grid is-active"><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-35-1.svg" alt=""></a></li>
                                <li class="in-line"><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-35-2.svg" alt=""></a></li>
                            </ul>
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



    <section class="info-section">
        <div class="content-width">
            <h2>Полезная информация <img src="<?= get_template_directory_uri() ?>/img/icon-36.svg" alt=""></h2>
            <div class="text-wrap">
                <p>В нашем интернет-магазине можно найти провода для любых целей: монтаж стационарных и подвижных сетей в бытовых или промышленных помещениях, присоединение силовой техники, ремонт бытового оборудования и многое другое.</p>
                <p>Кабель представляет собой токопроводящее изделие из нескольких изолированных друг от друга металлических проводников (жил). С их помощью подключается различная техника, а также электросети.</p>
                <p>Монтаж осветительных сетей выполняется с помощью плоских проводов ПУНП и ПУГНП. Это бытовые изделия, предназначенные для проводки тока напряжением до 390 В и частотой 50 Гц. ПУГНП является гибким, поэтому допускает монтаж с сильными перегибами.</p>
                <p>Использование в электротехнике. Он предназначен для подключения садовой техники и такого бытового оборудования, как микроволновые печи, стиральные машины, холодильники и т.п. Он круглый и имеет двойную изоляцию с заполнением пустот между жилами. Он устойчив к перегибам, истиранию и разрывам.</p>
                <p>В нашем интернет-магазине можно найти провода для любых целей: монтаж стационарных и подвижных сетей в бытовых или промышленных помещениях, присоединение силовой техники, ремонт бытового оборудования и многое другое.</p>
                <p>Кабель представляет собой токопроводящее изделие из нескольких изолированных друг от друга металлических проводников (жил). С их помощью подключается различная техника, а также электросети.</p>
                <p>Монтаж осветительных сетей выполняется с помощью плоских проводов ПУНП и ПУГНП. Это бытовые изделия, предназначенные для проводки тока напряжением до 390 В и частотой 50 Гц. ПУГНП является гибким, поэтому допускает монтаж с сильными перегибами.</p>
                <p>Использование в электротехнике. Он предназначен для подключения садовой техники и такого бытового оборудования, как микроволновые печи, стиральные машины, холодильники и т.п. Он круглый и имеет двойную изоляцию с заполнением пустот между жилами. Он устойчив к перегибам, истиранию и разрывам.</p>
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



<?php

get_footer();




