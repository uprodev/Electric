<?php

/*
 *
 Template Name: Home Page
*/

get_header();

$slider = get_field('slider');
$cats = get_field('cats');
$brands = get_field('brands');


$args = [
    'post_type' => 'product',
    'posts_per_page' => 20,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'

];

$q1 = new WP_query($args);

$args = [
    'post_type'      => 'product',
    'posts_per_page' => 20,
    'meta_query'     => [
        'relation' => 'OR',
        [ // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ],
        [ // Variable products type
            'key'           => '_min_variation_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ]
    ]
];

$q2 = new WP_query($args);


?>

        <section class="home-banner">
            <div class="content-width">
                <div class="left">
                    <nav class="site-menu-section">
                        <?php get_template_part('parts/main-menu');?>
                    </nav>
                </div>
                <div class="right">
                    <div class="content">
                        <div class="slider-wrap">
                            <div class="swiper slider-banner">
                                <div class="swiper-wrapper">

                                    <?php foreach ($slider as $slide) { ?>
                                    <div class="swiper-slide">
                                        <div class="bg">
                                            <img src="<?= $slide['image']['url'] ?>" alt="">
                                            <img src="<?= $slide['image_mob']['url'] ?>" alt="" class="mob">
                                        </div>
                                        <div class="slider-content">
                                            <h1><?= $slide['title']  ?></h1>
                                            <div class="center">
                                                <p><?= $slide['subtitle']  ?></p>
                                            </div>

                                        </div>
                                        <p class="info"><?= $slide['text']  ?></p>
                                    </div>
                                    <?php } ?>

                                </div>
                                <div class="swiper-pagination banner-pagination"><?= $slide['text']  ?></div>
                            </div>
                        </div>
                        <div class="item-wrap">

                            <?php get_template_part( 'parts/banners' ); ?>

                        </div>
                        <div class="info-wrap">
                            <ul>
                                <li>
                                    <div class="img-wrap">
                                        <img src="<?= get_template_directory_uri() ?>/img/icon-8-1.svg" alt="">
                                    </div>
                                    <span>Быстрая доставка</span>
                                </li>
                                <li>
                                    <div class="img-wrap">
                                        <img src="<?= get_template_directory_uri() ?>/img/icon-8-2.svg" alt="">
                                    </div>
                                    <span>Гарантия качества</span>
                                </li>
                                <li>
                                    <div class="img-wrap">
                                        <img src="<?= get_template_directory_uri() ?>/img/icon-8-3.svg" alt="">
                                    </div>
                                    <span>Лучшие цены</span>
                                </li>
                                <li>
                                    <div class="img-wrap">
                                        <img src="<?= get_template_directory_uri() ?>/img/icon-8-4.svg" alt="">
                                    </div>
                                    <span>Возможность возврата</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hot-product product">
            <div class="content-width">
                <h2>Популярные товары <img src="<?= get_template_directory_uri() ?>/img/icon-9.svg" alt=""></h2>
                <div class="slider-wrap">
                    <div class="nav-wrap">
                        <div class="swiper-button-next product-next-1"></div>
                        <div class="swiper-button-prev product-prev-1"></div>
                    </div>
                    <div class="swiper product-slider product-slider-1">
                        <div class="swiper-wrapper">

                                <?php

                                while ( $q1->have_posts() ) {
                                    $q1->the_post();
                                    ?>
                                    <div class="swiper-slide">
                                        <?php

                                        wc_get_template_part( 'content', 'product' ); ?>

                                    </div>

                                        <?php
                                }

                                ?>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>

        <?php if ($cats) {?>
            <section class="popular">
            <div class="content-width">
                <div class="top">
                    <h2>Популярные разделы <img src="<?= get_template_directory_uri() ?>/img/icon-15.svg" alt=""></h2>
                    <div class="btn-wrap">
                        <a href="/shop" class="btn-border-black">Перейти в каталог <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="content">
                    <ul>

                        <?php foreach($cats as $term_id):
                            $term = get_term($term_id);
                            $ic = get_field('icon', 'product_cat_'.$term_id);?>
                            <li>
                                <a href="<?= get_term_link($term_id);?>">
                                    <figure>
                                        <img src="<?= $ic['url'];?>" alt="<?= $ic['alt'];?>">
                                    </figure>
                                    <h6><?= $term->name;?></h6>
                                    <p><?= $term->count;?> товаров</p>
                                </a>
                            </li>
                        <?php endforeach;?>



                    </ul>
                </div>
                <div class="btn-wrap-mob">
                    <a href="#" class="btn-border-black">Перейти в каталог <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </section>
        <?php } ?>


        <section class="hot-product product">
            <div class="content-width">
                <h2>Акционные товары <img src="<?= get_template_directory_uri() ?>/img/icon-17.svg" alt=""></h2>
                <div class="slider-wrap">
                    <div class="nav-wrap">
                        <div class="swiper-button-next product-next-2"></div>
                        <div class="swiper-button-prev product-prev-2"></div>
                    </div>
                    <div class="swiper product-slider product-slider-2">
                        <div class="swiper-wrapper">
                            <?php

                            while ( $q2->have_posts() ) {
                                $q2->the_post();
                                ?>
                                <div class="swiper-slide">
                                    <?php

                                    wc_get_template_part( 'content', 'product' ); ?>

                                </div>

                                <?php
                            }

                            ?>
                        </div>
                    </div>


                </div>
            </div>
        </section>


        <?php if ($brands) { ?>
            <section class="brands">
            <div class="content-width">
                <div class="top">
                    <h2>Бренды <img src="<?= get_template_directory_uri() ?>/img/icon-18.svg" alt=""></h2>
<!--                    <div class="btn-wrap">-->
<!--                        <a href="#" class="btn-border-black">Перейти в каталог брендов <i class="fas fa-chevron-right"></i></a>-->
<!--                    </div>-->
                </div>
                <div class="content">

                    <?php foreach ($brands as $brand) { ?>
                        <div class="item">
                        <a target="_blank" href="<?= $brand['link'] ?>">
                            <img src="<?= $brand['logo']['url'] ?>" alt="">
                        </a>
                    </div>
                    <?php } ?>

                </div>
<!--                <div class="btn-wrap-mob">-->
<!--                    <a href="#" class="btn-border-black">Перейти в каталог брендов <i class="fas fa-chevron-right"></i></a>-->
<!--                </div>-->
            </div>
        </section>
        <?php } ?>

<?php get_footer();
