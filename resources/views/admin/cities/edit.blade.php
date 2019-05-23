@extends("layouts._admin_layout")
@section("title", "تعديل مدينة ".$item->name)
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="/admin/city/{{$item->id}}" id="form_sample_1" class="form-horizontal">
                    {{csrf_field()}}
                    @method('patch')
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">اسم المدينة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{$item["name"]}}" data-required="1"
                                       class="form-control"/></div>
                        </div>
                        <div class="form-group" id="governorate_id">
                            <label class="control-label col-md-3">المحافظة
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="governorate_id">
                                    <option value="">أختر...</option>
                                    @foreach($governorates as $governorate)
                                        <option value="{{$governorate->id}}"
                                                @if($item["governorate_id"]==$governorate->id)selected @endif>{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">تعديل</button>
                                <a href="/admin/city" class="btn grey-salsa btn-outline">إلغاء</a>
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