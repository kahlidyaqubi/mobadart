@extends("layouts._admin_layout")

@section("title", "تقييم $type $name لمبادرة $initiative->title")
@section("content")


    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer">
                <thead>
                <tr>
                    <th> السؤال</th>
                    <th width="15%"> الإجابة</th>
                </tr>
                </thead>
                <tbody>
                @if($type=='المنشط')
                    <tr>
                        <td>عدد جميع المشاركين</td>
                        <td> {{$all}}</td>
                    </tr>
                    <tr>
                        <td> عدد المشاركين الذكور</td>
                        <td> {{$male_count}}</td>
                    </tr>
                    <tr>
                        <td> عدد المشاركين الذكور فوق سن 18</td>
                        <td> {{$male_old_count}}</td>
                    </tr>
                    <tr>
                        <td> عدد المشاركين الذكور تحت سن 18</td>
                        <td> {{$male_young_count}}</td>
                    </tr>
                    <tr>
                        <td> عدد المشاركين الإناث</td>
                        <td> {{$female_count}}</td>
                    </tr>
                    <tr>
                        <td> عدد المشاركين الإناث فوق سن 18</td>
                        <td> {{$female_young_count}}</td>
                    </tr>
                    <tr>
                        <td> عدد المشاركين الإناث تحت سن 18</td>
                        <td> {{$female_old_count}}</td>
                    </tr>
                    @foreach($others as $other)
                        <tr>
                            <td>{{$other->attribute}}</td>
                            <td> {{$other->value}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>هل تعتقد أن مشاركتك في تنفيذ أنشطة المبادرة أثر على مفاهيمك تجاه دورك في التغيير
                            المجتمعي ك مواطن فاعل
                        </td>
                        <td> {{($item->changing)?'نعم':'لا'}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="line-height: 30px;"> {{$item->changing_ditalis}}</td>
                    </tr>
                    <tr>
                        <td> بعد مشاركتكم في المبادرة هل زادت قناعتك بقدرتك على التأثير على ظروف العيش</td>
                        <td> {{($item->impacting)?'نعم':'لا'}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="line-height: 30px;"> {{$item->impacting_ditalis}}</td>
                    </tr>
                    <tr>
                        <td> هل ستستمر بالعمل بشكل تطوعي للتأثير على ظروف العيش داخل المخيم</td>
                        <td> {{($item->continuing)?'نعم':'لا'}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="line-height: 30px;"> {{$item->continuing_ditalis}}</td>
                    </tr>
                    <tr>
                        <td> هل تعتقد ان مثل هذه المبادرات يساهم في تحسين ظروف العيش داخل المخيم</td>
                        <td> {{($item->improving)?'نعم':'لا'}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="line-height: 30px;"> {{$item->improving_ditalis}}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <a href="/admin/evalution/printEval/{{$item->id}}" style="background-color: #0ab20a;color: #fceeb6" class="btn grey-salsa btn-outline">طباعة</a>
                    <a href="/admin/evalution" class="btn grey-salsa btn-outline">إلغاء</a>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')
@endsection

