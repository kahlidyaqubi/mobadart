@extends("layouts._first_layout")

@section("title", "تقديم تبرع لمبادرة")
@section("content")

    <div class="row justify-content-center">
        <h1>المتبرع</h1>
    </div>
    <div class="d-flex justify-content-center h-100">
        <!--form -->
        <form method="post" action="/donationList">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-center ">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <!--div for validation  -->
                        @include("_first_msg")
                        <div class="card-body">
                            <!--الحساب البنكي لمعاً  -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الحساب البنكي لمعاً</span>
                                </div>
                                <input readonly type="number" class="form-control" value="{{$site_bank_account}}" placeholder=" 7653417865">
                            </div>
                            <!-- المبادرة -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">المبادرة</span>
                                </div>
                                <select name="initiative_id" class="form-control" >
                                    <option value="">اختر مبادرة</option>
                                    @foreach($initiatives as $initiative)
                                        <option value="{{$initiative -> id}}" {{old('initiative_id')==$initiative -> id?"selected":""}}>{{$initiative -> title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--الحساب البنكي للممول  -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الحساب البنكي للمتبرع</span>
                                </div>
                                <input required type="number" name="bank_account" value="{{old('bank_account')}}" class="form-control"
                                       placeholder="أدخل رقم الحساب البنكي الخاص بك">
                            </div>
                            <!--اسم الممول  -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">اسم المتبرع</span>
                                </div>
                                <input required type="text" name ="financier_name" value="{{old('financier_name')}}" class="form-control" placeholder="أدخل اسمك كاملاً">
                            </div>
                            <!--  المبلغ-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">المبلغ</span>
                                </div>
                                <input required type="number" name="amount" value="{{old('amount')}}" class="form-control"
                                       placeholder="أدخل المبلغ الذي تود التبرع به لصالح المبادرة ">
                                <span class="input-group-text">$ المبلغ بالدولار</span>
                            </div>
                            <!-- الايميل -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الإيميل</span>
                                </div>
                                <input required type="email" name="financier_email" value="{{old('financier_email')}}" class="form-control" placeholder="أدخل إيميلك ">
                            </div>
                            <!--  رقم للتواصل-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">رقم للتواصل</span>
                                </div>
                                <input required type="number" name="financier_phone" value="{{old('financier_phone')}}" class="form-control"
                                       placeholder="أدخل رقم للتواصل معك من خلاله">
                            </div>
                            <!--  الدولة-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الدولة</span>
                                </div>
                                <select name="country"  class="form-control" placeholder="اختر الدولة">
                                    <option value="">
                                        اختر دولة
                                    </option>
                                    @foreach($countries as $country)
                                        <option value="{{$country -> name}}" {{old('country')==$country -> name?"selected":""}}>{{$country -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--  العنوان-->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">العنوان</span>
                                </div>
                                <input required type="text" value="{{old('financier_address')}}" name="financier_address" class="form-control" placeholder="أدخل عنوانك كاملاً">
                            </div>
                            <!--زر تأكيد -->
                            <div class=" form-group" style="margin-top:50px;">
                                <div class="row justify-content-center">
                                    <div class="col-xs-7 col-md-4 ">
                                        <button  type="submit" style="background:#c4233d;text-decoration:none;color:white;padding:20px;padding-left:40px;padding-right:40px;border-radius:20px;">تأكيد</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('css')
<style>
    input[type="radio"] {
        margin-right: -35px;
        height: 25px;
    }
    .card{
        background: white!important;
        border-radius: 20px;
        width:700px;
        height: 590px;
    }
    .input-group-prepend span{
        width:165px;
    }
    .input-group-prepend span{
        color:white;
    }
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    body{
        background-image:url('/platform/dist/images/euro.jpg');
    }
    .fas{
        font-size: 30px;
    }
    .card{
        height: auto;
    }
    @media (max-width: 670px) {
        .card {
            width:356px;
        }
        .validation{
            width:330px;
        }

        ::-webkit-input-placeholder {
            font-size: 7px;
        }
    }
</style>
@endsection
@section('js')

@endsection