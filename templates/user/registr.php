
<div class="bread-crumbs">
	<a href="/" class="bread-crumbs__link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
</div>

<div class="registration-block">

	<h1 class="title">Регистрация</h1>

	<div class="loader"></div>
	<div class="form-wrapper">
		<form action="/regist" method="post" class="form">

			<p class="form__note">*Все поля обязательны к заполнению</p>

			<div class="form__left-block">
				<span class="form__span">Имя</span>
				<input id="firstName" type="text" class="input" name="name"
							 placeholder="Введите имя" autocomplete="off">
			</div>

			<div class="form__right-block">
				<span class="form__span">Фамилия</span>
				<input id="lastName" type="text" class="input" name="surname"
							 placeholder="Введите фамилию" autocomplete="off">
			</div>

			<span class="form__span">Ваш e-mail</span>
			<input id="email" type="email" class="input" name="email"
						 placeholder="Введите e-mail адрес" autocomplete="off">

			<span class="form__span">Ваш номер телефона</span>
			<input id="telephone" type="tel" class="input" name="tel"
						 placeholder="+7-(000)-000-00-00" autocomplete="off">

			<span class="form__span">Пароль</span>
			<input id="password" type="password" class="input" name="password"
						 placeholder="Введите пароль" autocomplete="off">

			<span class="form__span">Подтвердите пароль</span>
			<input id="secondPassword" type="password" class="input" name="password-repeat"
						 placeholder="Подтвердите пароль" autocomplete="off">

			<label class="checkbox">
				<input id="agree" type="checkbox" name="checkbox" class="checkbox__input" checked>
				<span class="checkbox__span"></span>
				<span class="checkbox__label">Я прочитал(а)</span>
				<a href="#" class="checkbox__label">пользовательское соглашение</a>
			</label>

			<input type="submit" class="btn btn--default btn--centered btn--submit btn--block" value="Зарегистрироваться">

		</form>
	</div>

</div>

 <script src="../js/registration.js"></script>