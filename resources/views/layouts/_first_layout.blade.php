<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/platform/css/jquerysctipttop.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/style.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/bootstrap-rtl.css">

    <style media="screen">
        .container {
            max-width: 100%;
            overflow-x: hidden;
        }

        .input-group-prepen {
            background: #c4233d;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        h1 {
            color: #c4233d;
            margin-top: 150px;
            font-weight: bold;
            text-shadow: 0 0 10px white, 0 0 10px white;
        }

        label {
            color: white;
        }

        .navbar {
            height: 82px;
            background: rgba(0, 0, 0, .8);
        }

        .navbar-light .navbar-nav .nav-link {
            color: white;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link:active {
            color: #c4233d;
        }

        .navbar-light .navbar-nav .active > .nav-link, h5 {
            color: white;

        }

        h1 {
            margin-top: 65px;
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
        .card {
            height: auto;
        }
    </style>
    @yield('css')
</head>
<body>
<!--************************************** navbar start **************************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">
        <div class="media">
            <img alt="Maan Logo" src="/platform/images/logo.svg" style="width:200px;margin-rigth:20px;height:70px">
            <div class="media-body">
                <h5 class=" align-center" style="margin-right:-52px;margin-top:22px">مركز العمل التنموي معا</h5>
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="#">الرئيسية <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">من نحن </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">المبادرات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">آخر الاخبار </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">تجارب ملهمة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">تواصل معنا</a>
            </li>
            <li class=""><a
                        style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black"
                        class="" href="/register">انشاء حساب</a></li>
            <li class=""><a
                        style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black"
                        class="" href="/donationList/create">تقديم تبرع</a></li>
        </ul>
    </div>
</nav>
<!--************************************** navbar end ****************************************-->
<div class="container">

    @yield('content')

</div>
<!--**************************************************************الفوتر الاخير بداية *****************************************-->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;margin-top:50px;height:70px;padding-top:20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019  ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img src="/platform/images/7777.png" style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--*********************************************** footer end ***************************************  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $("#myModal .close").click(function(){$("#myModal").hide();});
</script>
@yield("js")

</body>
</html>
