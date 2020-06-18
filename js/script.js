$(document).ready(function () {
    $('.menu-toggle').on('click', function () {
        $(this).toggleClass('open');
        $('.nav').toggleClass('open');
    });

    $('.nav .nav-link').on('click', function () {
        $('.menu-toggle').removeClass('open');
        $('.nav').removeClass('open');
    });

    $('nav a[href*="#"]').on('click', function () {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 1500);
    });

    $('#up').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 2000);
    });

    AOS.init({
        easing: 'ease',
        duration: 1800,
        once: true
    });
});
