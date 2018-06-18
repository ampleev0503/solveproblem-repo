
<div class="bread-crumbs">
    <a href="index.html" class="bread-crumbs__link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
</div>

<!--BEGINNING Страница оценки -->

<h3 class="assessment-page__title">Оценить</h3>

<p class="assessment-page__description">Оцените и оставьте свой коментарий.</p>

<form id="assessment-form" method="post">

    <div id="reviewStars-input">
        <input id="star-5" type="radio" name="reviewStars" value="5" required/>
        <label title="Отлично" for="star-5"></label>

        <input id="star-4" type="radio" name="reviewStars" value="4" required/>
        <label title="Хорошо" for="star-4"></label>

        <input id="star-3" type="radio" name="reviewStars" value="3" required/>
        <label title="Нормально" for="star-3"></label>

        <input id="star-2" type="radio" name="reviewStars" value="2" required/>
        <label title="Сойдет" for="star-2"></label>

        <input id="star-1" type="radio" name="reviewStars" value="1" required/>
        <label title="Плохо" for="star-1"></label>
    </div>

    <textarea name="txtArea" id="value-comment" cols="60" rows="10" required></textarea>	<br>
    <label title="Оставьте свой коментарий" for="value-comment"></label>

    <input class="btn  btn--default btn--submit " id="send" type="submit" name="submit">

</form>

<!--END Страница оценки -->

