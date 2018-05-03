<div class="bread__crumbs">
        <a href="/" class="home-link"><i class="icon-left-open-big"></i>На главную</a>
    </div>

    <div class="authorization-block">

        <h1><i class="icon-user-1"></i>Авторизация</h1>

				<div class="authorization-error"></div>

        <form action="/login" method="post" class="assignment__form">
            <div class="input__login">
                <input id="email" type="email" name="email" class="email" placeholder="E-mail адрес или телефон"
											 required>
                <input id="password" type="password" name="password" class="password" placeholder="Пароль" required>
							<label class="checkbox-label">
								<input id="remember" type="checkbox" name="remember" class="checkbox">
								<span class="checkbox-custom"></span>
								<span class="terms-of-use terms-of-use-span">Запомнить меня?</span>
							</label>
            </div>
            <div class="lg__fr__btn">
                <input type="submit" name="submit" class="login-btn" value="Войти">
                <div class="forgot-btn"><a href="#"> Забыли пароль?</a></div>
            </div>

        </form>

        <h4 class="link-to-registration">Вы еще не с нами? <a href="/regist">Зарегистрируйтесь!</a></h4>

    </div>

<script src="../js/login.js"></script>
