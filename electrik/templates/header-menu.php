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
                <form action="<?php echo home_url( '/' ) ?>" class="form-search">
                    <label for="top-search"></label>
                    <input type="text" name="s" id="top-search" class="top-search">
                    <button class="btn" type="submit"><img src="<?= get_template_directory_uri();?>/img/find.svg" alt=""></button>
                </form>
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
                    <a href="favorites.html"><img src="<?= get_template_directory_uri();?>/img/icon-2.svg" alt=""></a>
                </div>
                <div class="card-wrap is-active item-wrap">
                    <a href="<?= wc_get_cart_url();?>">
                        <div class="icon-wrap">
                            <img src="<?= get_template_directory_uri();?>/img/icon-25-3.svg" alt="">
                        </div>
                        <p>3 448₽</p>
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
                <a href="#">Каталог товаров <img src="<?= get_template_directory_uri() ?>/img/icon-0.svg" alt=""></a>
                <form action="<?= home_url( '/' ) ?>" class="form-search">
                    <label for="top-search-mob"></label>
                    <input type="text" name="s" id="top-search-mob" class="top-search">
                    <button class="btn" type="submit"><img src="<?= get_template_directory_uri();?>/img/find.svg" alt=""></button>
                </form>
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
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-1.svg" alt=""><span>Кабель/провод</span></a>
                        <div class="sub-menu sub-menu-2x">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Кабель/провод <img src="<?= get_template_directory_uri() ?>/img/icon-6-1.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>
                                <li><a href="#">Сигнальный и передачи данных</a></li>
                                <li><a href="#">Для видеонаблюдения</a></li>
                                <li><a href="#">Телефонный</a></li>
                                <li><a href="#">Для обмоток трансформатора</a></li>
                                <li><a href="#">Для сигнализации</a></li>
                                <li><a href="#">С несущей жилой</a></li>
                                <li><a href="#">Для подогрева труб и крыш</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-2.svg" alt=""><span>Арматура для СИП</span></a>
                        <div class="sub-menu sub-menu-2x">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Арматура для СИП <img src="<?= get_template_directory_uri() ?>/img/icon-6-2.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>
                                <li><a href="#">Сигнальный и передачи данных</a></li>
                                <li><a href="#">Для видеонаблюдения</a></li>
                                <li><a href="#">Телефонный</a></li>
                                <li><a href="#">Для обмоток трансформатора</a></li>
                                <li><a href="#">Для сигнализации</a></li>
                                <li><a href="#">С несущей жилой</a></li>
                                <li><a href="#">Для подогрева труб и крыш</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-3.svg" alt=""><span>Модульная автоматика</span></a>
                        <div class="sub-menu sub-menu-2x">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Модульная автоматика<img src="<?= get_template_directory_uri() ?>/img/icon-6-3.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>
                                <li><a href="#">Сигнальный и передачи данных</a></li>
                                <li><a href="#">Для видеонаблюдения</a></li>
                                <li><a href="#">Телефонный</a></li>
                                <li><a href="#">Для обмоток трансформатора</a></li>
                                <li><a href="#">Для сигнализации</a></li>
                                <li><a href="#">С несущей жилой</a></li>
                                <li><a href="#">Для подогрева труб и крыш</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-4.svg" alt=""><span>Силовое оборудование</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Силовое оборудование<img src="<?= get_template_directory_uri() ?>/img/icon-6-4.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-5.svg" alt=""><span>Управление и коммутация</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Управление и коммутация<img src="<?= get_template_directory_uri() ?>/img/icon-6-5.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-6.svg" alt=""><span>Корпуса и аксессуары</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Корпуса и аксессуары<img src="<?= get_template_directory_uri() ?>/img/icon-6-6.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-7.svg" alt=""><span>Электромонтажные изделия</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Электромонтажные изделия<img src="<?= get_template_directory_uri() ?>/img/icon-6-7.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-8.svg" alt=""><span>Кабеленесущие системы</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Электромонтажные изделия<img src="<?= get_template_directory_uri() ?>/img/icon-6-8.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-9.svg" alt=""><span>Счетчики и трансформаторы</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Счетчики и трансформаторы<img src="<?= get_template_directory_uri() ?>/img/icon-6-9.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-10.svg" alt=""><span>Управление освещением</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Управление освещением<img src="<?= get_template_directory_uri() ?>/img/icon-6-10.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"><img src="<?= get_template_directory_uri() ?>/img/icon-6-11.svg" alt=""><span>Светильники и лампы</span></a>
                        <div class="sub-menu">
                            <div class="prev">
                                <a href="#"><i class="fas fa-chevron-left"></i>Назад</a>
                            </div>
                            <h3 class="title">Светильники и лампы<img src="<?= get_template_directory_uri() ?>/img/icon-6-11.svg" alt=""></h3>
                            <ul>
                                <li><a href="#">Для электропроводки</a></li>
                                <li><a href="#">Силовой</a></li>
                                <li><a href="#">Для удлинителей</a></li>
                                <li><a href="#">Для автомобилей</a></li>
                                <li><a href="#">Монтажный</a></li>
                                <li><a href="#">Для интернета</a></li>
                                <li><a href="#">Для акустических систем</a></li>
                                <li><a href="#">Для телевидения и антен</a></li>

                            </ul>
                        </div>
                    </li>
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