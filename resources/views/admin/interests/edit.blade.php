@extends("layouts._admin_layout")

@section("title", "تعديل اهتمام ".$item->name)
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/interest/{{$item->id}}" id="form_sample_1" class="form-horizontal">
                    {{csrf_field()}}
                    @method('patch')
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم الاهتمام
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{$item["name"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>

                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">معتمدة
                            </label>
                            <div class="col-md-4">
                                <input  type="hidden" class="form-control" name="status" {{$item["status"]==1?"checked":""}} value="0"/>
                                <input  type="checkbox"   name="status" {{$item["status"]==1?"checked":""}} value="1"/>
                        </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">تعديل</button>
                                <a href="/admin/interest" class="btn grey-salsa btn-outline">إلغاء</a>
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