@extends("layouts._scand_layout")

@section("title", "اعادة تعيين كلمة المرور")
@section("content")
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-default" >
                <div class="panel-body">
                    <div class="text-center">
                        <h1><i class="fas fa-user-alt"></i></h1>
                        <div class="panel-body">
                            <!--div for validation  -->
                            @include("_first_msg")
                            <form method="POST" action="{{ route('password.request') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <div class="mb-3 input-group col-md-12">
                                        <input id="password" type="email" name="email"
                                               value="{{ $email ?? old('email') }}" required autofocus
                                               placeholder="البريد الإلكتروني "
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 input-group col-md-12">
                                        <input id="password" type="password" name="password" required
                                               placeholder="كلمة المرور الجديدة "
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mb-3 input-group col-md-12">
                                        <input id="password" type="password" name="password_confirmation" required
                                               placeholder="تأكيد كلمة المرور الجديدة"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="recover-submit" class="btn btn-lg btn-block" style="background: #c4233d;border-radius:20px;color:white">
                                        تعديل
                                    </button></div>
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