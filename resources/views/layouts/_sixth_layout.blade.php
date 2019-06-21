<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="/private_account/assets/css/bootstrap-rtl.css">


    <style media="screen">
        .container {
            max-width: 80%;
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

        .navbar-light .navbar-nav .active>.nav-link,
        h5 {
            color: white;
        }

        h1 {
            margin-top: 65px;
        }


        .card {
            border-radius: 20px;
            width: 700px;
            height: 590px;
            background: #f3f3f2;
        }

        .input-group-prepend span {
            width: 165px;
        }

        .input-group-prepend span {
            color: white;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .fas {
            font-size: 30px;
        }


        .card {
            height: auto;
        }

        @media (max-width: 670px) {
            .card {
                width: 356px;
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

            ::-webkit-input-placeholder {
                font-size: 7px;
            }
        }

        .aa {
            background: #c4233d;
            padding: 25px;
            border-radius: 20px;
            color: white;
            border: 1px solid #c4233d;
            padding-left: 50px;
            padding-right: 50px;

        }

        .aa:hover {
            color: #c4233d;
            background: white;
            text-decoration: none;
            border: 1px solid #c4233d;

        }

        textarea {
            resize: none;
            border: 0px;
            outline: none;
            border: 1px solid gray;
        }
    </style>
    @yield('css')
</head>

<body>
<!--************************************** navbar start **************************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="/">
        <div class="media">
            <img alt="Maan Logo" src="/private_account/assets/img/logo.svg" style="width:200px;height:70px">
            <div class="media-body">
                <h5 class=" align-center" style="margin-right:-52px;margin-top:22px">مركز العمل التنموي معا</h5>
            </div>
        </div>
    </a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav ">
            <li class="nav-item ">
                <a class="nav-link" href="/">الرئيسية <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/how_are">من نحن </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/initiative">المبادرات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/category/1">تجارب ملهمة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article">جميع الأخبار </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#contact">تواصل معنا</a>
            </li>
            @if(!auth()->user())
            <li class=""><a style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black" class="" href="/register">انشاء حساب</a></li>
            @else
            <li class=""><a style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black" class="" href="/home">بروفايل {{auth()->user()->name}}</a></li>
            @endif
            <li class=""><a style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black" class="" href="/initiative_don">تقديم تبرع</a></li>
        </ul>
    </div>
</nav>
<!--************************************** navbar end ************************************-->
<!--******************************* content of page start *********************************-->
<div class="container" style="margin-top:-30px;">

    @yield('content')
</div>
<!--**************************************************************الفوتر الاخير بداية *****************************************-->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;margin-top:50px;height:70px;padding-top:20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019 ||
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

    $("#myModal .close").click(function () {
        $("#myModal").hide();
    });
</script>
@yield("js")
</body>
</html>
