@extends("layouts._admin_layout")

@section("title", "فئات حساب ".$item->user->name)
@section("content")

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN FORM-->
            <form method="post" action="/admin/admin/hisCategoty/{{$item->id}}" class="form-horizontal">
                @csrf
                <div class="form-group row">

                    <div class="col-sm-5">
                        <label><input
                                    style="-ms-transform: scale(1.1);  -moz-transform: scale(1.1);  -webkit-transform: scale(1.1);   -o-transform: scale(1.1);   padding: 10px;"
                                    type="checkbox" id="#checkAll"/><b
                                    style=" padding-right: 10px; font-size: 107%;  display: inline;"> تحيد الكل</b></label>

                        <ul class="list-unstyled">
                            @foreach($his_category as $category)
                                <li>
                                    <label>
                                        <input {{$item->categories->contains($category->id)?'checked':''}} type="checkbox"
                                               name="categoreis[]" value="{{$category->id}}"/>
                                        <b>{{$category->name}}</b></label>

                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <input type="submit" class="btn btn-success" value="حفظ"/>
                        <a href="/admin/admin" class="btn btn-light">الغاء الامر</a>
                    </div>
                </div>
            </form>
        </div>

    </div>



@endsection
@section('css')

@endsection
@section('js')
    <script>
        $(function(){

            $(":checkbox").click(function(){
                $(this).parent().next().find(":checkbox").prop("checked",$(this).prop("checked"));
                $(this).parents("ul").each(function(){
                    $(this).prev().find(":checkbox").prop("checked",$(this).find(":checked").size()>0);
                });
            });
//
            //
        });

    </script>
@endsection

