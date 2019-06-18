@extends("layouts._admin_layout")

@section("title", "إضافة ناشط")
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered" id="form_wizard_1">

                <div class="portlet-body form">
                    <form method="post" action="/admin/activsit" class="form-horizontal" id="submit_form">
                        {{csrf_field()}}
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li>
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="number"> 1 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> المشاركات السابقة </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="number"> 2 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> معلومات البروفايل </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab" class="step active">
                                            <span class="number"> 3 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> اضافة اهتمامات </span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                                <div class="tab-content">
                                    <div class="alert alert-danger display-none">
                                        <button class="close" data-dismiss="alert"></button>
                                        يوجد خطأ في المدخلات يرجى إدخال معلومات سليمة البنية
                                    </div>
                                    <div class="tab-pane active" id="tab1">
                                        <h3 class="block">معلومات المشاركات السابقة</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">هل شاركت في أحد مراكز العائلة من قبل؟
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="hidden" value="" name="shared"/>
                                                <input type="radio" value="1" name="shared" @if(old('shared')) checked
                                                       @endif required/> نعم
                                                <br><input type="radio" value="0" name="shared"
                                                           @if(!old('shared')) checked @endif /> لا
                                                <span class="help-block"> أكد أو انفي المشاركة من قبل </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="shared_ditalis" style="display: none">
                                            <label class="control-label col-md-3">اكتب تفاصيل المشاركة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="shared_ditalis"
                                                          required>{{old("shared_ditalis")}}</textarea>
                                                <span class="help-block"> تحدث عن تفاصبل المشاركة </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <h3 class="block">أضف معلومات البروفايل</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">الإسم الأول
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="name"
                                                       value="{{old("name")}}" required/>
                                                <span class="help-block"> زودنا بالإسم </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">اسم الأب
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" value="{{old("father_name")}}"
                                                       name="father_name" required/>
                                                <span class="help-block"> زودنا بالإسم </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">اسم الجد
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control"
                                                       value="{{old("grand_father_name")}}" name="grand_father_name"
                                                       required/>
                                                <span class="help-block"> زودنا بالإسم </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">اسم العائلة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" value="{{old("last_name")}}"
                                                       name="last_name" required/>
                                                <span class="help-block"> زودنا بالإسم </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">رقم الهوية
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" value="{{old("ido")}}"
                                                       name="ido" required
                                                       minlength="9" maxlength="9"
                                                />
                                                <span class="help-block"> يجب ادخال 9ارقام </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">رقم التواصل
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" value="{{old("mobile")}}"
                                                       name="mobile" minlength="6"
                                                       maxlength="10"/>
                                                <span class="help-block"> حقل اختياري </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">حساب الفيسيوك
                                            </label>
                                            <div class="col-md-4">
                                                <input type="url" class="form-control" value="{{old("face_url")}}"
                                                       name="face_url" minlength="6"
                                                       />
                                                <span class="help-block"> حقل اختياري /يجب رابط</span>
                                            </div>
                                        </div>

                                        <div class="form-group" id="governorate_id">
                                            <label class="control-label col-md-3">المحافظة</label>
                                            <div class="col-md-4">
                                                <select id="governorate_list" name="governorate_id"
                                                        class="form-control" required>
                                                    <option value="">اختر محافظة</option>
                                                    @foreach($governorates as $governorate)
                                                        <option value="{{$governorate->id}}"
                                                                @if(old("governorate_id")==$governorate->id)selected @endif>{{$governorate->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block"> يرجى اختيار محافظة </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="city_id">
                                            <label class="control-label col-md-3">المدينة</label>
                                            <div class="col-md-4">
                                                <select id="city_list" name="city_id"
                                                        class="form-control" required>
                                                    <option value="">أختر...</option>
                                                </select>
                                                <span class="help-block"> يرجى اختيار مدينة </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">الحي
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="neighborhood"
                                                       value="{{old("neighborhood")}}" required/>
                                                <span class="help-block"> يرجى كتابة العنوان </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">البريد الإلكتروني
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="email" class="form-control" value="{{old("email")}}"
                                                       name="email" required/>
                                                <span class="help-block"> يرجى إدخال البريد الإلكتروني </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">اسم المستخدم
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" value="{{old("user_name")}}"
                                                       name="user_name"
                                                       pattern="[^\s]+" required/>
                                                <span class="help-block"> يرجى إدخال اسم المستخدم </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">كلمة المرور
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="password" class="form-control" value="{{old("password")}}"
                                                       name="password" required
                                                       minlength="7"
                                                       id="submit_form_password"/>
                                                <span class="help-block"> يرجى إدخال كلمة المرور. </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">تأكيد كلمة مرورة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="password" class="form-control" value="{{old("password_confirmation")}}"
                                                       name="password_confirmation" required
                                                       minlength="7"
                                                       id="submit_form_password"/>
                                                <span class="help-block"> يرجى تأكيد كلمة المرور. </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">تاريخ الميلاد
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" >
                                                    <input type="text" class="form-control" name="brth_day"
                                                           value="{{old("brth_day")}}" required>
                                                    <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">الجنس
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="radio-list">
                                                    <label>
                                                        <input type="radio" name="gender" value="M" required
                                                               data-title="Male" @if(old('gender')) checked @endif />
                                                        ذكر </label>
                                                    <label>
                                                        <input type="radio" name="gender" value="F"
                                                               data-title="Female" @if(!old('gender')) checked @endif />
                                                        أنثى </label>
                                                </div>
                                                <div id="form_gender_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <h3 class="block">اضافات الاهتمامات</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">حدد اهتماماتك</label>
                                            <div class="col-md-9">
                                                <select multiple="multiple" class="multi-select" id="my_multi_select1"
                                                        name="interest[]">
                                                    @foreach($interests as $interest)
                                                        <option value="{{$interest->id}}"
                                                                @if(collect(old('interest'))->contains($interest->id))selected @endif>{{$interest->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">اهتمامات أخرى</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control input-large" name="other_interests" value="{{old("other_interests")}}" data-role="tagsinput"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i> للخلف </a>
                                        <a href="javascript:;" id="my_submit1"
                                           class="btn btn-outline green button-next"> التالي
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <button type="submit" class="btn green button-submit">إنشاء</button>
                                        <a href="/admin/activsit" class="btn grey-salsa btn-outline">إلغاء</a>
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



@endsection
@section('css')
    <link href="{{asset('metronic-rtl/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{asset('metronic-rtl/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/typeahead/handlebars.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/typeahead/typeahead.bundle.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('metronic-rtl/assets/pages/scripts/form-wizard.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('metronic-rtl/assets/global/plugins/select2/js/select2.full.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"
            type="text/javascript"></script>


    <script src="{{asset('metronic-rtl/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/select2/js/select2.full.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/pages/scripts/components-multi-select.min.js')}}"
            type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#clickmewow').click(function () {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#my_submit1').click(function () {
                $("[id $='-error']").hide();
            });
            $('#my_submit2').click(function () {

                $("[id $='-error']").hide();
            });
        });
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

