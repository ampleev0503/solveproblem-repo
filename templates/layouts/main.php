<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="description" content="Сервис по предоставлению услуг">
	<title>Solve Problem</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../js/jquery-ui-1.12.1.custom/jquery-ui.min.css">
	<link rel="stylesheet" href="../js/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="../js/jquery-ui-1.12.1.custom/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="../pakages/css/fontello.css">
	<link rel="stylesheet" href="../css/styles.css">
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

</head>

	<body class="page-common">
	<div class="container">

		<header class="header header--color">
			<div class="content">
				<div class="content__left">
					<a href="/task/create">+&nbsp;Создать&nbsp;задание</a>
					<nav class="content__nav"><i class="icon-down-open-big"></i>Услуги</nav>
				</div>
				<div class="content__center">
					<a href="/" class="logo logo--header">#Solve&nbsp;Problem</a>
				</div>
				<div class="content__right">
          <?php if (!$layoutContent['authUser']): ?>
					<a href="/regist" class="content__registration">Регистрация</a>
					<a href="/login" class="login">Войти</a>
          <?php else: ?>
						<div class="dropdown-toggle">
							<div class="dropdown-toggle__icon-menu">
								<div class="dropdown-toggle__line"></div>
							</div>
							<div class="dropdown-toggle__notifications"></div>
						</div>

						<ul class="dropdown">
							<li class="dropdown__item">
								<span></span>
								<a href="#" class="dropdown__link">
									<i class="dropdown__icon icon-user"></i>
									Профиль
								</a>
							</li>
							<li class="dropdown__item  dropdown--active">
								<a href="#" class="dropdown__link">
									<i class="dropdown__icon icon-check"></i>
									Мои заказы
								</a>
							</li>
							<li class="dropdown__item">
								<a href="#" class="dropdown__link">
									<i class="dropdown__icon icon-cog-1"></i>
									Настройки
								</a>
							</li>
							<li class="dropdown__item">
								<a href="/logout" class="dropdown__link">
									<i class="dropdown__icon icon-logout-1"></i>
									Выйти
								</a>
							</li>
						</ul>
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
				<a href="#" class="footer__link">Техника</a>
				<a href="#" class="footer__link">Услуги для дома</a>
				<a href="#" class="footer__link">Транспорт</a>
				<a href="#" class="footer__link">Свободное время</a>
				<a href="#" class="footer__link">Учеба</a>
				<a href="#" class="footer__link">Красота и здоровье</a>
				<a href="#" class="footer__link">Все услуги: 777</a>
			</section>
			<section class="footer__block">
				<h3>Города</h3>
				<a href="#" class="footer__link">Москва</a>
				<a href="#" class="footer__link">Санкт-Петербург</a>
				<a href="#" class="footer__link">Калининград</a>
				<a href="#" class="footer__link">Симферополь</a>
				<a href="#" class="footer__link">Одесса</a>
				<a href="#" class="footer__link">Новосибирск</a>
				<a href="#" class="footer__link">Всего городов: 777</a>
			</section>
			<section class="footer__block">
				<h3>Поддержка</h3>
				<a href="#" class="footer__link">Популярные вопросы</a>
				<a href="#" class="footer__link">Задать вопрос</a>
			</section>
			<section class="footer__block">
				<h3>Контакты</h3>
				<p>+7-000-000-00-00</p>
				<p>+7-000-000-00-00</p>
				<p>solveproblem@sp.com</p>
			</section>
		</div>
		<div class="footer__social-logo-wrapper">
			<div class="social">
				<a href="#" class="social__item social__fb"></a>
				<a href="#" class="social__item social__twit"></a>
				<a href="#" class="social__item social__vk"></a>
				<a href="#" class="social__item social__g-plus"></a>
				<a href="#" class="social__item social__smile"></a>
			</div>
			<a href="/" class="logo logo--footer">#Solve&nbsp;Problem</a>
		</div>
		<div class="footer__copyright">Copyright&nbsp;2018&nbsp;www.solveproblem.ru</div>
	</footer>

<!--    <script src="../js/jquery-3.2.1.min.js"></script>-->
    <script src="../js/main.js"></script>
<!--    <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>-->
    <script src="../js/calendarScript.js"></script>
    <script src="../js/load_subcategory.js"></script>



</body>
</html>