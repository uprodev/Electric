<?php

/*
 *
 Template Name: Home Page
*/

get_header();

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

                                    <div class="swiper-slide">
                                        <div class="bg">
                                            <img src="<?= get_template_directory_uri() ?>/img/bg-2.jpg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/bg-2-1.jpg" alt="" class="mob">
                                        </div>
                                        <div class="slider-content">
                                            <h1>Новогодние скидки до <span>10%!</span></h1>
                                            <div class="center">
                                                <p>На весь ассортимент нашего каталога <span>*</span></p>
                                            </div>

                                        </div>
                                        <p class="info"><span>*</span> Акция действует до конца месяца</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="bg">
                                            <img src="<?= get_template_directory_uri() ?>/img/bg-2.jpg" alt="">
                                            <img src="<?= get_template_directory_uri() ?>/img/bg-2-1.jpg" alt="" class="mob">
                                        </div>
                                        <div class="slider-content">
                                            <h2>Новогодние скидки до <span>10%!</span></h2>
                                            <div class="center">
                                                <p>На весь ассортимент нашего каталога <span>*</span></p>
                                            </div>
                                        </div>
                                        <p class="info"><span>*</span>  Акция действует до конца месяца</p>
                                    </div>

                                </div>
                                <div class="swiper-pagination banner-pagination"><span>*</span>  Акция действует до конца месяца</div>
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
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="hot">
                                                <img src="<?= get_template_directory_uri() ?>/img/icon-10.svg" alt="">
                                            </li>
                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-1.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Светодиодная лампа REXANT груша, A60, 11,5 Вт, E27, 1093 лм, 2700 K, теплый свет 604-003</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="old">80₽</p>
                                                <p class="new">70₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="hot">
                                                <img src="<?= get_template_directory_uri() ?>/img/icon-10.svg" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-2.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Силовой удлинитель на катушке Inforce 2 гнезда, с/з КГт 3х1,5 16A 30м IP44 09-15-02</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 10 шт.</p>
                                            <p><span>арт.</span>565757</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="new">3170₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="hot">
                                                <img src="<?= get_template_directory_uri() ?>/img/icon-10.svg" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-3.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Силовой удлинитель на катушке Inforce 4 гнезда, с/з КГт 3х1,5 16A 30м IP44 09-15-01</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="new">3 839₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="hot">
                                                <img src="<?= get_template_directory_uri() ?>/img/icon-10.svg" alt="">
                                            </li>
                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-4.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Корпус ЭРА SIMPLE ЩМПг окно 04, IP54, 400х300x175 48 Б0041663</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="old">2 200₽</p>
                                                <p class="new">1 799₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="hot">
                                                <img src="<?= get_template_directory_uri() ?>/img/icon-10.svg" alt="">
                                            </li>
                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-1.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Светодиодная лампа REXANT груша, A60, 11,5 Вт, E27, 1093 лм, 2700 K, теплый свет 604-003</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="old">80₽</p>
                                                <p class="new">70₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <section class="popular">
            <div class="content-width">
                <div class="top">
                    <h2>Популярные разделы <img src="<?= get_template_directory_uri() ?>/img/icon-15.svg" alt=""></h2>
                    <div class="btn-wrap">
                        <a href="#" class="btn-border-black">Перейти в каталог <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="content">
                    <ul>
                        <li>
                            <a href="#">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/img/icon-16-1.svg" alt="">
                                </figure>
                                <h6>Кабель провод</h6>
                                <p>199 товаров</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/img/icon-16-2.svg" alt="">
                                </figure>
                                <h6>Управление освещением</h6>
                                <p>358 товаров</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/img/icon-16-3.svg" alt="">
                                </figure>
                                <h6>Счетчики и трансформаторы</h6>
                                <p>27 товаров</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/img/icon-16-4.svg" alt="">
                                </figure>
                                <h6>Светильники и лампы</h6>
                                <p>588 товаров</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <figure>
                                    <img src="<?= get_template_directory_uri() ?>/img/icon-16-5.svg" alt="">
                                </figure>
                                <h6>Силовое оборудование</h6>
                                <p>67 товаров</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="btn-wrap-mob">
                    <a href="#" class="btn-border-black">Перейти в каталог <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </section>

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
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-2.png" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Силовой удлинитель на катушке Inforce 2 гнезда, с/з КГт 3х1,5 16A 30м IP44 09-15-02</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 10 шт.</p>
                                            <p><span>арт.</span>565757</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="new">3170₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-3.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Силовой удлинитель на катушке Inforce 4 гнезда, с/з КГт 3х1,5 16A 30м IP44 09-15-01</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="new">3 839₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>
                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-1.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Светодиодная лампа REXANT груша, A60, 11,5 Вт, E27, 1093 лм, 2700 K, теплый свет 604-003</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="old">80₽</p>
                                                <p class="new">70₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>

                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-4.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Корпус ЭРА SIMPLE ЩМПг окно 04, IP54, 400х300x175 48 Б0041663</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="old">2 200₽</p>
                                                <p class="new">1 799₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-item">
                                    <div class="line-info">
                                        <ul>

                                            <li class="sale">-10%</li>
                                        </ul>
                                    </div>
                                    <div class="like">
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/icon-11-1.svg" alt="">
                                        </a>
                                    </div>
                                    <figure>
                                        <a href="#">
                                            <img src="<?= get_template_directory_uri() ?>/img/img-1.jpg" alt="">
                                        </a>
                                    </figure>
                                    <div class="text-wrap">
                                        <h6><a href="#">Светодиодная лампа REXANT груша, A60, 11,5 Вт, E27, 1093 лм, 2700 K, теплый свет 604-003</a></h6>
                                        <div class="info-product">
                                            <p><img src="<?= get_template_directory_uri() ?>/img/icon-12.svg" alt=""><i>В наличии ></i> 100 шт.</p>
                                            <p><span>арт.</span>2454657</p>
                                        </div>
                                        <div class="cost-wrap">
                                            <div class="cost">
                                                <p class="old">80₽</p>
                                                <p class="new">70₽</p>
                                            </div>
                                            <div class="input-number ">
                                                <div class="btn-count btn-count-minus"><img src="<?= get_template_directory_uri() ?>/img/minus.svg" alt=""></div>
                                                <input type="text" name="count" value="1" class="form-control"/>
                                                <div class="btn-count btn-count-plus"><img src="<?= get_template_directory_uri() ?>/img/plus.svg" alt=""></div>
                                            </div>
                                            <div class="card-product">
                                                <a href="#">
                                                    <img src="<?= get_template_directory_uri() ?>/img/icon-13.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <section class="brands">
            <div class="content-width">
                <div class="top">
                    <h2>Бренды <img src="<?= get_template_directory_uri() ?>/img/icon-18.svg" alt=""></h2>
                    <div class="btn-wrap">
                        <a href="#" class="btn-border-black">Перейти в каталог брендов <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="content">
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-1.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-2.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-3.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-4.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-5.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-6.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-7.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-8.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-9.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-10.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-11.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-12.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-13.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-14.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-15.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-16.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-1.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-2.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-3.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-4.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-5.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-6.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-7.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-8.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-9.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-10.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-11.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-12.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-13.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-14.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-15.svg" alt="">
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <img src="<?= get_template_directory_uri() ?>/img/img-5-16.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="btn-wrap-mob">
                    <a href="#" class="btn-border-black">Перейти в каталог брендов <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </section>

<?php get_footer();
