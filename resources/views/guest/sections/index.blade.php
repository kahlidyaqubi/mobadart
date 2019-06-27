@extends("layouts._thirst_layout")

@section("title", "عرض الأقسام")
@section("content")

    <div class="row">
        <div class="col text-center ">
            <h1>جميع الأقسام</h1>
        </div>
    </div>
    <div class="row" style="min-height: 190px">
        @if($items->count()>0)
        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr>
                <td>
                    <a href="/category/{{$item->id}}">
                        <li>{{$item->name}} </li>
                    </a>
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

    <!-- pagination div -->
    <div class="row  " style="margin-top:50px;">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 text-center">
            {{$items->links()}}

        </div>
    </div>


@endsection
@section('css')

@endsection
@section('js')

@endsection