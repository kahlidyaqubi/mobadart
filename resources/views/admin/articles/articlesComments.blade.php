@extends("layouts._admin_layout")

@section("title", "تعليقات الخبر ".$item->title)
@section("content")

    <div class="search-page search-content-1">
        <div class="search-bar ">
            <div class="row">
                <form>
                    <div class="col-sm-4 " style="margin-top: 12px">
                        <input type="text" class="form-control" name="q" value="{{request('q')}}"
                               placeholder="ابحث في اسم التعليقات "/>
                    </div>


                    <div class="col-sm-4" style="margin-top: 12px">
                        <select class="form-control" name="status">
                            <option value="">جميع التعليقات</option>
                            <option value="1" @if(request('status')==1) selected @endif>المسموحة </option>
                            <option value="0" @if(request('status')==='0') selected @endif>الممنوعة </option>
                        </select>
                    </div>

                    <div class="col-sm-1 " style="margin-top: 12px">
                        <input type="submit" style="width:70px;" value="بحث" class="btn btn-primary"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="portlet-body " id="the_error"></div>
    <div class="portlet-body">
        @if($items->count()>0)
            <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer">
                <thead>
                <tr>
                    <th width="10%"> #</th>
                    <th> اسم الاهتمام</th>
                    <th> الحالة</th>
                    <th width="15%" class="hidden-xs"> إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td> {{$item->id}}</td>
                        <td> {{$item->detalis}}</td>
                        <td> <input
                                    @if(!Auth::user()->admin->links->contains(\App\Link::where('title','=','حذف ومنع تعليقات')
                                  ->first()->id)) disabled
                                    title="لا تملك صلاحية منع وسماح تعليقات"
                                    @endif
                                    class="cbActive" type="checkbox" {{$item->status==1?"checked":""}} value="{{$item->id}}"/>
                            </td>
                        <td width="17%" class="hidden-xs">
                            <div class="btn-group">
                                <button class="btn btn-xs green dropdown-toggle" type="button"
                                        data-toggle="dropdown"
                                        aria-expanded="false"> إجراءات
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/admin/interest/{{$item->id}}/edit">
                                            <span class="text-warning"><i class="icon-pencil"></i> تعديل </span></a>
                                    </li>
                                    <li>
                                        <a href="/admin/interest/delete/{{$item->id}}" class="Confirm">
                                            <span class="text-danger"><i class="icon-trash"></i> حذف</span></a>
                                        <a href="/admin/article/articlesComments/{{$item->article->id}}" class="btn grey-salsa btn-outline">إلغاء</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{$items->links()}}
            </table>
        </div>
        @else
            <br><br>
            <div class="alert alert-warning">نأسف لا يوجد بيانات لعرضها</div>
        @endif
    </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')
    <script>
        $(function () {
            $(".cbActive").click(function () {
                var id = $(this).val();
                var mythis=this;
                console.log(mythis);

                $.ajax({
                    url: "/admin/comment/accept/" + id,
                    data: {_token: '{{ csrf_token() }}'},
                    error: function (jqXHR, textStatus, errorThrown) {
                        document.getElementById("the_error").innerHTML = '<div class="alert alert-danger alert-dismissible">\n' + jqXHR.responseJSON.message +
                            '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                            '            <span aria-hidden="true">&times;</span>\n' +
                            '        </button>\n' +
                            '    </div>';
                        mythis.checked = false;
                    },
                });
            });
        });
    </script>
@endsection

