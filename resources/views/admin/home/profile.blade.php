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

                                    <img src="https://pngimage.net/wp-content/uploads/2018/05/admin-avatar-png.png"
                                         class="img-responsive pic-bordered" alt=""/>
                                </li>
                                <li>
                                    <a> مركز العائلة : @if($item->family_center) {{$item->family_center->name}} @else
                                            عام @endif </a>
                                </li>
                                @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة المبادرات')->first()->id))
                                    <li>
                                        <a href="/admin/admin/initiaveToAdmin/{{$item->id}}"> مبادراتي </a>
                                    </li>
                                @endif
                                @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة الأخبار')->first()->id))
                                    <li>
                                        <a href="/admin/admin/articleToAdmin/{{$item->id}}"> أخباري </a>
                                    </li>
                                @endif
                                @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة التقيمات')->first()->id))
                                    <li>
                                        <a style="color:#042e51;"
                                           href="/admin/admin/evaluteToAdmin/{{$item->id}}"> تقييماتي </a>
                                    </li>
                                @endif

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
                                                    @foreach($articles as $article)
                                                        <tr>
                                                            <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                                <a href="#"> {{$article->title}} </a>
                                                            </td>
                                                            <td class="hidden-xs">{{$article->category->name}}</td>
                                                            <td class="hidden-xs">{{date('d-m-Y', strtotime($article->created_at))}}</td>
                                                            <td>
                                                                <a class="btn btn-sm grey-salsa btn-outline"
                                                                   href="/article/{{$article->id}}"> مشاهدة</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th colspan="4">
                                                            <a href="/admin/admin/articleToAdmin/{{$item->id}}">عرض
                                                                المزيد</a>
                                                        </th>
                                                    </tfoot>
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
    <link href={{asset('metronic-rtl/assets/pages/css/profile-2-rtl.min.css')}} rel="stylesheet" type="text/css"/>

@endsection
@section('js')

@endsection

