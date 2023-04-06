
<?php
$user_id = get_current_user_id();

$fav = get_field('fav', 'user_'.$user_id);
if ($fav)
    $post__in = explode('|', $fav);

$post__in = array_filter($post__in)
?>

<section class="cabinet cabinet-breadcrumb">
    <div class="content-width">
        <div class="content">
            <div class="breadcrumb-back">
                <a href="#"><i class="fas fa-chevron-left"></i>Товары</a>
            </div>
            <h2 class="tab-h1">Избранное</h2>
            <?php do_action( 'woocommerce_account_navigation' ); ?>

            <div class="cabinet-content">
                <h1>Избранное</h1>

                <?php if (empty($post__in)) { ?>

                    <?php  get_template_part( 'parts/account/empty', 'viewed' ); ?>

                <?php } else { ?>


                    <section class="catalog favorites">
                    <div action="#" class="filter-form" >
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


                                <?php get_template_part('parts/featured') ?>



                            </div>
                        </div>
                    </div>

                </section>

                <?php } ?>
            </div>
        </div>

    </div>

</section>

