

<div id="send-reviews" style="display:none;" class="popup-send width-820">
    <div class="popup-main">
        <figure>
            <img src="img/icon-29.svg" alt="">
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


<div id="add-product-cart" style="display:none;" class="popup-login popup-product-cart width-820 ">

    <?php woocommerce_mini_cart() ?>

</div>

<div id="fast-shop" style="display:none;" class="popup-login popup-product-cart width-820 popup-fast-shop">
    <div class="popup-main catalog">
        <h3>Заявка на покупку товара</h3>
        <div class="product is-line product-cart">
            <div class="product-item">
                <div class="line-info">
                    <ul>
                        <li class="hot">
                            <img src="img/icon-10.svg" alt="">
                        </li>
                        <li class="sale">-10%</li>
                    </ul>
                </div>
                <div class="like">
                    <a href="#">
                        <img src="img/icon-11-1.svg" alt="">
                    </a>
                </div>
                <figure>
                    <a href="#">
                        <img src="img/img-1.jpg" alt="">
                    </a>
                </figure>
                <div class="text-wrap">
                    <div class="wrap-title">
                        <h6><a href="#">Светодиодная лампа REXANT груша, A60, 11,5 Вт, E27, 1093 лм, 2700 K, теплый свет 604-003</a></h6>
                        <p>Силовой кабель 3 х 2.5 мм2</p>
                    </div>

                    <div class="cost-wrap">
                        <div class="cost">
                            <p class="new">70₽</p>
                        </div>

                        <div class="buy">
                            <div class="input-number ">
                                <div class="btn-count btn-count-minus"><img src="img/minus.svg" alt=""></div>
                                <input type="text" name="count" value="1" class="form-control"/>
                                <div class="btn-count btn-count-plus"><img src="img/plus.svg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="#" class="form-icon">


            <h3>Заполните форму, и мы свяжемся с вами</h3>
            <div class="input-wrap input-wrap-50">
                <label for="name-popup1"><img src="img/icon-46.svg" alt=""></label>
                <input type="text" name="name-popup" id="name-popup1" placeholder="Имя">
            </div>
            <div class="input-wrap input-wrap-50">
                <label for="tel1"><img src="img/icon-49.svg" alt=""></label>
                <input type="text" name="tel-popup" id="tel1" placeholder="Телефон" class="tel">
            </div>
            <div class="input-wrap-submit">
                <button type="submit" class=" btn-big btn-red fast-shop-ok"><img src="img/icon-39.svg" alt="">Отправить заказ</button>
            </div>
        </form>


        <div class="btn-wrap-full">
            <a href="#" class="btn-border-black btn-big"><img src="img/icon-48.svg" alt="">Продолжить покупки</a>
        </div>
        <div class="info">
            <p>Нажимая кнопку «Отправить заказ», я соглашаюсь с условиями <a href="#">политики конфиденциальности</a> и <a href="#">пользовательского соглашения</a>.</p>
        </div>
    </div>
</div>


<div id="fast-shop-ok" style="display:none;" class="popup-send width-820">
    <div class="popup-main">
        <figure>
            <img src="img/icon-29.svg" alt="">
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