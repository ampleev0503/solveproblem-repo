<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="Создать заявку на решение задачи">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../pakages/css/fontello.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_application.css">
    <link rel="stylesheet" href="../css/authorization.css">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/textarea_placeholder.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href='//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../js/calendarScript.js"></script>

</head>
<body>
<div class="container">
    <header class="toolbar">
        <div class="content">
            <div class="content__block content__left">
                <a href="#" class="task">+&nbsp;Создать&nbsp;задание</a>
                <nav class="services-nav"><i class="icon-angle-down"></i>Услуги</nav>
            </div>
            <div class="content__block content__center">
                <a href="#" class="logo">#Solve&nbsp;Problem</a>
            </div>
            <div class="content__block content__right">
                <a href="#" class="registration">Регистрация</a>
            </div>
        </div>
    </header>

    <div class="bread__crumbs">
        <a href="#"><i class="icon-angle-left"></i>На главную</a>
    </div>

    <div class="authorization-block">

        <h1><i class="icon-user-1"></i>Авторизация</h1>

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="/user/login" method="post" class="assignment__form">
            <div class="input__login">
                <input type="email" name="email" class="email" placeholder="E-mail адрес или телефон" required>
                <input type="password" name="password" class="password" placeholder="Пароль" required>
            </div>
            <div class="lg__fr__btn">
                <input type="submit" name="submit" class="login-btn" value="Войти">
                <div class="forgot-btn"><a href="#">Забыли пароль?</a></div>
            </div>

        </form>

        <h4 class="link-to-registration">Вы еще не с нами? <a href="#">Зарегистрируйтесь!</a></h4>

    </div>
</div>

<footer class="footer">
    <div class="footer__content">
        <div class="footer__block">
            <h3>Услуги</h3>
            <a href="#" class="footer-link">Техника</a>
            <a href="#" class="footer-link">Услуги для дома</a>
            <a href="#" class="footer-link">Транспорт</a>
            <a href="#" class="footer-link">Свободное время</a>
            <a href="#" class="footer-link">Учеба</a>
            <a href="#" class="footer-link">Красота и здоровье</a>
            <a href="#" class="footer-link">Все услуги: 777</a>
        </div>
        <div class="footer__block">
            <h3>Города</h3>
            <a href="#" class="footer-link">Москва</a>
            <a href="#" class="footer-link">Санкт-Петербург</a>
            <a href="#" class="footer-link">Калининград</a>
            <a href="#" class="footer-link">Симферополь</a>
            <a href="#" class="footer-link">Одесса</a>
            <a href="#" class="footer-link">Новосибирск</a>
            <a href="#" class="footer-link">Всего городов: 777</a>
        </div>
        <div class="footer__block">
            <h3>Поддержка</h3>
            <a href="#" class="footer-link">Популярные вопросы</a>
            <a href="#" class="footer-link">Задать вопрос</a>
        </div>
        <div class="footer__block">
            <h3>Контакты</h3>
            <p>+7-000-000-00-00</p>
            <p>+7-000-000-00-00</p>
            <p>solveproblem@sp.com</p>
        </div>
    </div>
    <div class="socials">
        <a href="#" class="socials__item facebook"></a>
        <a href="#" class="socials__item twitter"></a>
        <a href="#" class="socials__item vk"></a>
        <a href="#" class="socials__item google-plius"></a>
        <a href="#" class="socials__item smile"></a>
    </div>
    <a href="#" class="footer__logo">#Solve&nbsp;Problem</a>
    <p class="copyright">Copyright&nbsp;2018 www.solveproblem.ru</p>
</footer>
</body>
</html>