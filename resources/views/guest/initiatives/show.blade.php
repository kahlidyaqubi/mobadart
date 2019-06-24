@extends("layouts._first_layout")

@section("title", "عرض مبادرة $item->title")
@section("content")

    <div class="row justify-content-center">
        <h1>عرض مبادرة {{$item->title}}</h1>
    </div>
    <div class="d-flex justify-content-center h-100">
        <!--1  -->


        <form>
            <div class="row">
                <div class="col">
                    <div class="card" style="background: #f3f3f2;">
                        <div class="card-header">
                            <div class="d-flex justify-content-center ">
                                <img src="{{$item->img}}" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <!--div for validation  -->
                            @include("_first_msg")
                            <div class="input-group form-group">
                                <!-- 1 -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">اسم المنشط</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <label for="">{{$item->admin->user->name}} </label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">مركز عائلة المنشط</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <label for="">@if(!$item->admin->super_admin) {{$item->admin->family_center->name}} @else
                                                عام @endif</label>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ر قم تواصل المنشط</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <label for="">{{$item->admin->mobile}}</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">المشاركين/المسموح</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <label for="">{{$item->activists->count()}} / {{$item->activists_count}}</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">العنوان</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <label for="">{{$item->city->governorate->name}} / {{$item->city->name}}
                                            / {{$item->neighborhood}}</label>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">الفترة</span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-center">
                                        <label for="">{{date('d-m-Y', strtotime($item->start_date))}} إلى {{date('d-m-Y', strtotime($item->end_date))}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group form-group mt-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الاهتمامات</span>
                                </div>
                                <textarea readonly name="name" rows="2"
                                          cols="90">@foreach($hisinterests as $interests ){{$interests->name}}،@endforeach</textarea>
                            </div>
                            <!-- نبذة -->
                            <div class="input-group form-group mt-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">نبذة عن المبادرة</span>
                                </div>
                                <textarea readonly name="name" rows="4" cols="90">{{$item->details}}</textarea>
                            </div>
                            <!-- علاقة المبادرة بالتغيير المجتمعي -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">علاقة المبادرة بالتغيير المجتمعي</span>
                                </div>
                                <textarea readonly name="name" rows="4" cols="90">{{$item->changing}}</textarea>
                            </div>
                            <!-- مبررات المبادرة -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">مبررات المبادرة</span>
                                </div>
                                <textarea readonly name="name" rows="4" cols="90">{{$item->justifications}}</textarea>
                            </div>
                            <!-- المشكلة التي تحلها المبادرة -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">المشكلة التي تحلها المبادرة</span>
                                </div>
                                <textarea readonly name="name" rows="4" cols="90">{{$item->problem}}</textarea>
                            </div>
                            <!-- الهدف الرئيسي للمبادرة -->
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">الهدف الرئيسي للمبادرة</span>
                                </div>
                                <textarea readonly name="name" rows="4" cols="90">{{$item->main_goale}}</textarea>
                            </div>
                            <!-- الأهداف الفرعية للمبادرة -->
                            <div class="input-group form-group ">
                                <div class="">
                                    <span class="" style="color:#c4233d;">الأهداف الفرعية للمبادرة</span>
                                </div>
                                <ul>
                                    @foreach($item->initiatives_goals as $goal)
                                        <li>
                                            <textarea name="name" rows="2" cols="80"
                                                      class="textA">{{$goal->details}}</textarea>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--  الأنشطة-->
                            <div class="container">
                                <h3>أنشطة المبادرة</h3>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col">
                                        @if(count($hisactivities)>0)
                                            <table class="table table-striped table-responsive">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">النشاط</th>
                                                    <th scope="col">الفئة المستهدفة</th>
                                                    <th scope="col">عدد المستفيدين</th>
                                                    <th scope="col">عدد مرات التنفيذ</th>
                                                    <th scope="col">التاريخ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($hisactivities as $item_act)
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>{{$item_act->name}}</td>
                                                        <td>{{$item_act->target_group}}</td>
                                                        <td>{{$item_act->ativiests_count}}</td>
                                                        <td>{{$item_act->count}}</td>
                                                        <td>{{date('d-m-Y', strtotime($item_act->start_date))}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="col-md-12" style="text-align: right">
                                                نأسف لا يوجد بيانات لعرضها
                                            </div>
                                            <br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="input-group form-group">
                                @if(auth()->user() && auth()->user()->activist)
                                    @if(
                                    !($item->activists_initiatives && $item->activists_initiatives->where('activist_id',auth()->user()->activist->id)->first()))
                                        <a class="but " href="/activist/initiative/application/{{$item->id}}">طلب
                                            انضمام</a>
                                    @else
                                        <a class="but " href="/activist/initiative/goOut/{{$item->id}}">انسحاب</a>
                                    @endif
                                    @if( (!($item->initiative_evaluations != null)||
                                            ($item->initiative_evaluations &&
                                    !($item->initiative_evaluations->where('activist_id',auth()->user()->activist->id)->first())))
&& $item->end_date <= Carbon\Carbon::now()
                                    && $item->activists_initiatives && ($item->activists_initiatives->where('accept',1)->where('activist_id',auth()->user()->activist->id)->first())

                                    )
                                        <a class="but" href="/activist/evalution/create?initiative_id={{$item->id}}">تقييم المبادرة</a>
                                    @endif
                                @endif
                                <a class="but " href="/initiative/show_art/{{$item->id}}">الأخبار </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('css')
    <style>
        .card {
            width: 798px;
            background: #f3f3f2 !important;
            border: 1px solid gray;
            height: auto !important;
            box-shadow: 5px 10px #888888;
        }

        img {
            width: 737px;
            height: 300px;
			margin-top: 0 !important;
        }

        body {
            background: #f3f3f2;
        }

        .input-group-prepend span {
            width: 175px;
        }

        label {
            color: black;
        }

        .input-group-text {
            color: white !important;
            font-size: 15px;
        }

        .input-group-prepend span {
            width: 288px;

        }

        input.form-control {
            width: auto;
        }

        h3 {
            float: right;
        }

        .but {
            border: 1px solid gray;
            background: #c4233d;
            padding: 15px;
            padding-left: 35px;
            text-decoration: none;
            padding-right: 35px;
            margin-top: 12px;
            border-radius: 20px;
            color: white;
            width: 170px;
            margin: 5px;
            margin-bottom: 10px;
            border: 2px solid #c4233d;

        }

        .but:hover {
            color: #c4233d;
            background: white;
            text-decoration: none;
            border: 2px solid #c4233d;
        }

        .table {
            border: 1px solid gray;
            box-shadow: 5px 10px #888888;
            max-width: 86%;
        }

        a {
            text-align: center;
        }

        @media (max-width: 670px) {
            .card {
                width: 272px;
            }

            img {
                width: 200px;
                height: 200px;
            }

            .input-group-prepend span {
                width: 140px;
            }

            .input-group-text {
                font-size: 8px;
            }

            .validation {
                width: 200px;
            }

            .textA {
                width: 200px;
                height: 120px;
            }

            .table {
                width: 100%;
            }

            .but {

                padding: 14px;
            }

            .butto {
                margin-left: 105px;
                margin-bottom: -200px;
            }

            .bo {
                margin-bottom: 50px;
            }

            ::-webkit-input-placeholder {
                font-size: 7px;
            }
        }

        textarea {
            resize: none;
            border: 0px;
            outline: none;
        }

        label {
            float: right;
        }

        .validation {
            float: right;
        }
    </style>
@endsection
@section('js')

@endsection