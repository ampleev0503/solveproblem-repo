<?php/** @var \app\models\Task $task*/?>
<?php/** @var \app\models\User $customer*/?>

<div class="bread-crumbs">
    <a href="/" class="bread-crumbs__link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
</div>

<!--СТРАНИЦА ЗАДАНИЯ-->

<!--Если предложение еще не сделано-->

<div class="task-page-block">

    <div class="task">

        <div class="task__left">
            <div class="task__title-price-wrapper">
                <h2 class="task__title">
                    <?= $task['name']?>
                </h2>
                <p class="price price--task">
                    <?= $task['cost']?>
                    <i class="icon-rouble subsection__icon-rouble"></i>
                </p>
            </div>
            <div class="task__info">
          <span class="task__open">
            Открыто для предложений
          </span>
                <span style="display: none" class="task__close">
            Закрыто для предложений
          </span>
                <span class="task__views">
            15 просмотров
          </span>
                <span class="task__date">
            Создано <?= date("d.m.y", strtotime($task['created'])) ?>
          </span>
            </div>
            <p class="task__category">
                <?= $subcategory['name']?>
            </p>

            <section class="card">
                <div class="card__wrapper">
                    <div class="card__left">
                        <h3 class="card__address-title">
                            Город
                        </h3>
                        <h3 class="card__start-title">
                            Начать
                        </h3>
                        <h3 class="card__end-title">
                            Завершить
                        </h3>
                        <h3 class="card__price-title">
                            Бюджет
                        </h3>
                    </div>

                    <div class="card__right">
                        <p class="card__address">
                            Москва
                        </p>
                        <p class="card__start">
                            <?= date("d.m.y", strtotime($task['startDate'])) ?>
                        </p>
                        <p class="card__end">
                            <?= date("d.m.y", strtotime($task['endDate'])) ?>
                        </p>
                        <p class="card__price">
                            <?= $task['cost']?>
                            <i class="icon-rouble"></i>
                        </p>
                    </div>
                </div>
                <div class="card__wrapper card__wrapper--bg">
                    <div class="card__left">
                        <h3 class="card__description-title">
                            Нужно
                        </h3>
                    </div>
                    <div class="card__right card__right--bg">
                        <p class="card__description">
                            <?= $task['description']?>
                        </p>

                    </div>
                </div>
                <a href="#" class="btn btn--default btn--task btn--inline-block">Предложить</a>
            </section>
        </div>  <!--task__left end-->

        <div class="task__right">
            <p class="task__number">
                Задание
                <span><?= $task['id']?></span>
            </p>
            <p>
                Заказчик этого задания
            </p>
            <img src="../img/avatar1.jpg" alt="avatar" class="task__avatar">
            <div class="task__wrap">
                <p class="task__fname">
                    <?= $customer['firstName']?>
                    <span class="task__sname"><?= $customer['lastName']?></span>
                </p>
                <p class="task__location">
                    Москва
                </p>
                <p class="task__review">
                    Отзывы:
                    <i class="icon-thumbs-up-alt"></i>
                    <span class="task__like">5</span>
                    <i class="icon-thumbs-down-alt"></i>
                    <span class="task__dislike">0</span>
                </p>
            </div>
        </div><!--task__right end-->

    </div>  <!--task end-->

</div>  <!--task-page-block end-->

<!--Если предложение сделано-->

<div class="task-page-block">

    <div class="task">

<!--        <div class="task__left">-->
<!---->
<!--            <p class="task__category">-->
<!--                Уборка и помощь по хозяйству-->
<!--            </p>-->
<!---->
<!---->
<!--            <h2 class="task__title--offer">-->
<!--                Ваше предложение-->
<!--            </h2>-->
<!--            <img src="../img/avatar1.jpg" alt="avatar" class="task__avatar task__avatar--offer">-->
<!--            <div class="task__wrap task__wrap--offer">-->
<!--                <p class="task__fname task__fname--offer">-->
<!--                    Дмитрий-->
<!--                    <span class="task__sname">Б.</span>-->
<!--                </p>-->
<!--                <p class="task__location">-->
<!--                    Москва-->
<!--                </p>-->
<!--                <p class="task__review">-->
<!--                    Отзывы:-->
<!--                    <i class="icon-thumbs-up-alt"></i>-->
<!--                    <span class="task__like">5</span>-->
<!--                    <i class="icon-thumbs-down-alt"></i>-->
<!--                    <span class="task__dislike">0</span>-->
<!--                </p>-->
<!--            </div>-->
<!--            <p class="task__description">-->
<!--                Привет. Могу выполнить это задание.-->
<!--            </p>-->
<!--            <p class="task__description task__contacts">-->
<!--                Ваши контакты:-->
<!--                <span>-->
<!--            +7-(000)-000-00-00-->
<!--          </span>-->
<!--            </p>-->
<!--        </div>  -->



    </div>

</div>  <!--task-page-block end-->

</div>  <!--container end-->
<!--СТРАНИЦА ЗАДАНИЯ end-->