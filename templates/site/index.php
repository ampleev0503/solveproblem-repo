<div class="banner">
	<h1>Решение ваших задач</h1>
	<h4>Поможем в поиске добросовестных исполнителей ваших целей</h4>
	<form action="/task/create" method="post" class="banner__form">
		<input type="text" class="banner__input" name="task-name"
					 placeholder="Напишите задачу, которую нужно решить" autocomplete="off">
        <input type="submit" class="banner__btn" value="Заказать услугу" name="task-submit">
	</form>
	<div class="banner__sample">
		Пример: <i>Сделать красивый торт на день рождения</i>
	</div>
</div>
<div>
	<a href="#" class="questions">ЧАВО <span>?</span></a>
</div>
<div class="advantages">
	<div class="advantages__item item-1">
		<img src="../img/efficiency.jpg" alt="image efficiency">
		<h2>Эффективность</h2>
		<p>Экономия вашего драгоценного времени и денежных средств</p>
	</div>
	<div class="advantages__item item-2">
		<img src="../img/ranking.jpg" alt="image ranking">
		<h2>Рейтингование</h2>
		<p>Клиенты оценивают качество работы исполнителей</p>
	</div>
	<div class="advantages__item item-3">
		<img src="../img/convenience.jpg" alt="image convenience">
		<h2>Удобство</h2>
		<p>Вся информация доступна в несколько кликов</p>
	</div>
</div>
<div class="how-it-works">
	<h2>Как&nbsp;это&nbsp;работает?</h2>
	<div class="how-it-works__scheme">
		<img src="../img/work-scheme.svg" alt="image scheme">
	</div>
</div>
<div class="services">
	<h2>Услуги по категориям</h2>
	<div class="services__wrapper">

        <?php $i=0; ?>
        <?php foreach ($dataCategory as $category): ?>
        <section class="services__list list-1">
            <h3><?= array_keys($dataCategory)[$i++] ?></h3>
            <?php foreach ($category as $subcategory): ?>
                <a href="#" class="services__link"><?= $subcategory ?></a>
            <?php endforeach; ?>
            <p class="p_services__link">Всего подкатегорий: <?= count($category) ?></p>
        </section>
        <?php endforeach; ?>

	</div>
	<a href="/task/all" class="btn btn--default btn--centered btn--inline-block">Все задачи</a>
</div>