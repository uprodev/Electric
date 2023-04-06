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
                <ul>

                    <?php $terms = get_terms([
                            'taxonomy' => 'product_cat',
                            'hide_empty' => 0,
                            'parent' => 0
                    ]); ?>

                    <?php foreach ($terms as $term) {

                        $child = get_terms([
                            'taxonomy' => 'product_cat',
                            'hide_empty' => 0,
                            'parent' => $term->term_id
                        ]);

                        $icon = get_field('icon', 'term_' . $term->term_id);
                        $icon_url = $icon['url'];
                        if (!$icon)
                            $icon_url = get_template_directory_uri(). '/img/icon-6-1.svg';
                        ?>

                        <li>
                        <a href="<?= get_term_link($term->term_id) ?>"><img width="20" src="<?= $icon_url ?>" alt=""><span><?= $term->name ?></span></a>

                            <?php if ($child) { ?>

                                <div class="sub-menu sub-menu-2x">
                                    <div class="prev">
                                        <a href="<?= get_term_link($term->term_id) ?>"><i class="fas fa-chevron-left"></i>Назад</a>
                                    </div>
                                    <h3 class="title"><?= $term->name ?> <img width="20" src="<?= $icon_url ?>" alt=""></h3>
                                    <ul>
                                        <?php foreach ($child as $child_term) { ?>
                                            <li><a href="<?= get_term_link($child_term->term_id) ?>"><?= $child_term->name ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>

                    </li>

                    <?php } ?>

                </ul>
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

<div class="fix-menu">
    <nav class="content">
        <ul>
            <li class="is-active">
                <a href="#">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-1.svg" alt="">
                    </figure>
                    Главная
                </a>

            </li>
            <li><a href="#">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-2.svg" alt="">
                    </figure>
                    Каталог
                </a></li>
            <li><a href="#">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-3.svg" alt="">
                        <span>1</span>
                    </figure>
                    Корзина
                </a></li>
            <li><a href="#">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-4.svg" alt="">
                    </figure>
                    Избранное
                </a></li>
            <li><a href="#login" class="fancybox">
                    <figure>
                        <img src="<?= get_template_directory_uri() ?>/img/icon-25-5.svg" alt="">
                    </figure>
                    Кабинет
                </a></li>
        </ul>
    </nav>
</div>