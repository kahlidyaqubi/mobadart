@extends("layouts._admin_layout")

@section("title", "تعديل الفئة ".$item->name)
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/categoryArticle/{{$item->id}}" id="form_sample_1" class="form-horizontal">
                    {{csrf_field()}}
                    @method('patch')
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم فئة الطلب
                                <span class="required"> * </span>
                            </label>
                            <input type="hidden" value="1" name="type">
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{$item["name"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">تعديل</button>
                                <a href="/admin/categoryArticle" class="btn grey-salsa btn-outline">إلغاء</a>
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