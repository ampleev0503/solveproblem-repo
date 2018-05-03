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
	<link rel="stylesheet" href="../css/style_application.css">
	<link href='//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/authorization.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/textarea_placeholder.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/calendarScript.js"></script>
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>


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
				<a href="/" class="logo">#Solve&nbsp;Problem</a>
			</div>
			<div class="content__block content__right">
        <?php if (!$layoutContent['authUser']): ?>
					<a href="/regist" class="registration">Регистрация</a>
					<a href="/login" class="login">Войти</a>
        <?php else: ?>
					<a href="/logout" class="login">Выйти</a>
        <?php endif; ?>
			</div>
		</div>
	</header>

<?php echo $content;?>

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