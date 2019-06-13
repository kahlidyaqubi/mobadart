@extends("layouts._first_layout")

@section("title", "إنشاء حساب ناشط")
@section("content")


    <div class="row justify-content-center">
        <h1>إنشاء حساب</h1>
    </div>
    <div class="d-flex justify-content-center h-100">
        <!--1  -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!--div for validation  -->
                        @include("_first_msg")
                        <div class="card-header">
                            <div class="d-flex justify-content-center ">
                                <h3>البيانات الشخصية</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--  الاسم رباعي-->
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend"		>
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="الاسم الأول" name="name"
                                               value="{{old("name")}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend"		>
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
                            <!-- الايميل -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" value="{{old("email")}}"
                                       name="email" required placeholder="الايميل">
                            </div>
                            <!-- اسم المستخدم -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend"		>
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{old("user_name")}}"
                                       name="user_name"
                                       pattern="[^\s]+" required placeholder="اسم المستخدم">
                            </div>
                            <!--  كلمة المرور-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" value="{{old("password")}}"
                                       name="password" required
                                       minlength="7" placeholder="كلمة المرور">
                            </div>
                            <!-- تأكيد كلمة المرور -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" value="{{old("password_confirmation")}}"
                                       name="password_confirmation" required
                                       minlength="7" placeholder="تأكيد كلمة المرور">
                            </div>
                            <!--  رقم التواصل-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" class="form-control" value="{{old("mobile")}}"
                                       name="mobile" minlength="6"
                                       maxlength="10" placeholder="رقم التواصل">
                            </div>
                            <!--  -رقم الهوية -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                </div>
                                <input type="number" value="{{old("ido")}}"
                                       name="ido" required
                                       minlength="9" maxlength="9" class="form-control" placeholder="رقم الهوية ">
                            </div>
                            <!-- رابط حساب الفيس بوك -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                </div>
                                <input type="url" class="form-control" value="{{old("face_url")}}"
                                       name="face_url" minlength="6" placeholder="رابط حساب الفيس بوك">
                            </div>
                            <!-- الجنس -->
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
                            <!--  تاريخ المييلاد-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-table"></i></span>
                                </div>
                                <input type="date" class="form-control" name="brth_day"
                                       value="{{old("brth_day")}}" required placeholder="تاريخ الميلاد"/>
                            </div>
                            <!--  المحافظة-->
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
                            <!-- المدينة -->
                            <div class="input-group form-group" id="city_id">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                </div>
                                <select id="city_list" name="city_id"
                                        class="form-control" required>
                                    <option value="">أختر...</option>
                                </select>
                            </div>
                            <!-- العنوان -->
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
                            <!-- اخرى -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                </div>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">أخرى</span>
                                </div>
                                <input style="margin-bottom:-50px;" name="other_interests" value="{{old("other_interests")}}">
                            </div>
                            <!--  السؤال-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend"		>
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
                            <!--  اجابة السؤال في حال نعم-->
                            <div class="input-group form-group disp" id="shared_ditalis" style="display: none">
                                <div class="input-group-prepend"		>
                                    <span class="input-group-text"></span>
                                </div>
                                <textarea required style="padding:5px" name="shared_ditalis" rows="6" cols="40"
                                          placeholder="اذا كانت اجابتك نعم , ماهي الزوايا التي استفدت منها؟">{{old("shared_ditalis")}}</textarea>
                            </div>
                            <!--  زر انشاء حشاب-->
                            <div class="form-group" style="text-align:center">
                                <input type="submit" value="إنشاء حساب" class="btn  login_btn" style="text-align:center;margin-top:335px;">
                            </div>
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
            if (id == '{{old("city_id")}}') {
                return true
            } else
                return false
        }

    </script>
@endsection