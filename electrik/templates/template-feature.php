<?php

/*
 *
 Template Name: Feature
*/



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
                                      'loop/orderby.php'
                                    ); ?>


                            </div>
                            <div class="favorites-btn">
                                <a href="#" class="btn-border-black "><img src="<?= get_template_directory_uri() ?>/img/icon-34.svg" alt="">Категория</a>
                            </div>
                        </div>

                        <?php get_template_part('parts/featured') ?>



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
