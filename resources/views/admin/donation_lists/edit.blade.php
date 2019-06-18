@extends("layouts._admin_layout")

@section("title", "تبرع المتبرع ".$item->financier_name . " للمبادرة ".$item->initiative->title)
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/donationList/{{$item->id}}" id="form_sample_1"
                      class="form-horizontal" >
                    {{csrf_field()}}
                    @method('patch')
                    <div class="form-body" >
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم المتبرع
                            </label>
                            <label class="control-label col-md-4">{{$item->financier_name}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">البريد الإلكتروني
                            </label>
                            <label class="control-label col-md-4">{{$item->financier_email}}
                            </label>
                        </div><div class="form-group">
                            <label class="control-label col-md-3">رقم التواصل
                            </label>
                            <label class="control-label col-md-4">{{$item->financier_phone}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم المتبرع
                            </label>
                            <label class="control-label col-md-4">{{$item->financier_name}}
                            </label>
                        </div><div class="form-group">
                            <label class="control-label col-md-3">رقم الحساب البنكي
                            </label>
                            <label class="control-label col-md-4">{{$item->bank_account}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">المبادرة
                            </label>
                            <label class="control-label col-md-4">{{$item->initiative->title}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">الدولة
                            </label>
                            <label class="control-label col-md-4">{{$item->country}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">العنوان
                            </label>
                            <label class="control-label col-md-4">{{$item->financier_address}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">المبلغ المنوي دفعه
                            </label>
                            <label class="control-label col-md-4">{{$item->amount}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">المبلغ المعتمد(المستلم)

                            </label>
                            <div class="col-md-2">
                                <input name="accept_amount" type="number" min="0" max="{{$item->amount}}" value="{{$item->accept_amount}}" class="form-control"/>
                                <span>المبلغ بالدولار &#36;</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">حفظ</button>
                                <a href="/admin/donationList" class="btn grey-salsa btn-outline">إلغاء</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

    </div>



@endsection
@section('css')
    <style>
        .form-horizontal .control-label { text-align:right !important;padding-right: 5%}
    </style>
@endsection
@section('js')
@endsection