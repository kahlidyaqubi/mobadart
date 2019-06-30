<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
	 <link rel="shortcut icon" href="/Group.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/platform/css/style.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/bootstrap-rtl.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
            height: 100px;
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

        tags tag.tagify--noAnim {
            display: none;
        }

        tags .input {
            color: white
        }

        tags .input {
            color: white
        }

        input[type="radio"] {
            margin-right: -35px;
            height: 25px;
        }

        .card {
            width: 798px;
            background: #f3f3f2 !important;
            border: 1px solid gray;
            height: auto !important;
            box-shadow: 5px 10px #888888;
            float: right;
        }

        img {
            width: 750px;
            height: 250px
        }

        body {
            background: #f3f3f2;
        }

        .input-group-prepend span {
            width: 175px;
        }

        label {
            color: black;
        }

        .input-group-text {
            color: white !important;
            font-size: 15px;
        }

        .input-group-prepend span {
            width: 288px;

        }

        input.form-control {
            width: auto;
        }

        h3 {
            float: right;
        }

        .but {
            border: 1px solid gray;
            background: #c4233d;
            padding: 15px;
            padding-left: 35px;
            text-decoration: none;
            padding-right: 35px;
            margin-top: 12px;
            border-radius: 20px;
            color: white;
            width: 200px;
        }

        .but:hover {
            color: #c4233d;
            background: white;
            text-decoration: none;
            border: 2px solid #c4233d;
        }

        .table {
            border: 1px solid gray;
            box-shadow: 5px 10px #888888;
        }

        body,
        h3,
        h2 {
            font-family: 'El Messiri', sans-serif;
        }

        .div-1 {
            border: 1px solid gray;
            float: right;
            text-align: right;
            direction: rtl;
        }

        h5 {
            color: #c4233d;
            font-size: 30px;

        }

        .btn-primary {
            float: left;
            background: #c4233d;
        }

        .img-w {
            width: 290px;
            height: 150px;
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

        .img-responsive,
        .thumbnail>img,
        .thumbnail a>img,
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            height: 300px;

        }
    </style>
    @yield('css')
</head>

<body>
<!--******************************** navbar start ******************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="/">
        <img alt="Maan Logo" src="/platform/dist/images/logo.svg" style="width:90px;height:70px;margin-top:-26px;">
        </div>
    </a>
    <a href="/"><p style="color:#fff;font-size:20px">{{\App\Site_sting::find(1)->title_page}}</p></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
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
                <a class="nav-link" href="/article">جميع الاخبار </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/category/1">تجارب ملهمة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#contact">تواصل معنا</a>
            </li>
            @if(!auth()->user())
            <li class=""><a style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black" class="" href="/register">انشاء حساب</a></li>
            @else
                <li class=""><a style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black" class="" href="/home">بروفايل  {{ mb_substr(auth()->user()->name,0,9,'UTF-8')}}</a></li>
            @endif
            <li class=""><a style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black" class="" href="/initiative_don">تقديم تبرع</a></li>
        </ul>
    </div>
</nav>
    <!--**************************** عرض المبادرة الواحدة ******************************** -->
<div class="container">
    @yield('content')

</div>
<!--*******************************الفوتر الاخير بداية **********************************-->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;margin-top:50px;height:70px;padding-top:20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019 ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img src="/platform/dist/images/7777.png" style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--****************************** footer end ************************************  -->
<script type="text/javascript">
    $('.carousel').carousel()
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

    $("#myModal .close").click(function () {
        $("#myModal").hide();
    });
</script>
@yield("js")
</body>
</html>
