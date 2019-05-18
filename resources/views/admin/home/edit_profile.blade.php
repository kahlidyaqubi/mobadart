@extends("layouts._admin_layout")

@section("title", "تعديل حساب ".$item->user->name)


@section("content")

    <form method="post" enctype="multipart/form-data" action="/admin/editProfile" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="profile-userpic">
                        <img src="https://pngimage.net/wp-content/uploads/2018/05/admin-avatar-png.png" class="img-responsive"
                             alt="" style="width:180px;height:175px;margin: 1px"> 
        </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->

<br>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">الإسم كاملا</label>
            <div class="col-sm-5">
                <input type="text" autofocus class="form-control" value="{{$item->user->name}}" id="name"
                       name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
            <div class="col-sm-5">
                <input type="email" class="form-control" value="{{$item->user->email}}" id="email" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="user_name" class="col-sm-2 col-form-label">اسم المستخدم</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{$item->user->user_name}}" id="user_name" name="user_name">
            </div>
        </div>
        <div class="form-group row">
            <label for="mobile" class="col-sm-2 col-form-label"> رقم الهاتف</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{$item["mobile"]}}" id="mobile" name="mobile">
            </div>
        </div>
        @if(!$item->super_admin)
        <div class="form-group row">
            <label for="family_center_id" class="col-sm-2 col-form-label">مركز العائلة</label>
            <div class="col-sm-5">
                <select class="form-control"  id="family_center_id" name="family_center_id">
                    <option value="">اختر مركزا</option>
                    @foreach($family_centers as $family_center)
                    <option value="{{$family_center->id}}" @if($family_center->id == $item->family_center->id)selected @endif>{{$family_center->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        @endif
        <div class="form-group row">
            <div class="col-sm-5 col-md-offset-2">
                <input type="submit" class="btn btn-success" value="تعديل"/>
                <a href="/admin" class="btn btn-light">الغاء الامر</a>
            </div>
        </div>
    </form>
@endsection
@section('css')
    <link href="{{asset('metronic-rtl/assets/pages/css/profile-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection