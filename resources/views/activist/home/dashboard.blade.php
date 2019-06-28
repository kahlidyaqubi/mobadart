@extends("layouts._sixth_layout")

@section("title", "البروفايل")
@section("content")
    <div class="row justify-content-center">
        <h1>الملف الشخصي</h1>
    </div>
    <div class="d-flex justify-content-center h-100">
        <div class="row">
            <div class="col">
                <div class="card" style="border-radius:20px;">
                    <div class="card-header">
                        <div class="d-flex justify-content-center ">
                            @if($item->gender=='M')
                                <img src="/images/male.png"
                                     class="img-responsive pic-bordered" alt=""/>
                            @else
                                <img src="/images/female.png"
                                     class="img-responsive pic-bordered" alt=""/>
                            @endif
                        </div>
                    </div>
                    <div class="card-body" >
                        <div class="btn-group "role="group" aria-label="Basic example" style="width:100%;margin-bottom: 17px" >
                            <button type="button" class="btn btn-secondary col-md-3"><a href="/activist/hisInitiave" style="color:#fff">مبادراتي</a>
                            </button>
                            <button type="button" class="btn btn-secondary col-md-3"><a href="/activist/evalution" style="color:#fff">تقييماتي</a>
                            </button>
                            <button type="button" class="btn btn-secondary col-md-3"><a href="/initiative" style="color:#fff">تصفح
                                    المبادرات</a></button>
                            <button type="button" class="btn btn-secondary col-md-3"><a href="/activist/editProfile" style="color:#fff">تعديل
                                    البروفايل</a></button>
                            <button type="button" class="btn btn-secondary col-md-3"><a href="/activist/changePassword" style="color:#fff">تعديل
                                    كلمة المرور</a></button>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">اسم الناشط</label>
                            <div class="col">
                                {{$item->user->name}} {{$item->user->father_name}} {{$item->user->grand_father_name}} {{$item->user->last_name}}
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">اسم المستخدم</label>
                            <div class="col">
                                {{$item->user->user_name}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">حساب الفيس بوك</label>
                            <div class="col">
                                {{$item->face_url}}
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">الايميل</label>
                            <div class="col">
                                {{$item->user->email}}
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">الجنس</label>
                            <div class="col">
                                {{$item->gender}}
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">رقم التواصل</label>
                            <div class="col">
                                {{$item->mobile}}
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">رقم الهوية</label>
                            <div class="col">
                                {{$item->ido}}
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">العمر</label>
                            <div class="col">
                                {{\Carbon\Carbon::parse($item->brth_day)->age}}
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">العنوان </label>
                            <div class="col">
                                {{$item->city->governorate->name}} / {{$item->city->name}}
                                / {{$item->neighborhood}}
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="inputPassword" class="col-sm-4 col-form-label">الاهتمامات </label>
                            <div class="col">
                                @foreach($hisinterests as $interests )
                                    @if($interests->status==1)
                                        <span class="badge badge-warning">{{$interests->name}}</span>
                                    @else
                                        <span class="badge badge-info">{{$interests->name}}</span>

                                    @endif
                                @endforeach
                            </div>
                        </div>

                        @if($item->shared)
                            <div class="form-group row ">
                                <label for="inputPassword" class="col-sm-4 col-form-label">الزوايا السابقة التي استفاد منها في مراكز العائلة</label>
                                <div class="col">
                                    {{$item->shared_ditalis}}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("css")

@endsection
@section('js')

@endsection