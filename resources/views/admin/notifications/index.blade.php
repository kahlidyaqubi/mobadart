@extends("layouts._admin_layout")

@section("title", "عرض الاشعارت")
@section("content")
    <div class="portlet-body " id="the_error"></div>
    <div class="portlet-body">
        @if($items->count()>0)
            <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer">
                <thead>
                <tr>
                    <th> الاشعار</th>
                    <th width="15%">التاريخ</th>
                    <th width="15%" class="hidden-xs"> إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <?php
                    $action = $item->data['action']; ?>
                    <tr>
                        <td> {{$action['title']}}</td>
                        <td> {{date('Y-m-d',strtotime($action['created_at']))}}</td>
                        <td width="17%" class="hidden-xs">
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button"
                                        data-toggle="dropdown"
                                        aria-expanded="false"> إجراءات
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{$action['link']}}" onclick="pop(this)" class="notfiylink"
                                           the_id='{{$item->id}}'>
                                            <span class="text-warning"><i class="fa fa-eye"></i> عرض </span></a>
                                    </li>
                                    <li>
                                        <a href="/admin/notification/delete/{{$item->id}}" class="Confirm">
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
    <script>

        function pop(e) {
            event.preventDefault();
            var the_id = e.getAttribute('the_id');
            var the_href = e.href;
            $.get('/getnotfiy/' + the_id, function (data, status) {
            });
            location.href = the_href;
        };

    </script>
@endsection

