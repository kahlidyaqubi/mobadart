@extends("layouts._admin_layout")

@section("title", "إدارة المدن")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في المدينة "/>
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


                    <div class="col-sm-1 " style="margin-top: 12px">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>


                    <div class="col-sm-2 " style="margin-top: 12px">
                        <a class="btn btn-success" href="/admin/city/create">اضافــة مدينة جديدة</a>
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
                    <th width="10%"> #</th>
                    <th> اسم المدينة</th>
                    <th> اسم المحافظة</th>
                    <th width="15%" class="hidden-xs"> إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td> {{$item->id}}</td>
                        <td> {{$item->name}}</td>
                        <td> {{$item->governorate->name}}</td>
                        <td width="17%" class="hidden-xs">
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button"
                                        data-toggle="dropdown"
                                        aria-expanded="false"> إجراءات
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/admin/city/{{$item->id}}/edit">
                                            <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                    </li>
                                    <li>
                                        <a href="/admin/city/delete/{{$item->id}}" class="Confirm">
                                            <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                    </li>
                                    <li>
                                        <a href="/admin/governorate/familyInCity/{{$item->id}}" >
                                            <span class="text-primary"><i class="fa fa-sitemap"></i>مراكز المدينة</span></a>
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

@endsection
@section('js')
@endsection

