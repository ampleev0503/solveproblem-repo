<div class="bread-crumbs">
    <a href="/" class="bread-crumbs__link"><i class="icon-left-open-big"></i>На&nbsp;главную</a>
</div>

<div class="application-block">

    <h1 class="title">+ Создать задание</h1>

    <div class="form-wrapper">
        <form action="#" method="post" class="form">

            <p class="form__note">*Все поля обязательны к заполнению</p>

            <div class="form__left-block">
                <label>
                    <select name="category" id="category" class="input select">
                        <option value="" hidden>Категория</option>
                    </select>
                </label>
            </div>
            <div class="form__right-block">
                <label>
                    <select name="subcategory" id="subcategory" class="input select">
                        <option value="" hidden>Подкатегория</option>
                    </select>
                </label>
            </div>

            <input type="text" placeholder="Кратко напишите, что вам нужно сделать..."
                   class="input input--app">
            <p class="form__sample"><span>Пример:</span> <i>Убраться в квартире</i></p>

            <label>
                <textarea name="full-description" id="full-description" class="input input--app input--textarea" cols="30" rows="10" maxlength="2000"></textarea>
            </label>
            <div id="placeholderTextarea" class="form__placeholder-textarea">
                <p>Подробное описание вашей задачи и условий...</p><br>
                <p>*Как можно детальнее опишите задачу и условия выполнения</p><br>
                <p>Пример: <i>Нужно убрать 3-х комнатную квартиру. Помыть полы, окна,
                        почистить мебель от пыли, сложить вещи в полку, вынести мусор и т.д</i></p>
            </div>

            <input type="text" class="input input--price" pattern="^[ 0-9]+$" placeholder="2000" maxlength="9">
            <p class="form__placeholder-price">Цена: </p>
            <i class="icon-rouble form__rouble"></i>

            <div class="form__date-wrapper">
                <p>Приступить с</p>
                <input type="text" placeholder="дд.мм.гггг" class="input input--date input--date-start">
                <i class="icon-calendar icon-calendar__start"></i>
                <p>Закончить к</p>
                <input type="text" placeholder="дд.мм.гггг" class="input input--date input--date-finish">
                <i class="icon-calendar icon-calendar__finish"></i>
            </div>

            <div class="form__download">
                <div class="download">
                    <div class="download__circle">
                        <span class="download__plus">+</span>
                    </div>
                    <p>Добавить фото или перетащите сюда</p>
                </div>
                <div class="download">
                    <div class="download__circle">
                        <span class="download__plus">+</span>
                    </div>
                    <p>Добавить фото или перетащите сюда</p>
                </div>
                <div class="download">
                    <div class="download__circle">
                        <span class="download__plus">+</span>
                    </div>
                    <p>Добавить фото или перетащите сюда</p>
                </div>
                <div class="download">
                    <div class="download__circle">
                        <span class="download__plus">+</span>
                    </div>
                    <p>Добавить фото или перетащите сюда</p>
                </div>
            </div>

            <!-- vvv Этот блок будет отображаться если пользователь не зарегистрирован и не авторизован vvv -->
            <div class="application-block">
                <div class="form__left-block">
                    <input type="text" class="input input--app" name="name"
                           placeholder="Введите имя" autocomplete="off">
                </div>
                <div class="form__right-block">
                    <input type="text" class="input input--sm" name="surname"
                           placeholder="Введите фамилию" autocomplete="off">
                </div>
                <input type="text" name="city" class="input input--application" placeholder="Город">
                <input type="email" name="email" class="input input--application" placeholder="Введите e-mail адрес">
                <input type="text" name="phone" class="input input--application input--app-phone" placeholder="Тел. +7-(000)-000-00-00">
                <span class="form__note-sm form__note-sm-app">Сгенерировать пароль</span>
                <input type="password" name="password" class="input input--application" placeholder="Придумайте пароль" autocomplete="off">
                <input type="password" name="password" class="input input--application" placeholder="Подтвердите пароль" autocomplete="off">
            </div>
            <!-- ^^^ Этот блок будет отображаться если пользователь не зарегистрирован и не авторизован ^^^-->
            <input type="submit" name="button" class="btn btn--default btn--centered btn--submit btn--block" value="Опубликовать">
        </form>
    </div>
    <p class="policy">Нажимая кнопку “Опубликовать”<br>
        Вы автоматически соглашаетсь <br>
        с <a href="#">пользовательским соглашением</a> <br>
        и правилами сервиса <a href="www.SolveProblem.ru">www.SolveProblem.ru</a> <br>
        Так же будет автоматически произведена <br>
        регистрация и создание “Личного кабинета” <br>
        на сервисе # SolveProblem</p>
</div>

</div>