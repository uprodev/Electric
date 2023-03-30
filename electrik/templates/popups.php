<div id="login" style="display:none;" class="popup-login">
    <div class="popup-main">
        <h3>Вход</h3>
        <form action="#" class="form-icon loginform">
            <div class="input-wrap">
                <label for="email-popup"><img src="<?= get_template_directory_uri() ?>/img/icon-26-1.svg" alt=""></label>
                <input type="email" name="login" id="email-popup" placeholder="Электронная почта" required>
            </div>
            <div class="input-wrap">
                <label for="password-popup"><img src="<?= get_template_directory_uri() ?>/img/icon-26-2.svg" alt=""></label>
                <input type="password" name="password" id="password-popup" placeholder="Пароль" required>
            </div>
            <div class="link-right">
                <a href="#" class="send-password">Забыли пароль?</a>
            </div>
            <div class="input-wrap-submit">
                <button type="submit" class="btn-red">Войти <img src="<?= get_template_directory_uri() ?>/img/icon-27.svg" alt=""></button>
            </div>
            <input type="hidden" name="action" value="ajax_login">
            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>

            <div class="result-login"></div>
        </form>
        <div class="btn-wrap">
            <a href="#register" class="register btn-border-black btn-big">Нет аккаунта? Зарегистрироваться</a>
        </div>
        <div class="info">
            <p>Нажимая кнопку «Войти», я соглашаюсь с условиями <a href="#">политики конфиденциальности</a> и <a href="#">пользовательского соглашения</a>.</p>
        </div>



    </div>
</div>

<div id="register" style="display:none;" class="popup-login">
    <div class="popup-main">
        <h3>Регистрация</h3>
        <form action="#" class="form-icon registerform">
            <div class="input-wrap">
                <label for="email-popup-2"><img src="<?= get_template_directory_uri() ?>/img/icon-26-1.svg" alt=""></label>
                <input type="email" name="email" id="email-popup-2" placeholder="Электронная почта" required>
            </div>

            <div class="input-wrap-submit">
                <button type="submit" class="btn-red btn-reg">Зарегистрироваться <img src="<?= get_template_directory_uri() ?>/img/icon-27.svg" alt=""></button>
            </div>
            <input type="hidden" name="action" value="ajax_registration">
            <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
        </form>
        <div class="result-register"></div>
        <div class="info">
            <p>Нажимая кнопку «Зарегистрироваться», я соглашаюсь с условиями <a href="#">политики конфиденциальности</a> и <a href="#">пользовательского соглашения</a>.</p>
        </div>
    </div>
</div>

<div id="send-ok" style="display:none;" class="popup-send">
    <div class="popup-main">
        <figure>
            <img src="<?= get_template_directory_uri() ?>/img/icon-29.svg" alt="">
        </figure>
        <div class="text-wrap">
            <h3>Спасибо за регистрацию</h3>
            <p>Письмо с паролем отправлено на вашу почту, если письма нет - проверьте папку Спам</p>
        </div>
        <div class="btn-wrap">
            <a href="/" class="btn-border-white btn-big">Перейти на главную</a>
        </div>
    </div>
</div>


<div id="send-password" style="display:none;" class="popup-login">
    <div class="popup-main">
        <h3>Забыли пароль?</h3>
        <p>Введите свой адрес электронной почты, чтобы получить новый пароль для входа</p>
        <form action="#" class="form-icon lostpasswordform">
            <div class="input-wrap">
                <label for="email-popup-3"><img src="<?= get_template_directory_uri() ?>/img/icon-26-1.svg" alt=""></label>
                <input type="email" name="email" id="email-popup-3" placeholder="Электронная почта" required>
            </div>

            <div class="input-wrap-submit">
                <button type="submit"  class="btn-red btn-send-password">Отправить <img src="<?= get_template_directory_uri() ?>/img/icon-27.svg" alt=""></button>
            </div>

            <input type="hidden" name="action" value="ajax_reset">
            <?php wp_nonce_field( 'ajax-reset-nonce', 'security' ); ?>
            <div class="result-reset"></div>

        </form>

        <div class="btn-wrap">
            <a href="#register" data-fancybox-close class="btn-border-black btn-big">Вернуться на страницу входа</a>
        </div>
        <div class="info">
            <p>Нажимая кнопку «Зарегистрироваться», я соглашаюсь с условиями <a href="#">политики конфиденциальности</a> и <a href="#">пользовательского соглашения</a>.</p>
        </div>
    </div>
</div>

<div id="send-ok-password" style="display:none;" class="popup-send">
    <div class="popup-main">
        <figure>
            <img src="<?= get_template_directory_uri() ?>/img/icon-29.svg" alt="">
        </figure>
        <div class="text-wrap">
            <h3>Спасибо</h3>
            <p>Письмо с паролем отправлено на вашу почту, если письма нет - проверьте папку Спам</p>
        </div>
        <div class="btn-wrap">
            <a href="/" class="btn-border-white btn-big btn-border-black">Перейти на главную</a>
        </div>
    </div>
</div>