<?php

$product = new WC_Product(get_the_id());

$unit = get_field('_woo_uom_input', $product->get_id());
?>

<div id="send-reviews" style="display:none;" class="popup-send width-820">
    <div class="popup-main">
        <figure>
            <img src="<?= get_template_directory_uri() ?>/img/icon-29.svg" alt="">
        </figure>
        <div class="text-wrap">
            <h3>Ваш отзыв отправлен, спасибо</h3>
            <p>Он будет опубликован на сайте после модерации</p>
        </div>
        <div class="btn-wrap">
            <a href="index.html" class="btn-border-white btn-big btn-border">Перейти на главную</a>
        </div>
    </div>
</div>




<div id="fast-shop" style="display:none;" class="popup-login popup-product-cart width-820 popup-fast-shop">
    <div class="popup-main catalog">
        <h3>Заявка на покупку товара</h3>
        <div class="product is-line product-cart">
            <div class="product-item">
                <div class="line-info">
                    <ul>
                        <li class="hot">
                            <img src="<?= get_template_directory_uri() ?>/img/icon-10.svg" alt="">
                        </li>
                        <?= ask_percentage_sale(  $product ) ?>
                    </ul>
                </div>
                <div class="like">
                    <a class="add_to_fav <?= is_favorite($product->get_id()) ?>" data-liked="<?= is_favorite($product->get_id()) ?>" data-user_id="<?= get_current_user_id() ?>" data-product_id="<?= $product->get_id() ?>"  href="#">
                        <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                    </a>
                </div>
                <figure>
                    <a href="<?= $product->get_permalink() ?>">
                        <?= $product->get_image() ?>
                    </a>
                </figure>
                <div class="text-wrap">
                    <div class="wrap-title">
                        <h6><a href="<?= $product->get_permalink() ?>"><?= $product->get_title() ?></a></h6>

                    </div>

                    <div class="cost-wrap">
                        <div class="cost">
                            <p class="new"><?= $product->get_price_html() ?></p>
                            <span><?= $unit ?></span>
                        </div>

                        <div class="buy">
                            <div class="input-number ">
                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                <input type="text" name="count" value="1" class="form-control"/>
                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php wp_reset_query() ?>
        <?=   do_shortcode('[contact-form-7 id="448" title="Быстрый заказ"]') ?>


        <div class="btn-wrap-full">
            <a href="#" class="btn-border-black btn-big"><img src="<?= get_template_directory_uri() ?>/img/icon-48.svg" alt="">Продолжить покупки</a>
        </div>
        <div class="info">
            <p>Нажимая кнопку «Отправить заказ», я соглашаюсь с условиями <a href="#">политики конфиденциальности</a> и <a href="#">пользовательского соглашения</a>.</p>
        </div>
    </div>
</div>


<div id="fast-shop-ok" style="display:none;" class="popup-send width-820">
    <div class="popup-main">
        <figure>
            <img src="<?= get_template_directory_uri() ?>/img/icon-29.svg" alt="">
        </figure>
        <div class="text-wrap">
            <h3>Ваша заявка отправлена, спасибо</h3>
            <p>Наш менеджер перезвонит Вам в ближайшее время</p>
        </div>
        <div class="btn-wrap">
            <a href="index.html" class="btn-border-white btn-big btn-border">Перейти на главную</a>
        </div>
    </div>
</div>
