<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="Сервис по предоставлению услуг">
    <title>Registration</title>
    <link rel="stylesheet" href="../css2/normalize.css">
    <link rel="stylesheet" href="../pakages2/css/fontello.css">
    <link rel="stylesheet" href="../css2/style.css">
</head>
<body>
<div class="container">
    <header class="toolbar toolbar-color">
        <div class="content">
            <div class="content__block content__left">
                <a href="#" class="task">+&nbsp;Создать&nbsp;задание</a>
                <nav class="services-nav"><i class="icon-down-open-big"></i>Услуги</nav>
            </div>
            <div class="content__block content__center">
                <a href="#" class="logo">#Solve&nbsp;Problem</a>
            </div>
            <div class="content__block content__right">
                <?php if (app\models\User::isGuest()): ?>
                    <a href="/user/registration" class="registration">Регистрация</a>
                    <a href="/user/login" class="login">Войти</a>
                <?php else: ?>
                    <a href="/user/logout" class="login">Выйти</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="registration-block">
        <a href="#" class="home-link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
        <h1>Регистрация</h1>
        <div class="form-block">
            <div class="img-form"></div>
            <div class="form-wrapper">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form action="/user/registration" method="post" class="registration-form">
                    <p class="note">Все поля обязательны к заполнению</p>
                    <div class="form__left-block">
                        <span>Имя</span>
                        <input type="text" class="form-block__input" name="firstName"
                               placeholder="Введите имя" autocomplete="off" required>
                    </div>
                    <div class="form__right-block">
                        <span>Фамилия</span>
                        <input type="text" class="form-block__input" name="lastName"
                               placeholder="Введите фамилию" autocomplete="off" required>
                    </div>
                    <span>Ваш e-mail</span>
                    <input type="email" class="form-block__input" name="email"
                           placeholder="Введите e-mail адрес" autocomplete="off" required>
                    <span>Ваш номер телефона</span>
                    <input type="tel" class="form-block__input" name="telephone"
                           placeholder="+7-(000)-000-00-00" autocomplete="off" required>
                    <span>Пароль</span>
                    <span class="note-sm">Сгенерировать пароль</span>
                    <input type="password" class="form-block__input" name="password"
                           placeholder="Введите пароль" autocomplete="off" required>
                    <div class="eye eye1"></div>
                    <span>Подтвердите пароль</span>
                    <input type="password" class="form-block__input" name="password-repeat"
                           placeholder="Подтвердите пароль" autocomplete="off" required>
                    <div class="eye eye2"></div>
                    <label class="checkbox-label">
                        <input type="checkbox" name="checkbox" class="checkbox" checked>
                        <span class="checkbox-custom"></span>
                        <span class="terms-of-use terms-of-use-span">Я прочитал(а)</span>
                    </label>
                    <a href="#" class="terms-of-use terms-of-use-link">пользовательское соглашение</a>
                    <input type="submit" name="submit" class="link-btn" value="Зарегистрироваться">
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer__content">
        <section class="footer__block">
            <h3>Услуги</h3>
            <a href="#" class="footer-link">Техника</a>
            <a href="#" class="footer-link">Услуги для дома</a>
            <a href="#" class="footer-link">Транспорт</a>
            <a href="#" class="footer-link">Свободное время</a>
            <a href="#" class="footer-link">Учеба</a>
            <a href="#" class="footer-link">Красота и здоровье</a>
            <a href="#" class="footer-link">Все услуги: 777</a>
        </section>
        <section class="footer__block">
            <h3>Города</h3>
            <a href="#" class="footer-link">Москва</a>
            <a href="#" class="footer-link">Санкт-Петербург</a>
            <a href="#" class="footer-link">Калининград</a>
            <a href="#" class="footer-link">Симферополь</a>
            <a href="#" class="footer-link">Одесса</a>
            <a href="#" class="footer-link">Новосибирск</a>
            <a href="#" class="footer-link">Всего городов: 777</a>
        </section>
        <section class="footer__block">
            <h3>Поддержка</h3>
            <a href="#" class="footer-link">Популярные вопросы</a>
            <a href="#" class="footer-link">Задать вопрос</a>
        </section>
        <section class="footer__block">
            <h3>Контакты</h3>
            <p>+7-000-000-00-00</p>
            <p>+7-000-000-00-00</p>
            <p>solveproblem@sp.com</p>
        </section>
    </div>
    <div class="footer__socials-logo-wrapper">
        <div class="socials">
            <a href="#" class="socials__item facebook"></a>
            <a href="#" class="socials__item twitter"></a>
            <a href="#" class="socials__item vk"></a>
            <a href="#" class="socials__item google-plius"></a>
            <a href="#" class="socials__item smile"></a>
        </div>
        <a href="#" class="footer__logo">#Solve&nbsp;Problem</a>
    </div>
    <p class="copyright">Copyright&nbsp;2018</p>
</footer>
</body>
</html>