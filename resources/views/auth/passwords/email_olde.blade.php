@extends("layouts._forest_layout")

@section("title", "استعادة كلمة المرور")
@section("content")
    <div class="row justify-content-center mb-5">
        <h3>استرجاع كلمة المرور</h3>
    </div>

    <div class="form-gap" style="margin-top:-100px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">هل نسيت كلمة المرور ؟</h2>
                            <p style="font-size:17px">أدخل ايميلك ليتم استعادتها</p>
                            <div class="panel-body">
                                <!--div for validation  -->
                                @include("_first_msg")
                                <form method="POST" action="{{ route('password.email') }}" id="register-form" role="form" autocomplete="off" class="form">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="email" name="email" value="{{ old('email') }}" required placeholder="الايميل "
                                                   class="in form-control" type="email"
                                                   style="padding:10px;margin-bottom: 0px">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="recover-submit" class="btn btn-lg btn-block" style="background: #c4233d;border-radius:20px;color:white">
                                            استرجاع كلمة المرور
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('js')
@endsection