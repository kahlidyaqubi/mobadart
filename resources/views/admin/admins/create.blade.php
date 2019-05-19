@extends("layouts._admin_layout")

@section("title", "إضافة حساب")
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/admin" id="form_sample_1" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">الإسم كاملا
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{old("name")}}" data-required="1" class="form-control" /> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">البريد الإلكتروني
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input name="email" type="text" value="{{old("email")}}" class="form-control" /> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">إسم المستخدم
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="user_name" value="{{old("user_name")}}" data-required="1" class="form-control" /> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">كلمة المرور
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="password" name="password"  data-required="1" class="form-control" /> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">الهاتف
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input name="mobile" type="text" value="{{old("mobile")}}" class="form-control" /> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">نوع الحساب
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="super_admin">
                                    <option value="">أختر...</option>
                                    <option value="1" @if(old("super_admin")==1)selected @endif>مدير نظام</option>
                                    <option value="0" @if(old("super_admin")==='0')selected @endif>منشط</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="family_center" style="display: none">
                            <label class="control-label col-md-3">مركز العائلة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="family_center_id">
                                    <option value="">أختر...</option>
                                    @foreach($family_centers as $family_center)
                                    <option value="{{$family_center->id}}" @if(old("family_center_id")==$family_center)selected @endif>{{$family_center->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">إنشاء</button>
                                <a href="/admin/admin" class="btn grey-salsa btn-outline">إلغاء</a>
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

@endsection
@section('js')
    <script>

            $(document).ready(function(){

                if($("[name='super_admin']").val()==='0'){
                    $('#family_center').show();
                }
                if($("[name='super_admin']").val()==1){
                    $("[name='family_center_id']").val('');
                    $('#family_center').hide();
                }
            });

            $("[name='super_admin']").change(function(){
                if($("[name='super_admin']").val()==='0'){
                    $('#family_center').show();
                }
                if($("[name='super_admin']").val()==1){
                    $("[name='family_center_id']").val('');
                    $('#family_center').hide();
                }
            });
    </script>
@endsection

