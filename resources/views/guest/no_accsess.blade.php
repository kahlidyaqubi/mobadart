@extends("layouts._first_layout")

@section("title", "رابط خاطئ")
@section("content")
    <div class="d-flex justify-content-center h-100" style="min-height: 460px">
        <div class="row" >
            <div class="col">
                <div class="card">
                    <!-- header  -->
                    <div class="card-header">
                        <div class="d-flex justify-content-center ">
                            <h1>رابط خاطئ 404 </h1>
                        </div>
                    </div>
                    <!-- body -->
                    <div class="card-body">
                        <!-- من هو مركز معا ؟ -->
                        <div class="row" >
                            <div class="col">
                            <h3 style=" text-align: center;color: #fff">يرجى التأكد من الرابط الذي تريد الوصول له</h3>
                            </div>
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
        body {
            background-image: url({{$site->img3}});
        }
        p,
        label {
            text-align: right;
            direction: rtl;
            color: white;
            text-align: justify;
        }

        label {
            color: #c4233d;
        }

        .card {
            height: auto;
            width: 800px;
            padding: 10px;
        }
        img{
            margin-top: 0px !important;
        }

        @media (max-width: 670px) {
            .card {
                width: 350px;
            }
            .img{
                width:250px;
                height: 250px;
            }
        }
    </style>
@endsection
@section('js')

@endsection