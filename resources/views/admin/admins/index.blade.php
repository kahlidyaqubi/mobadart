@extends("layouts._admin_layout")

@section("title", "إدارة الحسابات")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم أو اسم المستخدم أو البريد أو الهاتف"/>
                    </div>

                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="super_admin">
                            <option value="">جميع الحسابات</option>
                            <option value="1" @if($super_admin==1)selected @endif>مدراء النظام</option>
                            <option value="0" @if($super_admin==='0')selected @endif>المنشطين</option>

                        </select>
                    </div>

                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="family_center_id">
                            <option value="">جميع مراكز العائلة</option>
                            @foreach($family_centers as $family_center)
                                <option value="{{$family_center->id}}"
                                        @if($family_center->id==$family_center_id) selected @endif>{{$family_center->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1 " style="margin-top: 12px">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>


                    <div class="col-sm-2 " style="margin-top: 12px">
                        <a class="btn btn-success" href="/admin/admin/create">اضافــة حساب جديد</a>
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
                        <th> #</th>
                        <th> الإسم كاملاً</th>
                        <th> البريد الإلكتروني</th>
                        <th> رقم التواصل</th>
                        <th> مركز العائلة</th>
                        <th> نوع الحساب</th>
                        <th width="15%" class="hidden-xs"> إجراءات</th>
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
                                            <a href="/admin/admin/{{$item->id}}/edit">
                                                <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                        </li>
                                        <li>
                                            <a href="/admin/admin/permission/{{$item->id}}">
                                                <span class="text-info"><i class="icon-lock"></i> تعديل الصلاحيات</span></a>
                                        </li>
                                        <li>
                                            <a href="/admin/admin/delete/{{$item->id}}" class="Confirm">
                                                <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                        </li>
                                        @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة الأخبار')->first()->id))

                                            <li>
                                                <a href="/admin/admin/articleToAdmin/{{$item->id}}">
                                                    <span class="text-primary"><i
                                                                class="fa fa-newspaper-o"></i>أخباره</span></a>
                                            </li>

                                        @endif
                                        @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إضافة مبادرة')->first()->id))
                                            <li>
                                                <a href="/admin/initiative/create?id={{$item->id}}">
                                                    <span class="text-primary"><i
                                                                class="fa fa-plus"></i>أنشئ مبادرة</span></a>
                                            </li>
                                        @endif
                                        @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة المبادرات')->first()->id))
                                            <li>
                                                <a href="/admin/admin/initiaveToAdmin/{{$item->id}}">
                                                    <span class="text-primary"><i
                                                                class="fa fa-users"></i>مبادراته</span></a>
                                            </li>
                                        @endif
                                        @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','صلاحيات حساب')->first()->id))
                                            <li>
                                                <a href="/admin/admin/hisCategoty/{{$item->id}}">
                                                    <span class="text-primary"><i class="fa fa-sitemap"></i>فئاته</span></a>
                                            </li>
                                        @endif
                                        @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة النماذج')->first()->id))
                                            <li>
                                                <a href="#">
                                                    <span class="text-primary"><i
                                                                class="fa fa-reply-all"></i>ردوده</span></a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="text-primary"><i
                                                                class="fa fa-comment"></i>نماذجه</span></a>
                                            </li>
                                        @endif
                                        @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة التقيمات')->first()->id))
                                            <li>
                                                <a href="/admin/admin/evaluteToAdmin/{{$item->id}}">
                                                    <span class="text-primary"><i
                                                                class="fa fa-comment"></i>تقيماته</span></a>
                                            </li>
                                        @endif
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

