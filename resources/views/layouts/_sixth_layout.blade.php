<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/Group.ico"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="/private_account/assets/css/bootstrap-rtl.css">


    <style media="screen">
        .container {
            max-width: 80%;
            overflow-x: hidden;
        }

        .input-group-prepen {
            background: #c4233d;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        h1 {
            color: #c4233d;
            margin-top: 150px;
            font-weight: bold;
            text-shadow: 0 0 10px white, 0 0 10px white;
        }

        .navbar {
            height: 82px;
            background: rgba(0, 0, 0, .8);
        }

        .navbar-light .navbar-nav .nav-link {
            color: white;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link:active {
            color: #c4233d;
        }

        .navbar-light .navbar-nav .active > .nav-link,
        h5 {
            color: white;
        }

        h1 {
            margin-top: 65px;
        }


        .card {
            border-radius: 20px;
            width: 700px;
            height: 590px;
            background: #f3f3f2;
        }

        .input-group-prepend span {
            width: 165px;
        }

        .input-group-prepend span {
            color: white;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .fas {
            font-size: 30px;
        }


        .card {
            height: auto;
        }

        @media (max-width: 670px) {
            .card {
                width: 356px;
            }

            .validation {
                padding: 10px;
                height: auto;
                width: 94%;
                margin-right: 10px;
                margin-top: 10px;
                direction: rtl;
                text-align: right;
            }

            ::-webkit-input-placeholder {
                font-size: 7px;
            }
        }

        .aa {
            background: #c4233d;
            padding: 25px;
            border-radius: 20px;
            color: white;
            border: 1px solid #c4233d;
            padding-left: 50px;
            padding-right: 50px;

        }

        .aa:hover {
            color: #c4233d;
            background: white;
            text-decoration: none;
            border: 1px solid #c4233d;

        }

        textarea {
            resize: none;
            border: 0px;
            outline: none;
            border: 1px solid gray;
        }
    </style>
    @yield('css')
</head>

<body>
<!--************************************** navbar start **************************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="/">
        <div class="media">
            <img alt="Maan Logo" src="/platform/dist/images/logo.svg" style="width:200px;height:70px">
            <div class="media-body">
                <h5 class=" align-center" style="margin-right:-52px;margin-top:22px">مركز العمل التنموي معا</h5>
            </div>
        </div>
    </a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav col-md-9">
            <li class="nav-item ">
                <a class="nav-link" href="/">الرئيسية <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/how_are">من نحن </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/initiative">المبادرات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/category/1">تجارب ملهمة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article">جميع الأخبار </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#contact">تواصل معنا</a>
            </li>
            @if(!auth()->user())
                <li class=""><a
                            style="margin-right: 5px;border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;margin-left:5px;border-radius:20px;color:black"
                            class="" href="/register">انشاء حساب</a></li>
                <li class=""><a
                            style="border:1px solid #c4233d;background:#f3f3f2;padding:15px;margin-top:12px;border-radius:20px;color:black"
                            class="" href="/initiative_don">تقديم تبرع</a></li>
            @else
                <li class="nav-item dropdown col-md-2">
                    <a style="width:90%;background:#c4233d;color:white;margin-right:40px;border-radius:20px;"
                       class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/activist">البروفايل</a>
                        <a class="dropdown-item" href="/activist/changePassword">تعديل كلمة المرور</a>
                        <a class="dropdown-item" href="/activist/editProfile">تعديل حساب</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">تسجيل خروج </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </li>
                <li class="nav-item dropdown col-md-1 notification ">

                    <?php
                    $notifications = auth()->user()->unreadNotifications()->get()->sortByDesc('created_at');
                    $count = count($notifications);
                    ?>
                    <a class="nav-link nav-icons " href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-light nav-link dropdown-toggle" style="color: #C4233D"><span
                                    style="font-size: 17px" id="num_notif">{{$count}}</span>
                        <i style="font-size: 17px" class="fas fa-fw fa-bell">
                        </i>
                        </span><span class="indicator"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown"
                        style=" overflow: scroll;width:350px;height:350px;">
                        <li>
                            <div class="notification-title mr-2"> الاشعارات</div>
                            <div class="notification-list">
                                <ul class="list-group" id="notif">
                                    @foreach($notifications as $notification)
                                        <?php $action = $notification->data['action'];


                                        ?>
                                    <li>
                                        <a href="{{$action['link']}}"
                                           class="list-group-item list-group-item-action notfiylink"
                                           onclick="pop(this)"
                                           the_id='{{$notification->id}}'>
                                            <div class="notification-info">
                                                <div class="notification-list-user-block"><span
                                                            class="notification-list-user-name" style="color:#288CF0;"> {{$action['type']}}
													<br></span>{{$action['title']}}
                                                    <div class="notification-date"
                                                         style="font-size:15px;color:red">{{date('Y-m-d',strtotime($action['created_at']))}}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                    </a>
                </li>
            @endif


        </ul>
    </div>
</nav>
<!--************************************** navbar end ************************************-->
<!--******************************* content of page start *********************************-->
<div class="container" style="margin-top:-30px;">

    @yield('content')
</div>
<!--**************************************************************الفوتر الاخير بداية *****************************************-->
<footer>
    <div class="copyRight" style="background:black;opacity:.8;margin-top:50px;height:70px;padding-top:20px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p style="color:white;text-align:center;">جميع الحقوق محفوظة لمركز العمل التنموي - معا © 2019 ||
                        <a href="http://www.alhamsco.com" target="_blank" alt="الهمص للتكنولوجيا والتدريب"><img
                                    src="/platform/images/7777.png"
                                    style="width:30px;height:30px;margin-right:5px;margin-left:5px;margin-top:-10px;"></a>POWERED
                        BY
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--*********************************************** footer end ***************************************  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/private_account/assets/js/bootstrap.js"></script>
<script src="/private_account/assets/js/bootstrap.min.js"></script>
<script>

    $("#myModal .close").click(function () {
        $("#myModal").hide();
    });
</script>
@if(auth()->user())


    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script>
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        var userId = $('meta[name="userId"]').attr('content');
        Echo.private('App.User.' + userId).notification((notification) => {
            // this.notifications.push(notification);

            var action = notification.data.action;
            var the_id = notification.id;

            var li = document.createElement("li");
            var dateobj = formatDate(new Date(action.created_at));
            li.innerHTML = "<a class='notfiylink' onclick='pop(this)' the_id='" + the_id + "' href='" + action.link + "'>"+
                "<div class='notification-info'> <div class='notification-list-user-block'><span class='notification-list-user-name' style='color:#288CF0;'>"+ action.type + "<br></span> " +
                + action.title + "<div class='notification-date' style='font-size:15px;color:red'>" + dateobj.toString() + "</span>  ";

            document.getElementById("notif").appendChild(li);
            var num_notif = document.getElementById("num_notif");
            var num_notif_count = 1 + parseInt(document.getElementById("num_notif").innerText);
            num_notif.innerHTML = "<span>" + num_notif_count + "</div> </div> </div> </a> </li>";

            var audio = new Audio('audio/unsure.mp3');
            audio.play();
        });

    </script>
    <script>

        function pop(e) {
            event.preventDefault();
            var the_id = e.getAttribute('the_id');
            var the_href = e.href;
            $.get('/getnotfiy/' + the_id, function (data, status) {
            });
            location.href = the_href;
        };

    </script>
@endif
@yield("js")
</body>
</html>
