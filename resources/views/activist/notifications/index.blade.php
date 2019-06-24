@extends("layouts._thirst_layout")

@section("title", "جميع الاشعارات")
@section("content")

    <div class="row">
        <div class="col text-center ">
            <h1>جميع الإشعارت</h1>
        </div>
    </div>
    <div class="row" style="min-height: 190px">
        @include("_first_msg")
        <table class="table table-striped ">
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
                            <a class="btn btn-xs green notfiylink" href="{{$action['link']}}" onclick="pop(this)"
                               the_id='{{$item->id}}'>عرض
                                <i class="fa fa-eye"></i>
                            </a>
                            <a class="btn btn-xs green" href="/activist/notification/delete/{{$item->id}}" class="Confirm">حذف
                                <i class="icon-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
            {{$items->links()}}
        </table>



    </div>

    <!-- pagination div -->
    <div class="row  " style="margin-top:50px;">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 text-center">
            {{$items->links()}}

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