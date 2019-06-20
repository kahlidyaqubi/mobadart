<!doctype html>
<html class="no-js" lang="ar" dir="rtl">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	 <link rel="shortcut icon" href="/Group.ico" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/platform/dist/styles/developer.css">
    <link rel="stylesheet" href="/platform/dist/styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/platform/dist/styles/main.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="/platform/mobadarate/css/bootstrap.min.css">
    <link rel="stylesheet" href="/platform/mobadarate/css/style.css">
    <link rel="stylesheet" href="/platform/dist/styles/main_ar.css">
    <link rel="stylesheet" href="/dooz/sweetalert.css">
    <link rel="stylesheet" href="/dooz/calendar.css">
    <link rel="stylesheet" href="/dooz/custom_2.css">
    <!--style css  -->
    <style type="text/css">
        body,
        h3,
        h2,
        h6,
        p {
            font-family: 'El Messiri', sans-serif;

        }

        h3 {
            color: grey;
        }

        p,
        span,
        strong,
        h5 {
            text-align: center;
        }

        .title {
            padding: 15px;
            font-size: 15px;
        }

        .det {
            padding: 2px;
            text-align: center;
            color: #c4233d;
            margin-top: 20px;
            text-decoration: underline;
        }

        validation {
            padding: 10px;
            height: auto;
            width: 94%;
            margin-right: 10px;
            margin-top: 10px;
            direction: rtl;
            text-align: right;
        }

        .login {
            height: 400px;
        }
        @media (max-width: 670px) {

            .validation {
                width: 280px;
            }
        }

    </style>
    @yield('css')
</head>
<!--****************************************** body start************************************************************ -->

<!-- social media  start (on main div ) -->
<div id="floatMenu" class="socialMediaWrap">
    <ul class="socialButtonWrap">
        <!--facebook  -->
        <li class="fb">
            <a href="https://www.facebook.com/MAANDevelopmentCenter/" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <!-- youtube -->
        <li class="youtube">
            <a href="https://www.youtube.com/user/MAANDevelopment" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
        </li>
    </ul>
</div>
<!--********************************** social media ******************************* -->
<!--********************************** navbar start ******************************* -->
<header id="header">
    <nav class="navbar navbar-custom mainNavBar" role="navigation">
        <!-- Demo navbar -->
        <div class="yamm">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand">
                        <div class="media " style="width:300px;">
                            <img src="/platform/dist/images/logo.svg" alt="..." class="mr-5"
                                 style="width:60px;margin-top: -11px;float:right">
                            <p style="text-align: right;font-size: 19px;margin: 13px 104px 12px 2px">{{\App\Site_sting::find(1)->title_page}}</p>
                            <!-- <p style="margin-top: -10px;font-size: 16px;text-align:right;text-shadow: 0 0 10px white, 0 0 5px white;">مركز العمل التنموي / معا</p> -->
                        </div>
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
                        <li class="active-main-menu"><a class="scroll" data-href="#main" href="/">الرئيسية</a></li>
                        <li><a class="scroll" data-href="#vision" href="#vision">من نحن</a></li>
                        <li><a class="scroll" data-href="#specialization" href="#specialization">المبادرات </a></li>
                        <li><a class="scroll" data-href="#news" href="#news">جميع الأخبار</a></li>
                        <li><a class="scroll" data-href="#gallery" href="#gallery">تجارب ملهمة</a></li>
                        <li><a class="scroll" data-href="#contact" href="#contact">تواصل معنا</a></li>
                        <li><a class="scroll"  href="#">جميع الأقسام</a></li>
                        <li class=""><a
                                    style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black"
                                    class="" href="/register">انشاء حساب</a></li>
                        <li class=""><a
                                    style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black"
                                    class="" href="/initiative_don">تقديم تبرع</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<main id="">
    <!--***************** navbar end *****************************************************  -->
@yield('content')
<!--***************** footer *****************************************************  -->
    <section class="homeSection bgDarkBlue sectionContact" id="contact">
        <div id="map"  style="background-image:url('/images/map2.png');   margin-top: 55px;border-top:1px solid black;">
        </div>

        <div class="bgDark"></div>
        <div class="container">
            <div class="contactWrapper row">
                <div class="contactLeft col-sm-6">
                    <!-- <img src="dist/images/map.jpg" alt=""> -->
                </div>
                <div class="contactRight col-sm-6">
                    <div class="contactRightInner" style="margin-top:-47px">
                        <div class="row " style="height:40px;">

                        </div>
                        <div class="row" style="padding-top:-40px">
                            <div class="col-md-1">
                                <p><strong style="color:white"><i class="fas fa-envelope"></i></strong></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong style="color:white">Email : {{\App\Site_sting::find(1)->email}}</strong></p>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <p><strong style="color:white"><i class="fas fa-map-marker-alt"></i></strong></p>
                            </div>
                            <div class="col-md-11">
                                <p><strong style="color:white">{{\App\Site_sting::find(1)->address}}</strong></p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1">
                                <p><strong style="color:white"><i class="fas fa-phone"></i></strong></p>
                            </div>
                            <div class="col-md-11">
                                <p><strong style="color:white">{{\App\Site_sting::find(1)->mobile1}}
                                        {{\App\Site_sting::find(1)->mobile2}}
                                    </strong></p>
                            </div>
                        </div>
                        <br>
                        <!--contact form  -->
                        <div class="contactForm">
                            <div id="responseMessage"></div>
                            <form class="" method="post" id="maincontact" name="maincontact">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" name="name" type="text" class="validate">
                                        <label for="last_name">الاسم </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" name="email" type="text" class="validate">
                                        <label for="last_name">البريد الالكتروني </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="phone_number" name="phone_number" maxlength="14" type="text"
                                               class="validate numOnly">
                                        <label for="last_name">رقم الهاتف</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="comment" name="comment" maxlength="500" type="text"
                                               class="validate numOnly">
                                        <label for="textarea1">تعليقك</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7 captchaFeild">
                                    </div>

                                    <div class="col-sm-5 formSubmitBtnWrap text-left">
                                        <input class="submitBtn" type="submit" value="إرسال"
                                               style=";color:white; background:#c4233d ;  box-shadow: 0 1px 5px rgba(0,0,0,0.1), 0 0 0 1px  #c4233d; border-radius:20px;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    </section>

</main>
<footer>
    <a href="#" id="" style="display:none"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <div class="copyRight">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-center">
                    <p style="text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019 ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img
                                    src="/platform/dist/images/7777.png"
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
<script src="/platform/mobadarate/js/jquery.js"></script>
<script src="/platform/mobadarate/js/script.js"></script>
<script src="/platform/dist/scripts/bundle.min.js?3443612"></script>
<script src="/platform/dist/scripts/app.js?3443634"></script>
<script type="text/javascript" src="/platform/dist/scripts/jquery.validate.min.js"></script>

<!-- home banner-video -->

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


        var galImage = youth.youthSlider('#galleryImageSlider', 2);
        $('#gallerySlider-hq').slick({
            dots: false,
            infinite: true,
            rtl: $('html').attr('dir') === 'rtl' ? true : false,
            speed: 600,
            nextArrow: '<a class="next  sliderNav"><i class="fas fa-arrow-left"></i></a>',
            prevArrow: '<a class="prev sliderNav"><i class="fas fa-arrow-right"></i></a>',
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }]
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
            nextArrow: '<a class="next  sliderNav"><i class="fas fa-arrow-right"></i></a>',
            prevArrow: '<a class="prev sliderNav"><i class="fas fa-arrow-left"></i></a>',
            slidesToShow: 3,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
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
            nextArrow: '<a class="next  sliderNav"><i class="fas fa-arrow-right"></i></a>',
            prevArrow: '<a class="prev sliderNav"><i class="fas fa-arrow-left"></i></a>',
            slidesToShow: 3,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
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
                $(name).animate({
                    top: offset
                }, {
                    duration: 500,
                    queue: false
                });
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


</script>
<script type="text/javascript" src="/dooz/sweetalert.min.js"></script>
<script type="text/javascript" src="/dooz/jquery.calendario.js"></script>
<script type="text/javascript" src="/dooz/modernizr.custom.63321.js"></script>

<script type="text/javascript">


    $(function () {

        var transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            },
            transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
            $wrapper = $('#custom-inner'),
            $calendar = $('#calendar'),

            cal = $calendar.calendario({
                caldata: JSON.parse(` {!! $initiatives_cal !!}`),

                displayWeekAbbr: true,
                weeks: ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
                weekabbrs: ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
                months: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز', 'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'],
                monthabbrs: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز', 'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'],
                startIn: 6,
                onDayClick: function ($el, $contentEl, dateProperties) {

                    if ($contentEl.length > 0) {
                        showEvents($contentEl, dateProperties);

                    }

                },

            }),
            $month = $('#custom-month').html(cal.getMonthName()),
            $year = $('#custom-year').html(cal.getYear());

        $('#custom-next').on('click', function () {
            cal.gotoNextMonth(updateMonthYear);

            for (i = 0; i < document.querySelectorAll('span.fc-date').length; i++) {
                document.querySelectorAll('span.fc-date')[i].style.top = "38%";

            }/*
            for (i = 0; i < document.querySelectorAll('.fc-calendar .fc-head div').length; i++) {
                document.querySelectorAll('.fc-calendar .fc-head div')[i].style.width = "14.3%"

            }*/
        });
        $('#custom-prev').on('click', function () {
            cal.gotoPreviousMonth(updateMonthYear);
            for (i = 0; i < document.querySelectorAll('span.fc-date').length; i++) {
                document.querySelectorAll('span.fc-date')[i].style.top = "38%";

            }/*
            for (i = 0; i < document.querySelectorAll('.fc-calendar .fc-head div').length; i++) {
                document.querySelectorAll('.fc-calendar .fc-head div')[i].style.width = "14%"

            }*/

        });

        function updateMonthYear() {
            $month.html(cal.getMonthName());
            $year.html(cal.getYear());

        }

        // just an example..
        function showEvents($contentEl, dateProperties) {


            swal({
                title: "مبادرات اليوم " + dateProperties.day + '/' + dateProperties.month + '/' + dateProperties.year,
                text: $contentEl.html(),
                html: true
            });


        }

        for (i = 0; i < document.querySelectorAll('span.fc-date').length; i++) {
            document.querySelectorAll('span.fc-date')[i].style.top = "38%";
        }/*
        for (i = 0; i < document.querySelectorAll('.fc-calendar .fc-head div').length; i++) {
            document.querySelectorAll('.fc-calendar .fc-head div')[i].style.fontSize = "12px";
            document.querySelectorAll('.fc-calendar .fc-head div')[i].style.margin = "2px";
        }*/
    });


</script>

<style>

    span.fc-date {
        top: 38%;
    !important
    }
</style>

@yield("js")

</body>

</html>
