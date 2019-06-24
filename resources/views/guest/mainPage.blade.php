@extends("layouts._main_layout")

@section("title", "$site->title_page")
@section("content")
    <!---------------->
    <section class="homeBanner" id="zmainz">
        <div class="bannerParallaxWrapper wrapper">

            <div class="container">
                <div class="clearfix flex-row " style="margin-top:200px">
                    <div class="col-xs-12 col-md-6 aboutLeft">
                        <div class="bannerTitle hea">
                            <h3>
                  <span>
                      <strong style="line-height: 38px;">{{$site->project_title}}</strong></span>
                            </h3>
                            <h6 style="line-height: 28px;font-size:16px;text-shadow: 0 0 0px white, 0 0 0px white;text-align:justify;;">
                                {{ mb_substr($site->about_project,0,200,'UTF-8')}}...</h6>
                            <div class="">
                                <a style="border:1px solid #c4233d;background:#f3f3f2;padding:10px;;border-radius:20px;color:black;margin-top:20px;font-size:27px;padding-left:30px;padding-right:30px"
                                   class="" href="/on_project">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 aboutRight">
                        <form class="login" method="POST" action="/login">
                            @csrf
                            <br>
                            @include("_first_msg")
                            <h2 style="padding-top:10px">تسجيل دخول</h2>

                            <div class="row" style="margin-bottom:-20px">
                                <div class="input-field col s11" style="padding-left:30px;">

                                    <input id="email" type="text" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus
                                           class="materialize-textarea" style="padding: 10px"/>
                                    <label for="textarea1" style="padding-top:-5px;padding-bottom:-5px">اسم
                                        المستخدم</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s11" style="padding-left:30px;">

                                    <input id="password" type="password" class="form-control" name="password" required
                                           class="materialize-textarea" style="padding: 10px"/>
                                    <label for="textarea1"
                                           style="padding-top:-5px;padding-bottom:10px">كلمةالمرور</label>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-sm-5 formSubmitBtnWrap text-center">
                                    <input class="submitBtn " type="submit" value="تسجيل دخول"
                                           style="padding: 20px;margin-bottom:10px;margin-right:120px;background:#c4233d;color:white;border-radius:20px;">
                                </div>
                            </div>
                            <div class=" row mt-5">
                                <div class="col-sm-8 formSubmitBtnWrap text-center">
                                    <a href="{{ route('password.request') }}"
                                       style="color:grey;font-size:15px;text-decoration:underline;margin-right:120px;">نسيت
                                        كلمة المرور</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <ul id="scene" class="scene">
            </ul>
        </div>
        <div class="banerWrapXS"></div>
        <div class="videoWrap hidden-xs" style="background-image:url('/platform/dist/images/pr-video6.jpg')">
            <div id="container">

            </div>
        </div>
    </section>
    <!---------------->
    <section class="homeSection padding-bottom-50" id="vision">
        <div class="bgLight">
            <div class="container">
                <div class="sectionTitleWrap text-center">
                    <h2>من نحن </h2>
                </div>
                <div class="aboutSection">
                    <div class="clearfix flex-row">
                        <div class="col-sm-5 aboutLeft">
                            <img class="aboutVideo" src="{{$site->img2}}" alt="">
                            </a>
                        </div>
                        <div class="col-sm-7 aboutRight">
                            <p style="font-size:18px;margin-bottom:20px;text-align:justify;">

                                {{ mb_substr($site->who_are,0,410,'UTF-8')}}....
                            <div class="">
                                <a style="border:1px solid #c4233d;background:#f3f3f2;padding:10px;;border-radius:20px;color:black;margin-top:35px;font-size:25px;padding-left:30px;padding-right:30px"
                                   class="" href="/how_are">المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------->
    <section class="homeSection sectionVision" style="padding-top: 0px" id="vision">
        <div class="bgLight">
            <div class="container">
                <div class="visionSection">
                    <img src="{{$site->img3}}" width="50%">
					<div class="vissionText">
                        <div class="quoteObjHold">
                            <div class="quoteBlock">
                            </div>
                        </div>
                        <h3>المنصة المثلى للتفاعل مع الشباب</h3>
                        <span style="font-size:15px;">{{$site->motivational_words}} </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------->
    <section style="background:#f3f3f2;padding-top: 0;padding-bottom: 0" class="homeSection sectionVision" id="specialization">
             <div class="gap" style="margin-bottom:-100px">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <h2 style="margin-bottom:25px;">مبادرات</h2>
                        <div class="multiTabBlock gallery">
                            <div class="tab1">
                                <div data-child="false" class="tab__header" style="margin-bottom:-40px;">
                                    <div class="tab__header-1 tab__header--active">كل المبادرات</div>
                                    <div class="tab__header-2">مبادرات قادمة</div>
                                    <div class="tab__header-3">مبادرات انتهت</div>
                                </div>
                                <!--  tab start-->
                                <div class="tab__content">
                                    <!--=========== first tab =====================-->
                                    <div class="tab__content-1 tab__content--active">
                                        <div class="gap">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="our-cause remove-ext-50 loader-data" id="itemContainer">
                                                        <!--1  -->
                                                        @foreach($all_initiatives as $item)
                                                            <div class="col-sm-4">
                                                                <div class="caro-unit fadein">
                                                                    <div class="cause-avatar">
                                                                        <a href="/initiative/{{$item->id}}"
                                                                           title=""><img
                                                                                   @if(file_exists(public_path() . "" . $item->img) && $item->img != null)
																					   style="max-height: 250px;height: 200px;width: 400px;"
																				   @endif
                                                                                    src="{{$item->img}}" alt=""></a>

                                                                    </div>
                                                                    <div class="cause-meta">

                                                                        <h3 style="min-height: 240px;"><a href="/initiative/{{$item->id}}" title=""
                                                                               class="title">{{ mb_substr($item->title,0,60,'UTF-8')}}</a></h3>
                                                                        <p style="min-height:85px;max-height:85px;height:85px">{{ mb_substr($item->details,0,100,'UTF-8')}}
                                                                            ....</p>
                                                                        <a href="/initiative/{{$item->id}}" title=""
                                                                           class="donate-me" data-ripple=""
                                                                           style="color:white;float:left;">تفاصيل
                                                                            المبادرة</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @endforeach
                                                    <!--------->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12"
                                                         style="padding: 20px;text-align: center;padding-top: 50px"><B
                                                                style="font-size: 18px"><a href="/initiative/">عرض جميع
                                                                المبادرات</a></B></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--=========== second tab =====================-->
                                    <div class="tab__content-2">
                                        <div class="gap">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="our-cause remove-ext-50 loader-data"
                                                         id="itemContainer2">
                                                        @foreach($next_initiatives as $item)
                                                            <div class="col-sm-4">
                                                                <div class="caro-unit fadein">
                                                                    <div class="cause-avatar">
                                                                        <a href="/initiative/{{$item->id}}"
                                                                           title=""><img src="{{$item->img}}"
                                                                                         style="max-height: 250px;height: 200px;width: 400px;"
                                                                                         alt=""></a>

                                                                    </div>
                                                                    <div class="cause-meta">

                                                                        <h3 style="min-height: 240px;"><a href="/initiative/{{$item->id}}" title=""
                                                                               class="title">{{ mb_substr($item->title,0,60,'UTF-8')}}</a></h3>
                                                                        <p style="min-height:85px;max-height:85px;height:85px">{{ mb_substr($item->details,0,100,'UTF-8')}}
                                                                            ....</p>
                                                                        <a href="/initiative/{{$item->id}}" title=""
                                                                           class="donate-me" data-ripple=""
                                                                           style="color:white;float:left;">تفاصيل
                                                                            المبادرة</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="holder holder2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--=========== third tab =====================-->
                                    <div class="tab__content-3">
                                        <div class="gap">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="our-cause remove-ext-50 loader-data"
                                                         id="itemContainer3">
                                                        @foreach($past_initiatives as $item)
                                                            <div class="col-sm-4">
                                                                <div class="caro-unit fadein">
                                                                    <div class="cause-avatar">
                                                                        <a href="/initiative/{{$item->id}}"
                                                                           title=""><img src="{{$item->img}}"
                                                                                         style="max-height: 250px;height: 200px;width: 400px;"
                                                                                         alt=""></a>

                                                                    </div>
                                                                    <div class="cause-meta">

                                                                        <h3 style="min-height: 240px;"><a href="/initiative/{{$item->id}}" title=""
                                                                               class="title">{{ mb_substr($item->title,0,60,'UTF-8')}}</a></h3>
                                                                        <p style="min-height:85px;max-height:85px;height:85px">{{ mb_substr($item->details,0,100,'UTF-8')}}
                                                                            ....</p>
                                                                        <a href="/initiative/{{$item->id}}" title=""
                                                                           class="donate-me" data-ripple=""
                                                                           style="color:white;float:left;">تفاصيل
                                                                            المبادرة</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--************************************************** aside ***********************************************-->
                    <div class="col-sm-12 col-md-3" style="margin-top:250px">
                        <aside>
                            <div class="widget fadein">
                                <div class=" box  "
                                     style="font-size:20px ;padding: 35px;text-align: center;float:left;border-radius:50%;border:20px solid grey;height:200px;width:200px; background-size: cover;margin-top:-100px;background:#c4233d">
                                    أكثر من {{\App\Activist::count()}} مشارك
                                </div>
                                <!-- tags widget -->
                                <div class="widget fadein">
                                    <div class="search " style="width: 100%">
                                        <form style="text-align:center" action="\initiative">
                                            <input type="text" name="q" placeholder="بحث عن المبادرات"
                                                   style="margin-top:80px;margin-right:20px">
                                        </form>
                                    </div>
                                </div>
                                <div class="widget fadein">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div id="calendar">
                                                    <div class="custom-header clearfix"
                                                         style="text-align:center;display:inline-block;width: 238px;height: 13px;">
                                                        <nav style="margin-top:-10px">
                                                    <span id="custom-prev" class="custom-prev"
                                                          style="margin-left:-8px"></span>
                                                            <span id="custom-next" class="custom-next"
                                                                  style="margin-right:-38px"></span>
                                                        </nav>

                                                        <span id="custom-year" class="custom-year"></span>
                                                        <span style="text-align: center; direction: rtl"
                                                              id="custom-month"
                                                              class="custom-month"></span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div><!-- side widgets -->
                </div>
            </div>
        </div>
    </section>
    </section>
    <!---------------->
    <section class="homeSection sectionNews" id="news" style="margin-bottom:-100px">
        <div class="bgLight">
            <div class="container">
                <div class="sectionTitleWrap text-center">
                    <h2>{{$the_section->name}}</h2>
                </div>
                <div class="row mb-5" style="height:80px;text-align: center;">
                    <a style="border:1px solid #c4233d;background:#f3f3f2;padding:20px;margin-bottom:10px;border-radius:20px;color:black"
                       class="" href="/article">عرض كل الأخبار</a>
                </div>

                <div class="newsWraper mt-5">
                    <div class="newsSlider flex-row flex-row-reverse">
                        <!-- Aug 13-->
                        @foreach($articles as $item)
                            <div class="slide">
                                <div class="totalItem">
                                    <a href="/article/{{$item->id}}"><div class="picHold" style="background-image:url({{$item->img}})">
                                        <div class="dateHold">
                                            <div class="dateBlock">
                                                <div class="total" data-year="{{$item->created_at->year}}">
                                                    <div class="day">
                                                        {{$item->created_at->day}}
                                                    </div>
                                                    <div class="month">
                                                        {{$item->created_at->format('F')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div></a>
									<a href="/article/{{$item->id}}">
                                    <div class="contentHold">
                                        <h4 style="height:72px;min-height:72px;max-height: 72px;">
                                           {{ mb_substr($item->title,0,60,'UTF-8')}}
                                        </h4>
                                        <p style="min-height: 54px;max-height: 54px;height: 54px">    {{ mb_substr($item->detalis,0,100,'UTF-8')}}....
                                        </p>
                                    </div>
									</a>
                                    <a href="/article/{{$item->id}}" class="moreNewsBtn fancybox">
                                        <i class="fas fa-arrow-left"></i> </a>
                                    <div id="arab_youth_attracts_2018" class="persenDetailPopUp newspopup">
                                        <div class="popupInner">
                                            <div class="popupHeader">
                                            </div>
                                            <div class="popUpDescription">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------->
    <section class="homeSection" id="gallery" style="margin-bottom:-180px">
        <div class="bgLight">

            <div class="container">
                <div class="sectionTitleWrap text-center">
                    <h2>تجارب ملهمة</h2>
                </div>

                <div class="gap" style="margin-top:-100px">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-4 fromleft">
                                <div class="volunteer-banner">
                                    <div class="banner-meta">
                                        <img src="/platform/dist/images/voulenteer-icon.png" alt=""
                                             style="width:80px;height:150px;">
                                        <i style="text-align:center;font-size:30px;">التجارب الملهمة</i>
                                        <p style="color:white;">
                                            <b> {{$site->experiences}} </b>
                                            <a href="/category/1">
                                                <button style="color:black;border-radius:20px;padding:15px;">
                                                    <b>عرض جميع التجارب الملهمة</b></button>
                                            </a>

                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-charity">
                                    <div class="container" style="width:800px;">
                                        <div class="row pb-5">
                                            @foreach($experiences as $item)
                                                <div style="margin-bottom: 10px;margin-top: 7px" class="col-md-4">
                                                    <img src="{{$item->img}}" data-to="{{$item->img}}"
                                                         class="modallery"
                                                         style="width:200px;height:200px;margin-bottom:20px;cursor:pointer;">
                                                    <a href="article/{{$item->id}}" style="display:block;font-size:15px;cursor:pointer;margin-bottom:-18px;min-height: 60px;max-height: 60px;height: 60px;">{{ mb_substr($item->title,0,60,'UTF-8')}}</a>
                                                    <br>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>

    <!---------------->
@endsection
@section('css')

@endsection
@section('js')

@endsection