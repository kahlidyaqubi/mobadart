@extends("layouts._admin_layout")

@section("title", "إضافة خبر")
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/article" enctype="multipart/form-data" id="form_sample_1"
                      class="form-horizontal">
                    {{csrf_field()}}
                    @if($initiative)
                        <input type="hidden" name="initiative_id" value="{{$initiative->id}}">
                    @endif
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">عنوان الخبر
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="title" value="{{old("title")}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">القسم
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select name="category_id" data-required="1"
                                        class="form-control">
                                    <option value="">اختر</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category -> id}}" {{old('category_id')==$category -> id?"selected":""}}>{{$category -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">المبادرة
                            </label>
                            <div class="col-md-4">
                                @if(!$initiative)
                                    <select name="initiative_id" data-required="1"
                                            class="form-control">
                                        <option value="">اختر</option>
                                        @foreach($initiatives as $initiative)
                                            <option value="{{$initiative -> id}}" {{old('initiative_id')==$initiative -> id?"selected":""}}>{{$initiative -> title}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block"> اختياري | سيكون الخبر غير تابع لأي مبادرة </span>
                                @else
                                    {{$initiative->title}}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">الصورة الرئيسية
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="main_image" class="form-control" accept='image/*'
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">صور أخرى
                            </label>
                            <div class="col-md-4">
                                <input type="file" multiple name="images[]" class="form-control" accept='image/*'
                                >
                                <span class="help-block"> حقل اختياري </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">وصف الخبر
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <textarea type="text" name="detalis" data-required="1"
                                          class="form-control">
                                    {{old("detalis")}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">أضف المحتوى
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <textarea name="the_file" class="form-control my-editor">{{old("the_file")}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">إنشاء</button>
                                <a href="/admin/article" class="btn grey-salsa btn-outline">إلغاء</a>
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js?apiKey=tvz10gsfkdi95v46ht76944xjv437ed3apv2id60nuthpye8"></script>
    <script>

        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };


        tinymce.init(editor_config);

    </script>
@endsection

