@extends("layouts._admin_layout")

@section("title", "تعديل مبادرة ".$item->title)

@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered" id="form_wizard_1">

                <div class="portlet-body form">
                    <form method="post" action="/admin/initiative/{{$item->id}}" enctype="multipart/form-data"
                          class="form-horizontal" id="submit_form">
                        @method('patch')
                        {{csrf_field()}}
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li>
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="number"> 1 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> إنشاء مبادرة </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="number"> 2 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> الوصف والأهداف </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab" class="step active">
                                            <span class="number"> 3 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> تحديد الاهتمامات </span>
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
                                            <label class="control-label col-md-3">عنوان المبادرة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="title"
                                                       value="{{$item["title"]}}" required/>
                                                <span class="help-block"> سمِّ عنواناً </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">اسم الفريق
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="team_name"
                                                       value="{{$item["team_name"]}}" required/>
                                                <span class="help-block"> أطلق اسما لفريق المبادرة </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">أرفق صورة
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="image" class="form-control" accept='image/*'>
                                                <span class="help-block"> اختر صورة رمزية للمبادرة </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">تاريخ البدء
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" name="start_date"
                                                       value="{{date('Y-m-d', strtotime($item->start_date))}}" required/>
                                                <span class="help-block"> أدخل تاريخ بدء المبادرة </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">تاريخ الانتهاء
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" name="end_date"
                                                       value="{{date('Y-m-d', strtotime($item->end_date))}}" required/>
                                                <span class="help-block"> أدخل تاريخ انتهاء المبادرة </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="governorate_id">
                                            <label class="control-label col-md-3"> المحافظة
                                                <span class="required"> * </span></label>
                                            <div class="col-md-4">
                                                <select id="governorate_list" name="governorate_id"
                                                        class="form-control" required>
                                                    <option value="">اختر محافظة</option>
                                                    @foreach($governorates as $governorate)
                                                        <option value="{{$governorate->id}}"
                                                                @if($item->city["governorate_id"]==$governorate->id)selected @endif>{{$governorate->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block"> يرجى اختيار محافظة </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="city_id">
                                            <label class="control-label col-md-3">المدينة
                                                <span class="required"> * </span></label>
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
                                                       value="{{$item["neighborhood"]}}" required/>
                                                <span class="help-block"> يرجى كتابة العنوان </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">عدد المشاركين المسموح
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control"
                                                       value="{{$item["activists_count"]}}"
                                                       name="activists_count"
                                                       maxlength="4" min="1" required/>
                                                <span class="help-block"> أدخل عدد الناشطين المسموح إشراكهم </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">الحاجة للتمويل
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="super_donation">
                                                    <option value="">أختر...</option>
                                                    <option value="1" @if($item["donation"]>=1)selected @endif>نعم</option>
                                                    <option value="0" @if($item["donation"]<1)selected @endif>لا</option>
                                                </select>
                                                <span class="help-block"> حقل اختياري </span>

                                            </div>
                                        </div>
                                        <div class="form-group"  id="donation">
                                            <label class="control-label col-md-3">الحاجة للتمويل
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" value="{{$item["donation"]}}"
                                                       name="donation"
                                                       maxlength="4" min="0"/>
                                                <span class="help-block"> أدخل المبلغ المحتاج تمويله بالدولار <B>&#36;</B> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <h3 class="block">أضف الوصف والأهداف</h3>
                                        <div class="form-group" id="shared_ditalis">
                                            <label class="control-label col-md-3">نبذة عن المبادرة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="details"
                                                          required>{{$item["details"]}}</textarea>
                                                <span class="help-block"> أدخل نبذة </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="shared_ditalis">
                                            <label class="control-label col-md-3">علاقة المبادرة بالتغيير المجتمعي
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="changing"
                                                          required>{{$item["changing"]}}</textarea>
                                                <span class="help-block"> أدخل علاقة المبادرة بالتغيير </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="shared_ditalis">
                                            <label class="control-label col-md-3">مبرر المبادرة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="justifications"
                                                          required>{{$item["justifications"]}}</textarea>
                                                <span class="help-block"> أدخل مبررات المبادرة </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="shared_ditalis">
                                            <label class="control-label col-md-3">المشكلة التي تعالجها المبادرة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="problem"
                                                          required>{{$item["problem"]}}</textarea>
                                                <span class="help-block"> أدخل المشكلة التي تعالجها المبادرة </span>
                                            </div>
                                        </div>
                                        <div class="form-group" id="shared_ditalis">
                                            <label class="control-label col-md-3">الهدف العام للمبادرة
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea class="form-control" name="main_goale"
                                                          required>{{$item["main_goale"]}}</textarea>
                                                <span class="help-block"> أدخل هدافاً عاماً للمبادرة </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">أضف الأهداف الفرعية</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control input-large" name="other_goals"
                                                       value="{{implode(",",$other_goals)}}" data-role="tagsinput"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <h3 class="block">تحديد الاهتمامات</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">حدد اهتماماتك</label>
                                            <div class="col-md-9">
                                                <select multiple="multiple" class="multi-select" id="my_multi_select1"
                                                        name="interest[]">
                                                    @foreach($interests as $interest)
                                                        <option value="{{$interest->id}}"
                                                                @if(in_array($interest->id,$hisinterests))selected @endif>{{$interest->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                        <button type="submit" class="btn green button-submit">تعديل</button>
                                        <a href="/admin/initiative" class="btn grey-salsa btn-outline">إلغاء</a>
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
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}"
          rel="stylesheet" type="text/css"/>
@endsection
@section('js')
    <script src="{{asset('metronic-rtl/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/typeahead/handlebars.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/typeahead/typeahead.bundle.min.js')}}"
            type="text/javascript"></script>

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

            if ($("[name='super_donation']").val() ==1) {
                $('#donation').show();
            }
            if ($("[name='super_donation']").val() === '0') {
                $("[name='family_center_id']").val('');
                $('#donation').hide();
            }
        });

        $("[name='super_donation']").change(function () {
            if ($("[name='super_donation']").val() ==1) {
                $('#donation').show();
            }
            if ($("[name='super_donation']").val() === '0') {
                $("[name='donation']").val('');
                $('#donation').hide();
            }
        });
    </script>
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

