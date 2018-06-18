$(document).ready(function() {

    // Переключение вкладок в личном кабинете пользователя

    $('.orders-btn__left').on('click', function() {
        $('.orders-btn__right').removeClass('orders-btn__active');
        $('.orders-btn__left').addClass('orders-btn__active');
        $('.customer').removeClass('tab-block-container--active');
        $('.performer').addClass('tab-block-container--active');
    });

    $('.orders-btn__right').on('click', function() {
        $('.orders-btn__left').removeClass('orders-btn__active');
        $('.orders-btn__right').addClass('orders-btn__active');
        $('.performer').removeClass('tab-block-container--active');
        $('.customer').addClass('tab-block-container--active');
    });

    $('.my-responses').on('click', function() {

        $('.tab--performer').removeClass('tab--performer-active');
        $(this).addClass('tab--performer-active');
        $('.tab-section--performer').removeClass('tab-section--performer-active').eq($(this).index()).addClass('tab-section--performer-active');

        $('.tab-section--performer-active').empty();

        $.ajax({
            type: 'GET',
            url: '/task/GetTasksInMyResponse',
            dataType: 'json',
            success: function (data) {

                if (data.length > 0){
                    console.log(data);

                    for (var i in data) {

                        var $section = $('<section />', {
                            class: 'subsection'
                        });

                        var $divLeft = $('<div />', {
                            class: 'subsection__left'
                        });

                        var $a = $('<a />', {
                            class: 'services-subsection__title',
                            href: '/task/card?id=' + data[i].id,
                            text: data[i].name
                        });

                        var $img = $('<img />', {
                            class: 'subsection__avatar',
                            src: 'img/avatar1.jpg',
                            alt: 'avatar'
                        });

                        var $divWrap = $('<div />', {
                            class: 'subsection__wrap'
                        });

                        var $pFName = $('<a />', {
                            class: 'subsection__fname',
                            href: '/user?id=' + data[i].userId,
                            text: data[i].firstName
                        });

                        var $sFName = $('<span />', {
                            class: 'subsection__sname',
                            text: ' ' + data[i].lastName
                        });

                        var $pReview = $('<p />', {
                            class: 'subsection__review',
                            text: 'Отзывы: '
                        });

                        var $iUp = $('<i />', {
                            class: 'icon-thumbs-up-alt'
                        });

                        var $sLike = $('<span />', {
                            class: 'subsection__like',
                            text: ' 5 '
                        });

                        var $iDown = $('<i />', {
                            class: 'icon-thumbs-down-alt'
                        });

                        var $sDislike = $('<span />', {
                            class: 'subsection__dislike',
                            text: ' 0'
                        });

                        $a.appendTo($divLeft);
                        $img.appendTo($divLeft);

                        $sFName.appendTo($pFName);

                        $iUp.appendTo($pReview);
                        $sLike.appendTo($pReview);
                        $iDown.appendTo($pReview);
                        $sDislike.appendTo($pReview);

                        $pFName.appendTo($divWrap);
                        $pReview.appendTo($divWrap);

                        $divWrap.appendTo($divLeft);




                        var $divRight = $('<div />', {
                            class: 'subsection__right'
                        });

                        var $pPrice = $('<p />', {
                            class: 'price price--subsection',
                            text: data[i].cost + " "
                        });

                        var $iRouble = $('<i />', {
                            class: 'icon-rouble subsection__icon-rouble'
                        });

                        var $pDate = $('<p />', {
                            class: 'subsection__date'
                        });

                        var $iClock = $('<i />', {
                            class: 'icon-clock'
                        });

                        var $pLoc = $('<p />', {
                            class: 'subsection__location'
                        });

                        var $iLoc = $('<i />', {
                            class: 'icon-location'
                        });

                         $iRouble.appendTo($pPrice);
                         $iClock.appendTo($pDate);


                         var d = new Date(data[i].endDate);
                         var dd = d.getDate();
                         if (dd < 10) dd = '0' + dd;

                         var mm = d.getMonth() + 1;
                         if (mm < 10) mm = '0' + mm;

                         var yy = d.getFullYear() % 100;
                         if (yy < 10) yy = '0' + yy;
                         $pDate.append(" До " + dd + '.' + mm + '.' + yy);


                         $iLoc.appendTo($pLoc);
                         $pLoc.append(" Москва");
                        //$pDate.append($iClock);
                        //$pLoc.append($iLoc);

                        $pPrice.appendTo($divRight);
                        $pDate.appendTo($divRight);
                        $pLoc.appendTo($divRight);

                        $divLeft.appendTo($section);
                        $divRight.appendTo($section);

                       $section.appendTo($('.tab-section--performer-active'));


                    }
                } else {

                    var $sectionNull = $('<section />', {
                        class: 'tab-section__subsection'
                    });

                    var $h2Content = $('<h2 />', {
                        class: 'tab-section__content',
                        text: 'Вы еще не сделали ни одного предложения'
                    });

                    var $aNote = $('<a />', {
                        class: 'tab-section__note',
                        href: '/task/all',
                        text: "Перейти к заданиям"
                    });

                    $h2Content.appendTo($sectionNull);
                    $aNote.appendTo($sectionNull);
                    $sectionNull.appendTo($('.tab-section--performer-active'));


                }


            }
        });


    });

    $('.in-process').on('click', function() {

        $('.tab--performer').removeClass('tab--performer-active');
        $(this).addClass('tab--performer-active');
        $('.tab-section--performer').removeClass('tab-section--performer-active').eq($(this).index()).addClass('tab-section--performer-active');

        $('.tab-section--performer-active').empty();

        $.ajax({
            type: 'GET',
            url: '/task/GetTasksInProgress',
            dataType: 'json',
            success: function (data) {

                if (data.length > 0){
                    console.log(data);

                    for (var i in data) {

                        var $section = $('<section />', {
                            class: 'subsection'
                        });

                        var $divLeft = $('<div />', {
                            class: 'subsection__left'
                        });

                        var $a = $('<a />', {
                            class: 'services-subsection__title',
                            href: '/task/card?id=' + data[i].id,
                            text: data[i].name
                        });

                        var $img = $('<img />', {
                            class: 'subsection__avatar',
                            src: 'img/avatar1.jpg',
                            alt: 'avatar'
                        });

                        var $divWrap = $('<div />', {
                            class: 'subsection__wrap'
                        });

                        var $pFName = $('<a />', {
                            class: 'subsection__fname',
                            href: '/user?id=' + data[i].userId,
                            text: data[i].firstName
                        });

                        var $sFName = $('<span />', {
                            class: 'subsection__sname',
                            text: ' ' + data[i].lastName
                        });

                        var $pReview = $('<p />', {
                            class: 'subsection__review',
                            text: 'Отзывы: '
                        });

                        var $iUp = $('<i />', {
                            class: 'icon-thumbs-up-alt'
                        });

                        var $sLike = $('<span />', {
                            class: 'subsection__like',
                            text: ' 5 '
                        });

                        var $iDown = $('<i />', {
                            class: 'icon-thumbs-down-alt'
                        });

                        var $sDislike = $('<span />', {
                            class: 'subsection__dislike',
                            text: ' 0'
                        });

                        $a.appendTo($divLeft);
                        $img.appendTo($divLeft);

                        $sFName.appendTo($pFName);

                        $iUp.appendTo($pReview);
                        $sLike.appendTo($pReview);
                        $iDown.appendTo($pReview);
                        $sDislike.appendTo($pReview);

                        $pFName.appendTo($divWrap);
                        $pReview.appendTo($divWrap);

                        $divWrap.appendTo($divLeft);




                        var $divRight = $('<div />', {
                            class: 'subsection__right'
                        });

                        var $pPrice = $('<p />', {
                            class: 'price price--subsection',
                            text: data[i].cost + " "
                        });

                        var $iRouble = $('<i />', {
                            class: 'icon-rouble subsection__icon-rouble'
                        });

                        var $pDate = $('<p />', {
                            class: 'subsection__date'
                        });

                        var $iClock = $('<i />', {
                            class: 'icon-clock'
                        });

                        var $pLoc = $('<p />', {
                            class: 'subsection__location'
                        });

                        var $iLoc = $('<i />', {
                            class: 'icon-location'
                        });

                        $iRouble.appendTo($pPrice);
                        $iClock.appendTo($pDate);

                        var d = new Date(data[i].endDate);
                        var dd = d.getDate();
                        if (dd < 10) dd = '0' + dd;

                        var mm = d.getMonth() + 1;
                        if (mm < 10) mm = '0' + mm;

                        var yy = d.getFullYear() % 100;
                        if (yy < 10) yy = '0' + yy;
                        $pDate.append(" До " + dd + '.' + mm + '.' + yy);

                        $iLoc.appendTo($pLoc);
                        $pLoc.append(" Москва");
                        //$pDate.append($iClock);
                        //$pLoc.append($iLoc);

                        $pPrice.appendTo($divRight);
                        $pDate.appendTo($divRight);
                        $pLoc.appendTo($divRight);

                        $divLeft.appendTo($section);
                        $divRight.appendTo($section);

                        $section.appendTo($('.tab-section--performer-active'));


                    }
                } else {

                    var $sectionNull = $('<section />', {
                        class: 'tab-section__subsection'
                    });

                    var $h2Content = $('<h2 />', {
                        class: 'tab-section__content',
                        text: 'Вы еще не были назначены исполнителем'
                    });

                    var $imgFace = $('<img />', {
                        src: '../img/face.svg',
                        class: 'tab-section__face',
                        alt: "face"
                    });

                    $h2Content.appendTo($sectionNull);
                    $imgFace.appendTo($sectionNull);
                    $sectionNull.appendTo($('.tab-section--performer-active'));


                }


            }
        });


    });

    $('.maded').on('click', function() {

        $('.tab--performer').removeClass('tab--performer-active');
        $(this).addClass('tab--performer-active');
        $('.tab-section--performer').removeClass('tab-section--performer-active').eq($(this).index()).addClass('tab-section--performer-active');

        $('.tab-section--performer-active').empty();

        $.ajax({
            type: 'GET',
            url: '/task/GetTasksMaded',
            dataType: 'json',
            success: function (data) {

                if (data.length > 0){
                    console.log(data);

                    for (var i in data) {

                        var $section = $('<section />', {
                            class: 'subsection'
                        });

                        var $divLeft = $('<div />', {
                            class: 'subsection__left'
                        });

                        var $a = $('<a />', {
                            class: 'services-subsection__title',
                            href: '/task/card?id=' + data[i].id,
                            text: data[i].name
                        });

                        var $img = $('<img />', {
                            class: 'subsection__avatar',
                            src: 'img/avatar1.jpg',
                            alt: 'avatar'
                        });

                        var $divWrap = $('<div />', {
                            class: 'subsection__wrap'
                        });

                        var $pFName = $('<a />', {
                            class: 'subsection__fname',
                            href: '/user?id=' + data[i].userId,
                            text: data[i].firstName
                        });

                        var $sFName = $('<span />', {
                            class: 'subsection__sname',
                            text: ' ' + data[i].lastName
                        });

                        var $pReview = $('<p />', {
                            class: 'subsection__review',
                            text: 'Отзывы: '
                        });

                        var $iUp = $('<i />', {
                            class: 'icon-thumbs-up-alt'
                        });

                        var $sLike = $('<span />', {
                            class: 'subsection__like',
                            text: ' 5 '
                        });

                        var $iDown = $('<i />', {
                            class: 'icon-thumbs-down-alt'
                        });

                        var $sDislike = $('<span />', {
                            class: 'subsection__dislike',
                            text: ' 0'
                        });

                        $a.appendTo($divLeft);
                        $img.appendTo($divLeft);

                        $sFName.appendTo($pFName);

                        $iUp.appendTo($pReview);
                        $sLike.appendTo($pReview);
                        $iDown.appendTo($pReview);
                        $sDislike.appendTo($pReview);

                        $pFName.appendTo($divWrap);
                        $pReview.appendTo($divWrap);

                        $divWrap.appendTo($divLeft);




                        var $divRight = $('<div />', {
                            class: 'subsection__right'
                        });

                        var $pPrice = $('<p />', {
                            class: 'price price--subsection',
                            text: data[i].cost + " "
                        });

                        var $iRouble = $('<i />', {
                            class: 'icon-rouble subsection__icon-rouble'
                        });

                        var $pDate = $('<p />', {
                            class: 'subsection__date'
                        });

                        var $iClock = $('<i />', {
                            class: 'icon-clock'
                        });

                        var $pLoc = $('<p />', {
                            class: 'subsection__location'
                        });

                        var $iLoc = $('<i />', {
                            class: 'icon-location'
                        });

                        $iRouble.appendTo($pPrice);
                        $iClock.appendTo($pDate);

                        var d = new Date(data[i].endDate);
                        var dd = d.getDate();
                        if (dd < 10) dd = '0' + dd;

                        var mm = d.getMonth() + 1;
                        if (mm < 10) mm = '0' + mm;

                        var yy = d.getFullYear() % 100;
                        if (yy < 10) yy = '0' + yy;
                        $pDate.append(" До " + dd + '.' + mm + '.' + yy);

                        $iLoc.appendTo($pLoc);
                        $pLoc.append(" Москва");
                        //$pDate.append($iClock);
                        //$pLoc.append($iLoc);

                        $pPrice.appendTo($divRight);
                        $pDate.appendTo($divRight);
                        $pLoc.appendTo($divRight);

                        $divLeft.appendTo($section);
                        $divRight.appendTo($section);

                        $section.appendTo($('.tab-section--performer-active'));


                    }
                } else {

                    var $sectionNull = $('<section />', {
                        class: 'tab-section__subsection'
                    });

                    var $h2Content = $('<h2 />', {
                        class: 'tab-section__content',
                        text: 'У вас еще нет выполненных задач'
                    });

                    var $imgFace = $('<img />', {
                        src: '../img/face.svg',
                        class: 'tab-section__face',
                        alt: "face"
                    });

                    $h2Content.appendTo($sectionNull);
                    $imgFace.appendTo($sectionNull);
                    $sectionNull.appendTo($('.tab-section--performer-active'));


                }


            }
        });


    });

    $('.customer-tasks').on('click', function() {
        $('.tab--customer').removeClass('tab--customer-active');
        $(this).addClass('tab--customer-active');
        $('.tab-section--customer').removeClass('tab-section--customer-active').eq($(this).index()).addClass('tab-section--customer-active');

        $('.tab-section--customer-active').empty();



        $.ajax({
            type: 'GET',
            url: '/task/GetTasksByCustomer',
            dataType: 'json',
            success: function (data) {

                console.log(data);

                if (data.length > 0){
                    console.log(data);

                    var $aLink = $('<a />', {
                        class: 'tab-section__link',
                        href: '/task/create',
                        text: '+ Создать новое задание'
                    });

                $aLink.appendTo($('.tab-section--customer-active'));

                    for (var i in data) {

                        var $section = $('<section />', {
                            class: 'subsection subsection--accordion'
                        });

                        var $divHeader = $('<div />', {
                            class: 'subsection__header',
                            'data-id': i
                        });

                        var $divLeft = $('<div />', {
                            class: 'subsection__left',
                            'data-id': i
                        });

                        var $h2Acc = $('<h2 />', {
                            class: 'subsection__title subsection__title--accordion'
                        });

                        var $iMini = $('<i />', {
                            class: 'icon-down-open-mini'
                        });

                        $iMini.appendTo($h2Acc);
                        $h2Acc.append(" " + data[i].name);

                        var $divEdit = $('<div />', {
                            class: 'subsection__edit'
                        });

                        var $iPencil = $('<i />', {
                            class: 'icon-pencil'
                        });

                        var $divRight = $('<div />', {
                            class: 'subsection__right'
                        });

                        var $pPrice = $('<p />', {
                            class: 'price price--subsection',
                            text: data[i].cost + " "
                        });

                        var $iR = $('<i />', {
                            class: 'icon-rouble subsection__icon-rouble'
                        });

                        $iR.appendTo($pPrice);
                        $pPrice.appendTo($divRight);

                        $iPencil.appendTo($divEdit);

                        $h2Acc.appendTo($divLeft);
                        $divEdit.appendTo($divLeft);

                        $divLeft.appendTo($divHeader);
                        $divRight.appendTo($divHeader);

                        var $divCon = $('<div />', {
                            class: 'subsection__content'
                        });

                        var $pDesc = $('<p />', {
                            class: 'subsection__description',
                            text: data[i].description
                        });





                        var $pStart = $('<p />', {
                            class: 'subsection__start-date'
                        });
                        var d = new Date(data[i].startDate);
                        var dd = d.getDate();
                        if (dd < 10) dd = '0' + dd;

                        var mm = d.getMonth() + 1;
                        if (mm < 10) mm = '0' + mm;

                        var yy = d.getFullYear() % 100;
                        if (yy < 10) yy = '0' + yy;
                        $pStart.append(" Начать: " + dd + '.' + mm + '.' + yy);





                        var $pEnd = $('<p />', {
                            class: 'subsection__finish-date',
                        });
                        var d = new Date(data[i].endDate);
                        var dd = d.getDate();
                        if (dd < 10) dd = '0' + dd;

                        var mm = d.getMonth() + 1;
                        if (mm < 10) mm = '0' + mm;

                        var yy = d.getFullYear() % 100;
                        if (yy < 10) yy = '0' + yy;
                        $pEnd.append(" Закончить: " + dd + '.' + mm + '.' + yy);





                        var $divAdd = $('<div />', {
                            class: 'subsection__address'
                        });

                        var $iLoc = $('<i />', {
                            class: 'icon-location'
                        });

                        var $span = $('<span />', {
                            text: 'Москва'
                        });

                        $pDesc.appendTo($divCon);
                        $pStart.appendTo($divCon);
                        $pEnd.appendTo($divCon);

                        $iLoc.appendTo($divAdd);
                        $span.appendTo($divAdd);

                        $divAdd.appendTo($divCon);

                        $divHeader.appendTo($section);
                        $divCon.appendTo($section);

                        $section.appendTo($('.tab-section--customer-active'));



                    }
                } else {

                    var $sectionNull = $('<section />', {
                        class: 'tab-section__subsection'
                    });

                    var $h2Content = $('<h2 />', {
                        class: 'tab-section__content',
                        text: 'Вы еще не создали ни одного задания'
                    });

                    var $aNote = $('<a />', {
                        class: 'tab-section__note',
                        href: '/task/create',
                        text: "Создать задание"
                    });

                    $h2Content.appendTo($sectionNull);
                    $aNote.appendTo($sectionNull);
                    $sectionNull.appendTo($('.tab-section--customer-active'));


                }


            }
        });


    });

    function ajaxGetOffers() {

        $.ajax({
            type: 'GET',
            url: '/task/GetOffers',
            dataType: 'json',
            success: function (data) {

                console.log(data);

                if (data.length > 0){
                    console.log(data);

                    for (var i in data) {

                        var $section = $('<section />', {
                            class: 'subsection subsection--accordion'
                        });




                        var $divHeader = $('<div />', {
                            class: 'subsection__header',
                            'data-id': i
                        });




                        var $divLeft = $('<div />', {
                            class: 'subsection__left',
                            'data-id': i
                        });

                        var $h2Acc = $('<h2 />', {
                            class: 'subsection__title subsection__title--accordion'
                        });

                        var $iMini = $('<i />', {
                            class: 'icon-down-open-mini'
                        });

                        $iMini.appendTo($h2Acc);
                        $h2Acc.append(" " + data[i].name);
                        $h2Acc.appendTo($divLeft);

                        var $div = $('<div />', {
                        });

                        var $img = $('<img />', {
                            class: 'subsection__avatar subsection__avatar--accordion',
                            src: 'img/avatar2.jpg',
                            alt: 'avatar'
                        });
                        $img.appendTo($div);


                        var $divWrap = $('<div />', {
                            class: 'subsection__wrap'
                        });

                        var $pFName = $('<a />', {
                            class: 'subsection__fname',
                            href: '/user?id=' + data[i].petexeId,
                            text: data[i].firstName
                        });

                        var $sFName = $('<span />', {
                            class: 'subsection__sname',
                            text: ' ' + data[i].lastName
                        });

                        var $pReview = $('<p />', {
                            class: 'subsection__review',
                            text: 'Отзывы: '
                        });

                        var $iUp = $('<i />', {
                            class: 'icon-thumbs-up-alt'
                        });

                        var $sLike = $('<span />', {
                            class: 'subsection__like',
                            text: ' 5 '
                        });

                        var $iDown = $('<i />', {
                            class: 'icon-thumbs-down-alt'
                        });

                        var $sDislike = $('<span />', {
                            class: 'subsection__dislike',
                            text: ' 0'
                        });

                        $sFName.appendTo($pFName);

                        $iUp.appendTo($pReview);
                        $sLike.appendTo($pReview);
                        $iDown.appendTo($pReview);
                        $sDislike.appendTo($pReview);

                        $pFName.appendTo($divWrap);
                        $pReview.appendTo($divWrap);

                        $divWrap.appendTo($div);

                        $div.appendTo($divLeft);
                        $divLeft.appendTo($divHeader);




                        var $divRight = $('<div />', {
                            class: 'subsection__right'
                        });

                        if(data[i].statusId == 1) {
                            var $pBtn = $('<p />', {
                                class: 'subsection__btn-select btn-do-as-executor',
                                text: 'Назначить исполнителем',
                                'data-id': data[i].id,
                                'data-executorId': data[i].petexeId
                            });

                            var $pNote = $('<p />', {
                                class: 'subsection__note'
                            });

                            $pBtn.appendTo($divRight);
                            $pNote.appendTo($divRight);
                        } else if(data[i].statusId != 1 && data[i].texeId == data[i].petexeId){
                            var $pS = $('<p />', {
                                class: 'subsection__btn-select subsection__btn-select--active',
                                text: 'Исполнитель'
                            });

                            var $pNote = $('<p />', {
                                class: 'subsection__note'
                            });

                            $pS.appendTo($divRight);
                            $pNote.appendTo($divRight);
                        }

                        $divRight.appendTo($divHeader);


                        $divHeader.appendTo($section);








                        var $divCon = $('<div />', {
                            class: 'subsection__content'
                        });

                        var $pDesc = $('<p />', {
                            class: 'subsection__description',
                            text: 'Привет. Могу выполнить это задание.'
                        });

                        var $pPhone = $('<p />', {
                            class: 'subsection__phone',
                        });
                        $pPhone.append("Контакты: " + "<span>" + data[i].telephone + "</span>");

                        $pDesc.appendTo($divCon);
                        $pPhone.appendTo($divCon);

                        $divCon.appendTo($section);




                        $section.appendTo($('.tab-section--customer-active'));



                    }
                } else {

                    var $sectionNull = $('<section />', {
                        class: 'tab-section__subsection'
                    });

                    var $h2Content = $('<h2 />', {
                        class: 'tab-section__content',
                        text: 'Предложений от исполнителей еще не поступало'
                    });

                    var $imgFace = $('<img />', {
                        src: '../img/face.svg',
                        class: 'tab-section__face',
                        alt: "face"
                    });

                    $h2Content.appendTo($sectionNull);
                    $imgFace.appendTo($sectionNull);
                    $sectionNull.appendTo($('.tab-section--customer-active'));


                }


            }
        });

    }

    $('.suggestions-tasks').on('click', function() {
        $('.tab--customer').removeClass('tab--customer-active');
        $(this).addClass('tab--customer-active');
        $('.tab-section--customer').removeClass('tab-section--customer-active').eq($(this).index()).addClass('tab-section--customer-active');

        $('.tab-section--customer-active').empty();


        ajaxGetOffers();


    });

    function ajaxGetTasksInProcess() {
        $.ajax({
            type: 'GET',
            url: '/task/GetTasksInProcess',
            dataType: 'json',
            success: function (data) {

                console.log(data);

                if (data.length > 0){
                    console.log(data);

                    for (var i in data) {

                        var $section = $('<section />', {
                            class: 'subsection subsection--accordion'
                        });




                        var $divHeader = $('<div />', {
                            class: 'subsection__header',
                            'data-id': i
                        });




                        var $divLeft = $('<div />', {
                            class: 'subsection__left',
                            'data-id': i
                        });

                        var $h2Acc = $('<h2 />', {
                            class: 'subsection__title subsection__title--accordion'
                        });

                        var $iMini = $('<i />', {
                            class: 'icon-down-open-mini'
                        });

                        $iMini.appendTo($h2Acc);
                        $h2Acc.append(" " + data[i].name);
                        $h2Acc.appendTo($divLeft);

                        var $div = $('<div />', {
                        });

                        var $img = $('<img />', {
                            class: 'subsection__avatar subsection__avatar--accordion',
                            src: 'img/avatar2.jpg',
                            alt: 'avatar'
                        });
                        $img.appendTo($div);


                        var $divWrap = $('<div />', {
                            class: 'subsection__wrap'
                        });

                        var $pFName = $('<a />', {
                            class: 'subsection__fname',
                            href: '/user?id=' + data[i].userId,
                            text: data[i].firstName
                        });

                        var $sFName = $('<span />', {
                            class: 'subsection__sname',
                            text: ' ' + data[i].lastName
                        });

                        var $pReview = $('<p />', {
                            class: 'subsection__review',
                            text: 'Отзывы: '
                        });

                        var $iUp = $('<i />', {
                            class: 'icon-thumbs-up-alt'
                        });

                        var $sLike = $('<span />', {
                            class: 'subsection__like',
                            text: ' 5 '
                        });

                        var $iDown = $('<i />', {
                            class: 'icon-thumbs-down-alt'
                        });

                        var $sDislike = $('<span />', {
                            class: 'subsection__dislike',
                            text: ' 0'
                        });

                        $sFName.appendTo($pFName);

                        $iUp.appendTo($pReview);
                        $sLike.appendTo($pReview);
                        $iDown.appendTo($pReview);
                        $sDislike.appendTo($pReview);

                        $pFName.appendTo($divWrap);
                        $pReview.appendTo($divWrap);

                        $divWrap.appendTo($div);

                        $div.appendTo($divLeft);
                        $divLeft.appendTo($divHeader);




                        var $divRight = $('<div />', {
                            class: 'subsection__right'
                        });


                        var $pTop = $('<p />', {
                            class: 'subsection__btn-select subsection__btn-select--top change-executor',
                            text: 'Снять исполнителя',
                            'data-id': data[i].id
                        });

                        var $pBottom = $('<p />', {
                            class: 'subsection__btn-select subsection__btn-select--bottom btn-finish-task',
                            text: 'Завершить',
                            'data-id': data[i].id
                        });

                        $pTop.appendTo($divRight);
                        $pBottom.appendTo($divRight);


                        $divRight.appendTo($divHeader);


                        $divHeader.appendTo($section);








                        var $divCon = $('<div />', {
                            class: 'subsection__content'
                        });

                        var $pDesc = $('<p />', {
                            class: 'subsection__description',
                            text: 'Привет. Могу выполнить это задание.'
                        });

                        var $pPhone = $('<p />', {
                            class: 'subsection__phone',
                        });
                        $pPhone.append("Контакты: " + "<span>" + data[i].telephone + "</span>");

                        $pDesc.appendTo($divCon);
                        $pPhone.appendTo($divCon);

                        $divCon.appendTo($section);




                        $section.appendTo($('.tab-section--customer-active'));



                    }
                } else {

                    var $sectionNull = $('<section />', {
                        class: 'tab-section__subsection'
                    });

                    var $h2Content = $('<h2 />', {
                        class: 'tab-section__content',
                        text: 'У вас еще нет задач в процессе'
                    });

                    var $imgFace = $('<img />', {
                        src: '../img/face.svg',
                        class: 'tab-section__face',
                        alt: "face"
                    });

                    $h2Content.appendTo($sectionNull);
                    $imgFace.appendTo($sectionNull);
                    $sectionNull.appendTo($('.tab-section--customer-active'));


                }


            }
        });
    }

    $('.in-process-tasks').on('click', function() {
        $('.tab--customer').removeClass('tab--customer-active');
        $(this).addClass('tab--customer-active');
        $('.tab-section--customer').removeClass('tab-section--customer-active').eq($(this).index()).addClass('tab-section--customer-active');

        $('.tab-section--customer-active').empty();

        ajaxGetTasksInProcess();
    });

    $('.maded-tasks').on('click', function() {
        $('.tab--customer').removeClass('tab--customer-active');
        $(this).addClass('tab--customer-active');
        $('.tab-section--customer').removeClass('tab-section--customer-active').eq($(this).index()).addClass('tab-section--customer-active');

        $('.tab-section--customer-active').empty();



        $.ajax({
            type: 'GET',
            url: '/task/GetTasksByCustomerMaded',
            dataType: 'json',
            success: function (data) {

                console.log(data);

                if (data.length > 0){
                    console.log(data);

                    for (var i in data) {

                        var $section = $('<section />', {
                            class: 'subsection subsection--accordion'
                        });

                        var $divHeader = $('<div />', {
                            class: 'subsection__header',
                            'data-id': i
                        });

                        var $divLeft = $('<div />', {
                            class: 'subsection__left',
                            'data-id': i
                        });

                        var $h2Acc = $('<h2 />', {
                            class: 'subsection__title subsection__title--accordion'
                        });

                        var $iMini = $('<i />', {
                            class: 'icon-down-open-mini'
                        });

                        $iMini.appendTo($h2Acc);
                        $h2Acc.append(" " + data[i].name);


                        var $divRight = $('<div />', {
                            class: 'subsection__right'
                        });

                        var $imgF = $('<img />', {
                            class: 'subsection__finish',
                            src: '../img/ok.png',
                            alt: 'ok image'
                        });

                        $imgF.appendTo($divRight);

                        $h2Acc.appendTo($divLeft);


                        $divLeft.appendTo($divHeader);
                        $divRight.appendTo($divHeader);




                        var $divCon = $('<div />', {
                            class: 'subsection__content'
                        });


                        var $divConLeft = $('<div />', {
                            class: 'subsection__content-left'
                        });



                        var $pDesc = $('<p />', {
                            class: 'subsection__description',
                            text: data[i].description
                        });

                        var $pStart = $('<p />', {
                            class: 'subsection__start-date'
                        });
                        var d = new Date(data[i].startDate);
                        var dd = d.getDate();
                        if (dd < 10) dd = '0' + dd;

                        var mm = d.getMonth() + 1;
                        if (mm < 10) mm = '0' + mm;

                        var yy = d.getFullYear() % 100;
                        if (yy < 10) yy = '0' + yy;
                        $pStart.append(" Начать: " + dd + '.' + mm + '.' + yy);





                        var $pEnd = $('<p />', {
                            class: 'subsection__finish-date',
                        });
                        var d = new Date(data[i].endDate);
                        var dd = d.getDate();
                        if (dd < 10) dd = '0' + dd;

                        var mm = d.getMonth() + 1;
                        if (mm < 10) mm = '0' + mm;

                        var yy = d.getFullYear() % 100;
                        if (yy < 10) yy = '0' + yy;
                        $pEnd.append(" Закончить: " + dd + '.' + mm + '.' + yy);





                        var $divAdd = $('<div />', {
                            class: 'subsection__address'
                        });

                        var $iLoc = $('<i />', {
                            class: 'icon-location'
                        });

                        var $span = $('<span />', {
                            text: 'Москва'
                        });

                        $pDesc.appendTo($divConLeft);
                        $pStart.appendTo($divConLeft);
                        $pEnd.appendTo($divConLeft);

                        $iLoc.appendTo($divAdd);
                        $span.appendTo($divAdd);

                        $divAdd.appendTo($divConLeft);

                        var $divConRight = $('<div />', {
                            class: 'subsection__content-right'
                        });

                        var $imgAva = $('<img />', {
                            class: 'subsection__avatar-right',
                            src: '../img/avatar2.jpg',
                            alt: 'avatar'
                        });
                        $imgAva.appendTo($divConRight);

                        var $pPer = $('<p />', {
                            class: 'subsection__performer',
                            text: 'Исполнитель'
                        });
                        $pPer.appendTo($divConRight);

                        var $pFName = $('<a />', {
                            class: 'subsection__performer-name',
                            href: '/user?id=' + data[i].userId,
                            text: data[i].firstName
                        });

                        var $sFName = $('<span />', {
                            text: ' ' + data[i].lastName
                        });

                        var $pReview = $('<p />', {
                            class: 'subsection__performer-review',
                            text: 'Отзывы: '
                        });

                        var $iUp = $('<i />', {
                            class: 'icon-thumbs-up-alt'
                        });

                        var $sLike = $('<span />', {
                            class: 'subsection__like',
                            text: ' 5 '
                        });

                        var $iDown = $('<i />', {
                            class: 'icon-thumbs-down-alt'
                        });

                        var $sDislike = $('<span />', {
                            class: 'subsection__dislike',
                            text: ' 0'
                        });

                        var $pWriteReview = $('<a />', {
                            class: 'subsection__write-review',
                            href: '/cabinet/review?id=' + data[i].id,
                            text: 'Написать отзыв'
                        });

                        $sFName.appendTo($pFName);
                        $pFName.appendTo($divConRight);

                        $iUp.appendTo($pReview);
                        $sLike.appendTo($pReview);
                        $iDown.appendTo($pReview);
                        $sDislike.appendTo($pReview);
                        $pReview.appendTo($divConRight);

                        $pWriteReview.appendTo($divConRight);



                        $divHeader.appendTo($section);

                        $divConLeft.appendTo($divCon);
                        $divConRight.appendTo($divCon);

                        $divCon.appendTo($section);

                        $section.appendTo($('.tab-section--customer-active'));



                    }
                } else {

                    var $sectionNull = $('<section />', {
                        class: 'tab-section__subsection'
                    });

                    var $h2Content = $('<h2 />', {
                        class: 'tab-section__content',
                        text: 'У вас еще нет завершенных задач'
                    });

                    var $imgFace = $('<img />', {
                        src: '../img/face.svg',
                        class: 'tab-section__face',
                        alt: "face"
                    });

                    $h2Content.appendTo($sectionNull);
                    $imgFace.appendTo($sectionNull);
                    $sectionNull.appendTo($('.tab-section--customer-active'));


                }


            }
        });


    });

    // Выпадающее меню пользователя

    $('.dropdown-toggle').on('click', function(event) {
        $('.dropdown').toggle();
        event.stopPropagation();
    });

    $(document).click(function(){
        $(".dropdown").hide();
    });

    // Эффект тени поля ввода на главной странице

    $('.banner__input').on('click', function() {
        $('.banner__form').addClass('banner__input--focused');
    }).on('blur', function() {
        $('.banner__form').removeClass('banner__input--focused');
    });

    // Аккордион

    $('.tab-section--customer').on('click', '.subsection__header .subsection__left h2', function() {
        console.log($(this));
        $(this).parent().parent().next('.subsection__content').toggleClass('subsection__content--visible');
        if($(this).find('.icon-down-open-mini').hasClass('icon-down-open-mini')){
            $(this).find('.icon-down-open-mini').removeClass('icon-down-open-mini').addClass('icon-up-open-mini');
        } else {
            $(this).find('.icon-up-open-mini').removeClass('icon-up-open-mini').addClass('icon-down-open-mini');
        }
    });



    // кнопка стать исполнителем
    $('.tab-section--customer').on('click', '.btn-do-as-executor', function() {
        console.log($(this));

        var $id = $(this).attr("data-id");
        var $executorId = $(this).attr("data-executorid");
        $.ajax({
            type: 'POST',
            url: "/cabinet/DoAsExecutor/",
            data: {submit: true, id: $id, executorId: $executorId},
            success: function (data) {
                console.log(data);
                $('.tab-section--customer-active').empty();
                ajaxGetOffers();
                //location.reload();
            }
        });
    });

    // кнопка завершить
    $('.tab-section--customer').on('click', '.btn-finish-task', function() {
        console.log($(this));

        var $id = $(this).attr("data-id");
        $.ajax({
            type: 'POST',
            url: "/cabinet/FinishTask/",
            data: {submit: true, id: $id},
            success: function (data) {
                console.log(data);
                $('.tab-section--customer-active').empty();
                ajaxGetTasksInProcess();
                //location.reload();
            }
        });
    });

    // кнопка снять исполнителя
    $('.tab-section--customer').on('click', '.change-executor', function() {
        console.log($(this));

        var $id = $(this).attr("data-id");
        $.ajax({
            type: 'POST',
            url: "/cabinet/ChangeExecutor/",
            data: {submit: true, id: $id},
            success: function (data) {
                console.log(data);
                $('.tab-section--customer-active').empty();
                ajaxGetTasksInProcess();
                //location.reload();
            }
        });
    });














    // Textarea placeholder

    $(document).on('input', '#full-description', function () {

        if ($('#full-description').val()) {
            $('#placeholderTextarea').hide();
        } else {
            $('#placeholderTextarea').show();
        }
    });

});