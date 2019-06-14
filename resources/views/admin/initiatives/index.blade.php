@extends("layouts._admin_layout")

@section("title", "إدارة المبادرات")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في العنوان أو اسم المنشط أو اسم الفريق"/>
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
                    <div class="col-sm-3" style="margin-top: 12px">
                        <select class="form-control" name="donation">
                            <option value="">حسب التمويل</option>
                            <option value="1" @if(request('donation')=='1')selected @endif>بحاجة لتمويل</option>
                            <option value="0" @if(request('donation')==='0')selected @endif>لا تحتاج تمويل</option>
                        </select>
                    </div>
                    <div class="col-sm-1" style="padding-top: 15px">تاريخ العمل</div>
                    <div class="col-sm-2 " style="margin-top: 12px">
                        <input type="date" class="form-control" name="in_date" value="{{request('in_date')}}"
                               placeholder="تاريخ العمل"/>
                    </div>
                    <div class="col-sm-1" style="padding-top: 15px">تاريخ البدء/من</div>
                    <div class="col-sm-2 " style="margin-top: 12px">
                        <input type="date" class="form-control" name="start_date" value="{{request('start_date')}}"
                               placeholder="تاريخ البدء"/>
                    </div>
                    <div class="col-sm-1" style="padding-top: 15px">تاريخ الانتهاء/إلى</div>
                    <div class="col-sm-2 " style="margin-top: 12px">
                        <input type="date" class="form-control" name="end_date" value="{{request('end_date')}}"
                               placeholder="تاريخ الانتهاء"/>
                    </div>
                    <div class="col-sm-12">
                        <label>فــــرز حســــب الاهتمـــامـــات</label>
                        <select id="multi-select-demo" name="interests_ids[]" multiple="multiple">
                            @foreach($interests as $interest)
                                <option value="{{$interest->id}}"
                                        @if(collect(request('interests_ids'))->contains($interest->id))selected @endif>{{$interest->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1 " style="margin-top: 12px">
                        <button type="submit" style="width:70px;" title="بحث" value="search"
                                class="btn btn-primary"/>
                        بحث
                        </button>
                    </div>


                    <div class="col-sm-2 " style="margin-top: 12px">
                        <a class="btn btn-success" href="/admin/initiative/create">انشاء مبادرة جديدة</a>
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
                        <th>عنوان المبادرة</th>
                        <th> اسم المنشط</th>
                        <th>اسم الفريق</th>
                        <th> المدينة</th>
                        <th>التمويل</th>
                        <th> البدء</th>
                        <th>الانتهاء</th>
                        <th width="15%" class="hidden-xs"> إجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->id}}</td>
                            <td> {{$item->title}}</td>
                            <td> {{$item->admin->user->name}}</td>
                            <td> {{$item->team_name}}</td>
                            <td> {{$item->city->name}}</td>
                            <td> {{$item->donation}}</td>
                            <td> {{date('d-m-Y', strtotime($item->start_date))}}</td>
                            <td> {{date('d-m-Y', strtotime($item->end_date))}}</td>
                            <td width="17%" class="hidden-xs">
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> إجراءات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @if($item->admin_id==auth()->user()->admin->id || auth()->user()->admin->super_admin==1)

                                            <li>
                                                <a href="/admin/initiative/{{$item->id}}/edit">
                                                    <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                            </li>
                                            <li>
                                                <a href="/admin/initiative/delete/{{$item->id}}" class="Confirm">
                                                    <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                            </li>

                                            <li>
                                                <a href="/admin/initiative/activitsInInitiative/{{$item->id}}">
                                                    <span class="text-primary"><i
                                                                class="fa fa-users"></i>المنضمين</span></a>
                                            </li>
                                            <li>
                                                <a href="/admin/initiative/activitsInInitiative/{{$item->id}}?accept=0">
                                                    <span class="text-primary"><i class="fa fa-users"></i>طلبات الانضمام</span></a>
                                            </li>

                                            @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إضافة خبر')->first()->id))
                                                <li>
                                                    <a href="/admin/article/create?initiative_id={{$item->id}}">
                                                        <span class="text-primary"><i class="fa fa-plus"></i>أضف خبر</span></a>
                                                </li>
                                            @endif
                                        @endif
                                        <li>
                                            <a href="/admin/initiative/{{$item->id}}">
                                                <span class="text-primary"><i
                                                            class="fa fa-newspaper-o"></i>عرض</span></a>
                                        </li>
                                        @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة الأخبار')->first()->id))
                                                <li>
                                                    <a href="/admin/initiative/articleToInitiave/{{$item->id}}">
                                                    <span class="text-primary"><i
                                                                class="fa fa-sitemap"></i>أخبارها</span></a>
                                                </li>
                                            @endif
                                            @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة التقيمات')->first()))
                                                <li>
                                                    <a href="/admin/initiative/evaluteToInitiave/{{$item->id}}">
                                                    <span class="text-primary"><i
                                                                class="fa fa-sitemap"></i>تقييماتها</span></a>
                                                </li>
                                            @endif
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

