@extends("layouts._admin_layout")

@section("title", "صلاحيات حساب ".$item->user->name)
@section("content")

    <div class="row">
        <div class="col-md-12">
           <!-- BEGIN FORM-->
                <form method="post" action="/admin/admin/permission/{{$item->id}}" class="form-horizontal">
                    @csrf
                    <h2>الصلاحيات الأساسية</h2>
                    <div class="form-group row">

                        <div class="col-sm-5">
                            <label><input
                                        style="-ms-transform: scale(1.1);  -moz-transform: scale(1.1);  -webkit-transform: scale(1.1);   -o-transform: scale(1.1);   padding: 10px;"
                                        type="checkbox" id="#checkAll"/><b
                                        style=" padding-right: 10px; font-size: 107%;  display: inline;"> تحيد الكل</b></label>

                            <ul class="list-unstyled">
                                @foreach($other_links as $link)
                                    <li>
                                        <label>
                                            <input {{$item->links->contains($link->id)?'checked':''}} type="checkbox"
                                                   name="permission[]" value="{{$link->id}}"/>
                                            <b>{{$link->title}}</b></label>
                                        <?php
                                        $sublinks = \DB::table("links")->where("parent_id", $link->id)->get();
                                        ?>
                                        <ul class="list-unstyled">
                                            @foreach($sublinks as $sublink)
                                                <li>
                                                    <label><input {{$item->links->contains($sublink->id)?'checked':''}}
                                                                  type="checkbox" name="permission[]"
                                                                  value="{{$sublink->id}}"/> {{$sublink->title}}
                                                    </label>

                                                </li>
                                            @endforeach
                                        </ul>

                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                    <hr style="border-bottom: 3px solid #3E7087">
                    <h2>صلاحيات العليا</h2>
                    <div class="form-group row">

                        <div class="col-sm-5">
                            <label><input
                                        style="-ms-transform: scale(1.1);  -moz-transform: scale(1.1);  -webkit-transform: scale(1.1);   -o-transform: scale(1.1);   padding: 10px;"
                                        type="checkbox" id="#checkAll"/><b
                                        style=" padding-right: 10px; font-size: 107%;  display: inline;"> تحيد الكل</b></label>

                            <ul class="list-unstyled">
                                @foreach($super_links as $link)
                                    <li>
                                        <label>
                                            <input {{$item->links->contains($link->id)?'checked':''}} type="checkbox"
                                                   name="permission[]" value="{{$link->id}}"/>
                                            <b>{{$link->title}}</b></label>
                                        <?php
                                        $sublinks = \DB::table("links")->where("parent_id", $link->id)->get();
                                        ?>
                                        <ul class="list-unstyled">
                                            @foreach($sublinks as $sublink)
                                                <li>
                                                    <label><input {{$item->links->contains($sublink->id)?'checked':''}}
                                                                  type="checkbox" name="permission[]"
                                                                  value="{{$sublink->id}}"/> {{$sublink->title}}
                                                    </label>

                                                </li>
                                            @endforeach
                                        </ul>

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

