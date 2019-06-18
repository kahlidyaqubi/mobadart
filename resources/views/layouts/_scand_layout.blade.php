<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/platform/css/style.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/bootstrap-rtl.css">	
     <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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

        body {
            background-image: url('/platform/images/account.jpg');

        }

        ::-webkit-input-placeholder {
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

        body,
        h3,
        h2 {
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

        body {
            background-image: url('/platform/dist/images/pr-video6.jpg');
            background-size: cover;
        }

        body,
        h3,
        h2 {
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
            height: auto;
            background: white;
            padding: 33px;
            width: 504px;
            margin-bottom: 50px;
        }

        #navbar-primary .navbar-nav {
            width: 100%;
            text-align: center;
        }
        >li {
            display: inline-block;
            float: none;
        }
        >a {
            padding-left: 30px;
            padding-right: 30px;
        }

        .nav a {
            padding-top: 100px;
            color: red;
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

        .image {
            width: 80px;
        }

        .form-gap {
            padding-top: 70px;
        }

        .btn-block:hover {
            background: white;
            color: black;
        }

        .navbar-light .navbar-nav .active>.nav-link,
        h5 {
            color: white !important;
        }

        h2 {
            margin-top: -20px;
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
        #myModal {
            padding-right: 10px;
            margin-bottom: 10px;
        }

        @media (max-width: 670px) {
            .panel {
                width: 272px;
            }

            .validation {
                width: 200px;
            }


            ::-webkit-input-placeholder {
                font-size: 7px;
            }
        }

        h3 {

            color: #c4233d;
            margin-top: 150px;
            font-weight: bold;
            text-shadow: 0 0 10px white, 0 0 10px white;
        }

        h5 {
            color: white;
            font-size: 10px;
        }
        .navbar-light .navbar-nav .nav-link{
            color: white!important;
        }
    </style>
    @yield('css')
</head>

<body>
<!--************************************** navbar start **************************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="/">
        <div class="media">
            <img alt="Maan Logo" src="/platform/images/logo.svg" style="width:200px;height:70px">
            <div class="media-body">
                <h5  style="margin-right:-40px;margin-top:22px">مركز العمل التنموي معا</h5>
            </div>
        </div>
    </a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
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
            <li class=""><a style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black" class="" href="/register">انشاء حساب</a></li>
            <li class=""><a style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black" class="" href="/donationList/create">تقديم تبرع</a></li>
        </ul>
    </div>
</nav>
<!--************************************** navbar end ****************************************-->
<!--*****************************content of page start ********************************** -->
<section class="home mt-5 mb-5 " id="">
    <div class="container">
    @yield('content')
    </div>
</section>
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
        <script src="/platform/js/jQuery.tagify.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js" type="text/javascript"></script>
	<script>
	$('#datepicker').datepicker({ uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons', format: 'yyyy-mm-dd' });								
							 </script>
<script>
    $("#myModal .close").click(function(){$("#myModal").hide();});
</script>
@yield("js")
</body>

</html>

