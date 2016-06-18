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
    signIn();
    signUp();
    showSignInBox();
    showSignUpBox();

    $(document).on( 'scroll', function(){

        if ($(window).scrollTop() > 100) {
            $('.scroll-top-wrapper').addClass('show');
        } else {
            $('.scroll-top-wrapper').removeClass('show');
        }
    });

    $('.scroll-top-wrapper').on('click', scrollToTop);
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
function signIn() {
    var signInForm = $('#signinform');
    var successSignin= $('#success-signin');
    var errorEmail = $('#error-email');
    var errorPassword = $('#error-password');
    var errorSignIn= $('#error-signIn');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (signInForm === null) {
        return;
    }
    signInForm.submit(function (e) {

        var user = $(this).serialize();
        $.ajax({
            url: '/signIn',             // указываем URL и
            dataType: "json",                     // тип загружаемых данных
            data: user,
            type: 'POST',
            success: function (data) { // вешаем свой обработчик на функцию success
                if(data.errors) {
                    if (data.messages.email) {
                        errorEmail.text(data.messages.email);
                        errorEmail.css( "display", "" );  
                    } else {
                        errorEmail.css( "display", "none" );
                    }
                    if (data.messages.password) {
                        errorPassword.text(data.messages.password);
                        errorPassword.css( "display", "" );
                    } else {
                        errorPassword.css( "display", "none" );
                    }
                    if (data.messages.signIn) {
                        errorSignIn.text(data.messages.signIn);
                        errorSignIn.css( "display", "" ); 
                    } else {
                        errorSignIn.css( "display", "none" );
                    }
                    
                } else {
                    errorEmail.hide();
                    errorPassword.hide();
                    errorSignIn.hide();
                    successSignin.text(data.messages.success);
                    successSignin.css( "display", "" );

                }
            }
        });
        e.preventDefault();
    });
}

function signUp() {
    var signUpForm = $('#signupform');
    var errorEmail = $('#error-email');
    var errorPassword = $('#error-password');
    var errorSignUp= $('#error-signUn');
    var errorName= $('#error-name');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (signUpForm === null) {
        return;
    }
    signUpForm.submit(function (e) {

        var user = $(this).serialize();
        $.ajax({
            url: '/signUp',            
            dataType: "json",                    
            data: user,
            type: 'POST',
            success: function (data) { 
                if(data.errors) {
                    errorName.text(data.messages.name);
                    errorEmail.text(data.messages.email);
                    errorPassword.text(data.messages.password);
                    errorSignUp.text(data.messages.signUp);
                } else {
                    errorName.hide();
                    errorEmail.hide();
                    errorPassword.hide();
                    errorSignUp.hide();
                }
            }
        });
        e.preventDefault();
    });
}

function showSignInBox() {
    var signinlink = $('#signinlink');

    if (signinlink === null) {
        return;
    }
    signinlink.on('click', function (e) {
        e.preventDefault();
        $('#signupbox').hide();
        $('#signinbox').show();
    })

}
function showSignUpBox() {
    var signuplink = $('#signuplink');

    if (signuplink === null) {
        return;
    }
    signuplink.on('click', function (e) {
        e.preventDefault();
        $('#signinbox').hide(); 
        $('#signupbox').show();
    })

}
function scrollToTop() {
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $('body');
    offset = element.offset();
    offsetTop = offset.top;
    $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}