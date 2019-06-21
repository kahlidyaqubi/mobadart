@extends("layouts._sixth_layout")

@section("title", "تقييم مبادرة  ".$the_item->title)
@section("content")
    <div class="row justify-content-center">
        <h1> تقييم مبادرة {{$the_item->title}} </h1>
    </div>
    <div class="d-flex justify-content-center h-100">
        <!--form -->
        <form method="post" action="/activist/evalution">
            @csrf
            <input type="hidden" name="initiative_id" value="{{$the_item->id}}"/>
            <div class="row mt-3">
            @include("_first_msg")
            </div>
            <div class="row mt-3">
                <table class="table table-bordered wow bounceIn">
                    <thead>
                    <tr style="background:grey;color:white;">
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">السؤال</th>
                        <th style="text-align: center;">نعم أو لا</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="background-color:white">
                        <th scope="row">1</th>
                        <td>
                            <p> هل تعتقد أن مشاركتك في تنفيذ أنشطة المبادرة أثر على مفاهيمك تجاه دورك في التغيير
                                المجتمعي كمواطن فاعل </p>
                        </td>
                        <td style="text-align: center;">
                            <div>
                                <input type="radio" id="contactChoice1" name="changing" value="1"
                                       class="wow bounceInUp" required @if(old('changing')=='1') checked @endif>
                                <label for="contactChoice1" style="margin-left:20px;">نعم </label>
                                <input type="radio" id="contactChoice1" name="changing" value="0"
                                       class="wow bounceInUp" required @if(old('changing')=='0') checked @endif>
                                <label for="contactChoice1" style="margin-left:20px;">لا </label>
                            </div>
                            <div class="">
                                <textarea name="changing_ditalis" rows="4" cols="50" placeholder="وضح">{{old('changing_ditalis')}}</textarea>
                            </div>
                        </td>
                    </tr>
                    <th style="background:#F0F0F0" scope="row">2</th>
                    <td style="background:#F0F0F0">
                        <p>
                            بعد مشاركتكم في المبادرة هل زادت قناعتك بقدرتك على التأثير على ظروف العيش </p>
                    </td>
                    <td style="text-align: center;background:#F0F0F0">
                        <div>
                            <input type="radio" id="contactChoice1" name="impacting" value="1"
                                   class="wow bounceInUp" required @if(old('impacting')=='1') checked @endif>
                            <label for="contactChoice1" style="margin-left:20px;">نعم </label>
                            <input type="radio" id="contactChoice1" name="impacting" value="0"
                                   class="wow bounceInUp" required @if(old('impacting')=='0') checked @endif>
                            <label for="contactChoice1" style="margin-left:20px;">لا </label>
                        </div>
                        <div class="">
                            <textarea name="impacting_ditalis" rows="4" cols="50" placeholder="وضح">{{old('impacting_ditalis')}}</textarea>
                        </div>
                    </td>
                    </tr>
                    </tr>
                    <tr style="background-color:white">
                        <th scope="row">3</th>
                        <td>
                            <p> هل ستستمر بالعمل بشكل تطوعي للتأثير على ظروف العيش داخل المخيم</p>
                        </td>
                        <td style="text-align: center;">
                            <div>
                                <input type="radio" id="contactChoice1" name="continuing" value="1"
                                       class="wow bounceInUp" required @if(old('continuing')=='1') checked @endif>
                                <label for="contactChoice1" style="margin-left:20px;">نعم </label>
                                <input type="radio" id="contactChoice1" name="continuing" value="0"
                                       class="wow bounceInUp" required @if(old('continuing')=='0') checked @endif>
                                <label for="contactChoice1" style="margin-left:20px;">لا </label>
                            </div>
                            <div class="">
                                <textarea name="continuing_ditalis" rows="4" cols="50" placeholder="وضح">{{old('continuing_ditalis')}}</textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" style="background:#F0F0F0">4</th>
                        <td style="background:#F0F0F0;">
                            <p> هل تعتقد ان مثل هذه المبادرات يساهم في تحسين ظروف العيش داخل المخيم </p>
                        </td>
                        <td style="text-align: center;background:#F0F0F0">
                            <div>
                                <input type="radio" id="contactChoice1" name="improving" value="1"
                                       class="wow bounceInUp" required @if(old('improving')=='1') checked @endif>
                                <label for="contactChoice1" style="margin-left:20px;">نعم </label>
                                <input type="radio" id="contactChoice1" name="improving" value="0"
                                       class="wow bounceInUp" required @if(old('improving')=='0') checked @endif>
                                <label for="contactChoice1" style="margin-left:20px;">لا </label>
                            </div>
                            <div class="">
                                <textarea name="improving_ditalis" rows="4" cols="50" placeholder="وضح">{{old('improving_ditalis')}}</textarea>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-center">
                <button type="submit" href="#" class="aa">أدخل التقييم</button>
            </div>
        </form>
    </div>

@endsection
@section("css")

@endsection
@section('js')

@endsection