<header>
    <div class="top-line">
        <div class="content-width">
            <div class="logo-wrap">
                <?php $logo = get_field('logo', 'options');?>
                <a href="<?= get_home_url();?>">
                    <img src="<?= $logo['url'];?>" alt="<?= $logo['url'];?>">
                </a>
                <p><?php the_field('nazvanie', 'options');?></p>
            </div>
            <div class="center">
<!--                <form action="--><?php //echo home_url( '/' ) ?><!--" class="form-search">-->
<!--                    <label for="top-search"></label>-->
<!--                    <input type="text" name="s" id="top-search" class="top-search">-->
<!--                    <button class="btn" type="submit"><img src="--><?//= get_template_directory_uri();?><!--/img/find.svg" alt=""></button>-->
<!--                </form>-->
                <?php echo do_shortcode('[fibosearch]'); ?>

            </div>
            <div class="right">

                <div class="tel-wrap">
                    <a href="tel:+<?= phone_clear(get_field('telefon', 'options'));?>"><?php the_field('telefon', 'options');?></a>
                    <p><?php the_field('grafik', 'options');?></p>
                </div>
                <div class="search-tab item-wrap">
                    <a href="#"><img src="<?= get_template_directory_uri();?>/img/find.svg" alt=""></a>
                </div>
                <div class="cabinet-wrap item-wrap">
                    <a
                    <?php if (is_user_logged_in()) { ?>
                        href="<?= get_permalink(11) ?>"
                    <?php } else { ?>
                        href="#login" class="fancybox"
                    <?php } ?>
                    ><img src="<?= get_template_directory_uri();?>/img/icon-1.svg" alt=""></a>
                </div>
                <div class="favorites-wrap item-wrap">
                    <a href="<?php the_permalink(429) ?>"><img src="<?= get_template_directory_uri();?>/img/icon-2.svg" alt=""></a>
                </div>
                <div class="card-wrap is-active item-wrap">
                    <a href="<?= wc_get_cart_url();?>">
                        <div class="icon-wrap">
                            <img src="<?= get_template_directory_uri();?>/img/icon-25-3.svg" alt="">
                        </div>
                        <p class="cart-header"><?= WC()->cart->get_cart_total() ?></p>
                    </a>
                </div>
                <div class="open-menu">
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog-line">
        <div class="content-width">
            <div class="left">
                <a href="/shop">Каталог товаров <img src="<?= get_template_directory_uri() ?>/img/icon-0.svg" alt=""></a>
                <div action="<?= home_url( '/' ) ?>" class="form-search">
                    <?php echo do_shortcode('[fibosearch]'); ?>
                </div>
            </div>
            <div class="right">
                <div class="loc">
                    <?php if(get_field('adres', 'options')):?>
                        <p><img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt=""><?php the_field('adres', 'options');?></p>
                    <?php endif;?>
                </div>
                <?php wp_nav_menu([
                    'theme_location' => 'head-menu',
                    'container' => 'nav',
                    'container_class' => 'menu',
                    'menu_class' => '',
                ]);?>
                <div class="sale">
                    <p><img src="<?= get_template_directory_uri();?>/img/icon-5.svg" alt="">Специальные предложения</p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-menu-wrap">
        <div class="content-width">
            <nav class="site-menu">
                <?php get_template_part('parts/main-menu');?>
            </nav>
        </div>
    </div>
</header>

<div class="menu-responsive" id="menu-responsive" style="display: none">
    <div class="top">
        <div class="close-menu">
            <a href="#"><img src="<?= get_template_directory_uri();?>/img/close.svg" alt=""></a>
        </div>
    </div>
    <div class="wrap">

        <nav class="mob-menu">
            <ul>
                <li><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-24-1.svg" alt="">О нас</a></li>
                <li><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-24-2.svg" alt="">Контакты</a></li>
                <li><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-24-3.svg" alt="">Доставка</a></li>
                <li><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-24-4.svg" alt="">Оплата</a></li>
                <li class="last"><a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-5.svg" alt="">Специальные предложения</a></li>

            </ul>
        </nav>
        <div class="contact-wrap">
            <div class="tel-wrap">
                <a href="tel:+<?= phone_clear(get_field('telefon', 'options'));?>"><?php the_field('telefon', 'options');?></a>
                <p><?php the_field('grafik', 'options');?></p>
            </div>
            <div class="loc">
                <?php if(get_field('adres', 'options')):?>
                    <p><img src="<?= get_template_directory_uri();?>/img/icon-4.svg" alt=""><?php the_field('adres', 'options');?></p>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<div class="fix-menu <?= is_checkout() && !$_GET['key'] ? 'fix-menu-checkbox' : '' ?>">

    <?php if (is_checkout() && !$_GET['key']) { ?>
        <div class="btn-wrap-step">
            <a href="#" class="btn-red btn-next is-show ">Далее <img src="<?= get_template_directory_uri();?>/img/icon-119.svg" alt=""></a>
            <a href="#" class="btn-red btn-next">Далее <img src="<?= get_template_directory_uri();?>/img/icon-119.svg" alt=""></a>
            <button onclick="jQuery('.woocommerce-checkout ').submit()" type="submit" class="btn-red"><img src="<?= get_template_directory_uri();?>/img/icon-120.svg" alt="">Подтвердить заказ</button>
        </div>

        <?php } ?>
    <?php if (is_product()) {
        $product = new WC_Product(get_the_id());  ?>
        <div class="btn-wrap">

            <p><?= $product->get_sku() ?></p>
            <a href="#" class="btn-red add-to-cart" data-variation_id=""  data-product_id="<?= the_id() ?>" ><img src="<?= get_template_directory_uri();?>/img/icon-25-3.svg" alt="">В корзину</a>
            <a href="<?= wc_get_cart_url() ?>" class="btn-border-red" style="display: none;"><img src="img/icon-45.svg" alt="">Перейти в корзину <span>70BYN</span></a>

        </div>
    <?php } ?>
    <nav class="content">
        <ul>
            <li class="is-active">
                <a href="/">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-1.svg" alt="">
                    </figure>
                    Главная
                </a>

            </li>
            <li><a href="/shop">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-2.svg" alt="">
                    </figure>
                    Каталог
                </a></li>
            <li><a href="<?= wc_get_cart_url() ?>">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-3.svg" alt="">
                        <span><?= WC()->cart->get_cart_contents_count() ?></span>
                        <span><?= WC()->cart->get_cart_contents_count() ?></span>
                    </figure>
                    Корзина
                </a></li>
            <li><a href="<?php the_permalink(429) ?>">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-4.svg" alt="">
                    </figure>
                    Избранное
                </a></li>
            <li><a
                    <?php if (is_user_logged_in()) { ?>
                        href="<?= get_permalink(11) ?>"
                    <?php } else { ?>
                        href="#login" class="fancybox"
                    <?php } ?>
                >
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-5.svg" alt="">
                    </figure>
                    Кабинет
                </a></li>
        </ul>
    </nav>
</div>
