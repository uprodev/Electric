<?php

$user_id = get_current_user_id();
$viewed = get_field('viewed', 'user_'.$user_id);
if ($viewed)
    $viewed = json_decode($viewed, true);


$post__in = array_keys($viewed);

$args = [
    'post_type' => 'product',
    'post__in' => $post__in,
    'posts_per_page' => 30

];

$q = new WP_query($args);



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


                <?php if (!$q->have_posts() || !$viewed) { ?>

                    <?php  get_template_part( 'parts/account/empty', 'viewed' ); ?>

                <?php } else { ?>

                    <section class="catalog favorites">

                        <form action="#" class="filter-form filter-form-viewed" >
                        <div class="catalog-content">
                            <div class="right-content">
                                <div class="sort-line-2">
                                    <div class="sort-2">
                                        <p >Сортировать по:</p>
                                        <ul>

                                            <li class="is-active">
                                                <input name="order" value="date" type="radio"  id="sort-2-1" checked>
                                                <label for="sort-2-1">Дате</label>
                                            </li>
                                            <li>
                                                <input name="order" value="popularity" type="radio"   id="sort-2-2">
                                                <label for="sort-2-2">Популярности</label>
                                            </li>

                                            <li>
                                                <input name="order" value="rating" type="radio"   id="sort-2-4">
                                                <label for="sort-2-4">Рейтингу</label>
                                            </li>
                                            <li>
                                                <input name="order" value="price" type="radio"  id="sort-2-3">
                                                <label for="sort-2-3">Цены: по возрастанию</label>
                                            </li>
                                            <li>
                                                <input name="order" value="price-desc" type="radio"  id="sort-2-4">
                                                <label for="sort-2-4">Цены: по убыванию</label>
                                            </li>
                                        </ul>
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
                                    <div class="wrap viewed-result">



                                        <?php

                                            while ( $q->have_posts() ) {
                                                $q->the_post();


                                                wc_get_template_part( 'content', 'product' );
                                            }

                                        ?>

                                    </div>
                                </div>



                            </div>
                        </div>
                            <input type="hidden" name="action" value="order_viewed">
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                    </form>

                    </section>

                <?php } ?>
            </div>
        </div>

    </div>

</section>
