<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="Сервис по предоставлению услуг">
    <title>HOME</title>
    <link rel="stylesheet" href="../css2/normalize.css">
    <link rel="stylesheet" href="../pakages2/css/fontello.css">
    <link rel="stylesheet" href="../css2/style.css">
</head>
<body>
<div class="container">
    <header class="toolbar">
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
    <div class="task-block">
        <h1>Решение ваших задач</h1>
        <h4>Поможем в поиске добросовестных исполнителей ваших целей</h4>
        <form action="#" method="post" class="task-box__form">
            <input type="text" class="task-block__input" name="task-name"
                   placeholder="Напишите задачу, которую нужно решить" autocomplete="off"><!--
        --><input type="submit" class="task-block__btn" value="Заказать услугу">
        </form>
        <div class="sample">
            Пример: <i>Сделать красивый торт на день рождения</i>
        </div>
    </div>
    <div>
        <a href="#" class="questions">ЧАВО <span>?</span></a>
    </div>
    <div class="advantages">
        <div class="advantages__item item-1">
            <img src="img/efficiency.jpg" alt="image efficiency">
            <h2>Эффективность</h2>
            <p>Экономия вашего драгоценного времени и денежных средств</p>
        </div>
        <div class="advantages__item item-2">
            <img src="img/ranking.jpg" alt="image ranking">
            <h2>Рейтингование</h2>
            <p>Клиенты оценивают качество работы исполнителей</p>
        </div>
        <div class="advantages__item item-3">
            <img src="img/convenience.jpg" alt="image convenience">
            <h2>Удобство</h2>
            <p>Вся информация доступна в несколько кликов</p>
        </div>
    </div>
    <div class="how-it-works">
        <h2>Как&nbsp;это&nbsp;работает</h2>
        <div class="scheme">
            <img src="img/work-scheme.svg" alt="image scheme">
        </div>
    </div>
    <div class="services">
        <h2>Услуги по категориям</h2>
        <div class="services__wrapper">
            <section class="services__list list-1">
                <h3>Техника</h3>
                <a href="#" class="list-link">Ремонт компьютеров</a>
                <a href="#" class="list-link">Ремонт бытовой техники</a>
                <a href="#" class="list-link">Ремонт мобильных телефонов</a>
                <a href="#" class="list-link">Ремонт и реставрация часов</a>
                <a href="#" class="list-link">Ремонт принтеров</a>
                <a href="#" class="list-link">Всего подкатегорий: 123</a>
            </section>
            <section class="services__list list-2">
                <h3>Услуги для дома</h3>
                <a href="#" class="list-link">Уборка</a>
                <a href="#" class="list-link">Сборка мебели</a>
                <a href="#" class="list-link">Изготовление нестандартной мебели</a>
                <a href="#" class="list-link">Сантехнические работы</a>
                <a href="#" class="list-link">Всего подкатегорий: 123</a>
            </section>
            <section class="services__list list-3">
                <h3>Транспорт</h3>
                <a href="#" class="list-link">Ремонт автомобилей</a>
                <a href="#" class="list-link">Услуги курьеров</a>
                <a href="#" class="list-link">Аренда автомобиля</a>
                <a href="#" class="list-link">Погрузочные и разгрузочные работы</a>
                <a href="#" class="list-link">Всего подкатегорий: 123</a>
            </section>
            <section class="services__list list-1">
                <h3>Свободное время</h3>
                <a href="#" class="list-link">Услуги фотографа</a>
                <a href="#" class="list-link">Организация свадьбы</a>
                <a href="#" class="list-link">Организация праздников</a>
                <a href="#" class="list-link">Прокат байдарок, катамаранов</a>
                <a href="#" class="list-link">Всего подкатегорий: 123</a>
            </section>
            <section class="services__list list-2">
                <h3>Учеба</h3>
                <a href="#" class="list-link">Репетиторы</a>
                <a href="#" class="list-link">Курсы по вождению</a>
                <a href="#" class="list-link">Курсы по шитью</a>
                <a href="#" class="list-link">Курсы по макияжу</a>
                <a href="#" class="list-link">Всего подкатегорий: 123</a>
            </section>
            <section class="services__list list-3">
                <h3>Красота и здоровье</h3>
                <a href="#" class="list-link">Массаж</a>
                <a href="#" class="list-link">Косметолог</a>
                <a href="#" class="list-link">Стилист</a>
                <a href="#" class="list-link">Маникюр</a>
                <a href="#" class="list-link">Всего подкатегорий: 123</a>
            </section>
        </div>
        <a href="#" class="link-btn">Все услуги</a>
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