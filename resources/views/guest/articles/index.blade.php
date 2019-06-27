@extends("layouts._thirst_layout")

@section("title", "عرض الأخبار")
@section("content")
    <div class="row justify-content-center" >
        <div class="col text-center" >
            <h1 style="margin-top: 0px">عرض الأخبار </h1>
        </div>
    </div>

    <form>
        <!-- 1 -->
        <div class="container ">
            <div class="row  " style="padding-bottom: 10px;min-height: 190px">
                <div class="col-md-4 ">
                    <input type="text" class="form-control" name="q" value="{{request('q')}}"
                           placeholder="ابحث في عنوان الخبر" style="width: 100%"
                    >
                </div>
                <div class="col-md-3 ">
                    <select class="form-control" name="initiative_id">
                        <option value="">جميع المبادرات</option>
                        @foreach($initiatives as $initiative)
                            <option value="{{$initiative->id}}"
                                    @if($initiative->id==request('initiative')) selected @endif>{{$initiative->title}}</option>
                        @endforeach
                        <option value="no">لا تنتمي لمبادرة</option>
                    </select>
                </div>
                <div class="col-md-3 ">
                    <select class="form-control" name="category_id">
                        <option value="">جيمع الأقسام</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($category->id==request('category_id')) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="cl-md-3" style="margin-bottom:10px">
                    <button type="submit" name="button" class="butn">بحث</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row ">
            @if($items->count()>0)
            <div class="our-cause remove-ext-50 loader-data" id="itemContainer">
                @foreach($items as $item)
                    <div class="col-sm-4">
                        <div class="caro-unit fadein">
                            <div class="cause-avatar">
                                <a href="/article/{{$item->id}}" title=""><img src="{{$item->img}}" alt=""></a>
                                <div class="required-amount">
                                    <span>{{date('d-m-Y', strtotime($item->created_at))}}</span>
                                </div>
                            </div>
                            <div class="cause-meta">

                                <h2 style="height:72px;min-height:72px;max-height: 72px;"><a href="/article/{{$item->id}}" title="">{{ mb_substr($item->title,0,60,'UTF-8')}}</a></h2>
                                <p style="min-height: 72px">
                                    {{ mb_substr($item->detalis,0,100,'UTF-8')}}....
                                </p>
                                <a href="/article/{{$item->id}}" title="" class="donate-me" data-ripple="">عرض الخبر</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <br><br>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            @endif
        </div>
        <!-- pagination div -->
        <div class="row  " style="margin-top:50px;">
            <div class="col-sm-5"></div>
            <div class="col-sm-4">
                {{$items->links()}}
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

@endsection
@section('css')

    <style>

        .form-control {
            height: 50px;
            border-radius: 20px;
            padding: 5px;
            margin-bottom: 15px;
            background: white;
        }

        .col-md-2 {
            width: 21.666667%;
        }

        .butn {
            width: 100px;
            height: 50px;
            border-radius: 20px
        }

        .pag {
            font-size: 20px;
        }

        .gj-datepicker-bootstrap [role=left-icon] button {
            margin-right: 100px;
            float: left;
            width: 54px;
        }

        #datepickerrr,
        #datepickerr,
        #datepicker {
            border-radius: 20px;
        }

        .caro-unit {
            border: 1px solid gray;
            border-radius: 20px;
        }

        .donate-me {
            float: left;
            background: #c4233d;
            border-radius: 20px;
        }

        .required-amount {
            padding: 15px 30px;
            background: #c4233d;
            float: left;

        }

        .required-amount::before {
            display: none;
        }

        #output {
            padding: 20px;
            background: #dadada;
        }

        form {
            margin-top: 20px;
        }

        select {
            width: 300px;
        }

        .btn {
            height: 52px;
            margin-right: 217px;
            margin-top: -72px;
            position: absolute;
            z-index: 2000;
            border-radius: 20px;
            padding: 3px;

        }


        .sho {
            border-radius: 20px;
            height: 50px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
@section('js')

@endsection