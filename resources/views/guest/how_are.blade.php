@extends("layouts._first_layout")

@section("title", "من نحن")
@section("content")
    <div class="d-flex justify-content-center h-100" style="min-height: 450px">
        <div class="row" >
            <div class="col">
                <div class="card">
                    <!-- header  -->
                    <div class="card-header">
                        <div class="d-flex justify-content-center ">
                            <h3>من نحن </h3>
                        </div>
                    </div>
                    <!-- body -->
                    <div class="card-body">
                        <!-- من هو مركز معا ؟ -->
                        <div class="row">
                            <label for="">من هو مركز معا ؟</label>
                            <p>{{$site->who_are}}</p>
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
            background-image: url({{$site->img2}});
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