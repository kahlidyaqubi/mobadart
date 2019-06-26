@extends("layouts._admin_layout")

@section("title", "إدارة النشطاء")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم أو رقم الهوية أو البريد أو الهاتف"/>
                    </div>

                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="governorate_id">
                            <option value="">جميع المحافظات</option>
                            @foreach($governorates as $governorate)
                                <option value="{{$governorate->id}}"
                                        @if($governorate->id==$governorate_id) selected @endif>{{$governorate->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="city_id">

                        </select>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="gender">
                            <option value="">الذكور والإناث</option>
                            <option value="M" @if(request('gender')=='M')selected @endif>الذكور</option>
                            <option value="F" @if(request('gender')=='F')selected @endif>الإناث</option>
                        </select>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="usefull">
                            <option value="">المشاركين وغير المشاركين</option>
                            <option {{request('usefull')=="1"?"selected":""}} value="1">مشاركين</option>
                            <option {{request('usefull')=="2"?"selected":""}} value="2">غير مشاركين</option>
                        </select>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="initiative_id">
                            <option value="">في كل المبادرات</option>
                            @foreach($initiatives as $initiative)
                                <option
                                        @if(request('initiative_id')===''.$initiative->id)selected
                                        @endif
                                        value="{{$initiative->id}}">{{$initiative->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12" style="margin-top: 12px">
                        <label>فــــرز حســــب الاهتمـــامـــات</label>
                        <select id="second" data-placeholder="اختر المهارات"  class="responsiveChosen" multiple style="width:350px;" tabindex="4" name="interests_ids[]" >
                            @foreach($interests as $interest)
                                <option value="{{$interest->id}}"
                                        @if(collect(request('interests_ids'))->contains($interest->id))selected @endif>{{$interest->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1 " style="margin-top: 12px">
                        <button type="submit" style="width:70px;" name="theaction" title="بحث" value="search"
                                class="btn btn-primary"/>
                        بحث
                        </button>
                    </div>
                    <div class="col-sm-1 " style="margin-top: 12px">
                        <button type="submit" style="width:70px;" target="_blank" name="theaction" title="تصدير إكسل"
                                value="excel" class="btn btn-primary"/>
                        تصدير
                        </button>
                    </div>


                    <div class="col-sm-2 " style="margin-top: 12px">
                        <a class="btn btn-success" href="/admin/activsit/create">اضافــة حساب جديد</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="portlet-body">
        @if($items->count()>0)
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> الإسم كاملاً</th>
                        <th> رقم الهوية</th>
                        <th> البريد الإلكتروني</th>
                        <th> رقم التواصل</th>
                        <th>الجنس</th>
                        <th>العمر</th>
                        <th>المدينة</th>
                        <th width="15%" class="hidden-xs"> إجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->id}}</td>
                            <td> {{$item->user->name}} {{$item->user->father_name}} {{$item->user->grand_father_name}} {{$item->user->last_name}}</td>
                            <td> {{$item->ido}}</td>
                            <td> {{$item->user->email}}</td>
                            <td> {{$item->mobile}}</td>
                            <td> {{$item->gender}}</td>
                            <td> {{\Carbon\Carbon::parse($item->brth_day)->age}}</td>
                            <td> {{$item->city->name}}</td>
                            <td width="17%" class="hidden-xs">
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> إجراءات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="/admin/activsit/{{$item->id}}/edit">
                                                <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                        </li>
                                        <li>
                                            <a href="/admin/activsit/delete/{{$item->id}}" class="Confirm">
                                                <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                        </li>
                                        <li>
                                            <a href="/admin/activsit/{{$item->id}}">
                                                <span class="text-primary"><i
                                                            class="fa fa-newspaper-o"></i>البروفايل</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{$items->links()}}
                </table>
            </div>
        @else
            <br><br>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    </div>
    </div>


@endsection
@section('css')
    <style>
        .multiselect-container li {
            padding: 8px !important
        }
    </style>
    <link rel="stylesheet" href="/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#multi-select-demo').multiselect();
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
            if (id == '{{$city_id}}') {
                return true
            } else
                return false
        }

    </script>
    <script type="text/javascript" src="/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>
@endsection

