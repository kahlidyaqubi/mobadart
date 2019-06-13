<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<!DOCTYPE html>
<html>
<head>
    <title>الممول</title>
    <!--Made with love by Mutiullah Samim -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/platform/css/style.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/bootstrap-rtl.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/style.css">

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
            background-image: url('/platform/dist/images/euro.jpg');
            background-size: cover;
        }

        .card {
            background: white !important;
            border-radius: 20px;
            width: 700px;
            height: 590px;
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
    </style>
</head>
<body>
<!--****************************************** modal ****************************************************************** -->
<div class="modal" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="/platform/dist/images/check.jpg" alt="" class="image">
                <p style="font-size:30px;color:#c4233d;">شكرا لك ,</p>
                <p style="font-size:20px;">سيتم ارسال رسالة الى ايميلك خلال دقائق , </p>
                <p style="font-size:20px;">رجاء قم بمراجعته</p>
            </div>
            <div class="modal-footer " align="center">
                <button type="button" class="btn button" data-dismiss="modal"> ok</button>
            </div>
        </div>
    </div>
</div>
<!--************************************** navbar start **************************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">
        <!-- <img src="images/7777.png" alt=""> -->
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
                        class="" href="index.php">انشاء حساب</a></li>
            <li class=""><a
                        style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black"
                        class="" href="index.php">تقديم تبرع</a></li>
        </ul>
    </div>
</nav>
<!--************************************** navbar end ****************************************-->
<div style="margin-top:-30px;">
    <div class="row justify-content-center">
        <h1>تبرع لمبادراة</h1>
    </div>

    <div class="d-flex justify-content-center h-100">
        <!--1  -->
        <form method="post" action="/donationList">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-center ">
                                <i class="fas fa-dollar-sign"></i></div>
                            <div class="row" style="direction: rtl;text-align:right;">
                                <div class="col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                </div>
                                @endif

                                @if(Session::get("msg"))
                                    <?php
                                    $msg = Session::get("msg");
                                    $msgClass = "alert-info";
                                    $first2letters = strtolower(substr($msg, 0, 2));
                                    if ($first2letters == "s:") {
                                        //قص اول حرفين
                                        $msg = substr($msg, 2);
                                        $msgClass = "alert-success";
                                    } else if ($first2letters == "i:") {
                                        $msg = substr($msg, 2);
                                        $msgClass = "alert-info";
                                    } else if ($first2letters == "w:") {
                                        $msg = substr($msg, 2);
                                        $msgClass = "alert-warning";
                                    } else if ($first2letters == "e:") {
                                        $msg = substr($msg, 2);
                                        $msgClass = "alert-danger";
                                    }
                                    ?>
                                    <div class="alert {{$msgClass}} alert-dismissible">{{$msg}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                @endif
                            </div>

                        </div>
                        <div class="card-body">


                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الحساب البنكي لمعاً</span>
                                </div>
                                <input readonly type="number" class="form-control" value="{{$site_bank_account}}" placeholder=" 7653417865">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">المبادرة</span>
                                </div>
                                <select name="initiative_id" class="form-control" >
                                    <option value="">اختر مبادرة</option>
                                    @foreach($initiatives as $initiative)
                                        <option value="{{$initiative -> id}}" {{old('initiative_id')==$initiative -> id?"selected":""}}>{{$initiative -> title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الحساب البنكي للممول</span>
                                </div>
                                <input required type="number" name="bank_account" value="{{old('bank_account')}}" class="form-control"
                                       placeholder="أدخل رقم الحساب البنكي الخاص بك">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">اسم الممول</span>
                                </div>
                                <input required type="text" name ="financier_name" value="{{old('financier_name')}}" class="form-control" placeholder="أدخل اسمك كاملاً">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">المبلغ</span>
                                </div>
                                <input required type="number" name="amount" value="{{old('amount')}}" class="form-control"
                                       placeholder="أدخل المبلغ الذي تود التبرع به لصالح المبادرة ">
                                <span class="input-group-text">$ المبلغ بالدولار</span>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الإيميل</span>
                                </div>
                                <input required type="email" name="financier_email" value="{{old('financier_email')}}" class="form-control" placeholder="أدخل إيميلك ">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">رقم للتواصل</span>
                                </div>
                                <input required type="number" name="financier_phone" value="{{old('financier_phone')}}" class="form-control"
                                       placeholder="أدخل رقم للتواصل معك من خلاله">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الدولة</span>
                                </div>
                                <select name="country"  class="form-control" placeholder="اختر الدولة">
                               <option value="">
                                        اختر دولة
                                    </option>
                                    @foreach($countries as $country)
                                        <option value="{{$country -> name}}" {{old('country')==$country -> name?"selected":""}}>{{$country -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">العنوان</span>
                                </div>
                                <input required type="text" name="financier_address" class="form-control" placeholder="أدخل عنوانك كاملاً">
                            </div>
                            <div class=" form-group" style="margin-top:50px;">
                                <div class="row justify-content-center">

                                    <div class="col-md-4 ">
                                        <button type="submit" style="margin-top: -60px;background:#c4233d;text-decoration:none;color:white;padding:20px;padding-left:40px;padding-right:40px;border-radius:20px;"
                                           data-toggle="modal" data-target=".modal" id="myModal"
                                           href="#myModal">تأكيد</button>
                                    </div>


                                </div>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- 2 -->

            </div>

        </form>

    </div>
</div>
</div>
<!--**************************************************************الفوتر الاخير بداية *****************************************-->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;margin-top:50px;height:40px;padding-top:20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019 ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img
                                    src="images/7777.png"
                                    style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED
                        BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--*********************************************** footer end ***************************************  -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="js/jQuery.tagify.js"></script>
<script>
    $('[name=tags]').tagify();
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
<script type="text/javascript">
    $("#yes").click(function () {
        $(".disp").show();
        // $("#no").hide();

    });
    $("#no").click(function () {
        $(".disp").hide();
    });
</script>

<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

</body>
</html>
