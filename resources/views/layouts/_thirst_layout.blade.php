<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
     <link rel="shortcut icon" href="/Group.ico" />
    <meta name="keywords" content=""/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/platform/sections/css/bootstrap.min.css">
    <link rel="stylesheet" href="/platform/sections/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="/platform/sections/css/animate.min.css">
    <link rel="stylesheet" href="/platform/sections/css/nprogress.css">
    <link rel="stylesheet" href="/platform/sections/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="/platform/sections/css/responsive.css">
    <style media="screen">
        body,
        h3,
        h2,
        h6,
        p {
            font-family: 'El Messiri', sans-serif;

        }


        img {
            width: 200px;
            height: 200px;
            border-radius: 20px;
        }

        .validation {
            padding: 10px;
            height: auto;
            width: 94%;
            margin-right: 10px;
            margin-top: 10px;
            direction: rtl;
            text-align: right;
        }

        .cause-meta > h2 a {
            margin-right: 30px;
        }

        h1 {
            margin: 25px;
        }



        body {
            background: #F0F0F0;
        }



        input[type=text] {
            width: 350px;
            border-radius: 20px;
            padding: 5px;
            margin-bottom: 10px;
            height: 50px;

        }

        input[type=date] {
            width: 170px;
            border-radius: 20px;
            padding: 5px;
            margin-bottom: 10px;
            height: 50px;
        }


        @media (min-width: 768px) {
            .navbar-nav {
                float: left;
            }
        }

        .navbar {
            background: black;
            height: 100px;
        }

        .gap {
            margin-top: -50px;
        }

        .nav-link {
            margin: 10px;
            color: white;
        }

        .nav-link:hover {
            color: #c4233d;
            border-bottom: 1px solid #c4233d;
        }

        h2 {
            margin-right: 130px;
            margin-top: 20px;
            padding: 10px;
        }

        .cause-meta > h2 a {
            margin-right: 54px;
        }

        @media (min-width: 768px) {
            .navbar-nav {
                margin: 37px;
            }
        }
    </style>
    @yield('css')
</head>
<body>
<!--************************************** nav start************************************-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img alt="Maan Logo" src="/platform/images/logo.svg" style="width:92px;height:60px;float:right">

        <p style="text-align: right;font-size: 19px;margin: 13px 104px 12px 2px;color: #FFF">{{\App\Site_sting::find(1)->title_page}}</p>
        <!-- <p style="margin-top: -10px;font-size: 16px;text-align:right;text-shadow: 0 0 10px white, 0 0 5px white;">مركز العمل التنموي / معا</p> -->
        </div>
    </a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/"> الرئيسية<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">من نحن</a>
            <a class="nav-item nav-link" href="/initiative">المبادرات</a>
            <a class="nav-item nav-link" href="#">تجارب ملهمة</a>
            <a class="nav-item nav-link" href="#">جميع الأخبار</a>
            <a class="nav-item nav-link" href="#">تواصل معنا</a>
            <a style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black"
               class="" href="/register">انشاء حساب</a>
            <a style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black"
               class="" href="/initiative_don">تقديم تبرع</a>
            <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>

        </div>
    </div>
</nav>
<!--******************************************* Initiatives start ***************************  -->
<div class="site-layout" >
    <section >
        <div class="gap" >
            <div class="container" >
                @yield('content')
            </div>
        </div>
    </section>
</div>
</div>
</section>
<!--***************************************** Initiatives end ************************  -->
<!--***************************************** footer start ***************************  -->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;height:55px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;padding-top:20px;">جميع الحقوق محفوظة لمركز العمل التنموي -
                        معا © 2019 ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img
                                    src="/platform/images/7777.png"
                                    style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED
                        BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--******************************* footer end ***************************************  -->
<!--******************************* scripts start ************************************  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/platform/sections/js/nprogress.js"></script>
<script src="/platform/sections/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

    $("#myModal .close").click(function () {
        $("#myModal").hide();
    });
</script>
@yield("js")
</body>

</html>
