@extends("layouts._first_layout")

@section("title", "تعديل معلومات الناشط ".$item->user->name." ".$item->user->last_name)
@section("content")
    <div class="row justify-content-center">
        <h1>تعديل البروفايل</h1>
    </div>

    <div class="d-flex justify-content-center h-100">
        <!--1  -->
        <form method="POST" action="/activist/editProfile">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        @include("_first_msg")
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
                                            <span class="input-group-text"><i class="fas fa-user"></i>
											<font style="color:#f4fc02;font-size:20px">*</font></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="الاسم الأول" name="name"
                                               value="{{$item->user["name"]}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i>
											<font style="color:#f4fc02;font-size:20px">*</font></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="اسم الأب "
                                               value="{{$item->user["father_name"]}}"
                                               name="father_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i>
											<font style="color:#f4fc02;font-size:20px">*</font></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="اسم الجد"
                                               value="{{$item->user["grand_father_name"]}}" name="grand_father_name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i>
											<font style="color:#f4fc02;font-size:20px">*</font></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="العائلة"
                                               value="{{$item->user["last_name"]}}"
                                               name="last_name">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i>
											<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>
                                <input type="number" value="{{$item["ido"]}}"
                                       name="ido" required
                                       minlength="9" maxlength="9" class="form-control" placeholder="رقم الهوية ">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i>
											<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>
                                <input type="email" class="form-control" value="{{$item->user["email"]}}"
                                       name="email" required placeholder="الايميل">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i>
											<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>
                                <input type="text" class="form-control" value="{{$item->user["user_name"]}}"
                                       name="user_name"
                                       pattern="[^\s]+" required placeholder="اسم المستخدم">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="number" class="form-control" value="{{$item["mobile"]}}"
                                       name="mobile" minlength="6"
                                       maxlength="10" placeholder="رقم التواصل">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{$item["face_url"]}}"
                                       name="face_url" minlength="6" placeholder="رابط حساب الفيس بوك">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span style="font-size:14px">الجنس</span>
												<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>

                                <input type="radio" name="gender" value="M" required
                                       data-title="Male" @if($item['gender']) checked @endif  class="form-control">
                                <label for="" style="margin-right:-65px">ذكر</label>
                                <input type="radio" name="gender" value="F"
                                       data-title="Female" @if(!$item['gender']) checked @endif class="form-control">
                                <label for="" style="margin-right:-65px">أنثى</label>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-table"></i>
												<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>
                                <input type="date" class="form-control" name="brth_day"
                                       value="{{$item["brth_day"]}}" required placeholder="تاريخ الميلاد"/>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-city"></i>
												<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>
                                <select name="governorate_id" id="governorate_id" class="form-control"
                                        placeholder="المحافظة">
                                    <option value="">اختر محافظة</option>
                                    @foreach($governorates as $governorate)
                                        <option value="{{$governorate->id}}"
                                                @if($item->city["governorate_id"]==$governorate->id)selected @endif>{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group form-group" id="city_id">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-city"></i>
												<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>
                                <select id="city_list" name="city_id"
                                        class="form-control" required>
                                    <option value="">أختر...</option>
                                </select>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i>
												<font style="color:#f4fc02;font-size:20px">*</font></span>
                                </div>
                                <input type="text" class="form-control" name="neighborhood"
                                       value="{{$item["neighborhood"]}}" required placeholder="العنوان">
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
                                                @if(in_array($interest->id,$hisinterests))selected @endif>{{$interest->name}}</option>
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
                                    <input style="margin-bottom:-50px;" name="other_interests"
                                           value="{{old("other_interests")}}">

                                </div>

                            </div>
                        </div>
                        <div class="form-group" style="text-align:center">
                            <input type="submit" value="تعديل المعلومات" class="btn  login_btn"
                                   style="text-align:center">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
@section('css')
    <style>
        tags tag.tagify--noAnim {
            display: none;
        }

        tags .input {
            color: white
        }

        tags .input {
            color: white

        }

        img {
            margin-top : 0 !important;

        }

        input[type="radio"] {
            margin-right: -35px;
            height: 25px;
        }

        body {
            background-image: url('/platform/images/account2.jpg');

        }
    </style>
    <link rel="stylesheet" type="text/css" href="/platform/css/jquerysctipttop.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/tagify.css">
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css"
          rel="stylesheet"/>
@endsection
@section('js')
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script src="/platform/js/jQuery.tagify.js"></script>
    <script src="/platform/js/jQuery.tagify.js"></script>
    <script type="text/javascript">
        $(".chosen-select").chosen({
            no_results_text: "لا يوجد مهارة بهذا الاسم"
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
            if (id == '{{$item["city_id"]}}') {
                return true
            } else
                return false
        }

    </script>
@endsection