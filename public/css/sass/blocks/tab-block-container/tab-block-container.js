$(document).ready(function() {

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
});