@extends("layouts._admin_layout")

@section("title", "إدارة فئات الأخبار")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم الفئة "/>
                    </div>

                    <div class="col-sm-1 " style="margin-top: 12px">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>


                    <div class="col-sm-2 " style="margin-top: 12px">
                        <a class="btn btn-success" href="/admin/categoryArticle/create">اضافــة فئة جديدة</a>
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
                        <th width="10%"> #</th>
                        <th> اسم الفئة</th>
                        <th width="25%" class="hidden-xs"> إجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->id}}</td>
                            <td> {{$item->name}}</td>
                            <td width="25%" class="hidden-xs">
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> إجراءات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="/admin/categoryArticle/{{$item->id}}/edit">
                                                <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                        </li>
                                        <li>
                                            <a href="/admin/categoryArticle/delete/{{$item->id}}" class="Confirm">
                                                <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                        </li>
                                        <li>
                                            <a href="/admin/categoryArticle/articlesInCate/{{$item->id}}" >
                                                <span class="text-primary"><i class="fa fa-sitemap"></i>أخبار هذه الفئة</span></a>
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
    </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')
@endsection

