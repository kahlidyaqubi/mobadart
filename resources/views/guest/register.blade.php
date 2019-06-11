<!DOCTYPE html>
<html>
<head>
    <title>إنشاء حساب</title>
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

    <link rel="stylesheet" type="text/css" href="/platform/css/jquerysctipttop.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/tagify.css">
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css"
          rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="/platform/css/jquerysctipttop.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/tagify.css">

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
            background-image: url('/platform/images/account2.jpg');

        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="/">
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
                        class="" href="/register">انشاء حساب</a></li>
            <li class=""><a
                        style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black"
                        class="" href="index.php">تقديم تبرع</a></li>
        </ul>
    </div>
</nav>
<!--************************************** navbar end ****************************************-->
<div>


    <div class="row justify-content-center">
            <h1>إنشاء حساب</h1>
        </div>

    <div class="row" style="margin:20px 237px 10px 60px;direction: rtl;text-align:right;">
        <div class="col-md-5">
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
    <div class="d-flex justify-content-center h-100">
        <!--1  -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-center ">
                                <h3>البيانات الشخصية</h3>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="الاسم الأول" name="name"
                                               value="{{old("name")}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="اسم الأب "
                                               value="{{old("father_name")}}"
                                               name="father_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="اسم الجد"
                                               value="{{old("grand_father_name")}}" name="grand_father_name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="العائلة"
                                               value="{{old("last_name")}}"
                                               name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" value="{{old("email")}}"
                                       name="email" required placeholder="الايميل">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{old("user_name")}}"
                                       name="user_name"
                                       pattern="[^\s]+" required placeholder="اسم المستخدم">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" value="{{old("password")}}"
                                       name="password" required
                                       minlength="7" placeholder="كلمة المرور">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" value="{{old("password_confirmation")}}"
                                       name="password_confirmation" required
                                       minlength="7" placeholder="تأكيد كلمة المرور">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="number" class="form-control" value="{{old("mobile")}}"
                                       name="mobile" minlength="6"
                                       maxlength="10" placeholder="رقم التواصل">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                </div>
                                <input type="number" value="{{old("ido")}}"
                                       name="ido" required
                                       minlength="9" maxlength="9" class="form-control" placeholder="رقم الهوية ">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{old("face_url")}}"
                                       name="face_url" minlength="6" placeholder="رابط حساب الفيس بوك">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الجنس</span>
                                </div>

                                <input  type="radio" name="gender" value="M" required
                                        data-title="Male" @if(old('gender')) checked @endif class="form-control">
                                <label for="" style="margin-right:-65px">ذكر</label>
                                <input type="radio" name="gender" value="F"
                                       data-title="Female" @if(!old('gender')) checked @endif class="form-control">
                                <label for="" style="margin-right:-65px">أنثى</label>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-table"></i></span>

                                </div>
                                <input type="date" class="form-control" name="brth_day"
                                       value="{{old("brth_day")}}" required placeholder="تاريخ الميلاد"/>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                </div>
                                <select name="governorate_id" id="governorate_id" class="form-control"
                                        placeholder="المحافظة">
                                    <option value="">اختر محافظة</option>
                                    @foreach($governorates as $governorate)
                                        <option value="{{$governorate->id}}"
                                                @if(old("governorate_id")==$governorate->id)selected @endif>{{$governorate->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group form-group" id="city_id">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                </div>
                                <select id="city_list" name="city_id"
                                        class="form-control" required>
                                    <option value="">أختر...</option>
                                </select>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" name="neighborhood"
                                       value="{{old("neighborhood")}}" required placeholder="العنوان">
                            </div>


                        </div>

                    </div>
                </div>


                <!-- 2 -->
                <div class="col">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-center ">
                                <h3>الاهتمامات</h3>

                            </div>
                        </div>
                        <div class="card-body">
                            <!--  الاهتمامات-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <select data-placeholder="اختر اهتماماتك من القائمة" multiple
                                        class="chosen-select form-control"
                                        name="interest[]">
                                    @foreach($interests as $interest)
                                        <option value="{{$interest->id}}"
                                                @if(collect(old('interest'))->contains($interest->id))selected @endif>{{$interest->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">

                                        <label for="" style="font-size:13px">أدخل اهتماماتك ان لم تجدها في القائمة
                                            السابقة ثم اضغط Enter</label>
                                    </div>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">أخرى</span>
                                    </div>
                                    <input style="margin-bottom:-50px;" name="other_interests" value="{{old("other_interests")}}">

                                </div>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <label for="">هل استفدت من مراكز العائلة سابقا؟</label>
                                </div>
                                <input type="hidden" value="" name="shared"/>
                                <input type="radio" class="form-control" style="margin-right:-16px;" value="1"
                                       name="shared"
                                       id="yes" @if(old('shared')) checked
                                       @endif required>
                                <label for="" style="margin-right:-24px;">نعم</label>

                                <input type="radio" class="form-control" style="margin-right:-24px;" value="0"
                                       name="shared"
                                       id="no" @if(!old('shared')) checked @endif>
                                <label for="" style="margin-right:-24px;">لا</label>

                            </div>
                            <div class="input-group form-group disp" id="shared_ditalis" style="display: none">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <textarea required style="padding:5px" name="shared_ditalis" rows="6" cols="40"
                                          placeholder="اذا كانت اجابتك نعم , ماهي الزوايا التي استفدت منها؟">{{old("shared_ditalis")}}</textarea>

                            </div>
                        </div>
                        <div class="form-group" style="text-align:center">
                            <input type="submit" value="إنشاء حساب" class="btn  login_btn" style="text-align:center">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>



</div>
</div>
</div>

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
                                    src="/platform/images/7777.png"
                                    style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED
                        BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--*********************************************** footer end ***************************************  -->
<!--  j[vfm]-->
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="/platform/js/jQuery.tagify.js"></script>
<script src="/platform/js/jQuery.tagify.js"></script>
<script type="text/javascript">
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>
<script>
    $('[name=other_interests]').tagify();
</script>


<script>

    $(document).ready(function () {

        if ($("[name='shared']:checked").val() == 1) {
            $('#shared_ditalis').show();
            $("[name='shared_ditalis']").prop('disabled', false);
        }
        if ($("[name='shared']:checked").val() === '0') {
            $("[name='shared_ditalis']").val('');
            $("[name='shared_ditalis']").prop('disabled', true);
            $('#shared_ditalis').hide();
        }
    });

    $("[name='shared']").change(function () {
        $('#shared-error').css('display', 'inline');

        if ($("[name='shared']:checked").val() == 1) {
            $('#shared_ditalis').show();
            $("[name='shared_ditalis']").prop('disabled', false);
        }
        if ($("[name='shared']:checked").val() === '0') {
            $("[name='shared_ditalis']").val('');
            $("[name='shared_ditalis']").prop('disabled', true);
            $('#shared_ditalis').hide();
        }
    });
</script>
<script>
    $(document).ready(function () {

        var governorate_id = $("[name='governorate_id']").val();

        $.get("/admin/governorate/ajaxCityInGover/" + governorate_id, function (data, status) {
            $("[name='city_id']")
                .find('option')
                .remove()
                .end()
                .append('<option class="cities" value="">جميع المدن</option>');

            data.forEach(function (car) {
                var iselected = checktruefalse(car.id);
                $("[name='city_id']")
                    .append($("<option class='cities'></option>")
                        .attr("value", car.id)
                        .text(car.name));

                $('.cities[value=' + car.id + ']')
                    .attr('selected', iselected);

            });
        });
    });

    $("[name='governorate_id']").change(function () {
        var governorate_id = $("[name='governorate_id']").val();
        $.get("/admin/governorate/ajaxCityInGover/" + governorate_id, function (data, status) {
            $("[name='city_id']")
                .find('option')
                .remove()
                .end()
                .append('<option class="cities" value="">جميع المدن</option>');

            data.forEach(function (car) {
                var iselected = checktruefalse(car.id);
                $("[name='city_id']")
                    .append($("<option class='cities'></option>")
                        .attr("value", car.id)
                        .text(car.name));
                $('.cities[value=' + car.id + ']')
                    .attr('selected', iselected);

            });

        });
    });

    function checktruefalse(id) {
        if (id == '{{old("city_id")}}') {
            return true
        } else
            return false
    }

</script>
</body>
</html>
