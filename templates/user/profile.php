<?php/** @var \app\models\User $user*/?>
<?php /** @var \app\models\Feedback[] $itemsFeedback*/?>

<div class="bread-crumbs">
    <a href="/" class="bread-crumbs__link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
</div>

<!--Профиль пользователя-->

<div class="profile-block">

    <div class="profile">
        <div class="profile__left">
            <h2 class="profile__greeting"><?= $user->firstName . ' ' . $user->lastName ?></h2>

            <div class="profile__wrap">
                <p class="profile__views">15 просмотров</p>
                <p class="profile__age">26 лет</p>
                <p class="profile__location">
                    Москва
                </p>
            </div>



            <?php if(count($itemsFeedback)>0): ?>

            <h3 class="profile__review-header">
                Отзывы
                <i class="icon-thumbs-up-alt"></i>
                <span class="profile__like">5</span>
                <i class="icon-thumbs-down-alt"></i>
                <span class="profile__dislike">0</span>
            </h3>

            <?php foreach ($itemsFeedback as $feedback): ?>
                <section class="profile__section">

                    <div class="profile__review-wrapper">
                        <div class="user">
                            <img src="../img/avatar1.jpg" alt="avatar" class="user__avatar">
                            <div class="user__wrap">
                                <a class="user__fname" href="/user?id=<?=$feedback->userId ?>">
                                    <?= $feedback->firstName?>
                                    <span class="user__sname"><?= $feedback->lastName?></span>
                                </a>
                                <p class="user__location">
                                    Москва
                                </p>
                                <p class="user__review">
                                    Отзывы:
                                    <i class="icon-thumbs-up-alt"></i>
                                    <span class="user__like">5</span>
                                    <i class="icon-thumbs-down-alt"></i>
                                    <span class="user__dislike">0</span>
                                </p>
                                <p class="user__role">
                                    Заказчик
                                </p>
                            </div>
                        </div>
<!--                        <div class="profile__review-date">-->
<!--                            11.11.2018-->
<!--                            <span>г.</span>-->
<!--                        </div>-->
                        <div class="profile__review-block">
                            <p class="profile__review-note">
                                Отзыв о выполнении задания
                                &ldquo;<a class="profile__task-name" href="/task/card?id=<?= $feedback->taskId?>"><?= $feedback->name?></a>&rdquo;
                                <i class="icon-thumbs-up-alt"></i>
                            </p>
                            <p class="profile__comment">
                                <?= $feedback->comment?>
                            </p>
                        </div>
                    </div>

                </section>
            <?php endforeach; ?>

            <?php else: ?>

                <h3 class="profile__review-header">
                  Отзывов от заказчиков еще не поступало
                </h3>

            <?php endif; ?>



        </div>  <!--profile__left end-->

        <div class="profile__right">

        </div>  <!--profile__right end-->

    </div>

</div>  <!--profile-block end-->
</div>  <!--container end-->
<!--Профиль пользователя end-->