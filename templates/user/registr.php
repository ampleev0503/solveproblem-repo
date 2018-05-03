 <div class="registration-block">
        <a href="/" class="home-link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
        <h1 id="reg">Регистрация</h1>
		 <div class="loader"></div>
        <div class="form-block">
            <div class="img-form"></div>
            <div class="form-wrapper">
                <form action="" method="post" class="registration-form">
                    <p class="note">Все поля обязательны к заполнению</p>
                    <div class="form__left-block">
                        <span>Имя</span>
                        <input id="firstName" type="text" class="form-block__input" name="firstName"
                               placeholder="Введите имя" autocomplete="off" required>
                    </div>
                    <div class="form__right-block">
                        <span>Фамилия</span>
                        <input id="lastName" type="text" class="form-block__input" name="lastName"
                               placeholder="Введите фамилию" autocomplete="off" required>
                    </div>
                    <span>Ваш e-mail</span>
                    <input id="email" type="email" class="form-block__input" name="email"
                           placeholder="Введите e-mail адрес" autocomplete="off" required>
                    <span>Ваш номер телефона</span>
                    <input id="telephone" type="tel" class="form-block__input" name="telephone"
                           placeholder="+7-000-000-00-00" autocomplete="off" required>
                    <span>Пароль</span>
                    <span class="note-sm">Сгенерировать пароль</span>
                    <input id="password" type="password" class="form-block__input" name="password"
                           placeholder="Введите пароль" autocomplete="off" required>
                    <div class="eye eye1"></div>
                    <span>Подтвердите пароль</span>
                    <input id="secondPassword" type="password" class="form-block__input" name="password-repeat"
                           placeholder="Подтвердите пароль" autocomplete="off" required>
                    <div class="eye eye2"></div>
                    <label class="checkbox-label" for="agree">
                        <input id="agree" type="checkbox" name="checkbox" class="checkbox" checked>
                        <span class="checkbox-custom"></span>
                        <span class="terms-of-use terms-of-use-span">Я прочитал(а)</span>
                    </label>
                    <a href="#" class="terms-of-use terms-of-use-link">пользовательское соглашение</a>
                    <input type="submit" name="submit" class="link-btn" value="Зарегистрироваться">
                </form>
            </div>
        </div>
    </div>
 <script src="../js/registration.js"></script>