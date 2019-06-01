@extends("layouts._admin_layout")
@section("title", "ترتيب القائمة الجانبية")
@section("content")

    <div class="row">
        <div class="col-md-12">
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" id="myform" action="/admin/siteSting/menuOrder" id="form_sample_1" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-body">
                        <div class="row" style="display:none ;">
                            <div class="col-md-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-bubble font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Nestable List 1</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group">
                                                <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;"> Option 1</a>
                                                    </li>
                                                    <li class="divider"> </li>
                                                    <li>
                                                        <a href="javascript:;">Option 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">Option 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">Option 4</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body ">
                                        <div class="dd" id="nestable_list_1">
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="1">
                                                    <div class="dd-handle"> Item 1 </div>
                                                </li>
                                                <li class="dd-item" data-id="2">
                                                    <div class="dd-handle"> Item 2 </div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="3">
                                                            <div class="dd-handle"> Item 3 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="4">
                                                            <div class="dd-handle"> Item 4 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="5">
                                                            <div class="dd-handle"> Item 5 </div>
                                                            <ol class="dd-list">
                                                                <li class="dd-item" data-id="6">
                                                                    <div class="dd-handle"> Item 6 </div>
                                                                </li>
                                                                <li class="dd-item" data-id="7">
                                                                    <div class="dd-handle"> Item 7 </div>
                                                                </li>
                                                                <li class="dd-item" data-id="8">
                                                                    <div class="dd-handle"> Item 8 </div>
                                                                </li>
                                                            </ol>
                                                        </li>
                                                        <li class="dd-item" data-id="9">
                                                            <div class="dd-handle"> Item 9 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="10">
                                                            <div class="dd-handle"> Item 10 </div>
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li class="dd-item" data-id="11">
                                                    <div class="dd-handle"> Item 11 </div>
                                                </li>
                                                <li class="dd-item" data-id="12">
                                                    <div class="dd-handle"> Item 12 </div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-bubble font-red"></i>
                                            <span class="caption-subject font-red sbold uppercase">Nestable List 2</span>
                                        </div>
                                        <div class="tools">
                                            <a href="" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="" class="reload"> </a>
                                            <a href="" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="dd" id="nestable_list_2">
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="13">
                                                    <div class="dd-handle"> Item 13 </div>
                                                </li>
                                                <li class="dd-item" data-id="14">
                                                    <div class="dd-handle"> Item 14 </div>
                                                </li>
                                                <li class="dd-item" data-id="15">
                                                    <div class="dd-handle"> Item 15 </div>
                                                    <ol class="dd-list">
                                                        <li class="dd-item" data-id="16">
                                                            <div class="dd-handle"> Item 16 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="17">
                                                            <div class="dd-handle"> Item 17 </div>
                                                        </li>
                                                        <li class="dd-item" data-id="18">
                                                            <div class="dd-handle"> Item 18 </div>
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet light bordered">

                                    <div class="portlet-body">
                                        <div class="dd" id="nestable_list_3">
                                            <ol class="dd-list">

                                                @foreach($links as $link)
                                                <li class="dd-item dd3-item" data-id="{{$link->order_id}}">
                                                    <input type="hidden" id="{{$link->id}}" name="{{$link->id}}" value="{{$link->id}}">
                                                    <div class="dd-handle dd3-handle"> </div>
                                                    <div class="dd3-content"> {{$link->title}} </div>
                                                </li>
                                                    @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">تعديل</button>
                                <a href="/admin" class="btn grey-salsa btn-outline">إلغاء</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

    </div>



@endsection
@section('css')
    <link href="{{asset('metronic-rtl/assets/global/plugins/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('js')
    <script>
        /*$('#myform').submit(function() {
            'use strict'
            $('input[id]').each(function(){
                var $this = $(this);
                $this.val($(this).parents("li").data("id"))
            });
            return true; // return false to cancel form action
        });*/



    </script>
    <script src="{{asset('metronic-rtl/assets/global/plugins/jquery-nestable/jquery.nestable-rtl.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('metronic-rtl/assets/pages/scripts/ui-nestable.min.js')}}" type="text/javascript"></script>
@endsection