@extends("layouts._sixth_layout")

@section("title", "تعديل كلمة المرور")
@section("content")
    <div class="container" style="min-height: 395px">
        <div class="row justify-content-center">
            <h1>تعديل كلمة المرور</h1>
        </div>
        <div class="d-flex justify-content-center h-100">
            <!--form -->
            <form method="post" action="/activist/changePassword">
                {{csrf_field()}}
                <div class="row">
                    <div class="col">
                        <div class="card" style="border-radius:20px;">
                            <div class="card-header">
                                <div class="d-flex justify-content-center ">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                            </div>
                            <!--div for validation  -->
                            @include("_first_msg")
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="mb-3 input-group col-md-12">
                                        <input  value="{{old("old_password")}}" id="old_password" name="old_password" placeholder="كلمة المرور القديمة" class="form-control" type="password" style="border-radius:20px;width:300px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 input-group col-md-12">
                                        <input  value="{{old("password")}}" id="password" name="password" placeholder="كلمة المرور الجديدة " class="form-control" type="password" style="border-radius:20px;width:300px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 input-group col-md-12">
                                        <input value="{{old("password_confirmation")}}" id="password_confirmation" name="password_confirmation" placeholder="تأكيد كلمة المرور الجديدة " class="form-control" type="password" style="border-radius:20px;width:300px;">
                                    </div>
                                </div>

                                <!--زر تأكيد -->
                                <div class=" form-group" style="margin-top:50px;">
                                    <div class="row justify-content-center">
                                        <div class="col-xs-7 col-md-6 ">
                                            <button type="submit" style="background:#c4233d;text-decoration:none;color:white;padding:20px;padding-left:40px;padding-right:40px;border-radius:20px;">اعتماد كلمة المرور الجديدة</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
@section("css")

@endsection
@section('js')

@endsection