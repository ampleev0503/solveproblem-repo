<?php /** @var \app\models\Task[] $itemsTask */ ?>
<?php /** @var \app\models\Category[] $itemsCategory */ ?>
<!--Все услуги-->

<div class="bread-crumbs">
    <a href="/" class="bread-crumbs__link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
</div>

<div class="all-services-block">

    <div class="all-services">
        <div class="services__left">
            <h2 class="all-services__title">Все задания</h2>

            <?php foreach ($itemsTask as $task): ?>

                <section class="services-subsection">

                    <div class="services-subsection__left">
                        <a class="services-subsection__title" href="<?= $task->getUrl() ?>"><?= $task->name?></a>
                        <img src="../img/avatar1.jpg" alt="avatar" class="services-subsection__avatar">
                        <div class="services-subsection__wrap">
                            <p class="services-subsection__fname">
                                <?= $dataUser[$task->id][1]?>
                                <span class="services-subsection__sname"><?= $dataUser[$task->id][2]?></span>
                            </p>
                            <p class="services-subsection__review">
                                Отзывы:
                                <i class="icon-thumbs-up-alt"></i>
                                <span class="services-subsection__like">5</span>
                                <i class="icon-thumbs-down-alt"></i>
                                <span class="services-subsection__dislike">0</span>
                            </p>
                        </div>
                    </div>

                    <div class="services-subsection__right">
                        <p class="price services-price--subsection">
                            <?= $task->cost?>
                            <i class="icon-rouble services-subsection__icon-rouble"></i>
                        </p>
                        <p class="services-subsection__date">
                            <i class="icon-clock"></i>
                            До <?= date("d.m.y", strtotime($task->endDate)) ?>
                        </p>
                        <p class="services-subsection__location">
                            <i class="icon-location"></i>
                            Москва
                        </p>
                    </div>

                </section>

            <?php endforeach; ?>








            <!--<div class="profile__review-expand">-->
            <!--Показать больше-->
            <!--</div>-->


        </div>  <!--profile__left end-->



    </div>

</div>  <!--profile-block end-->
 <!--container end-->
<!--Все услуги end-->

