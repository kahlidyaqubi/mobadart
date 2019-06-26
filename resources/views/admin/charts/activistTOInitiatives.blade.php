@extends("layouts._admin_layout")
@section("title", "تقرير الناشطين في المبادرات ")
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="governorate_id">
                            <option value="">جميع المحافظات</option>
                            @foreach($governorates as $governorate)
                                <option value="{{$governorate->id}}"
                                        @if($governorate->id==request('governorate_id')) selected @endif>{{$governorate->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="city_id">

                        </select>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="gender">
                            <option value="">الذكور والإناث</option>
                            <option value="M" @if(request('gender')=='M')selected @endif>الذكور</option>
                            <option value="F" @if(request('gender')=='F')selected @endif>الإناث</option>
                        </select>
                    </div>
                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="usefull">
                            <option value="">المشاركين وغير المشاركين</option>
                            <option {{request('usefull')=="1"?"selected":""}} value="1">مشاركين</option>
                            <option {{request('usefull')=="2"?"selected":""}} value="2">غير مشاركين</option>
                        </select>
                    </div>

                    <div class="col-sm-12" style="margin-top: 12px">
                        <label>فــــرز حســــب الاهتمـــامـــات</label>
                        <select id="second" data-placeholder="اختر المهارات"  class="responsiveChosen" multiple style="width:350px;" tabindex="4" name="interests_ids[]" >
                            @foreach($interests as $interest)
                                <option value="{{$interest->id}}"
                                        @if(collect(request('interests_ids'))->contains($interest->id))selected @endif>{{$interest->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1 " style="margin-top: 12px">
                        <button type="submit" style="width:70px;" name="theaction" title="بحث" value="search"
                                class="btn btn-primary"/>
                        بحث
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <div id="chartdiv"></div>
    <hr style="border: 5px solid #0a8ec4;">
    <h2>تمثيل البينات في جدول</h2><br>
    <div class="portlet-body">
        <?php
        $items = json_decode($activists);
        ?>
        @if(count($items)>0)
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer">
                    <thead>
                    <tr>
                        <th> المبادرة</th>
                        <th> عدد النشطاء</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td> {{$item->title}}</td>
                            <td> {{$item->activists_initiatives_count}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <br><br>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    </div>
    <br>
    <br>
@endsection
@section('css')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

    </style>
    <style>
        .multiselect-container li {
            padding: 8px !important
        }
    </style>
    <link rel="stylesheet" href="/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">

@endsection
@section('js')
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        // Themes begin
        am4core.useTheme(am4themes_dataviz);
        am4core.useTheme(am4themes_animated);

        // Themes end

        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.XYChart);

        // Add data
        var mydata=JSON.parse('{!! $activists !!}');
        mydata = $.grep( mydata, function(e){
            return e.activists_initiatives_count != 0;
        });
        chart.data = mydata;
        /*[{
            "name": "USA",
            "citizens_count": 2025
        }, {
            "name": "China",
            "citizens_count": 1882
        },];*/

        // Create axes

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());

        categoryAxis.dataFields.category = "title";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
            if (target.dataItem && target.dataItem.index & 2 == 2) {
                return dy + 25;
            }
            return dy;
        });

        var  valueAxis= chart.yAxes.push(new am4charts.ValueAxis());

        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "activists_initiatives_count";
        series.dataFields.categoryX = "title";
        series.name = "activists_initiatives_count";
        series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;

        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;

        // Enable export
        chart.exporting.menu = new am4core.ExportMenu();
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#multi-select-demo').multiselect();
        });
    </script>
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
            if (id == '{{request('city_id')}}') {
                return true
            } else
                return false
        }

    </script>
    <script type="text/javascript" src="/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>

@endsection