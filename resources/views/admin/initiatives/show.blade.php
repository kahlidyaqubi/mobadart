@extends("layouts._admin_layout")

@section("title","مبادرة"." ".$item->title)
@section("content")

    <div class="profile">
        <div class="tabbable-line tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab"> معلومات المبادرة </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="list-unstyled profile-nav">
                                <li>
                                    <img src="{{$item->img}}"
                                         class="img-responsive pic-bordered" alt=""/>

                                </li>
                                <li>
                                    <a> المشاركين : {{$item->activists->count()}} / {{$item->activists_count}} </a>
                                </li>
                                @if($item->donation>0)
                                    <li>
                                        <a> التبرع : {{$item->paid_up}} / {{$item->donation}} &#36;</a>
                                    </li>
                                @endif
                                <li>
                                    <a> العنوان :{{$item->city->governorate->name}} / {{$item->city->name}}
                                        / {{$item->neighborhood}} </a>
                                </li>
                                @if($item->admin_id==auth()->user()->admin->id || auth()->user()->admin->super_admin==1 )
                                    <li>
                                        <a style="color:#042e51;"
                                           href="/admin/initiative/activitsInInitiative/{{$item->id}}?accept=0"> طلبات
                                            الانضمام </a>
                                    </li>
                                @endif
                                <li>
                                    <a style="color:#042e51;"
                                       href="/admin/initiative/activitsInInitiative/{{$item->id}}"> المنضمين </a>
                                </li>
                                <li>
                                    <a style="color:#042e51;" href="/initiative/show_art/{{$item->id}}"> الأخبار </a>
                                </li>
								@if($item->end_date <= Carbon\Carbon::now() && $item->admin_id==auth()->user()->admin->id
                                && \App\Initiative_evaluation::where('admin_id',auth()->user()->admin->id)->where('initiative_id',$item->id)->first()==null)
                                    <li>
                                        <a style="color:lightgoldenrodyellow;background: darkred;  !important"
                                           href="/admin/evalution/create?initiative_id={{$item->id}}"> أدخل التقييم </a>
                                    </li>
                                @endif
                                @if(auth()->user()->admin->links->contains(\App\Link::where('title','=','إدارة التقيمات')->first()))
                                    <li>
                                        <a style="color:#042e51;"
                                           href="/admin/initiative/evaluteToInitiave/{{$item->id}}"> التقييمات
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-8 profile-info">
                                    <h1 class="font-green sbold uppercase">الاهتمامات</h1>
                                    <p>
                                    </p>
                                    @foreach($hisinterests as $interests )
                                        @if($interests->status==1)
                                            <span class="badge badge-warning">{{$interests->name}}</span>
                                        @else
                                            <span class="badge badge-info">{{$interests->name}}</span>

                                        @endif
                                    @endforeach
                                    <p>
                                        <a href="javascript:;"><i class="fa fa-star"></i>
                                            المنشط

                                            {{$item->admin->user->name}}
                                        </a>
                                    <ul>
                                        <li> مركز عائلة المنشط
                                            : @if(!$item->admin->super_admin) {{$item->admin->family_center->name}} @else
                                                عام @endif</li>
                                        <li> رقم تواصل المنشط : {{$item->admin->mobile}}</li>
                                    </ul>


                                    </p>
                                    <p class="col-md-6">
                                        <a href="javascript:;"><i class="fa fa-star"></i>
                                            نبذة عن المبادرة
                                        </a>
                                        <br>{{$item->details}}

                                    </p>
                                    <p class="col-md-6">
                                        <a href="javascript:;"><i class="fa fa-star"></i>
                                            علاقة المبادرة بالتغيير المجتمعي
                                        </a>
                                        <br>{{$item->changing}}

                                    </p>
                                    <p class="col-md-6">
                                        <a href="javascript:;"><i class="fa fa-star"></i>
                                            مبررات المبادرة
                                        </a>
                                        <br>{{$item->justifications}}

                                    </p>
                                    <p class="col-md-6">
                                        <a href="javascript:;"><i class="fa fa-star"></i>
                                            المشكلة التي تحلها المبادرة
                                        </a>
                                        <br>{{$item->problem}}

                                    </p>
                                    <p class="col-md-12">
                                        <a href="javascript:;"><i class="fa fa-star"></i>
                                            الهدف الرئيسي للمبادرة
                                        </a>
                                        <br>{{$item->main_goale}}

                                    </p>

                                    <p class="col-md-12" style="margin-bottom: 0">
                                        <a href="javascript:;"><i class="fa fa-star"></i>
                                            الأهداف الفرعية للمبادرة
                                        </a>
                                    <ul>
                                        <li style="list-style-type:none;padding: 0;margin: 0;color: #fff">.</li>
                                        @foreach($item->initiatives_goals as $goal)
                                            <li> {{$goal->details}}</li>
                                        @endforeach
                                    </ul>
                                    </p>

                                </div>
                            </div>
                            <!--end col-md-8-->

                            <!--end row-->


                            <div class="tabbable-line tabbable-custom-profile">

                                <div class="tab-content" id="app">
                                    <div v-cloak>
                                        <div class="tab-pane active" id="tab_1_11">
                                            <div class="portlet-body">
                                                <form class="row">
                                                    <div class="col-4 " style="margin: 15px;">
                                                        <button @click.prevent="doSearch" :disabled="loadingSearch"
                                                                type="submit" class="btn btn-primary">حدث
                                                            <i v-show="loadingSearch"
                                                               class="fas fa-spinner fa-spin"></i>
                                                        </button>
                                                        @if($item->admin_id==auth()->user()->admin->id)
                                                            <a @click.prevent="showCreateActivity()" href="#"
                                                               class="btn btn-success ">أنشئ نشاطاً جديدا</a>
                                                        @endif
                                                    </div>
                                                </form>
                                                <div class="alert mt-3 alert-danger" v-show="homeErrors.length>0">
                                                    <ul>
                                                        <li v-for="error in homeErrors">@{{error}}</li>
                                                    </ul>
                                                </div>
                                                <div v-if="mainMessage" class="alert mt-3 alert-success">
                                                    @{{mainMessage}}
                                                </div>
                                                <table class="table table-striped table-bordered table-advance table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            <i class="fa fa-briefcase"></i>النشاط
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-question"></i>الفئة المستهدفة
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-bookmark"></i>عدد المستفيدين
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-bookmark"></i>عدد مرات التنفيذ
                                                        </th>
                                                        <th class="hidden-xs">
                                                            <i class="fa fa-bookmark"></i>التاريخ
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="(item,index) in result.data">
                                                        <td v-show='index==inlineEditIndex'><input
                                                                    v-on:keyup.enter='updateActivityInline(index)'
                                                                    v-on:keyup.escape='setEditIndex(-1)' type="text"
                                                                    v-model="item.name" class="form-control"/></td>
                                                        <td v-show='index==inlineEditIndex'><input
                                                                    v-on:keyup.enter='updateActivityInline(index)'
                                                                    v-on:keyup.escape='setEditIndex(-1)' type="text"
                                                                    v-model="item.target_group"
                                                                    class="form-control"/></td>
                                                        <td v-show='index==inlineEditIndex'><input
                                                                    v-on:keyup.enter='updateActivityInline(index)'
                                                                    v-on:keyup.escape='setEditIndex(-1)' type="text"
                                                                    v-model="item.ativiests_count"
                                                                    class="form-control"/></td>
                                                        <td v-show='index==inlineEditIndex'><input
                                                                    v-on:keyup.enter='updateActivityInline(index)'
                                                                    v-on:keyup.escape='setEditIndex(-1)' type="text"
                                                                    v-model="item.count"
                                                                    class="form-control"/></td>
                                                        <td v-show='index==inlineEditIndex'><input
                                                                    v-on:keyup.enter='updateActivityInline(index)'
                                                                    v-on:keyup.escape='setEditIndex(-1)' type="date"
                                                                    v-model="item.start_date" class="form-control"/>
                                                        </td>
                                                        <td v-show='index!=inlineEditIndex'><a
                                                                    @click.prevent="showEditActivity(item.id,index)"
                                                                    href="#">@{{item.name}}</a></td>
                                                        <td v-show='index!=inlineEditIndex'><a
                                                                    @click.prevent="showEditActivity(item.id,index)"
                                                                    href="#">@{{item.target_group}}</a></td>
                                                        <td v-show='index!=inlineEditIndex'><a
                                                                    @click.prevent="showEditActivity(item.id,index)"
                                                                    href="#">@{{item.ativiests_count}}</a></td>
                                                        <td v-show='index!=inlineEditIndex'><a
                                                                    @click.prevent="showEditActivity(item.id,index)"
                                                                    href="#">@{{item.count}}</a></td>
                                                        <td v-show='index!=inlineEditIndex'><a
                                                                    @click.prevent="showEditActivity(item.id,index)"
                                                                    href="#">@{{item.start_date}}</a></td>
                                                        <td>
                                                            <a v-show='index==inlineEditIndex'
                                                               @click.prevent="updateActivityInline(index)" href="#"
                                                               class='btn btn-sm btn-info'><i
                                                                        class='fa fa-save'></i></a>
                                                            <a v-show='index==inlineEditIndex'
                                                               @click.prevent="setEditIndex(-1)" href="#"
                                                               class='btn btn-sm btn-warning'><i
                                                                        class='fa fa-times'></i></a>
                                                            <a v-show='index!=inlineEditIndex'
                                                               @click.prevent="setEditIndex(index)" href="#"
                                                               class='btn btn-sm btn-primary'><i class='fa fa-edit'></i></a>
                                                            <a v-show='index!=inlineEditIndex'
                                                               @click.prevent="deleteActivity(item.id,index)" href="#"
                                                               class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot v-if="result.next_page_url" border="0">
                                                    <tr border="0">
                                                        <td class="text-center" colspan="7" border="0">
                                                            <button :disabled="loadingMore"
                                                                    @click="loadMore(result.next_page_url)"
                                                                    class='btn btn-block btn-info'>عرض المزيد
                                                                <i v-show="loadingMore"
                                                                   class="fas fa-spinner fa-spin"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                    <tfoot v-else class='alert mt-4 alert-info'>
                                                    <tr>
                                                        <td class="text-center" colspan="7">
                                                            لا يوجد نشاطات لعرضها
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal fade createNew" tabindex="-1" role="dialog"
                                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">إنشاء
                                                            نشاط جديد</h5>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form @submit.prevent="submitForm()" method="post"
                                                              action="/admin/activity">


                                                            @csrf
                                                            <div class="alert alert-danger"
                                                                 v-show="errors.length>0"
                                                                 class="alert-warning">
                                                                <ul>
                                                                    <li v-for="error in errors">@{{error}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div v-if="responseMessage"
                                                                 class="alert alert-success">
                                                                @{{responseMessage}}
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name"
                                                                       class="col-sm-3 col-form-label">اسم
                                                                    النشاط</label>
                                                                <div class="col-sm-9">
                                                                    <input autofocus ref="name"
                                                                           v-model="activity.name" required
                                                                           type="text" class="form-control"
                                                                           name="name" id="name"
                                                                           placeholder="اسم النشاط">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name"
                                                                       class="col-sm-3 col-form-label">الفئة
                                                                    المستهدفة</label>
                                                                <div class="col-sm-9">
                                                                    <input autofocus ref="name"
                                                                           v-model="activity.target_group"
                                                                           required type="text"
                                                                           class="form-control"
                                                                           name="target_group"
                                                                           id="target_group"
                                                                           placeholder="الفئة المستهدفة">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="iso2"
                                                                       class="col-sm-3 col-form-label">عدد
                                                                    المستفيدين </label>
                                                                <div class="col-sm-9">
                                                                    <input v-model="activity.ativiests_count"
                                                                           type="number" required min="1"
                                                                           class="form-control"
                                                                           name="ativiests_count"
                                                                           id="ativiests_count"
                                                                           placeholder="عدد المستفدين">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="iso2"
                                                                       class="col-sm-3 col-form-label">عدد
                                                                    مرات التنفيذ </label>
                                                                <div class="col-sm-9">
                                                                    <input v-model="activity.count"
                                                                           type="number" required min="1"
                                                                           class="form-control" name="count"
                                                                           id="count"
                                                                           placeholder="عدد مرات التنفيذ">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="iso2"
                                                                       class="col-sm-3 col-form-label">تاريخ
                                                                    النشاط </label>
                                                                <div class="col-sm-9">
                                                                    <input v-model="activity.start_date"
                                                                           type="date" required min="1"
                                                                           class="form-control"
                                                                           name="start_date"
                                                                           id="start_date"
                                                                           placeholder="تاريخ النشاط">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-9 offset-sm-3">
                                                                    <button type="submit"
                                                                            :disabled="loadingPost"
                                                                            class="btn btn-primary">انشاء
                                                                        <i v-show="loadingPost"
                                                                           class="fas fa-spinner fa-spin"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">إلغاء
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--tab-pane-->

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="/admin/initiative" class="btn grey-salsa btn-outline">إلغاء</a>
                            </div>
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
    <link href={{asset('metronic-rtl/assets/pages/css/profile-2-rtl.min.css')}} rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var app = new Vue({
            el: "#app",
            data: {
                q: "",
                result: [],
                loadingMore: false,
                loadingSearch: false,
                loadingPost: false,
                online_path: "",
                activity: {
                    initiative_id: '{{$item->id}}',
                    name: "",
                    target_group: "",
                    ativiests_count: "",
                    count: "",
                    start_date: "",
                    id: -1
                },
                homeErrors: [],
                errors: [],
                responseMessage: "",
                mainMessage: "",
                firstPage: false,
                loadingEditIndex: -1,
                editIndex: -1,
                inlineEditIndex: -1,
                activityOld: {
                    initiative_id: '{{$item->id}}',
                    name: "",
                    target_group: "",
                    ativiests_count: "",
                    count: "",
                    start_date: "",
                },
            },
            created() {
                this.doSearch();
            },
            methods: {
                onChange(date, dateString) {
                    console.log(date, dateString);
                },
                setEditIndex(index) {
                    if (index != -1) {
                        this.activityOld.name = this.result.data[index].name;
                        this.activityOld.target_group = this.result.data[index].target_group;
                        this.activityOld.ativiests_count = this.result.data[index].ativiests_count;
                        this.activityOld.count = this.result.data[index].count;
                        this.activityOld.start_date = this.result.data[index].start_date;
                    } else {
                        this.result.data[this.inlineEditIndex].name = this.activityOld.name;
                        this.result.data[this.inlineEditIndex].target_group = this.activityOld.target_group;
                        this.result.data[this.inlineEditIndex].ativiests_count = this.activityOld.ativiests_count;
                        this.result.data[this.inlineEditIndex].count = this.activityOld.count;
                        this.result.data[this.inlineEditIndex].start_date = this.activityOld.start_date;
                    }
                    this.inlineEditIndex = index;
                },
                updateActivityInline(index) {
                    this.homeErrors = [];
                    var id = this.result.data[index].id;
                    var name = this.result.data[index].name;
                    var target_group = this.result.data[index].target_group;
                    var ativiests_count = this.result.data[index].ativiests_count;
                    var count = this.result.data[index].count;
                    var start_date = this.result.data[index].start_date;
                    var initiative_id = this.result.data[index].initiative_id;
                    if (!name)
                        this.homeErrors.push("يرجى أدخال اسم النشاط");
                    if (!target_group)
                        this.homeErrors.push("يرجى ادخال الفئة المستهدفة");
                    if (!ativiests_count)
                        this.homeErrors.push("يرجى ادخال عدد المستفيدين");
                    if (!count)
                        this.homeErrors.push("يرجى ادخال عدد مرات التنفيذ");
                    if (!start_date)
                        this.homeErrors.push("يرجى ادخال تاريخ النشاط");
                    if (this.homeErrors.length == 0) {
                        var vm = this;
                        vm.activityOld.name = name;
                        vm.activityOld.target_group = target_group;
                        vm.activityOld.ativiests_count = ativiests_count;
                        vm.activityOld.count = count;
                        vm.activityOld.start_date = start_date;
                        vm.activityOld.initiative_id = initiative_id;
                        vm.setEditIndex(-1);
                        axios.post('/admin/activity/' + id, {
                            _method: 'PATCH',
                            initiative_id: initiative_id,
                            name: name,
                            target_group: target_group,
                            ativiests_count: ativiests_count,
                            count: count,
                            start_date: start_date
                        })
                            .then(function (response) {
                                vm.mainMessage = response.data.msg;
                                vm.loadingPost = false;
                            })
                            .catch(function (error, response) {
                                for (var key in error.response.data.errors) {
                                    vm.homeErrors.push(error.response.data.errors[key][0]);
                                }
                                vm.loadingPost = false;
                            });
                    }
                },
                doSearch() {
                    this.loadingSearch = true;
                    var vm = this;
                    vm.firstPage = true;
                    axios.get('/admin/activity', {
                        params: {
                            id: '{{$item->id}}'
                        }
                    })
                        .then(function (response) {
                            vm.result = response.data;
                            vm.loadingSearch = false;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                loadMore(url) {
                    var vm = this;
                    vm.loadingMore = true;
                    vm.firstPage = false;
                    axios.get(url)
                        .then(function (response) {
                            for (var i = 0; i < response.data.data.length; i++)
                                vm.result.data.push(response.data.data[i]);
                            vm.result.next_page_url = response.data.next_page_url;
                            vm.loadingMore = false;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                showCreateActivity() {
                    console.log('test');
                    this.editIndex = -1;
                    this.activity.id = -1;
                    this.activity.name = this.activity.target_group = this.activity.ativiests_count = this.activity.count = this.activity.start_date = "";
                    $(".createNew").modal("show");//JQuery Command
                }, submitForm() {
                    console.log('test');
                    var vm = this;
                    this.errors = [];
                    vm.loadingPost = true;
                    axios.post('/admin/activity', this.activity)
                        .then(function (response) {
                            vm.responseMessage = response.data.msg;
                            vm.activity.name = vm.activity.target_group = vm.activity.ativiests_count = vm.activity.count = vm.activity.start_date = "";
                            vm.loadingPost = false;
                            vm.$refs.name.focus();
                        })
                        .catch(function (error, response) {
                            for (var key in error.response.data.errors) {
                                vm.errors.push(error.response.data.errors[key][0]);
                            }
                            vm.loadingPost = false;
                        });
                },
                deleteActivity(id, index) {
                    var vm = this;
                    if (confirm('هل أنت متأكد?')) {
                        this.result.data.splice(index, 1);
                        axios.get('/admin/activity/delete/' + id)
                            .then(function (response) {
                                vm.mainMessage = response.data.msg;
                                if (vm.firstPage)
                                    vm.doSearch();
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    }
                },
            }
        });
    </script>
@endsection

