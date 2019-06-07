@extends("layouts._admin_layout")

@section("title", "إدارة التقييمات")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم الشخص "/>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="initiative_id">
                            <option value="">جميع المبادرات</option>
                            @foreach($initiatives as $initiative)
                                <option value="{{$initiative->id}}"
                                        @if($initiative->id==request('initiative')) selected @endif>{{$initiative->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="status">
                            <option value="">النوع</option>
                            <option value="1" @if(request('status')=='1')selected @endif>تقييم المنشط</option>
                            <option value="0" @if(request('status')==='0')selected @endif>تقييم النشطاء</option>
                        </select>
                    </div>
                    <div class="col-sm-1 " style="margin-top: 12px">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
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
                        <th> اسم الشخص</th>
                        <th>المبادرة</th>
                        <th width="25%" class="hidden-xs"> إجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->id}}</td>
                            <td> @if($item->admin){{$item->admin->user->name}}@elseif($item->activist)
                                    {{$item->activist->user->name}} {{$item->activist->user->last_name}} @endif</td>
                            <td> {{$item->initiative->title}}</td>
                            <td width="25%" class="hidden-xs">
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> إجراءات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @if($item->admin)
                                            @if(auth()->user()->admin->id==$item->admin->id)
                                                <li>
                                                    <a href="/admin/evalution/{{$item->id}}/edit">
                                                        <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                                </li>
                                            @endif
                                        @endif
                                        <li>
                                            <a href="/admin/evalution/{{$item->id}}">
                                                <span class="text-primary"><i
                                                            class="fa fa-eye"></i>عرض</span></a>
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

