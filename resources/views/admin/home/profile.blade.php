@extends("layouts._admin_layout")

@section("title",$type ." / ".  auth()->user()->name)
@section("content")

    <div class="profile">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab"> المعلومات الشخصية</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled profile-nav">
                                <li>

                                    <img src="https://pngimage.net/wp-content/uploads/2018/05/admin-avatar-png.png" class="img-responsive pic-bordered" alt=""/>
                                </li>
                                <li>
                                    <a > مركز العائلة : @if($item->family_center) {{$item->family_center->name}} @else عام @endif </a>
                                </li>
                                <li>
                                    <a href="#"> مبادراتي </a>
                                </li>
                                <li>
                                    <a href="#"> أخباري </a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-8 profile-info">
                                    <h1 class="font-green sbold uppercase">{{ Auth::user()->admin->name }}</h1>
                                    <p>
                                        يمكنك من خلال هذه اللوحة تنفيذ المهام حسب صلاحيتك</p>
                                    ويمكنك أيضا مشاهدة الأخبار التي قمت بنشرها
                                    <p>
                                        <a href="javascript:;"> {{auth()->user()->email}} </a>
                                    </p>
                                    <ul class="list-inline">
                                        <li>
                                            <i class="fa fa-star"></i>
                                            {{auth()->user()->email}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end col-md-8-->

                            <!--end row-->

                            @if(1==1)
                                <div class="tabbable-line tabbable-custom-profile">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <i class="fa fa-briefcase"></i>الخبر
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-question"></i>الفئة
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-bookmark"></i>تاريخ النشر
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                     <tr>
                                                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                                <a href="#"> خبر تجريبي </a>
                                                            </td>
                                                            <td class="hidden-xs">التجارب الملهمة</td>
                                                            <td class="hidden-xs">15-12-2013</td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline"
                                                                   href="#"> مشاهدة</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--tab-pane-->

                                    </div>
                                </div>
                        </div>
                        @else
                            <br><br>
                            <div class="alert alert-warning">لم تقم بنشر أي خبر بعد</div>
                        @endif
                    </div>

                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href={{asset('metronic-rtl/assets/pages/css/profile-2-rtl.min.css')}} rel="stylesheet" type="text/css" />

@endsection
@section('js')

@endsection

