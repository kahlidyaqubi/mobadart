@extends("layouts._admin_layout")

@section("title","بروفايل ناشط"." ".$item->user->name ." ".$item->user->last_name)
@section("content")

    <div class="profile">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab"> معلومات الناشط الشخصية </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled profile-nav">
                                <li>
                                    @if($item->gender=='M')
                                        <img src="/images/male.png"
                                             class="img-responsive pic-bordered" alt=""/>
                                    @else
                                        <img src="/images/female.png"
                                             class="img-responsive pic-bordered" alt=""/>
                                    @endif
                                </li>
                                <li>
                                    <a> العنوان :{{$item->city->governorate->name}} / {{$item->city->name}}
                                        / {{$item->neighborhood}} </a>
                                </li>
                                <li>
                                    <a> الجنس : {{$item->gender}} </a>
                                </li>
                                @if($item->mobile)
                                    <li>
                                        <a> رقم التواصل : {{$item->mobile}} </a>
                                    </li>
                                @endif
                                <li>
                                    <a> العمر : {{\Carbon\Carbon::parse($item->brth_day)->age}} </a>
                                </li>
                                @if($item->shared)
                                    <li>

                                        <a> تفاصيل المشاركات السابقة في مراكز العائلة <br> :
                                            {{$item->shared_ditalis}} </a>
                                    </li>
                                @endif
                                @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة التقيمات')->first()->id))
                                    <li>
                                        <a style="color:#042e51;" href="/admin/activsit/evaluteToActivsit/{{$item->id}}"> تقييماته </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-8 profile-info">
                                    <h1 class="font-green sbold uppercase">الاهتمامات</h1>
                                    <p>
                                    </p>
                                    @foreach($hisinterests as $interests )
                                        @if($interests->status==1)
                                            <span class="badge badge-warning">{{$interests->name}}</span>
                                        @else
                                            <span class="badge badge-info">{{$interests->name}}</span>

                                        @endif
                                    @endforeach
                                    <p>
                                        <a href="javascript:;">
                                            <i class="fa fa-star"></i>
                                            {{$item->user->email}}

                                        </a><br>
                                        @if($item->face_url)
                                            <a href="{{$item->face_url}}" target="_blank">
                                                <i class="fa fa-facebook-official"></i>
                                                حساب الفيسبوك

                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <!--end col-md-8-->

                            <!--end row-->
                            @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة المبادرات')->first()->id))

                                @if($hisinitiative->count()>0)
                                    <div class="tabbable-line tabbable-custom-profile">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_11">
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-advance table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-briefcase"></i>
                                                            </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-question"></i>عنوان المبادرة
                                                            </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-bookmark"></i>اسم المنشط
                                                            </th>
                                                            <th>
                                                                <i class="fa fa-briefcase"></i>اسم الفريق
                                                            </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-question"></i>المدينة
                                                            </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-bookmark"></i>البدء
                                                            </th>
                                                            <th class="hidden-xs">
                                                                <i class="fa fa-bookmark"></i>الانتهاء
                                                            </th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($hisinitiative as $item)
                                                            <tr>
                                                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$item->id}}</td>
                                                                <td class="hidden-xs">{{$item->title}}</td>
                                                                <td class="hidden-xs">{{$item->admin->user->name}}</td>
                                                                <td style="max-width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$item->team_name}}</td>
                                                                <td class="hidden-xs">{{$item->city->name}}</td>
                                                                <td class="hidden-xs">{{date('d-m-Y', strtotime($item->start_date))}}</td>
                                                                <td class="hidden-xs">{{date('d-m-Y', strtotime($item->end_date))}}</td>
                                                                <td>
                                                                    <a class="btn btn-sm grey-salsa btn-outline"
                                                                       href="/admin/initiative/{{$item->id}}">
                                                                        مشاهدة</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                        {{$hisinitiative->links()}}
                                                    </table>
                                                </div>
                                            </div>
                                            <!--tab-pane-->

                                        </div>
                                    </div>
                        </div>
                        @else
                            <br><br>
                            <div class="alert alert-warning">غير مشترك بأي مبادرة</div>
                        @endif
                        @endif
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="/admin/activsit" class="btn grey-salsa btn-outline">إلغاء</a>
                            </div>
                        </div>
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

