@extends("layouts._thirst_layout")

@section("title", "عرض المبادرات")
@section("content")
    <div class="row justify-content-center">
        <div class="col text-center">
            <h1>عرض المبادرات </h1>
        </div>
    </div>

    <form class="" action="index.html" method="post">
        <!-- 1 -->
        <div class="container ">
            <div class="row  ">
                <div class="col-md-4 ">
                    <input type="text" name="" value="" style=""
                           placeholder="ابحث في العنوان أو اسم المنشط أو اسم الفريق">
                </div>
                <div class="col-md-2 ">
                    <input name="country" list="country" class="form-control" placeholder="جميع المحافظات">
                    <datalist id="country">
                        <option value="غزة ">
                        </option>
                        <option value="الشمال">
                        </option>
                        <option value="رفح">
                        </option>
                        <option value="خانيونس">
                        </option>
                        <option value="الوسطى">
                        </option>
                    </datalist>
                </div>
                <div class="col-md-2 ">
                    <input name="city" list="city" class="form-control" placeholder="جميع المدن">
                    <datalist id="city">
                        <option value="غزة ">
                        </option>
                        <option value="بني سهيلة">
                        </option>
                        <option value="رفح">
                        </option>
                        <option value="الفخاري ">
                        </option>
                        <option value="بيت حانون">
                        </option>
                        <option value="جباليا">
                        </option>
                    </datalist>
                </div>
                <div class="col-md-2 ">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-table"></i></span>
                        </div>
                        <input  id="datepicker" width="276"  name="brth_day"
                                value="{{old("brth_day")}}" required placeholder="تاريخ الميلاد"/>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group form-group">

                        <select data-placeholder="اختر اهتماماتك من القائمة" multiple class="chosen-select" name="test">
                            <option value=""></option>
                            <option>دعم خدمات التعليم</option>
                            <option>دعم خدمات الصحة</option>
                            <option>دعم خدمات الدعم النفسي والاجتماعي</option>
                            <option>دعم تمثيل الشباب داخل المخيمات</option>
                            <option>دعم خدمات البنية التحتية</option>
                        </select>
                        <script type="text/javascript">
                            $(".chosen-select").chosen({
                                no_results_text: "Oops, nothing found!"
                            })
                        </script>
                    </div>
                </div>
                <div class="cl-md-2">
                    <button type="button" name="button" class="butn">بحث</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row ">
            <div class="our-cause remove-ext-50 loader-data" id="itemContainer">
                <div class="col-sm-4">
                    <div class="caro-unit fadein">
                        <div class="cause-avatar">
                            <a href="single-cause.html" title=""><img src="" alt=""></a>
                            <div class="required-amount">
                                <span>1</span>
                            </div>
                        </div>
                        <div class="cause-meta">

                            <h2><a href="single-cause.html" title="">مبادرة تحسين التعليم</a></h2>
                            <p>
                                هنا يضاف نص يحتوي على تفاصيل عن المبادرة
                                هنا يضاف نص يحتوي على تفاصيل عن المبادرة
                                هنا يضاف نص يحتوي على تفاصيل عن المبادرة
                            </p>
                            <a href="donation-page.html" title="" class="donate-me" data-ripple="">تفاصيل المبادرة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pagination div -->
        <div class="row  " style="margin-top:50px;">
            <div class="col-sm-5"></div>
            <div class="col-sm-4">
                <a href="#" class="pag">pagination</a>
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

        .butn {
            width: 100px;
            height: 50px;
            border-radius: 20px
        }

        .pag {
            font-size: 20px;
        }

        .progress-bar {
            background: gray;
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
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

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
@endsection