@extends("layouts._admin_layout")

@section("title", "منشطين مركز عائلة ".$item->name)
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم أو اسم المستخدم أو البريد أو الهاتف"/>
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
            <div class="table-scrollable" >
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th> الإسم كاملاً</th>
                        <th> البريد الإلكتروني</th>
                        <th> رقم التواصل</th>
                        <th> مركز العائلة</th>
                        <th> نوع الحساب</th>
                        <th width="15%"  class="hidden-xs"> إجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->id}}</td>
                            <td> {{$item->user->name}}</td>
                            <td> {{$item->user->email}}</td>
                            <td> {{$item->mobile}}</td>
                            <td> @if(!$item->super_admin) {{$item->family_center->name}} @else عام @endif</td>
                            <td> @if($item->super_admin)مدير نظام @else منشط  @endif</td>
                            <td width="17%" class="hidden-xs">
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> إجراءات
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#" >
                                                <span class="text-primary"><i class="fa fa-newspaper-o"></i>أخباره</span></a>
                                        </li>
                                        <li>
                                            <a href="#" >
                                                <span class="text-primary"><i class="fa fa-users"></i>مبادراته</span></a>
                                        </li>
                                        <li>
                                            <a href="#" >
                                                <span class="text-primary"><i class="fa fa-sitemap"></i>فئاته</span></a>
                                        </li>
                                        <li>
                                            <a href="#" >
                                                <span class="text-primary"><i class="fa fa-reply-all"></i>ردوده</span></a>
                                        </li>
                                        <li>
                                            <a href="#" >
                                                <span class="text-primary"><i class="fa fa-comment"></i>نماذجه</span></a>
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
                    <div class="col-md-offset-1 col-md-9">
                        <a href="/admin/family_center" class="btn grey-salsa btn-outline">إلغاء</a>
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

