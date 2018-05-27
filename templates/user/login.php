<div class="bread__crumbs">
	<a href="/" class="bread-crumbs__link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
</div>

    <div class="authorization-block">
			<h1 class="title"><i class="icon-user"></i>Авторизация</h1>

				<div class="authorization-error"></div>

        <form action="/login" method="post" class="form form--authorization">
					<input id="email" type="email" name="email" class="input input--authorization email"
								 placeholder="E-mail адрес или телефон">
					<input id="password" type="password" name="password"
								 class="input input--authorization password" placeholder="Пароль">
					<label class="checkbox-label">
						<input id="remember" type="checkbox" name="remember" class="checkbox">
						<span class="checkbox-custom"></span>
						<span class="terms-of-use terms-of-use-span">Запомнить меня?</span>
					</label>
					<div class="form__elem-wrapper">
						<input type="submit" name="login" class="btn btn--inline-block btn--default btn--submit btn--auth" value="Войти">
						<a href="/recovery" class="btn btn--inline-block btn--error btn--auth">Забыли пароль?</a>
					</div>
					<h4 class="form__link">Вы еще не с нами? <a href="/regist">Зарегистрируйтесь!</a></h4>
				</form>
    </div>

<script src="../js/login.js"></script>
