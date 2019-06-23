<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
	 <link rel="shortcut icon" href="/Group.ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/platform/css/jquerysctipttop.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/style.css">
    <link rel="stylesheet" type="text/css" href="/platform/css/bootstrap-rtl.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css" rel="stylesheet"
          type="text/css"/>

    <style media="screen">
        body{
            max-width: 100%;
        }
        .container {
            max-width: 100%;
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

        label {
            color: white;
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

        .navbar-light .navbar-nav .active > .nav-link, h5 {
            color: white;

        }

        h1 {
            margin-top: 65px;
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

        #myModal {
            padding-right: 10px;
            margin-bottom: 10px;
        }

        .card {
            height: auto;
        }
    </style>
    @yield('css')
</head>
<body>
<!--************************************** navbar start **************************************** -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="/">
        <div class="media">
            <img alt="Maan Logo" src="/platform/images/logo.svg" style="width:200px;height:70px;margin-top:-26px;">
            <div class="media-body">
                <h5 class=" align-center" style="margin-right:-52px;margin-top:22px">{{\App\Site_sting::find(1)->title_page}}</h5>
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav col-md-11">
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
                <a class="nav-link" href="/category">جميع الأقسام </a>
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
                <li class="nav-item dropdown col-md-3">
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
            @endif

        </ul>
    </div>
</nav>
<!--************************************** navbar end ****************************************-->
<div class="container">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"
        type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({uiLibrary: 'bootstrap4', iconsLibrary: 'materialicons', format: 'yyyy-mm-dd'});
</script>
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
