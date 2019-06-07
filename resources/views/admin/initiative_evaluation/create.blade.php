@extends("layouts._admin_layout")

@section("title", " إضافة تقييم للمبادرة $initiative->title")
@section("content")
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form method="post" action="/admin/evalution" id="form_sample_1" class="form-horizontal">
                        {{csrf_field()}}
                        @if($initiative)
                            <input type="hidden" name="initiative_id" value="{{$initiative->id}}">
                        @endif
                        <div class="form-body">
                            <ul class="list-unstyled">
                                <li :key="index" v-for="(evaluate_other,index) in evaluation_others" class="mt-2">
                                    <div class="form-group">

                                        <div class="col-md-3">
                                            <input v-model="evaluate_other.attribute" name="attributes[]" type="text" class="form-control"
                                                   placeholder="أدخل السؤال"/>
                                        </div>
                                        <div class="col-md-3">
                                            <input v-model="evaluate_other.value" name="values[]" type="text" class="form-control"
                                                   placeholder="أدخل الإجابة"/>
                                        </div>
                                        <div class="col">
                                            <button type="button" v-if="index==0" @click.prevent="addEvaluate"
                                                    class="btn btn-info"><i class="fa fa-plus"></i></button>
                                            <button type="button" v-if="index>=1" @click.prevent="removeEvaluate(index)"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>

                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">أرسل</button>
                                    <a href="/admin/evalution" class="btn grey-salsa btn-outline">إلغاء</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>

        </div>
    </div>


@endsection
@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


@endsection
@section('js')

    <script>
        var count = 1;
        var app = new Vue({
            el: '#app',
            data: {
                evaluation_others: [{attribute: '', value: ''}, {attribute: '', value: ''}],
                active: false,
                errors: [],
                loading: false
            },
            methods: {
                addEvaluate() {
                    this.evaluation_others.push({attribute: '', value: ''});
                },
                removeEvaluate(index) {
                    this.evaluation_others.splice(index, 1);
                }
            }
        });
    </script>
@endsection

