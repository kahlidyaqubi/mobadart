@extends("layouts._thirst_layout")

@section("title", "عرض المبادرات")
@section("content")
    <div class="row justify-content-center" >
        <div class="col text-center" >
            <h1 style="margin-top: 0px">عرض المبادرات </h1>
        </div>
    </div>

    <form>
        <!-- 1 -->
        <div class="container ">
            <div class="row  ">
                <div class="col-md-6 ">
                    <input type="text" class="form-control" name="q" value="{{request('q')}}"
                           placeholder="ابحث في العنوان أو اسم المنشط أو اسم الفريق" style="width: 100%"
                    >
                </div>
                <div class="col-md-3 ">
                    <select class="form-control" name="governorate_id">
                        <option value="">جميع المحافظات</option>
                        @foreach($governorates as $governorate)
                            <option value="{{$governorate->id}}"
                                    @if($governorate->id==$governorate_id) selected @endif>{{$governorate->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 ">
                    <select class="form-control" name="city_id">

                    </select>
                </div>
                <div class="col-md-3" style="margin-left:7px;">
                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
                    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
                    <select data-placeholder="اختر اهتماماتك من القائمة" multiple class="chosen-select sho"
                            name="interests_ids[]">
                        @foreach($interests as $interest)
                            <option value="{{$interest->id}}"
                                    @if(collect(request('interests_ids'))->contains($interest->id))selected @endif>{{$interest->name}}</option>
                        @endforeach
                    </select>
                    <script type="text/javascript">
                        $(".chosen-select").chosen({
                            no_results_text: "Oops, nothing found!"
                        })
                    </script>
                </div>


                <div class="col-md-2" style="margin-bottom:0px">
                    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
                    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
                    <input id="datepickerrr" name="in_date" value="{{request('in_date')}}" placeholder="تاريخ العمل">
                    <script>
                        $('#datepickerrr').datepicker({
                            uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons', format: 'yyyy-mm-dd'
                        });
                    </script>
                </div>
                <div class="col-md-2" style="margin-bottom:0px">
                    <input id="datepickerr" name="start_date" value="{{request('start_date')}}"
                           placeholder="تاريخ البدء/ من">
                    <script>
                        $('#datepickerr').datepicker({
                            uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons', format: 'yyyy-mm-dd'
                        });
                    </script>
                </div>
                <div class="col-md-2" style="margin-bottom:0px">
                    <input id="datepicker" name="end_date" value="{{request('end_date')}}"
                           placeholder="تاريخ الانتهاء/ إلى">
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons', format: 'yyyy-mm-dd'
                        });
                    </script>
                </div>

                <div class="cl-md-3" style="margin-bottom:10px">
                    <button type="submit" name="button" class="butn">بحث</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row " style="min-height: 190px">
            @if($items->count()>0)

            <div class="our-cause remove-ext-50 loader-data" id="itemContainer">
                @foreach($items as $item)
                    <div class="col-sm-4">
                        <div class="caro-unit fadein">
                            <div class="cause-avatar">
                                <a href="/initiative/{{$item->id}}" title=""><img src="{{$item->img}}" alt=""></a>
                                <div class="required-amount">
                                    <span>{{date('d-m-Y', strtotime($item->start_date))}}</span>
                                </div>
                            </div>
                            <div class="cause-meta">

                                <h2 style="height:72px;min-height:72px;max-height: 72px;"><a href="/initiative/{{$item->id}}" title="">{{ mb_substr($item->title,0,60,'UTF-8')}}</a></h2>
                                <p style="min-height: 82px">
                                    {{ mb_substr($item->details,0,100,'UTF-8')}}....
                                </p>
                                <a href="/initiative/{{$item->id}}" title="" class="donate-me" data-ripple="">تفاصيل
                                    المبادرة</a>
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
            margin-right: 69%;
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
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('js')
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

    <script>
        $(document).ready(function () {

            var governorate_id = $("[name='governorate_id']").val();

            $.get("/admin/governorate/ajaxCityInGover/" + governorate_id, function (data, status) {
                $("[name='city_id']")
                    .find('option')
                    .remove()
                    .end()
                    .append('<option class="cities" value="">جميع المدن</option>');

                data.forEach(function (car) {
                    var iselected = checktruefalse(car.id);
                    $("[name='city_id']")
                        .append($("<option class='cities'></option>")
                            .attr("value", car.id)
                            .text(car.name));

                    $('.cities[value=' + car.id + ']')
                        .attr('selected', iselected);

                });
            });
        });

        $("[name='governorate_id']").change(function () {
            var governorate_id = $("[name='governorate_id']").val();
            $.get("/admin/governorate/ajaxCityInGover/" + governorate_id, function (data, status) {
                $("[name='city_id']")
                    .find('option')
                    .remove()
                    .end()
                    .append('<option class="cities" value="">جميع المدن</option>');

                data.forEach(function (car) {
                    var iselected = checktruefalse(car.id);
                    $("[name='city_id']")
                        .append($("<option class='cities'></option>")
                            .attr("value", car.id)
                            .text(car.name));
                    $('.cities[value=' + car.id + ']')
                        .attr('selected', iselected);

                });

            });
        });

        function checktruefalse(id) {
            if (id == '{{$city_id}}') {
                return true
            } else
                return false
        }

    </script>
    <script>
        document.querySelector('.chosen-choices').classList.add('form-control');
        document.querySelector('.chosen-choices').style.height = "45px";
        document.querySelector('.chosen-drop').style.zIndex = "555555555";
        for (i = 0; i < document.querySelectorAll('.gj-datepicker-bootstrap [role=right-icon] button').length; i++) {
            document.querySelectorAll('.gj-datepicker-bootstrap [role=right-icon] button')[i].style.width = "54px";

        }
        for (i = 0; i < document.querySelectorAll('.gj-icon').length; i++) {
            document.querySelectorAll('.gj-icon')[i].style.fontSize = "33px";

        }

    </script>
@endsection