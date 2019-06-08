@extends("layouts._admin_layout")

@section("title", "تعديل معلومات الموقع")
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/siteSting/editSting" enctype="multipart/form-data" id="form_sample_1" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">عنوان الموقع والنافذة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="title_page" value="{{$item["title_page"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم المشروع
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="project_title" value="{{$item["project_title"]}}"
                                       data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">عن المشروع
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                                <textarea class="form-control" name="about_project" rows='5'
                                                          required>{{$item["about_project"]}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">الصورة العليا
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="the_img1" class="form-control" accept='image/*'>
                                <span>اقل عرض : 890، اقل ارتفاع : 500 </span>
                            </div>
                            <img style="padding:1px;background-color:#fff;border:1px solid #ccc;"
                                 width="100px" height="100px" src='{{asset("$item->img1")}}'/>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">من نحن
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                                <textarea class="form-control" name="who_are" rows='5'
                                                          required>{{$item["who_are"]}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">صورة من نحن
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="the_img2" class="form-control" accept='image/*'>
                            </div>
                            <img style="padding:1px;background-color:#fff;border:1px solid #ccc;"
                                 width="100px" height="100px" src='{{asset("$item->img2")}}'/>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">عبارة تحفيزية
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="motivational_words" value="{{$item["motivational_words"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">صورة العبارة التحفيزية
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="the_img3" class="form-control" accept='image/*'>
                            </div>
                            <img style="padding:1px;background-color:#fff;border:1px solid #ccc;"
                                 width="100px" height="100px" src='{{asset("$item->img3")}}'/>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">وصف التجارب الملهمة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                                <textarea class="form-control" name="experiences" rows='5'
                                                          required>{{$item["experiences"]}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">العنوان كاملاً
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="address" value="{{$item["address"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">البريد الإلكتروني
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="email" name="email" value="{{$item["email"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">رقم التواصل الأول
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="number" class="form-control"
                                       value="{{$item["mobile1"]}}"
                                       name="mobile1"
                                       maxlength="10" minlength="6" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">رقم التواصل الثاني
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="number" class="form-control"
                                       value="{{$item["mobile2"]}}"
                                       name="mobile2"
                                       maxlength="10" minlength="6" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">رقم الحساب البنكي
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="number" class="form-control"
                                       value="{{$item["bank_account"]}}"
                                       name="bank_account"
                                       maxlength="15" minlength="4" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">رسالة طلب انضمام لمبادرة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="accession_msg" value="{{$item["accession_msg"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">رسالة واشعار قبول ناشط في مبادرة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="acceptance_msg" value="{{$item["acceptance_msg"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">رسالة استلام تبرع
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="donation_msg" value="{{$item["donation_msg"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">تعديل</button>
                                <a href="/admin" class="btn grey-salsa btn-outline">إلغاء</a>
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
@endsection