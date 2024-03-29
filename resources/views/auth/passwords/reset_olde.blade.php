<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>كلمة مرور جديدة</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="dist/images/logo.svg">
    <link rel="stylesheet" href="dist/styles/main.min.css">
    <link rel="stylesheet" href="dist/styles/main_ar.css">
    <link rel="stylesheet" href="dist/styles/developer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="mobadarate/css/bootstrap.min.css">
    <link rel="stylesheet" href="mobadarate/css/nprogress.css">
    <link rel="stylesheet" href="mobadarate/css/style.css">
    <link rel="stylesheet" href="dist/styles/main_ar.css">
    <!--css style  -->
    <style type="text/css">
        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            font-size: 16px;
        }

        .container {
            max-width: 80%;
        }

        .loader-tem {
            width: 250px;
            height: 200px;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
        }

        .loader-tem img {
            width: 100%;
        }

        .loader-tem svg {
            width: 100%;
            height: 100%;
        }

        .pageLoaded .loader {
            opacity: 0;
            visibility: hidden;

        }

        body.bodyLoaded .loader-wrapper {
            opacity: 0;
            pointer-events: none;
        }

        body, h3, h2 {
            font-family: 'El Messiri', sans-serif;

        }

        h3 {
            color: grey;
        }

        p, span, strong, h5 {
            text-align: center;
        }

        body {
            background-image: url('dist/images/pr-video6.jpg');
            background-size: cover;
        }

        body, h3, h2 {
            font-family: 'El Messiri', sans-serif;

        }

        h3 {
            color: grey;
        }

        .container {
            width: 600px;
        }

        p {
            direction: rtl;
        }

        .panel {
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1), 0 0 6px 1px grey;
            border-radius: 30px;
            margin-bottom: 140px;
        }

        #navbar-primary .navbar-nav {
            width: 100%;
            text-align: center;
        }
        > li {
            display: inline-block;
            float: none;
        }
        > a {
            padding-left: 30px;
            padding-right: 30px;
        }

        .nav a {
            padding-top: 100px;
            color: red;
        }

        @media (min-width: 768px) {
            .navbar-nav > li a {
                padding-top: 100px;
                padding-left: 40px;
                padding-right: 40px;
                color: black;
            }
        }

        .navbar {
            background: rgba(0, 0, 0, .8);
            height: 160px;
        }

        #myModal .modal-body {
            border: 0px;

        }

        .modal-backdrop {
            opacity: .5;
        }

        .modal .modal-footer {
            text-align: center;
        }

        .button {
            background: #c4233d;
        }

        .button:hover {
            background: grey;
        }

        .modal-body {
            text-align: center;
        }

        .navbar {
            height: 90px;
        }

        h5 {
            color: white;
        }

        .yamm .mainNav > li > a {
            color: white;

        }

        .navbar-brand {
            padding: 10px 0;
        }

        .image {
            width: 80px;
        }

        .in {
            padding: 20px;
        }

        .form-gap {
            padding-top: 70px;
        }

        @media (min-width: 992px) {
        }

        .col-md-offset-4 {
            margin-right: 15.333333%;
        }

        .navbar {
            padding-top: 10px;
        }

        @media (max-width: 1024px) {
            .navbar-collapse.collapse.in {
                background: grey;
            }
        }

        @media only screen and (min-width: 1023px) {
            header.active {
                background: rgba(0, 0, 0, .8)
            }

            @media (max-width: 1024px) {
                .navbar-collapse.collapse.in {
                    background: grey;
                }
            }
        }

    </style>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90804013-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-90804013-3');
    </script>

</head>
<body>
<!--*************************************** navbar start******************************************************* -->
<header id="header">
    <nav class="navbar navbar-custom mainNavBar fixed" role="navigation">
        <!-- Demo navbar -->
        <div class="yamm">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand">
                        <img alt="arabyouthcenter Logo" src="dist/images/logo.svg">
                    </a>
                </div>
                <div class="menu-bars" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                    <div class="menu-bar "></div>
                    <div class="menu-bar "></div>
                    <div class="menu-bar "></div>
                    <div class="menu-bar "></div>
                </div>
                <div id="navbar-collapse-1" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav mainNav">
                        <!-- Classic dropdown -->
                        <li class="active-main-menu"><a class="scroll" data-href="#main" href="#main">الرئيسية</a></li>
                        <li><a class="scroll" data-href="#vision" href="#vision">من نحن</a></li>
                        <li><a class="scroll" data-href="#specialization" href="#specialization">المبادرات </a></li>
                        <li><a class="scroll" data-href="#news" href="#news">آخر الاخبار</a></li>
                        <li><a class="scroll" data-href="#gallery" href="#gallery">تجارب ملهمة</a></li>
                        <li><a class="scroll" data-href="#contact" href="#contact">تواصل معنا</a></li>
                        <li class=""><a
                                    style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black"
                                    class="" href="index.php">انشاء حساب</a></li>
                        <li class=""><a
                                    style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black"
                                    class="" href="index.php">تقديم تبرع</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--*********************************************** navbar end ******************************************************  -->
<!--********************************************************** بداية محتوى الصفحة *********************************************** -->
<section class="home mt-5 mb-5 " id="" style="margin-top:98px;">
    <div class="container">
        <div class="  row justify-content-center">
            <h2 style="color:white;padding:18px;font-size:40px">كلمة مرور جديدة </h2>
        </div>
    </div>
    <div class="form-gap" style="margin-top:-80px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h1><i class="fas fa-user-alt"></i></h1>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('password.request') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}" id="register-form"
                                           role="form" autocomplete="off" class="form">

                                    <div class="form-group">
                                        <div class="input-group col-md-11">
                                            <input id="password" type="email" name="email"
                                                   value="{{ $email ?? old('email') }}" required autofocus
                                                   placeholder="البريد الإلكتروني "
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group col-md-11">
                                            <input id="password" type="password" name="password" required
                                                   placeholder="كلمة المرور الجديدة "
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group col-md-11">
                                            <input id="password" type="password" name="password_confirmation" required
                                                   placeholder="تأكيد كلمة المرور الجديدة"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-lg  btn-block"
                                               value="اعتماد كلمة المرور الجديدة" type="reset"
                                               style="background: #c4233d;border-radius:20px;" data-toggle="modal"
                                               data-target=".modal" id="myModal" href="#myModal">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--**************************************************************الفوتر الاخير بداية *****************************************-->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019 ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img
                                    src="dist/images/7777.png"
                                    style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED
                        BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--*********************************************** footer end ***************************************  -->
<!--*********************************************** scripts start ************************************  -->
<script src="mobadarate/js/jquery.js"></script>
<script src="mobadarate/js/nprogress.js"></script>
<script src="mobadarate/js/jPages.min.js"></script>
<script src="mobadarate/js/script.js"></script>
<script src="dist/scripts/bundle.min.js?3443612"></script>
<!-- ONLY IN HOME PAGE -->
<!-- <script src="dist/scripts/loader.js"></script> -->
<!-- ONLY IN HOME PAGE -->

<script src="dist/scripts/app.js?3443634"></script>
<!--  <script src="dist/scripts/register-popup.js"></script>-->

<script type="text/javascript" src="dist/scripts/jquery.validate.min.js"></script>
<script src='http://www.google.com/recaptcha/api.js' defer></script>
<!-- home banner-video -->
<script src="dist/scripts/bideo.js"></script>
<script src="dist/scripts/bideo-main.js"></script>
<!-- home banner-video -->
<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBvJs3to9vsiHuarvl0mramcyFV5f7rM6E&language=ar&callback=contactMap"
        async defer></script>

<script type="text/javascript">
    var sliderInit = false,
        partnersliderInit = false,
        specialSlider = false,
        sliderPrior = false,
        init = false,
        specializationCircleImg,
        isPlaying = false;


    (function ($) {
        $.fn.customTabs = function () {
            var _this = $(this);
            var tabs = _this.children('.tab__header[data-child="false"]').children('div');
            var prevIndex = 0;
            $(tabs).on('click', function () {
                var num;
                var _this = $(this);
                var classNameTab = _this.attr('class').split(' ');
                var index = $(this).index() + 1;
                $('.tab__header > div').removeClass('tab__header--active');
                $(this).addClass('tab__header--active');
                $('.tab__content > div').hide();
                $('.tab__content > div').removeClass('tab__content--active');
                //$('.tab__content-'+index).addClass('tab__content--active');
                $('.tab__content-' + index).fadeIn("slow", function () {
                    $('.tab__content-' + index).addClass('tab__content--active');
                });
                $('#galleryImageSlider').slick('unslick');
                $('#galleryVideoSlider').slick('unslick');
                setTimeout(function () {
                    youth.youthSlider('#galleryImageSlider', 2);
                    youth.youthSlider('#galleryVideoSlider', 2);
                    $(window).trigger('resize');
                }, 20);
            });
        }
    })(jQuery);
    $(document).ready(function () {
        /* New updates */
        $(window).on('resize scroll', function () {
            $('.homeSection').each(function () {
                if ($(this).isInViewport()) {
                    $(this).addClass('active_');
                }
            });

        });
        /* New updates */

        // contactMap();

        // projects video
        $(".fancyProject").fancybox({
            afterShow: function () {
                // var vid = document.getElementById("myVideo");
                //  $('.myVideo').play();
                // console.log($('.myVideo').val());
                //  vid.play();
                this.content.find('video').on('ended', function () {
                    //  $.fancybox.next();
                });
            }
        });
        // projects video


        // $('.tab1').multitabs();
        $('.tab1').customTabs();
        // $('.tab1').tabs();

        // var isTouchOrHover = $('html').hasClass('mobile') ? 'click' : 'hover';

        // tab //
        jQuery(".multiTab").champ({
            // plugin_type :  "tab",
            // side : "left",
            // active_tab : "1",
            // controllers : "false"

        });


        $(document).on('click', '.trigger-default', function (event) {
            event.preventDefault();
            $('#modal-default').iziModal('open');
        });

        // var slider = youth.youthSingleSlider('.bannerSlider', 500, 3000 );
        var slider = youth.youthSingleSlider('.bannerSlider', 500, 5000);


        $('.teamSlider').on('init', function (event, slick) {
            $('.teamSlider .slick-cloned').find('.link').attr('rel', '');

        });

        var slider = youth.youthSlider('.teamSlider', 4);
        //  var gallerySlider = youth.youthSlider('#gallerySlider-hq', 2 );
        // var slider = youth.youthSlider('.partnersSlider', 4 );

        var galImage = youth.youthSlider('#galleryImageSlider', 2);
        $('#gallerySlider-hq').slick({
            dots: false,
            infinite: true,
            rtl: $('html').attr('dir') === 'rtl' ? true : false,
            speed: 600,
            nextArrow: '<a class="next  sliderNav"><i class="icon icon-arrow-arrowright"></i></a>',
            prevArrow: '<a class="prev sliderNav"><i class="icon icon-arrow-arrowleft"></i></a>',
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                }
            ]
        });


        var galVideo = youth.youthSlider('#galleryVideoSlider', 2);


        $('.newsSlider').slick({
            dots: false,
            infinite: true,
            rtl: $('html').attr('dir') === 'rtl' ? true : false,
            autoplay: true,
            autoplaySpeed: 4000,
            arrows: true,
            pauseOnHover: true,
            lazyLoad: 'ondemand',
            pauseOnFocus: false,
            // adaptiveHeight: true

            //nextArrow: $('.vissionNext'),
            //prevArrow: $('.vissionPrev'),
            nextArrow: '<a class="next  sliderNav"><i class="icon icon-arrow-arrowright"></i></a>',
            prevArrow: '<a class="prev sliderNav"><i class="icon icon-arrow-arrowleft"></i></a>',
            slidesToShow: 3,
            responsive: [{
                breakpoint: 1024
                , settings: {
                    slidesToShow: 2
                    , slidesToScroll: 3
                    , infinite: true
                    , dots: false
                }
            }, {
                breakpoint: 768
                , settings: {
                    slidesToShow: 1
                    , slidesToScroll: 1
                }
            }, {
                breakpoint: 480
                , settings: {
                    slidesToShow: 1
                    , slidesToScroll: 1
                }
            }
            ]
        });

        $('.projectsSlider').slick({
            dots: false,
            infinite: true,
            rtl: $('html').attr('dir') === 'rtl' ? true : false,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            pauseOnHover: true,
            lazyLoad: 'ondemand',
            pauseOnFocus: false,
            // adaptiveHeight: true

            //nextArrow: $('.vissionNext'),
            //prevArrow: $('.vissionPrev'),
            nextArrow: '<a class="next  sliderNav"><i class="icon icon-arrow-arrowright"></i></a>',
            prevArrow: '<a class="prev sliderNav"><i class="icon icon-arrow-arrowleft"></i></a>',
            slidesToShow: 3,
            responsive: [{
                breakpoint: 1024
                , settings: {
                    slidesToShow: 2
                    , slidesToScroll: 3
                    , infinite: true
                    , dots: false
                }
            }, {
                breakpoint: 768
                , settings: {
                    slidesToShow: 1
                    , slidesToScroll: 1
                }
            }, {
                breakpoint: 480
                , settings: {
                    slidesToShow: 1
                    , slidesToScroll: 1
                }
            }
            ]
        });


        initSlider();
        priorSlider();


        setTimeout(function () {
            $('body').addClass('bodyLoaded');
        }, 600);

        specializationCircleImg = $('.specializationCircle .specializationsMiddle')[0];
        // console.log(specializationCircleImg)
        if ($(window).width() < 768) {

            $('.specializationCircle .specializationsMiddle').remove();
            setTimeout(function () {
                sliderSpecial();
            }, 150);

        } else {
            $(window).enllax();
            var name = "#floatMenu";
            var menuYloc = null;

            menuYloc = parseInt($(name).css("top").substring(0, $(name).css("top").indexOf("px")))
            $(window).scroll(function () {
                offset = menuYloc + $(document).scrollTop() + "px";
                $(name).animate({top: offset}, {duration: 500, queue: false});
            });
        }


    });


    function sliderSpecial() {
        var ww = window.innerWidth;
        var specialClassExist = $('.specializationCircle').hasClass('slick-initialized');
        setTimeout(function () {
            if (specialSlider && ww > 767) {
                $('.specializationCircle').slick('unslick');
                $('.specializationCircle').append(specializationCircleImg);
                specialSlider = false;
            }

            if (!specialSlider && ww < 768 && !specialClassExist) {
                $('.specializationCircle .specializationsMiddle').remove();
                var spSlider = youth.youthSingleSlider('.specializationCircle');

                specialSlider = true;
            }

        }, 100);
    }


    function initSlider() {
        var ww = window.innerWidth;
        var classExist = $('.teamSlider').hasClass('slick-initialized');
        setTimeout(function () {
            if (sliderInit && ww > 767) {
                sliderInit = false;
                $('.teamSlider').slick('unslick');
            }

            if (!sliderInit && ww < 768 && !classExist) {
                sliderInit = true
                var slider = youth.youthSlider('.teamSlider', 4);
            }
        }, 100);

        var partnerclassExist = $('.partnersSlider').hasClass('slick-initialized');

        setTimeout(function () {
            if (partnersliderInit && ww > 767) {
                partnersliderInit = false;
                $('.partnersSlider').slick('unslick');
            }

            if (!partnersliderInit && ww < 768 && !partnerclassExist) {
                partnersliderInit = true
                var slider = youth.youthSlider('.partnersSlider', 4);
            }
        }, 100);
    }


    function priorSlider() {
        var ww = window.innerWidth;
        var classExist = $('.priority-slide').hasClass('slick-initialized');
        setTimeout(function () {
            if (sliderPrior && ww > 767) {
                sliderPrior = false;
                $('.priority-slide').slick('unslick');
            }

            if (!sliderPrior && ww < 768 && !classExist) {
                sliderPrior = true
                var slider = youth.youthSingleSlider('.priority-slide', 500, 5000);
            }
        }, 100);
    }

    $(window).resize(function () {
        initSlider();
        sliderSpecial();
        priorSlider();
    });

</script>

<script>

    $('.numOnly').on('keydown', function (evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        // console.log(charCode)
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    });

    $.validator.addMethod("integer", function (value, element) {
        return this.optional(element) || /^-?\d+$/.test(value);
    }, "Please enter number");
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || !/[~`!\^*+=\[\]\\';,\/{}|\\":<>]/g.test(value);
    }, "Special characters(#,~,` etc.) are not allowed.");

    $.validator.addMethod("myEmail", function (value, element) {
        // return this.optional( element ) || /^\w+$/i.test( value );
        return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
    }, "Please enter a valid email address.");

    $("#phone").keydown(function (e) {
        // console.log(e.which)
        //if the letter is not digit then display error and don't type anything
        if (e.which != 9 && e.which != 37 && e.which != 39 && e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57) && (e.which < 95 || e.which > 105)) {
            return false;
        }
    });

    $('#maincontact').validate({
        rules: {
            "name": {
                required: true,
                alphanumeric: true,
            },
            "phone_number": {
                required: true,
                integer: true,
            },

            "email": {
                required: true,
                // email: true,
                myEmail: true
            },
            "description": {
                required: true,
                alphanumeric: true,
            },


        },


        submitHandler: function (form) {

            var v = grecaptcha.getResponse();

            if (v.length == 0) {
                document.getElementById('captchaEmpty').innerHTML = "Please verify that you are not a robot";
                return false;
            } else {
                $('#responseMessage').html('<div class="alert alert-success">الرجاء الانتظار..</div>')
                $.ajax({
                    url: 'http://arabyouthcenter.org/contact/contact-form.php',
                    type: 'post',
                    async: true,
                    data: {
                        'name': $('#name').val(),
                        'email': $('#email').val(),
                        'phone': $('#phone_number').val(),
                        'message': $('#description').val(),
                        'lang': 'ar',
                        'g-recaptcha-response': grecaptcha.getResponse(),
                        'btnContactFormSubmit': true,
                        'ajax': 'true',
                    },
                    dataType: 'json',
                    statusCode: {
                        302: function () {
                            alert('Forbidden. Access Restricted');
                        },
                        403: function () {
                            alert('Forbidden. Access Restricted', '403');
                        },
                        404: function () {
                            alert('Page not found', '404');
                        },
                        500: function () {
                            alert('Internal Server Error', '500');
                        }
                    }
                }).done(function (responseData) {


                    $('#responseMessage').html(responseData.responseMessage);
                    if (responseData.status == true) {
                        form.reset();
                        grecaptcha.reset();
                        $('#captchaEmpty').hide();

                    }
                }).error(function (jqXHR, textStatus) {
                    t = false;

                });
            }
        },
        messages: {
            "name": {
                required: 'This field is required',
                alphanumeric: 'Invalid Characters',
            },
            "phone_number": {
                required: 'This field is required',
                integer: 'Number only allowed',
                minlength: 'Please enter at least 6 characters',
                alphanumeric: 'Invalid Characters',

            },
            "email": {
                required: 'This field is required',
                myEmail: 'Invallid Email format'
            },
            "description": {
                required: 'This field is required',
                alphanumeric: 'Invalid characters',
            }
        }
    });


</script>


<script type="text/javascript">
    //<![CDATA[
    (function () {
        var _analytics_scr = document.createElement('script');
        _analytics_scr.type = 'text/javascript';
        _analytics_scr.async = true;
        _analytics_scr.src = '/_Incapsula_Resource?SWJIYLWA=719d34d31c8e3a6e6fffd425f7e032f3&ns=1&cb=510479756';
        var _analytics_elem = document.getElementsByTagName('script')[0];
        _analytics_elem.parentNode.insertBefore(_analytics_scr, _analytics_elem);
    })();
    // ]]>
</script>
</body>

</html>
