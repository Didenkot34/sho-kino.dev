/**
 * Created by didenkot34 on 17.04.16.
 */
$(document).ready(function () {
    centerSlider();
    fadeSlider();
    slider4();
    tubs();
    scrollToTop();
    addComment();
    resetComment();
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

function tubs() {
    var trailerDescriptionTabs = $('#trailer-description');
    if ((trailerDescriptionTabs === null)) {
        return;
    }
    trailerDescriptionTabs.tab();
}

function scrollToTop() {
    if (($(window).height() + 100) < $(document).height()) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top: 100}
        });
    }
}

function addComment() {
    var commentForm = $('#form-comment');
    var alert = $('.alert');
    alert.hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (commentForm === null) {
        return;
    }
    commentForm.submit(function (e) {

        var comment = $(this).serialize();
        $.ajax({
            url: '/add-comment',             // указываем URL и
            dataType: "json",                     // тип загружаемых данных
            data: comment,
            type: 'POST',
            success: function (data) { // вешаем свой обработчик на функцию success
                $('input[name = "user_id"]').addClass('hidden');
                $('textarea[name = "comment"]').addClass('hidden');
                $('input[name = "trailer_id"]').addClass('hidden');
                $('button[type = "submit"]').addClass('hidden');
                $('#reset').removeClass('hidden');
                alert.fadeIn("slow").fadeOut(5000);
            }
        });
        e.preventDefault();
    });
}

function resetComment() {
    var resetButton = $("#reset");
    var alert = $('.alert');
    if (resetButton === null) {
        return;
    }
    resetButton.click(function () {
        $('input[name = "user_id"]').removeClass('hidden');
        $('textarea[name = "comment"]').removeClass('hidden').val('');
        $('input[name = "trailer_id"]').removeClass('hidden');
        $('button[type = "submit"]').removeClass('hidden');
        resetButton.addClass('hidden');
    });
}