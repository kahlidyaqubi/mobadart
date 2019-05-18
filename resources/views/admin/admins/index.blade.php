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
                        <select class="form-control" name="category_id">
                            <option value="">جميع الحسابات</option>
                            <option value="">مدراء النظام</option>
                            <option value="">المنشطين</option>

                        </select>
                    </div>

                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="category_id">
                            <option value="">جميع مراكز العائلة</option>
                            <option value="">غزة</option>

                        </select>
                    </div>

                    <div class="col-sm-1 " style="margin-top: 12px">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>


                    <div class="col-sm-2 " style="margin-top: 12px">
                        <a class="btn btn-success" href="/account/article/create">اضافــة حساب جديد</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="portlet-body">
        <div class="table-scrollable" style="overflow:visible">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th> #</th>
                    <th> الإسم كاملاً</th>
                    <th> البريد الإلكتروني</th>
                    <th> رقم التواصل</th>
                    <th> مركز العائلة</th>
                    <th> توع الحساب</th>
                    <th width="15%"> إجراءات</th>
                </tr>
                </thead>
                <tbody>
                <tr class="active">
                    <td> 1</td>
                    <td> active</td>
                    <td> Column heading</td>
                    <td> Column heading</td>
                    <td> Column heading</td>
                    <td> Column heading</td>
                    <td width="17%">
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button"
                                    data-toggle="dropdown"
                                    aria-expanded="false"> إجراءات
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">
                                        <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text-info"><i class="icon-lock"></i> تعديل الصلاحيات</span></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td> 1</td>
                    <td> active</td>
                    <td> Column heading</td>
                    <td> Column heading</td>
                    <td> Column heading</td>
                    <td> Column heading</td>
                    <td width="17%">
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button"
                                    data-toggle="dropdown"
                                    aria-expanded="false"> إجراءات
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">
                                        <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text-info"><i class="icon-lock"></i> تعديل الصلاحيات</span></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')

@endsection

