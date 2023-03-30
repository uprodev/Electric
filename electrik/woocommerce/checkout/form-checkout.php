<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>


<section class="cart-block checkout-block">
    <form action="#" class="form-icon">
        <div class="content-width">

            <div class="top">
                <div class="title">
                    <h1>Оформление заказа</h1>
                    <p>№ 13454646</p>
                </div>
                <div class="btn-wrap">
                    <a href="#"><img src="img/icon-68.svg" alt=""></a>
                </div>
            </div>
            <div class="content">
                <div class="cart-content">

                    <div class="step step-1 is-open">
                        <div class="head-mod">
                            <a href="#"><i class="fas fa-chevron-left"></i>Шаг 1 из 3</a>
                        </div>
                        <h2><b>1</b>Где и как Вы хотите получить заказ?</h2>
                        <div class="wrap-step">
                            <div class="select-step-1 select-step">
                                <div class="select select-1 is-active">
                                    <input type="radio" name="select-1" id="select-1" checked>
                                    <label for="select-1">
												<span class="icon-wrap">
													<img src="img/icon-73.svg" alt="">
												</span>
                                        <span class="h6">Самовывоз</span>
                                        <span class="p">Минск, ул. Лермонтова 12</span>
                                    </label>
                                </div>
                                <div class="select select-2">
                                    <input type="radio" name="select-1" id="select-2">
                                    <label for="select-2">
											<span class="icon-wrap">
												<img src="img/icon-74.svg" alt="">
											</span>
                                        <span class="h6">Доставка курьером</span>
                                        <span class="p">завтра, после 11:00</span>
                                    </label>
                                </div>
                            </div>
                            <div class="wrap-hide-show-1">
                                <div class="select-item select-city tabs-wrap">
                                    <div class="head">
                                        <h2>Ваш город:</h2>
                                        <ul class="tab-menu-popup">
                                            <li class="is-active">Минск</li>
                                            <li>Гродно</li>
                                            <li>Брест</li>
                                            <li>Витебск</li>
                                            <li>Могилев</li>
                                            <li>Гомель</li>
                                        </ul>
                                        <div class="btn">
                                            <a href="#">Скоро</a>
                                        </div>

                                    </div>
                                    <div class="tabs-content-popup">
                                        <div class="tab-item-popup">
                                            <div class="wrap">
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-1-1">
                                                    <label for="select-city-1-1">Минск, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-1-2">
                                                    <label for="select-city-1-2">Минск, ул. Кабушкина 134 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-1-3">
                                                    <label for="select-city-1-3">Минск, ул. Милова 13 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-1-4">
                                                    <label for="select-city-1-4">Минск, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-1-5">
                                                    <label for="select-city-1-5">Минск, ул. Кабушкина 134<i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-1-6">
                                                    <label for="select-city-1-6">Минск, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-item-popup">
                                            <div class="wrap">
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-2-1">
                                                    <label for="select-city-2-1">Гродно, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-item-popup">
                                            <div class="wrap">
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-3-1">
                                                    <label for="select-city-3-1">Брест, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-item-popup">
                                            <div class="wrap">
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-4-1">
                                                    <label for="select-city-4-1">Витебск, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-item-popup">
                                            <div class="wrap">
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-5-1">
                                                    <label for="select-city-5-1">Могилев, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-item-popup">
                                            <div class="wrap">
                                                <p>
                                                    <input type="radio" name="select-city" id="select-city-6-1">
                                                    <label for="select-city-6-1">Гомель, ул. Лермонтова 12 <i>Пн-Пт: 05:00 до 22:00 </i></label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="select-item select-delivery">
                                    <h2>Адрес доставки</h2>
                                    <div class="delivery-wrap">
                                        <div class="input-wrap input-wrap-50">
                                            <label for="city"><img src="img/icon-76-1.svg" alt=""></label>
                                            <input type="text" name="city" id="city" placeholder="Город">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="street"><img src="img/icon-76-2.svg" alt=""></label>
                                            <input type="text" name="street" id="street" placeholder="Улица и дом">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="floor"><img src="img/icon-76-3.svg" alt=""></label>
                                            <input type="text" name="floor" id="floor" placeholder="Этаж">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="apartment"><img src="img/icon-76-4.svg" alt=""></label>
                                            <input type="text" name="apartment" id="apartment" placeholder="Квартира">
                                        </div>
                                        <div class="input-wrap">
                                            <label for="message-delivery"></label>
                                            <textarea id="message-delivery" name="message-delivery" placeholder="Комментарий"></textarea>
                                        </div>
                                    </div>
                                    <div class="select-date">
                                        <h2><img src="img/icon-77.svg" alt="">Желаемое время доставки</h2>
                                        <div class="date-wrap">
                                            <div class="select-block ">
                                                <label class="form-label" for="select-date-1"></label>
                                                <select id="select-date-1" name="select-date-1" class="select-list">
                                                    <option value="0">Среда, 8 февраля</option>
                                                    <option value="1">Среда, 9 февраля</option>
                                                    <option value="2">Среда, 10 февраля</option>
                                                    <option value="3">Среда, 11 февраля</option>
                                                </select>
                                            </div>
                                            <div class="select-block ">
                                                <label class="form-label" for="select-date-2"></label>
                                                <select id="select-date-2" name="select-date-2" class="select-list">
                                                    <option value="0">09:00-19:00</option>
                                                    <option value="1">09:00-19:00</option>
                                                    <option value="2">09:00-19:00</option>
                                                    <option value="3">09:00-19:00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-red-full-wrap">
                                <a href="#" class="btn-red btn-big next-step">Далее <img src="img/icon-75.svg" alt=""></a>
                            </div>
                        </div>

                    </div>

                    <div class="step step-2">
                        <div class="head-mod">
                            <a href="#" class="prev-step-1"><i class="fas fa-chevron-left"></i>Шаг 2 из 3</a>
                        </div>
                        <h2><b>2</b>Способ оплаты</h2>
                        <div class="wrap-step">
                            <div class="select-step-2 select-step">
                                <div class="select select-1 is-active">
                                    <input type="radio" name="select-2-1" id="select-2-1" checked>
                                    <label for="select-2-1">
												<span class="icon-wrap">
													<img src="img/icon-78-1.svg" alt="">
												</span>
                                        <span class="h6">Оплата при получении заказа</span>
                                        <span class="p">Наличными и картой при оплате в магазине и курьеру</span>
                                    </label>
                                </div>
                                <div class="select select-2">
                                    <input type="radio" name="select-2-1" id="select-2-2">
                                    <label for="select-2-2">
											<span class="icon-wrap">
												<img src="img/icon-78-2.svg" alt="">
											</span>
                                        <span class="h6">Онлайн-оплата</span>
                                        <span class="p">Картами Visa, MasterCard, Мир. Без комиссии</span>
                                    </label>
                                </div>
                                <div class="select select-3">
                                    <input type="radio" name="select-2-1" id="select-3-2">
                                    <label for="select-3-2">
											<span class="icon-wrap">
												<img src="img/icon-78-3.svg" alt="">
											</span>
                                        <span class="h6">Оплата по счету</span>
                                        <span class="p">Оплата счета по банковским реквизитам</span>
                                    </label>
                                </div>
                            </div>
                            <div class="wrap-hide-show-2">
                                <div class="select-item">
                                    <h2>Реквизиты</h2>
                                    <div class="props-wrap">
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-1"><img src="img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-1" id="bank-1" placeholder="УНП">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-2"><img src="img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-2" id="bank-2" placeholder="Юридическое название">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-3"><img src="img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-3" id="bank-3" placeholder="Название банка">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-4"><img src="img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-4" id="bank-4" placeholder="БИК">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-5"><img src="img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-5" id="bank-5" placeholder="Номер расчетного счета IBAN">
                                        </div>
                                        <div class="input-wrap input-wrap-50">
                                            <label for="bank-6"><img src="img/icon-80.svg" alt=""></label>
                                            <input type="text" name="bank-6" id="bank-6" placeholder="Юридический адрес">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="btn-red-full-wrap">
                                <a href="#" class="btn-red btn-big next-step">Далее <img src="img/icon-75.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="step step-3">
                        <div class="head-mod">
                            <a href="#" class="prev-step-2"><i class="fas fa-chevron-left"></i>Шаг 2 из 3</a>
                        </div>
                        <h2><b>3</b>Укажите данные получателя заказа</h2>
                        <div class="wrap-step">
                            <div class="recipient">
                                <div class="input-wrap input-wrap-50">
                                    <label for="name-check"><img src="img/icon-46.svg" alt=""></label>
                                    <input type="text" name="name-check" id="name-check" placeholder="Имя">
                                </div>
                                <div class="input-wrap input-wrap-50">
                                    <label for="email-check"><img src="img/icon-26-1.svg" alt=""></label>
                                    <input type="email" name="email-check" id="email-check" placeholder="Электронная почта">
                                </div>
                                <div class="input-wrap input-wrap-50">
                                    <label for="tel1"><img src="img/icon-49.svg" alt=""></label>
                                    <input type="text" name="tel-check" id="tel1" placeholder="Номер телефона" class="tel">
                                </div>
                                <div class="input-wrap input-wrap-50">
                                    <button type="submit" class="btn-big btn-border-red">Получить код</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="aside">
                    <div class="item">
                        <ul class="characteristics">
                            <li>
                                <p>2 товара</p>
                                <p>4 008₽</p>
                            </li>
                            <li class="red">
                                <p>Скидка</p>
                                <p>-448₽</p>
                            </li>
                            <li class="total">
                                <p>Итого</p>
                                <p>3 448₽</p>
                            </li>
                        </ul>
                        <div class="wrap">
                            <div class="input-wrap">
                                <label for="code"><img src="img/icon-70.svg" alt=""></label>
                                <input type="text" name="code" id="code" placeholder="Введите промокод">
                            </div>

                        </div>

                        <ul class="delivery-info">
                            <li>
                                <p>Самовывоз</p>
                                <h6>Минск, ул. Лермонтова 12</h6>
                            </li>
                            <li>
                                <p>Дата</p>
                                <h6>Среда, 8 февраля  09:00-19:00</h6>
                            </li>
                            <li>
                                <p>Оплата</p>
                                <h6>...</h6>
                            </li>
                        </ul>

                        <div class="btn-wrap">
                            <button type="submit" class="btn-big btn-red btn-disable"><img src="img/icon-71.svg" alt="">Подтвердить заказ</button>
                            <a href="#" class="btn-big btn-border-black">Изменить заказ</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </form>

</section>


<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
