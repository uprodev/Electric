<div id="login" style="display:none;" class="popup-login">
    <div class="popup-main">
        <h3>Вход</h3>
        <form action="#" class="form-icon">
            <div class="input-wrap">
                <label for="email-popup"><img src="img/icon-26-1.svg" alt=""></label>
                <input type="email" name="email-popup" id="email-popup" placeholder="Электронная почта">
            </div>
            <div class="input-wrap">
                <label for="password-popup"><img src="img/icon-26-2.svg" alt=""></label>
                <input type="password" name="password-popup" id="password-popup" placeholder="Пароль">
            </div>
            <div class="link-right">
                <a href="#" class="send-password">Забыли пароль?</a>
            </div>
            <div class="input-wrap-submit">
                <button class="btn-red">Войти <img src="img/icon-27.svg" alt=""></button>
            </div>
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
        <form action="#" class="form-icon">
            <div class="input-wrap">
                <label for="email-popup-2"><img src="img/icon-26-1.svg" alt=""></label>
                <input type="email" name="email-popup" id="email-popup-2" placeholder="Электронная почта">
            </div>

            <div class="input-wrap-submit">
                <button class="btn-red btn-reg">Зарегистрироваться <img src="img/icon-27.svg" alt=""></button>
            </div>
        </form>

        <div class="info">
            <p>Нажимая кнопку «Зарегистрироваться», я соглашаюсь с условиями <a href="#">политики конфиденциальности</a> и <a href="#">пользовательского соглашения</a>.</p>
        </div>
    </div>
</div>

<div id="send-ok" style="display:none;" class="popup-send">
    <div class="popup-main">
        <figure>
            <img src="img/icon-29.svg" alt="">
        </figure>
        <div class="text-wrap">
            <h3>Спасибо за регистрацию</h3>
            <p>Письмо с паролем отправлено на вашу почту, если письма нет - проверьте папку Спам</p>
        </div>
        <div class="btn-wrap">
            <a href="index.html" class="btn-border-white btn-big">Перейти на главную</a>
        </div>
    </div>
</div>


<div id="send-password" style="display:none;" class="popup-login">
    <div class="popup-main">
        <h3>Забыли пароль?</h3>
        <p>Введите свой адрес электронной почты, чтобы получить новый пароль для входа</p>
        <form action="#" class="form-icon">
            <div class="input-wrap">
                <label for="email-popup-3"><img src="img/icon-26-1.svg" alt=""></label>
                <input type="email" name="email-popup" id="email-popup-3" placeholder="Электронная почта">
            </div>

            <div class="input-wrap-submit">
                <button class="btn-red btn-send-password">Отправить <img src="img/icon-27.svg" alt=""></button>
            </div>
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
            <img src="img/icon-29.svg" alt="">
        </figure>
        <div class="text-wrap">
            <h3>Спасибо</h3>
            <p>Письмо с паролем отправлено на вашу почту, если письма нет - проверьте папку Спам</p>
        </div>
        <div class="btn-wrap">
            <a href="index.html" class="btn-border-white btn-big btn-border-black">Перейти на главную</a>
        </div>
    </div>
</div>