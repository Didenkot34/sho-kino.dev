/**
 * Created by didenkot34 on 17.04.16.
 */
$(document).ready(function () {
    centerSlider();
    fadeSlider();
    slider4();
    $('#trailer-description').tab();

    if ( ($(window).height() + 100) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top:100}
        });
    }
});

function centerSlider() {
    if ($('.center-slider') === null) {
        return;
    }
    $('.center-slider').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
}

function fadeSlider() {
    if ($('.fade-slider') === null) {
        return;
    }
    $('.fade-slider').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 5000
    });
}

    function slider4() {
        if ($('.slider4') === null) {
            return;
        }
        $('.slider4').slick();
    }