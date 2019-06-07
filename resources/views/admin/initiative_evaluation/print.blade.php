<meta http-equiv='Content-Type' charset=utf-8 content='text/html'>
<head>
    <style type="text/css">
        *, body, table, th, tr, td, tbody {
            font-family: 'examplefont', sans-serif;
            text-align: right;

        }

        td {
            padding: 7px
        }
    </style>
</head>
<body >
<br><br><br><br>
<hr>
        <table border="1" style="width: 90%">
            <thead>
            <tr>
                <th> الإجابة</th>
                <th width="80%"> السؤال</th>
            </tr>
            </thead>
            <tbody>
            @if($type=='المنشط')
                <tr>    <td> {{$all}}</td>

                    <td>عدد جميع المشاركين</td>
                </tr>
                <tr>
                    <td> {{$male_count}}</td>
                    <td> عدد المشاركين الذكور</td>
                </tr>
                <tr>
                    <td> {{$male_old_count}}</td>
                    <td> عدد المشاركين الذكور فوق سن 18</td>
                </tr>
                <tr>
                    <td> {{$male_young_count}}</td>
                    <td> عدد المشاركين الذكور تحت سن 18</td>
                </tr>
                <tr>
                    <td> {{$female_count}}</td>
                    <td> عدد المشاركين الإناث</td>
                </tr>
                <tr>
                    <td> {{$female_young_count}}</td>
                    <td> عدد المشاركين الإناث فوق سن 18</td>
                </tr>
                <tr>
                    <td> {{$female_old_count}}</td>
                    <td> عدد المشاركين الإناث تحت سن 18</td>
                </tr>
                @foreach($others as $other)
                    <tr>
                        <td> {{$other->value}}</td>
                        <td>{{$other->attribute}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td> {{($item->changing)?'نعم':'لا'}}</td>
                    <td>هل تعتقد أن مشاركتك في تنفيذ أنشطة المبادرة أثر على مفاهيمك تجاه دورك في التغيير
                        المجتمعي ك مواطن فاعل
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="line-height: 30px;"> {{$item->changing_ditalis}}</td>
                </tr>
                <tr>
                    <td> {{($item->impacting)?'نعم':'لا'}}</td>
                    <td> بعد مشاركتكم في المبادرة هل زادت قناعتك بقدرتك على التأثير على ظروف العيش</td>
                </tr>
                <tr>
                    <td colspan="2" style="line-height: 30px;"> {{$item->impacting_ditalis}}</td>
                </tr>
                <tr>
                    <td> {{($item->continuing)?'نعم':'لا'}}</td>
                    <td> هل ستستمر بالعمل بشكل تطوعي للتأثير على ظروف العيش داخل المخيم</td>
                </tr>
                <tr>
                    <td colspan="2" style="line-height: 30px;"> {{$item->continuing_ditalis}}</td>
                </tr>
                <tr>
                    <td> {{($item->improving)?'نعم':'لا'}}</td>
                    <td> هل تعتقد ان مثل هذه المبادرات يساهم في تحسين ظروف العيش داخل المخيم</td>
                </tr>
                <tr>
                    <td colspan="2" style="line-height: 30px;"> {{$item->improving_ditalis}}</td>
                </tr>
            @endif
            </tbody>
        </table>
<hr>
<p>
    {{"تقييم  $type $name لمبادرة $initiative->title"}}
</p>
</body>
</html>
