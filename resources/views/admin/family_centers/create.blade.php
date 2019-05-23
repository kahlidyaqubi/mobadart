@extends("layouts._admin_layout")

@section("title", "إضافة مركز عائلة")
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/family_center" id="form_sample_1" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-body">
                       <div class="form-group">
                            <label class="control-label col-md-3">اسم المركز
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{old("name")}}" data-required="1"
                                       class="form-control"/></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">إسم المنسق
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="manager_name" value="{{old("manager_name")}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">رقم التواصل
                            </label>
                            <div class="col-md-4">
                                <input name="mobile" type="text" value="{{old("mobile")}}" class="form-control"/>
                                <span class="help-block"> حقل اختياري </span>
                            </div>
                        </div>
                        <div class="form-group" id="governorate_id">
                            <label class="control-label col-md-3">المحافظة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="governorate_id">
                                    <option value="">أختر...</option>
                                    @foreach($governorates as $governorate)
                                        <option value="{{$governorate->id}}"
                                                @if(old("governorate_id")==$governorate->id)selected @endif>{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="city_id">
                            <label class="control-label col-md-3">المدينة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="city_id">
                                    <option value="">أختر...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">إنشاء</button>
                                <a href="/admin/family_center" class="btn grey-salsa btn-outline">إلغاء</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

    </div>



@endsection
@section('css')

@endsection
@section('js')
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

