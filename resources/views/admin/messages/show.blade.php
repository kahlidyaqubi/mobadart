@extends("layouts._admin_layout")

@section("title", " رسالة $item->name")
@section("content")
    <div class="row">
        <div class="col-xs-10 padding-0 margin-0" style="padding-right:15px ; padding-left:0">
            <table class="table table-bordered padding-0 margin-0">
                <thead>
                <tr>
                    <th colspan=3 width="40%">المرسل : {{ $item->name }}</th>
                    <th > {{ date('d-m-Y', strtotime($item->created_at)) }}</th>
                    <th > {{ $item->email }}</th>
                    @if($item->mopile)<th > {{ $item->mopile }}</th>@endif
                </tr>
                </thead>
                <tbody>
                <tr>

                    <td colspan=6>{{ $item->content }}</td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-group row">
	 <div class="col-sm-1 col-md-offset-1">
	<a style="background-color: #0ab20a;color: #fceeb6" class="btn grey-salsa btn-outline" href = "mailto:{{ $item->email }}"> رد بالبريد الإلكتروني </a>
           </div>         
        <div class="col-sm-5 col-md-offset-1">
            <a href="/admin/siteSting/message" class="btn btn-success">الغاء الامر</a>
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')
@endsection

