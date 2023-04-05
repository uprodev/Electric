<section class="cabinet cabinet-breadcrumb">
    <div class="content-width">
        <div class="content">
            <div class="breadcrumb-back">
                <a href="#"><i class="fas fa-chevron-left"></i>Мои обращения</a>
            </div>
            <h2 class="tab-h1">Мои обращения</h2>
            <?php do_action( 'woocommerce_account_navigation' ); ?>
            <div class="cabinet-content">
                <h1>Мои обращения</h1>

                <div class="wrap-repair">
                    <?php

                    $q = new WP_Query([
                        'post_type' => 'ticket',
                        'post_status' => 'publish',
                    ]);

                    if ($q->have_posts()) {
                        while ($q->have_posts()) {
                            $q->the_post();

                    ?>
                        <div class="repair-item item-wrap <?= get_field('status') == 'Решено' ? 'is-complete' : '' ?> ">
                            <div class="wrap">
                                <div class="data data-1">
                                    <h6>№<?= the_id() ?></h6>
                                    <p><?= get_field('status') ?></p>
                                </div>
                                <div class="data data-2">
                                    <h6><?= get_the_title() ?></h6>
                                    <p>Не работает</p>
                                </div>
                                <div class="repair-info item-open">
                                    <div class="data data-1">
                                        <h6><?= get_the_date() ?></h6>
                                        <p>Дата обращения</p>
                                    </div>
                                    <?php if (get_field('solution')) {  ?>
                                    <div class="data data-2">
                                        <h6>Полная замена товара</h6>
                                        <p><?= get_field('solution') ?></p>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>

                            <div class="info-bottom-link">
                                <a href="#"><span>Открыть обращение</span><span>Закрыть обращение</span><i class="fas fa-chevron-down"></i></a>
                            </div>
                        </div>

                        <?php } ?>
                    <?php } ?>


                </div>

                <div class="add-repair-btn">
                    <a href="#add-repair" class="btn-red fancybox"><img src="<?= get_template_directory_uri() ?>/img/icon-97.svg" alt="">Оставить обращение</a>
                </div>

                <div class="wrap-service-item">
                    <h2>Сроки работ <img src="<?= get_template_directory_uri() ?>/img/icon-95.svg" alt=""></h2>
                    <ul class="list-info-3n">
                        <li>
                            <h6>Диагностика инструмента</h6>
                            <p>до 21 дня</p>
                        </li>
                        <li>
                            <h6>Гарантийный ремонт</h6>
                            <p>от 5 до 45 дней</p>
                        </li>
                        <li>
                            <h6>Возврат при оплате наличными</h6>
                            <p>1 день</p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>

</section>



<div id="add-repair" style="display:none;" class="popup-login width-820 popup-repair">
    <div class="popup-main">
        <h3>Оставить обращение</h3>
        <form action="#" class="form-icon add-ticket">
            <div class="input-wrap">
                <label for="number-order"><img src="<?= get_template_directory_uri() ?>/img/icon-98.svg" alt=""></label>
                <input type="text" name="order_id" id="number-order" placeholder="Номер заказа" required>
            </div>
            <div class="input-wrap">
                <label for="order-message"></label>
                <textarea name="message" id="order-message" placeholder="Какие проблемы у вас с товаром" required></textarea>
            </div>

            <div class="input-wrap-submit">
                <button type="submit" class="btn-red repair-ok">Отправить обращение <img src="<?= get_template_directory_uri() ?>/img/icon-27.svg" alt=""></button>
            </div>

            <input type="hidden" name="action" value="add_ticket">
            <input type="hidden" name="user_id" value="<?= get_current_user_id() ?>">
            <?php wp_nonce_field( 'add_ticket', 'security' ); ?>

        </form>

    </div>
</div>

<div id="repair-ok" style="display:none;" class="popup-send width-820">
    <div class="popup-main">
        <figure>
            <img src="<?= get_template_directory_uri() ?>/img/icon-29.svg" alt="">
        </figure>
        <div class="text-wrap">
            <h3>Ваше обращение отправлено, спасибо</h3>
            <p>В ближайшее время Вам будет дан ответ от нашего администратора</p>
        </div>
        <div class="btn-wrap">
            <a href="/" class="btn-border-white btn-big">Перейти на главную</a>
        </div>
    </div>
</div>