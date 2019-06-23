@extends("layouts._fifth_layout")

@section("title", "$item->title")
@section("content")
    <div class="row justify-content-center">
        <h1>{{$item->title}}</h1>
    </div>
    <div class="d-flex justify-content-center h-100">
        <div class="row">
            <div class="col">
                <div class="card" style="background: #f3f3f2;">
                    <div class="card-header">
                        <div class="d-flex justify-content-center ">
                            <!-- slider -->
                            <div class="container">
                                <br>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        <li data-target="#myCarousel" data-slide-to="3"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img src="{{$item->img}}" alt="">
                                        </div>
                                        @foreach($article_files as $article_file)
                                            <div class="item">
                                                <img src="{{$article_file->name}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">السابق</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button"
                                       data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">التالي</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- first -->
                    <div class="card-body">
                        <span id='thefilecode'
                              data-html='{{$item->the_file}}'></span>
                        <div class="div-1" id="newscontact" style="min-width: 100%;padding: 10px">

                        </div>
                    </div>
                    <!--second  -->
                    <div class="card-body" >
                        <!-- 1 -->
                        <div class="row" style="text-align:center;padding: 13px;"">
                            <div class="div-1"  style="min-width: 100%;padding: 10px;">
                                <!--title  -->
                                <h5>التعليقات</h5>
                                <hr style="border: 5px"/>
                                <!-- 1 -->
                                <div class="input-group form-group" style="margin-bottom: -17px;">
                                    @foreach($item->comments as $comment)
                                        <div class="row">

                                            <div class="col-md-12 ">
                                                <label for="">{{$comment->detalis}}</label>
                                            </div>
                                            @if($comment->writer)
                                                <div class="col-md-8" style="padding-top: 18px;">
                                                    <label style="font-size: 13px;" for=""><span style="float: right">{{$comment->writer}} </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                        {{$comment->email}}</label>
                                                </div>
                                            @else
                                                <div class="col-md-8" style="padding-top: 18px;">
                                                    <label style="font-size: 13px;" for=""><span style="float: right">{{\App\User::find($comment->user_id)->name}} {{\App\User::find($comment->user_id)->last_name}}</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                                        {{\App\User::find($comment->user_id)->email}}</label>
                                                </div>
                                            @endif
                                            <div class="col-md-4 " style="padding-top: 18px">
                                                <label style="font-size: 13px;" for=""
                                                       for="">{{$comment->created_at}}</label>
                                            </div>
                                        </div>
                                        <hr style="border:1px solid #CCC;"/>
                                    @endforeach

                                </div>
                                <div class="input-group form-group" style="margin-top: 10px">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-6"><h3>أضف تعليقاً</h3></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 ">@include("_first_msg")</div>
                                    </div>
                                    <form class="" action="/comment" method="post" class="input-group form-group mt-5">
                                        <input hidden name="article_id" value="{{$item->id}}"/>
                                        @csrf
										 <div class="input-group form-group mt-5">
                                        <div class="row">
                                            @if(auth()->user())
                                                <div class="form-group">
                                                    <div class="col-md-12 ">
                                                        <label for="">{{auth()->user()->name}} {{auth()->user()->last_name}}
                                                            <br>{{auth()->user()->email}}</label>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="input-group form-group">
                                                    <div class="col-md-12 ">
                                                        <input type="text" placeholder="ادخل اسمك" name="writer"
                                                               value="{{old('writer')}}"
                                                               style="width: 215px;padding: 7px" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 "></div>
                                                </div>
                                                <div class="input-group form-group">
                                                    <div class="col-md-12 ">
                                                        <input type="text" placeholder="الإيميل" name="email"
                                                               value="{{old('email')}}"
                                                               style="width: 215px;padding: 7px" required/>
                                                    </div>
                                                </div>
                                            @endif
											
											<div class="row">
                                                    <div class="col-md-12 "></div>
                                                </div>
                                                <div class="input-group form-group">
                                                    <div class="col-md-12 ">
                                                       <textarea name="detalis" placeholder="اكتب تعليقك"
                                                          style="padding: 7px;float: right"
                                                          rows="4" cols="80" required>{{old('detalis')}}</textarea>
                                                    </div>
                                                </div>
												<button type="submit" href="#"
                                                        style="background:#c4233d;border-radius: 20px;color: white;padding:14px;text-align:center;margin-top:36px; margin-right:10px ">
                                                    أضف
                                                    تعليقك
                                                </button>
												
                                        </div>
</div>

                                    </form>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
			margin-top: -27px !important;
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
			width : 100%;
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
    <script>
        $(document).ready(function () {

            $("#newscontact").append($("#thefilecode").attr('data-html'));
            $("#newscontact img").css("width", "100%");
            $("#newscontact img").css("height", "auto");
        });
    </script>
@endsection