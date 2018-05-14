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

    $('.tab--performer').on('click', function() {
        $('.tab--performer').removeClass('tab--performer-active');
        $(this).addClass('tab--performer-active');
        $('.tab-section--performer').removeClass('tab-section--performer-active').eq($(this).index()).addClass('tab-section--performer-active');
    });

    $('.tab--customer').on('click', function() {
        $('.tab--customer').removeClass('tab--customer-active');
        $(this).addClass('tab--customer-active');
        $('.tab-section--customer').removeClass('tab-section--customer-active').eq($(this).index()).addClass('tab-section--customer-active');
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

    $('.subsection__header .subsection__left').on('click', function() {
        $(this).parent().next('.subsection__content').toggleClass('subsection__content--visible');
        if($(this).find('.icon-down-open-mini').hasClass('icon-down-open-mini')){
            $(this).find('.icon-down-open-mini').removeClass('icon-down-open-mini').addClass('icon-up-open-mini');
        } else {
            $(this).find('.icon-up-open-mini').removeClass('icon-up-open-mini').addClass('icon-down-open-mini');
        }
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