@extends("layouts._admin_layout")

@section("title", "إدارة رسائل الزوار")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-5 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم المرسل او هاتفه او البريد او الرسالة "/>
                    </div>
                    <div class="col-sm-3" style="    width: 114px;margin-top: 11px"> بحث في تاريخ</div>

                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="date" class="form-control"name="created_at" value="{{request('created_at')}}"
                               />
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
                    <th>المرسل</th>
                    <th width="45%">المحتوى</th>
                    <th >البريد</th>
                    <th >الهاتف</th>
                    <th >التاريخ</th>
                    <th width="15%" class="hidden-xs"> إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$item->name}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" >{{$item->content}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$item->email}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" >{{$item->mopile}}</td>
                        <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                <td width="17%" class="hidden-xs">
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button"
                                        data-toggle="dropdown"
                                        aria-expanded="false"> إجراءات
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/admin/siteSting/message/{{$item->id}}">
                                            <span class="text-warning"><i class="fa fa-eye"></i> عرض </span></a>
                                    </li>
                                    <li>
                                        <a href="/admin/siteSting/message/delete/{{$item->id}}" class="Confirm">
                                            <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
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

