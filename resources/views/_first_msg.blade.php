@if ($errors->any())

    <div id="myModal"   class="alert alert-danger alert-dismissible validation">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" data-target="#myModal" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(Session::get("msg"))
    <?php
    $msg = Session::get("msg");
    $msgClass = "alert-info";
    $first2letters = strtolower(substr($msg, 0, 2));
    if ($first2letters == "s:") {
        //قص اول حرفين
        $msg = substr($msg, 2);
        $msgClass = "alert-success";
    } else if ($first2letters == "i:") {
        $msg = substr($msg, 2);
        $msgClass = "alert-info";
    } else if ($first2letters == "w:") {
        $msg = substr($msg, 2);
        $msgClass = "alert-warning";
    } else if ($first2letters == "e:") {
        $msg = substr($msg, 2);
        $msgClass = "alert-danger";
    }
    ?>
    <div id="myModal" class="alert {{$msgClass}} alert-dismissible validation">{{$msg}}
        <button type="button" class="close" data-target="#myModal" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
@if (session('status'))
    <?php
    $msg = Session::get("status");
    ?>
    <div id="myModal" class="alert alert-info alert-dismissible validation">{{$msg}}
        <button type="button" class="close" data-target="#myModal" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
