@extends("layouts._admin_layout")

@section("title", "نشطاء مبادرة ".$the_item->title)
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
                    @if($the_item->admin_id==auth()->user()->admin->id || auth()->user()->admin->super_admin==1)
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="accept">
                            <option value="">المقبولين والمتقدمين</option>
                            <option value="1" @if(request('accept')==1) selected @endif>المقبولين </option>
                            <option value="0" @if(request('accept')==='0') selected @endif>المتقدمين </option>
                        </select>
                    </div>
                    @endif
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="gender">
                            <option value="">الذكور والإناث</option>
                            <option value="M" @if(request('gender')=='M')selected @endif>الذكور</option>
                            <option value="F" @if(request('gender')=='F')selected @endif>الإناث</option>
                        </select>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <label>فــــرز حســــب الاهتمـــامـــات</label>
                        <select id="multi-select-demo" name="interests_ids[]" multiple="multiple">
                            @foreach($interests as $interest)
                                <option value="{{$interest->id}}" @if(collect(request('interests_ids'))->contains($interest->id))selected @endif>{{$interest->name}}</option>
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
                        @if($the_item->admin_id==auth()->user()->admin->id || auth()->user()->admin->super_admin==1)
                        <th>القبول</th>
                        @endif
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
                            @if($the_item->admin_id==auth()->user()->admin->id || auth()->user()->admin->super_admin==1)
                            <td> <input
                                        @if(!Auth::user()->admin->links->contains(\App\Link::where('title','=','قبول منضمين')
                                      ->first()->id)) disabled
                                        title="لا تملك صلاحية قبول منضمين"
                                        @endif
                                        class="cbActive" type="checkbox" {{$item->activists_initiatives->where('initiative_id',$the_item->id)->first()->accept==1?"checked":""}} value="{{$item->activists_initiatives->where('initiative_id',$the_item->id)->first()->id}}"/>
                            </td>
                            @endif
                            <td width="17%" class="hidden-xs">
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> إجراءات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
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
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-1 col-md-9">
                        <a href="/admin/initiative/{{$the_item->id}}" class="btn grey-salsa btn-outline">إلغاء</a>
                    </div>
                </div>
            </div>
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
    <script>
        $(function () {
            $(".cbActive").click(function () {
                var id = $(this).val();
                $.ajax({
                    url: "/admin/initiative/acceptActivit/" + id,
                    data: {_token: '{{ csrf_token() }}'},
                    error: function (jqXHR, textStatus, errorThrown) {

                    },
                });
            });
        });
    </script>
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

