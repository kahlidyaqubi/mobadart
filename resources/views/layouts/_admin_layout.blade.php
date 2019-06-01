<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>مركز معا | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link href="{{asset('metronic-rtl/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->

    <link href="{{asset('metronic-rtl/assets/global/css/components-md-rtl.min.css')}}" rel="stylesheet"
          id="style_components" type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/global/css/plugins-md-rtl.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('metronic-rtl/assets/layouts/layout/css/layout-rtl.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('metronic-rtl/assets/layouts/layout/css/themes/blue-rtl.min.css')}}" rel="stylesheet"
          type="text/css" id="style_color"/>
    <link href="{{asset('metronic-rtl/assets/layouts/layout/css/custom-rtl.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="/lib/img/Group%20124.ico"/>
    <style type="text/css">
        *, h1, h3, h4 {
            font-family: 'Open Sans', sans-serif;
            font-family: 'El Messiri', sans-serif;
        }

        h3 {
        / / text-align: center;
            color: #2D5F8B !important;
        }

        .breadcrumb > li, .pagination {
            display: block;

        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }

        input[type=number] {
            -moz-appearance: textfield; /* Firefox */
        }
    </style>
</head>

@yield('css')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-md">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/admin">
                <img src="/lib/img/icon-cpanel.svg" style="width: 30px;margin: 11px" alt="logo" class="logo-default "/>
                <span style="color: #C0E6F9;font-size: 18px;" class="logo-default">لوحة تحكم</span>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">

            @if(auth()->user())
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">

                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default" id="num_notif"> 15 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">الإشعارات</span> الغير مقروءة</h3>
                                <a href="#">عرض الجميع</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" id="notif" style="height: 250px;"
                                    data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                            <span class="time">15-11-2019</span>
                                            <span class="details"
                                                  style="display:block; max-width: 100%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                                        <span class="label label-sm label-icon label-success">
                                                           رسالة</i> </span>
                                                     كيف حالك
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle"
                                 src="https://pngimage.net/wp-content/uploads/2018/05/admin-avatar-png.png"/>
                            <span class="username username-hide-on-mobile">
                           {{ Auth::user()->name }} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">

                            <li>
                                <a href="/admin/changePassword">
                                    <i class="icon-lock"></i> تعديل كلمة المرور </a>
                            </li>
                            <li>
                                <a href="/admin/editProfile">
                                    <i class="icon-lock"></i> تعديل البروفايل</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i>
                                    تسجيل خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>@endif
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    @if(auth()->user())
        <div class="page-sidebar-wrapper">
            <div class="page-sidebar navbar-collapse collapse">
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                    data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <li class="sidebar-toggler-wrapper hide">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <?php
                    $adminId = Auth::user()->admin->id;
                    /*$links = \DB::table("links")->where("parent_id",0)->
                        whereRaw('id in (select link_id from admin_link where admin_id=?)',$adminId)->get();*/
                    $links = Auth::user()->admin->links()->where("in_menu", 1)->where("parent_id", 0)->where("mult_id", 0)->orderBy('order_id')->get();
                    ?>


                    @foreach($links as $link)

                        <?php
                        /*$sublinks = \DB::table("link")->
                            whereRaw('id in (select link_id from admin_link where admin_id=?)',$adminId)->where("parent_id",$link->id)->get();*/

                        $the_sublinks = Auth::user()->admin->links()->where("in_menu", 1)->where("parent_id", $link->id)->orWhere("mult_id", $link->id)->pluck('links.id');
                        $sublinks = \App\Link::find($the_sublinks);
                        ?>


                        <li class="nav-item @if($link->mult!=1){{ strstr("/".Route::getFacadeRoot()->current()->uri(),$sublinks->first()->link)?
                                            "open":'' }}@endif
                                ">
                            <a href="{{$link->link}}" class="nav-link nav-toggle">
                                <i class="{{$link->icon}}"></i>
                                <span class="title">{{$link->title}}</span>
                                <span class="arrow"></span>
                            </a>

                            <ul class="sub-menu"
                            @if($link->mult!=1) {{ strstr("/".Route::getFacadeRoot()->current()->uri(),$sublinks->first()->link)?"style=display:block;":'' }} @endif
                            @if($link->mult==1) {{ in_array("/".Route::getFacadeRoot()->current()->uri(),
                            Auth::user()->admin->links->where("in_menu", 1)->whereIn("parent_id", $sublinks->pluck('id'))->pluck('link')->toArray())?"style=display:block;":'' }} @endif>

                                @foreach($sublinks as $sublink)
                                    <?php
                                    $sub_sublinks = Auth::user()->admin->links->where("in_menu", 1)->where("parent_id", $sublink->id);
                                    ?>
                                    <li class="nav-item @if($link->mult==1){{ strstr("/".Route::getFacadeRoot()->current()->uri(),$sub_sublinks->first()->link)?
                                            "open":'' }}@endif">

                                        <a @if($link->mult!=1)href="{{$sublink->link}}" @endif class="nav-link ">
                                            <span
                                                    @if($link->mult==1)class="arrow nav-toggle"
                                                    @else class="title" @endif>{{$sublink->title}}</span>
                                        </a>
                                        @if($link->mult==1)


                                            <ul class="sub-menu" {{ strstr("/".Route::getFacadeRoot()->current()->uri(),$sub_sublinks->first()->link)?"style=display:block;":'' }}>
                                                @foreach($sub_sublinks as $sub_sublink)
                                                    <li class="nav-item">
                                                        <a href="{{$sub_sublink->link}}" class="nav-link">
                                                            {{$sub_sublink->title}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>@endif
<!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h3 class="page-title"> @yield("title")</h3>
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">

            </div>
            @include("_msg")
            @yield('content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> {{date("Y")}} جميع الحقوق محفوظة &copy; .

    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تأكيد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل أنت متأكد من الاستمرار في العملية
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">إلغاء
                </button>
                <a href="#" class="btn btn-danger">نعم، متأكد</a>
            </div>
        </div>
    </div>
</div>

<script src="/metronic-rtl/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/metronic-rtl/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/metronic-rtl/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="/metronic-rtl/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>


<script src="/metronic-rtl/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
<script>


    $(function () {
        //$("#Confirm").modal("show");
        $(".Confirm").click(function () {
            $("#Confirm").modal("show");
            $("#Confirm .btn-danger").attr("href", $(this).attr("href"));
            return false;
        });
    });
</script>

@yield("js")
</body>

</html>