@extends("layouts._sixth_layout")

@section("title", "تقييماتي")
@section("content")
    <div class="container" style="margin-top: 90px;min-height: 395px">
        <div class="row">
            <form   style="width:900px;">
                <div class="row">
                    <div class="col-md-3">
                        <select class="form-control" name="initiative_id" id="sel1" style="width:200px;height:60px">
                            <option value="">جميع المبادرات</option>
                            @foreach($initiatives as $initiative)
                                <option value="{{$initiative->id}}"
                                        @if($initiative->id==request('initiative_id')) selected @endif>{{$initiative->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input style="width:83px;height:60px" type="submit" name="" value="بحث" placeholder="">
                    </div>
                </div>
            </form>
        </div>


        <div class="row mt-3 table-responsive">
            @if($items->count()>0)
            <table class="table table-bordered wow bounceIn">
                <thead>
                <tr style="background:grey;color:white;">
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">اسم الشخص </th>
                    <th style="text-align: center;">المبادرة</th>
                    <th style="text-align: center;">إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                <tr style="background-color:white">
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->activist->user->name}} {{$item->activist->user->last_name}}</td>
                    <td>{{$item->initiative->title}}</td>
                    <td style="text-align:center;">
                        <a href="/activist/evalution/{{$item->id}}"> <button   class="but btn  wow bounceInUp">عرض</button></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                {{$items->links()}}
            </table>
            @else
                <br><br>
                <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
            @endif
        </div>
    </div>
@endsection
@section("css")

@endsection
@section('js')

@endsection