@extends("layouts._admin_layout")

@section("title", "أخبار حساب ".$the_item->user->name)
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في عنوان الخبر"/>
                    </div>


                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="category_id">
                            <option value="">جميع الأقسام</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if($category->id==request('category_id')) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="initiative_id">
                            <option value="">جميع المبادرات</option>
                            @foreach($initiatives as $initiative)
                                <option value="{{$initiative->id}}"
                                        @if($initiative->id==request('initiative')) selected @endif>{{$initiative->title}}</option>
                            @endforeach
							<option value="no">لا ينتمي لمبادرة</option>
                        </select>
                    </div>
                    <div class="col-sm-1 " style="margin-top: 12px">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="portlet-body">
        @if($items->count()>0)
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer">
                    <thead>
                    <tr>
                        <th>عنوان الخبر</th>
                        <th> الناشر</th>
                        <th> القسم</th>
                        <th> المبادرة</th>

                        <th width="15%" class="hidden-xs"> إجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->title}}</td>
                            <td> {{$item->admin->user->name}}</td>
                            <td> {{$item->category->name}}</td>
                            <td>@if($item->initiative){{$item->initiative->title}} @else عام @endif </td>

                            <td width="17%" class="hidden-xs">
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> إجراءات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @if($item->admin_id==auth()->user()->admin->id || auth()->user()->admin->super_admin==1)
                                            <li>
                                                <a href="/admin/article/{{$item->id}}/edit">
                                                    <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                            </li>
                                            <li>
                                                <a href="/admin/article/delete/{{$item->id}}" class="Confirm">
                                                    <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                <span class="text-primary"><i
                                                            class="fa fa-newspaper-o"></i>التعليقات</span></a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="#">
                                                <span class="text-primary"><i
                                                            class="fa fa-newspaper-o"></i>عرض</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{$items->links()}}
                </table>
            </div>
        @else
            <br><br>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href="/admin/admin" class="btn grey-salsa btn-outline">إلغاء</a>
                    </div>
                </div>
            </div>
    </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')
@endsection

