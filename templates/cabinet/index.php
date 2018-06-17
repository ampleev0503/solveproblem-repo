<?php /** @var \app\models\Task[] $itemsTask */ ?>
<?php /** @var \app\models\Task[]  $itemsTaskCustomer*/ ?>

<?php
//echo("<pre>");
//var_dump($itemsTask);
//echo("<hr>");
//if (empty($itemsTask)) {
//    var_dump("Массив Пуст");
//}
//else
//    var_dump("Массив Не пуст");
//?>

<!--Мои заказы-->

<div class="orders-block">

    <h1 class="title title--orders">Мои заказы</h1>

    <div class="orders-btn">
        <div class="orders-btn__left orders-btn__item orders-btn__active">Я исполнитель</div><!--
      --><div class="orders-btn__right orders-btn__item">Я заказчик</div>
    </div>

    <!--Блок исполнителя-->

    <div class="tab-block-container tab-block-container--active performer"><!--
      --><div class="tab tab--performer tab--performer-active my-responses">Мои отклики</div><!--
      --><div class="tab tab--performer in-process">В исполнении</div><!--
      --><div class="tab tab--performer tab--last maded">Выполненные</div>

        <div class="tab-section tab-section--performer tab-section--performer-active">

            <?php if (!empty($itemsTask)): ?>

                <?php foreach ($itemsTask as $task): ?>

                    <section class="subsection">

                        <div class="subsection__left">
                            <a class="services-subsection__title" href="<?= $task->getUrl() ?>"><?= $task->name?></a>
                            <img src="img/avatar1.jpg" alt="avatar" class="subsection__avatar">
                            <div class="subsection__wrap">
                                <p class="subsection__fname">
                                    <?= $task->firstName?>
                                    <span class="subsection__sname"><?= $task->lastName?></span>
                                </p>
                                <p class="subsection__review">
                                    Отзывы:
                                    <i class="icon-thumbs-up-alt"></i>
                                    <span class="subsection__like">5</span>
                                    <i class="icon-thumbs-down-alt"></i>
                                    <span class="subsection__dislike">0</span>
                                </p>
                            </div>
                        </div>

                        <div class="subsection__right">
                            <p class="price price--subsection">
                                <?= $task->cost?>
                                <i class="icon-rouble subsection__icon-rouble"></i>
                            </p>
                            <p class="subsection__date">
                                <i class="icon-clock"></i>
                                До <?= date("d.m.y", strtotime($task->endDate)) ?>
                            </p>
                            <p class="subsection__location">
                                <i class="icon-location"></i>
                                Москва
                            </p>
                        </div>

                    </section>

                <?php endforeach; ?>

            <?php else: ?>
                <!--Сообщение показывается, если еще нет откликов-->
                <section class="tab-section__subsection">
                    <h2 class="tab-section__content">
                        Вы еще не сделали ни одного предложения
                    </h2>
                    <a href="/task/all" class="tab-section__note">
                        Перейти к заданиям
                    </a>
                </section>
                <!--Сообщение показывается, если еще нет откликов END-->
            <?php endif; ?>

        </div>

        <div class="tab-section tab-section--performer"></div>

        <div class="tab-section tab-section--performer"></div>

    </div>

    <!--Блок исполнителя END-->

    <!--Блок заказчика-->

    <div class="tab-block-container customer"><!--
      --><div class="tab tab--customer tab--customer-active  customer-tasks">Мои задачи</div><!--
      --><div class="tab tab--customer suggestions-tasks">Предложения</div><!--
      --><div class="tab tab--customer in-process-tasks">В процессе</div><!--
      --><div class="tab tab--customer tab--last maded-tasks">Завершенные</div>

        <!--Вкладка "Мои задачи"-->

        <div class="tab-section tab-section--customer tab-section--customer-active">

            <?php if (!empty($itemsTaskCustomer)): ?>

                <a href="/task/create" class="tab-section__link">
                    + Создать новое задание
                </a>

                <?php foreach ($itemsTaskCustomer as $taskCustomer): ?>



                    <section class="subsection subsection--accordion">

                        <div class="subsection__header">
                            <div class="subsection__left">
                                <h2 class="subsection__title subsection__title--accordion">
                                    <i class="icon-down-open-mini"></i>
                                    <?= $taskCustomer->name ?>
                                </h2>
                                <div class="subsection__edit">
                                    <i class="icon-pencil"></i>
                                </div>
                            </div>

                            <div class="subsection__right">
                                <p class="price price--subsection">
                                    <?= $taskCustomer->cost ?>
                                    <i class="icon-rouble subsection__icon-rouble"></i></p>
                            </div>
                        </div>

                        <div class="subsection__content">
                            <p class="subsection__description">
                                <?= $taskCustomer->description ?>
                            </p>
                            <p class="subsection__start-date">
                                Начать: <?= date("d.m.y", strtotime($taskCustomer->startDate)) ?>
                            </p>
                            <p class="subsection__finish-date">
                                Закончить: <?= date("d.m.y", strtotime($taskCustomer->endDate)) ?>
                            </p>
                            <div class="subsection__address">
                                <i class="icon-location"></i>
                                <span>Москва</span>
                            </div>
                        </div>

                    </section>

                <?php endforeach; ?>

            <?php else: ?>
                <!-- -------------- -->

                <!-- ------------ -->

                <!-- ------------ -->

                <!--Сообщение показывается, если нет задач-->
                <section class="tab-section__subsection">
                    <h2 class="tab-section__content">
                        Вы еще не создали ни одного задания
                    </h2>
                    <a href="/task/create" class="tab-section__note">
                        Создать задание
                    </a>
                </section>
                <!--Сообщение показывается, если нет задач END-->
            <?php endif; ?>

        </div>

        <!--Вкладка "Предложения"-->

        <div class="tab-section tab-section--customer">
        </div>

        <!--Вкладка "В процессе"-->

        <div class="tab-section tab-section--customer">
        </div>

        <!--Вкладка "Завершенные"-->

        <div class="tab-section tab-section--customer">

            <section class="subsection subsection--accordion">

                <div class="subsection__header">
                    <div class="subsection__left">
                        <h2 class="subsection__title subsection__title--accordion">
                            <i class="icon-down-open-mini"></i>
                            Убрать 3-х квартиру
                        </h2>
                    </div>

                    <div class="subsection__right">
                        <img class="subsection__finish" src="../img/ok.png" alt="ok image">
                    </div>
                </div>

                <div class="subsection__content">
                    <div class="subsection__content-left">
                        <p class="subsection__description">
                            Нужно убрать 3х комнатную квартиру, помыть полы, вымыть окна,
                            разложить вещи по полкам и вынести мусор во двор.
                        </p>
                        <p class="subsection__start-date">
                            Начать: 11.11.2018
                        </p>
                        <p class="subsection__finish-date">
                            Закончить: 11.11.2018
                        </p>
                        <div class="subsection__address">
                            <i class="icon-location"></i>
                            <span>Москва, ул. Свободы, д. 90</span>
                        </div>
                    </div>
                    <div class="subsection__content-right">
                        <img src="../img/avatar2.jpg" alt="avatar" class="subsection__avatar-right">
                        <p class="subsection__performer">Исполнитель</p>
                        <p class="subsection__performer-name">Александр <span>Ш.</span></p>
                        <p class="subsection__performer-review">
                            Отзывы:
                            <i class="icon-thumbs-up-alt"></i>
                            <span class="subsection__like">5</span>
                            <i class="icon-thumbs-down-alt"></i>
                            <span class="subsection__dislike">0</span>
                        </p>
                        <p class="subsection__write-review">Написать&nbsp;отзыв</p>
                    </div>
                </div>
            </section>
            <!-- ------------ -->
            <section class="subsection subsection--accordion">

                <div class="subsection__header">
                    <div class="subsection__left">
                        <h2 class="subsection__title subsection__title--accordion">
                            <i class="icon-down-open-mini"></i>
                            Убрать 3-х квартиру
                        </h2>
                    </div>

                    <div class="subsection__right">
                        <img class="subsection__finish" src="../img/ok.png" alt="ok image">
                    </div>
                </div>

                <div class="subsection__content">
                    <div class="subsection__content-left">
                        <p class="subsection__description">
                            Нужно убрать 3х комнатную квартиру, помыть полы, вымыть окна,
                            разложить вещи по полкам и вынести мусор во двор.
                        </p>
                        <p class="subsection__start-date">
                            Начать: 11.11.2018
                        </p>
                        <p class="subsection__finish-date">
                            Закончить: 11.11.2018
                        </p>
                        <div class="subsection__address">
                            <i class="icon-location"></i>
                            <span>Москва, ул. Свободы, д. 90</span>
                        </div>
                    </div>
                    <div class="subsection__content-right">
                        <img src="../img/avatar2.jpg" alt="avatar" class="subsection__avatar-right">
                        <p class="subsection__performer">Исполнитель</p>
                        <p class="subsection__performer-name">Александр <span>Ш.</span></p>
                        <p class="subsection__performer-review">
                            Отзывы:
                            <i class="icon-thumbs-up-alt"></i>
                            <span class="subsection__like">5</span>
                            <i class="icon-thumbs-down-alt"></i>
                            <span class="subsection__dislike">0</span>
                        </p>
                        <p class="subsection__write-review">Написать&nbsp;отзыв</p>
                    </div>
                </div>
            </section>

            <!--Сообщение показывается, если еще нет завершенных задач-->
            <section class="tab-section__subsection">
                <h2 class="tab-section__content">
                    У вас еще нет завершенных задач
                </h2>
                <img src="../img/face.svg" alt="face" class="tab-section__face">
            </section>
            <!--Сообщение показывается, если еще нет завершенных задач END-->
        </div>

    </div> <!--Блок заказчика END-->

</div>  <!--orders-block end-->
</div>  <!--container end-->
<!--Мои заказы end-->
