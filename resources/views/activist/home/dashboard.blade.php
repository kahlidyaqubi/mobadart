<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>الملف الشخصي</title>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/private_account/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/private_account/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/private_account/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/private_account/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/private_account/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/private_account/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/private_account/assets/css/bootstrap-rtl.css">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="/private_account/assets/css/bootstrap.min.css">
    <link href="/private_account/assets/lib/prismjs/prism.css" rel="stylesheet">
    <link href="/private_account/assets/lib/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="/private_account/assets/lib/remodal/remodal.css" rel="stylesheet">
    <link href="/private_account/assets/lib/remodal/remodal-default-theme.css" rel="stylesheet">
    <link href="/private_account/assets/lib/owl.carousel/owl.carousel.css" rel="stylesheet">
    <link href="/private_account/assets/lib/lightbox2/css/lightbox.css" rel="stylesheet">
    <link href="/private_account/assets/css/theme.css" rel="stylesheet">
</head>
<style media="screen">
    body,
    h3,
    h2 {
        font-family: 'El Messiri', sans-serif;
    }

    @media (min-width: 992px) {
        .btn-close {
            color: black;
            float: left;
        }
    }

    .item {
        height: 30px;
    }

    .btn-close {
        margin-right: 80.8rem;
    }

    .list-1 {
        background-color: rgb(255, 193, 7);
        color: white;
    }

    .list-2 {
        background-color: rgb(220, 53, 69);
        color: white;

    }

    .list-3 {
        background-color: rgb(23, 162, 184);
        color: white;

    }

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        direction: rtl;
        width: 600px;
    }

    /* Style the buttons inside the tab */
    .tab button {
        /* background-color: inherit; */
        /* background-color: rgb(255, 193, 7); */
        float: right;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        padding-left: 30px;
        padding-right: 30px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    .m-r-20 {
        margin-right: 20px;
    }

    .p-t-15 {
        padding-top: 15px;
    }

    .relative {
        position: relative;
    }

    .timeline {
        position: relative;
        margin: 50px;
        padding: 0;
        list-style: none;
        counter-reset: section;
    }

    .timeline:before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 3px;
        background: #fdb839;
        left: 32px;
        margin: 0;
        border-radius: 2px;
    }

    .timeline > li {
        position: relative;
        margin-right: 10px;
        margin-bottom: 50px;
        padding-top: 18px;
        box-sizing: border-box;
    }

    .timeline > li:before,
    .timeline > li:after {
        display: block;
    }

    .ui-sortable-helper {
        box-shadow: 0px 0px 41px rgba(0, 0, 0, 0.08);
        background: #fff;
    }

    .ui-sortable-helper .handle {
        display: none;
    }

    .timeline > li:not(.ui-sortable-helper):before {
        counter-increment: section;
        content: counter(section);
        background: #fdb839;
        width: 70px;
        height: 70px;
        position: absolute;
        top: 0;
        border-radius: 50%;
        left: -1px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #Fff;
        font-size: 22px;
        font-weight: bold;
        border: 15px solid #fff;
        box-sizing: border-box;
    }

    .timeline > li:after {
        clear: both;
    }

    .timeline > li > .timeline-item {
        margin-top: 0;
        color: #444;
        margin-left: 60px;
        margin-right: 15px;
        padding: 0;
    }

    .timeline > li > .fa,
    .timeline > li > .glyphicon,
    .timeline > li > .ion {
        width: 30px;
        height: 30px;
        font-size: 15px;
        line-height: 30px;
        position: absolute;
        color: #fff;
        background: #fdb839;
        border-radius: 50%;
        text-align: center;
        left: 18px;
        top: 0;
    }

    .radio-thumbnail > label {
        border-radius: 4px;
    }

    .radio-thumbnail > input {
        display: none;
    }

    .radio-thumbnail > :checked + .thumbnail {
        border: 4px solid #21BB05;
        border-radius: 4px;
    }

    .radio-thumbnail > :checked + .thumbnail > span {
        border-radius: 0;
    }

    .radio-thumbnail > :disabled + .thumbnail {
        opacity: .5;
    }

    .radio-thumbnail > :checked + .thumbnail:before {
        content: "\f00c";
        font-family: fontawesome;
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 15px;
        z-index: 1;
        color: #fff;
        background: #21bb05;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s all;
    }

    .thumbnail {
        padding: 0;
        margin: 0;
        width: 192px;
        height: 140px;
        border: 0;
        position: relative;
    }

    .thumbnail > span {
        position: absolute;
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#000000+0,000000+100&0+0,0.65+100 */
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.65) 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#a6000000', GradientType=0);
        /* IE6-9 */
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 100%;
        height: 100%;
        color: #fff;
        font-size: 20px;
        font-weight: 400;
        padding: 97px 0 0 16px;
        text-align: left;
        border-radius: 4px;
        border: 0;
    }

    .uxc__f-tags .btn.btn-default {
        border-color: #fdb839;
        background: transparent;
        color: #fdb839;
    }

    .uxc__f-tags .btn {
        margin-right: 15px;
    }

    .uxc__f-tags .btn.btn-default:hover,
    .uxc__f-tags .btn.btn-default:focus,
    .uxc__f-tags .btn.btn-default:active,
    .uxc__f-tags .btn.btn-default.active {
        border-color: #fdb839;
        background: #fdb839;
        color: #fff;
        box-shadow: 0px 0px 0px;
        transition: all 0.3s;
    }

    label.btn.btn-default.active:before {
        content: "\f00c";
        font-family: fontawesome;
        position: absolute;
        top: 7px;
        right: -10px;
        font-size: 13px;
        z-index: 1;
        color: #fff;
        background: #21bb05;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s all;
    }

    .f-cancel {
        position: absolute;
        top: 0;
        right: 0;
        color: #ABABAB;
        border: 1px solid #ABABAB;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.3s;
    }

    .f-cancel:hover {
        border-color: #fdb839;
        color: #fdb839;
        cursor: pointer;
    }

    .add-n-f {
        padding: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px dotted #989898;
        color: #989898;
        border-radius: 4px;
        margin: 0 30px 0 77px;
        transition: all 0.3s;
        cursor: pointer;
    }

    .add-n-f i {
        border: 1px dotted #989898;
        width: 25px;
        height: 25px;
        margin-right: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }

    .add-n-f:hover {
        border-color: #fdb839;
        color: #fdb839;
    }

    .add-n-f:hover i {
        color: #fdb839;
        border-color: #fdb839;
    }

    .handle {
        color: #000;
        cursor: move;
        left: -8px;
        width: 13px;
        height: 40px;
        position: absolute;
        top: 16px;
        background-image: -webkit-repeating-radial-gradient(center center, rgba(0, 0, 0, 0.26), rgba(0, 0, 0, 0.23) 1px, transparent 1px, transparent 100%);
        background-image: -moz-repeating-radial-gradient(center center, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2) 1px, transparent 1px, transparent 100%);
        background-image: -ms-repeating-radial-gradient(center center, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2) 1px, transparent 1px, transparent 100%);
        background-image: repeating-radial-gradient(center center, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2) 1px, transparent 1px, transparent 100%);
        -webkit-background-size: 3px 3px;
        -moz-background-size: 3px 3px;
        background-size: 3px 3px;
    }

    .timeline-placeholder {
        height: 150px;
        border: 2px dashed #ddd;
        left: 71px;
        top: -2px;
    }

    .timeline-placeholder:before {
        left: -75px !important;
    }

    .timeline-placeholder:after {
        content: "Drop it here";
        text-align: center;
        top: 23px;
        position: relative;
        font-size: 39px;
        color: rgba(221, 221, 221, 0.38);
    }

    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 60%;
    }

    #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
        height: 18px;
    }

    #sortable li span {
        position: absolute;
        margin-left: -1.3em;
    }

    .timeline:before {
        background: #c4233d;
    }

    .timeline > li:not(.ui-sortable-helper):before {
        background: #c4233d;

    }

    /*=================================================================
        Override Bootstrap Tabs
        ==================================================================*/

    /* Tabs panel */
    .tabbable-panel {
        padding: 10px;
    }

    .tabbable-line > .nav-tabs {
        border: none;
        margin: 0px;
        display: flex;
        justify-content: space-between;
    }

    .tabbable-line > .nav-tabs > li {
        margin: 0px 2px 2px 0;
        transition: 0.5s ease;
    }

    .tabbable-line > .nav-tabs > li > a {
        border: 0;
        margin-right: 0;
        color: #A9A9A9;
        padding: 4px 0px;
    }

    .tabbable-line > .nav-tabs > li > a > i {
        color: #a6a6a6;
    }

    .tabbable-line > .nav-tabs > li.open,
    .tabbable-line > .nav-tabs > li:hover {
        border-bottom: 4px solid @warning-dark;
    }

    .tabbable-line > .nav-tabs > li.open > a,
    .tabbable-line > .nav-tabs > li:hover > a {
        border: 0;
        background: none !important;
        color: #333333;
    }

    .tabbable-line > .nav-tabs > li.open > a > i,
    .tabbable-line > .nav-tabs > li:hover > a > i {
        color: #a6a6a6;
    }

    .tabbable-line > .nav-tabs > li.open .dropdown-menu,
    .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
        margin-top: 0px;
    }

    .tabbable-line > .nav-tabs > li.active {
        border-bottom: 4px solid #fdb839;
        position: relative;
        transition: 0.5s ease;
    }

    .tabbable-line > .nav-tabs > li.active > a {
        border: 0;
        color: #333333;
    }

    .tabbable-line > .nav-tabs > li.active > a > i {
        color: #404040;
    }

    .tabbable-line > .tab-content {
        margin-top: -3px;
        background-color: #fff;
        border: 0;
        border-top: 1px solid #eee;
        padding: 15px 0;
    }

    .portlet .tabbable-line > .tab-content {
        padding-bottom: 0;
    }

    .input {
        border-radius: 20px;

    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .tabbable-line > .nav-tabs > li.active {
        border-bottom: 4px solid #c4233d;

    }

    .container {
        max-width: 100vh;
    }

    .but {
        background: #C8C8C8;
    }

    .tab {
        width: 700px;
    }

    .timeline > li > .timeline-item {
        margin-right: -115;
        direction: rtl;
    }

    .timeline {
        margin: -83;
    }

    .tabbable-line > .nav-tabs > li.active {
        border-bottom: 0px;
        color: #c4233d;
    }

    .tabbable-line > .nav-tabs > li.open > a,
    .tabbable-line > .nav-tabs > li:hover > a {
        color: #c4233d;
        text-shadow: 0 0 15px white, 0 0 15px gray;
        text-decoration: none;

    }

    i {
        color: white;
    }

    .timeline > li:not(.ui-sortable-helper):before {
        color: #c4233d;
    }

    path,
    g,
    circle {
        color: white;
    }

    .svg-inline--fa.fa-w-16 {
        display: none;
    }

    .inp {
        box-shadow: 0 1px 5px #c4233d, 0 0 0 1px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main>
    <!-- ============================================-->
    <!-- Preloader ==================================-->
    <div id="preloader">
        <div class="loader"><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- ==============================================================================-->
    <!--==================== <section> begin الصفحة الرئيسية للناشط  =====================-->
    <section class="p-0" id="home">
        <div class="container-fluid p-0 minh-100vh">
            <div class="position-relative px-3 w-lg-50 position-lg-absolute" id="baseContent">
                <div class="row align-items-center minh-50vh justify-content-center py-5 minh-lg-100vh">
                    <!-- start of form details-->
                    <div class="row justify-content-center" id="fun-facts">
                        <div class="col-lg-12">
                            <div class=" text-center" style="width:600px;">
                                <div class="">
                                    <h3 style="color:#c4233d;">الصفحةالشخصية للناشط</h3>
                                    <img style="height:100px;" src="/private_account/assets/img/male.jpg" alt="">
                                </div>
                                <form>
                                    <div class="form-group row justify-content-center">
                                        <label for="staticEmail" class="col-sm-4 col-form-label">اسم المستخدم </label>
                                        <div class="col-sm-4">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                   value="محمد محمد محمد محمد ">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">الجنس</label>
                                        <div class="col-sm-4">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                   value="ذكر">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">الاهتمامات </label>
                                        <div class="col-sm-4">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                   value="صحية , اجتماعية">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">العنوان </label>
                                        <div class="col-sm-4">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                                   value="غزة - الرمال">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">الهاتف</label>
                                        <div class="col-sm-4">
                                            <input type="number" readonly class="form-control-plaintext"
                                                   id="staticEmail" value="0599777777">
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label for="inputPassword" class="col-sm-6 col-form-label">طبيعة العمل
                                            المجتمعي</label>
                                        <div class="col-sm-6">
                                            <textarea readonly name="name" rows="4" cols="40"
                                                      style="border:0px;color:#666">هنا يضاف نص يحتوي على طبيعة العمل المجتمعي هنا يضاف نص يحتوي على طبيعة العمل المحتمعي </textarea>
                                            <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="هنا يضلف نص يحتوي على طبيعة العمل المجتمعي الذي يمارسه الناشط "> -->
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end  -->
                    <!--start of sidebar images  -->
                    <div class="position-relative w-lg-50 position-lg-fixed four-item-two-column" id="gridNav">
                        <div class="row h-lg-100vh">
                            <div class="col-6 minh-25vh h-lg-50vh sidebar-item-wrapper py-5" data-content="about">
                                <div class="bg-holder"
                                     style="background-image:url(/private_account/assets/img/navigation/1.jpg);"></div>
                                <!--/.bg-holder-->
                                <div class="sidebar-item">
                                    <img class="mb-2 mb-lg-3 nav-icon"
                                         src="/private_account/assets/img/lineicons/favorites.svg" alt="">
                                    <h2 class="font-weight-light text-white fs-1 fs-xl-3">مبادرات </h2>
                                </div>
                            </div>
                            <div class="col-6 minh-25vh h-lg-50vh sidebar-item-wrapper py-5" data-content="service">
                                <div class="bg-holder"
                                     style="background-image:url(/private_account/assets/img/navigation/7.jpg);"></div>
                                <!--/.bg-holder-->
                                <div class="sidebar-item">
                                    <img class="mb-2 mb-lg-3 nav-icon"
                                         src="/private_account/assets/img/lineicons/suitcase.svg" alt="">
                                    <h2 class="font-weight-light text-white fs-1 fs-xl-3">تقييمات </h2>
                                </div>
                            </div>
                            <div class="col-6 minh-25vh h-lg-50vh sidebar-item-wrapper py-5" data-content="portfolio">
                                <div class="bg-holder"
                                     style="background-image:url(/private_account/assets/img/grey.webp);"></div>
                                <!--/.bg-holder-->
                                <div class="sidebar-item">
                                    <img class="mb-2 mb-lg-3 nav-icon"
                                         src="/private_account/assets/img/lineicons/heart.svg" alt="">
                                    <h2 class="font-weight-light text-white fs-1 fs-xl-3">نماذج (شكاوي واقتراحات )</h2>
                                </div>
                            </div>
                            <div class="col-6 minh-25vh h-lg-50vh sidebar-item-wrapper py-5" data-content="contact">
                                <div class="bg-holder"
                                     style="background-image:url(/private_account/assets/img/navigation/1.jpg);"></div>
                                <!--/.bg-holder-->
                                <div class="sidebar-item">
                                    <img class="mb-2 mb-lg-3 nav-icon"
                                         src="/private_account/assets/img/lineicons/placeholder.svg"
                                         alt="">
                                    <h2 class="font-weight-light text-white fs-1 fs-xl-3">اعدادات</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->
        </div>
    </section>
    <!--=============================== <section> close ============================-->
    <!-- ================================ مبادرات بداية ===============================-->
    <div class="page position-absolute t-0 w-100" id="about">
        <div class="row no-gutters minh-100vh">
            <div class="col-lg-9 order-1 order-lg-0 page-content pt-6 pt-lg-0">
                <!-- ============================================-->
                <!-- <section> begin ============================-->
                <section class="pt-5 pt-xl-7 pt-xxl-8">
                    <div class="container-fluid">
                        <div class="row justify-content-center pb-5" id="boots4-story">
                            <div class="col-lg-10">
                                <div class="text-center ">
                                    <h2 class="fs-2 fs-sm-3"><span class="font-weight-medium">مبادرات </span></h2>
                                    <hr class="hr-ornate"/>
                                </div>
                            </div>
                        </div>
                        <!--start of sortable -->
                        <ul class="timeline ui-sortable">
                            <li class="ui-sortable-handle">
                                <span class="handle"></span>
                                <div class="timeline-item relative">
                                    <i class="fa fa-remove f-cancel"></i>
                                    <div class="timeline-body">
                                        <div class="row-fluid">
                                            <div class="row-fluid">
                                                <div class="tabbable-panel">
                                                    <div class="tabbable-line">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active m-r-40 f-s-16">
                                                                <a href="#rf_tab_1" data-toggle="tab"
                                                                   aria-expanded="false" style="background:;">
                                                                    كل المبادرات
                                                                </a>
                                                            </li>
                                                            <li class="m-r-40 f-s-16">
                                                                <a href="#rf_tab_2" data-toggle="tab"
                                                                   aria-expanded="true">
                                                                    المبادرات التي شاركت بها
                                                                </a>
                                                            </li>
                                                            <li class="m-r-40 f-s-16">
                                                                <a href="#rf_tab_3" data-toggle="tab"
                                                                   aria-expanded="true">
                                                                    مبادرات قادمة
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <!--tab 1  -->
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="rf_tab_1">
                                                                <div class="container">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="col">
                                                                                    <p>Lorem ipsum dolor sit amet,
                                                                                        consectetur adipisicing elit,
                                                                                        sed do eiusmod tempor incididunt
                                                                                        ut labore et dolore magna
                                                                                        aliqua. Ut enim ad minim veniam,
                                                                                        quis nostrud exercitation
                                                                                        ullamco laboris nisi ut
                                                                                        aliquip ex ea commodo consequat.
                                                                                        Duis aute irure dolor in
                                                                                        reprehenderit in voluptate velit
                                                                                        esse cillum dolore eu fugiat
                                                                                        nulla pariatur. Excepteur sint
                                                                                        occaecat cupidatat non proident,
                                                                                        sunt in culpa qui
                                                                                        officia deserunt mollit anim id
                                                                                        est laborum.</p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p>Lorem ipsum dolor sit amet,
                                                                                        consectetur adipisicing elit,
                                                                                        sed do eiusmod tempor incididunt
                                                                                        ut labore et dolore magna
                                                                                        aliqua. Ut enim ad minim veniam,
                                                                                        quis nostrud exercitation
                                                                                        ullamco laboris nisi ut
                                                                                        aliquip ex ea commodo consequat.
                                                                                        Duis aute irure dolor in
                                                                                        reprehenderit in voluptate velit
                                                                                        esse cillum dolore eu fugiat
                                                                                        nulla pariatur. Excepteur sint
                                                                                        occaecat cupidatat non proident,
                                                                                        sunt in culpa qui
                                                                                        officia deserunt mollit anim id
                                                                                        est laborum.</p>

                                                                                </div>
                                                                                <div class="col">
                                                                                    <p>Lorem ipsum dolor sit amet,
                                                                                        consectetur adipisicing elit,
                                                                                        sed do eiusmod tempor incididunt
                                                                                        ut labore et dolore magna
                                                                                        aliqua. Ut enim ad minim veniam,
                                                                                        quis nostrud exercitation
                                                                                        ullamco laboris nisi ut
                                                                                        aliquip ex ea commodo consequat.
                                                                                        Duis aute irure dolor in
                                                                                        reprehenderit in voluptate velit
                                                                                        esse cillum dolore eu fugiat
                                                                                        nulla pariatur. Excepteur sint
                                                                                        occaecat cupidatat non proident,
                                                                                        sunt in culpa qui
                                                                                        officia deserunt mollit anim id
                                                                                        est laborum.</p>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="colFormLabelSm"
                                                                                   class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="email"
                                                                                       class="form-control form-control-sm"
                                                                                       id="colFormLabelSm"
                                                                                       placeholder="col-form-label-sm">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="colFormLabel"
                                                                                   class="col-sm-2 col-form-label">Email</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="email" class="form-control"
                                                                                       id="colFormLabel"
                                                                                       placeholder="col-form-label">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="colFormLabelLg"
                                                                                   class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="email"
                                                                                       class="form-control form-control-lg"
                                                                                       id="colFormLabelLg"
                                                                                       placeholder="col-form-label-lg">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <div class="row-fluid m-t-20">
                                                                    </div>
                                                                </div>
                                                                <!--************ tab2 **********************-->
                                                                <div class="tab-pane" id="rf_tab_2">
                                                                    <form>
                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                   class="col-sm-2 col-form-label">Email</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="email" class="form-control"
                                                                                       id="inputEmail3"
                                                                                       placeholder="Email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputPassword3"
                                                                                   class="col-sm-2 col-form-label">Password</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="password"
                                                                                       class="form-control"
                                                                                       id="inputPassword3"
                                                                                       placeholder="Password">
                                                                            </div>
                                                                        </div>
                                                                        <fieldset class="form-group">
                                                                            <div class="row">
                                                                                <legend class="col-form-label col-sm-2 pt-0">
                                                                                    Radios
                                                                                </legend>
                                                                                <div class="col-sm-10">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                               type="radio"
                                                                                               name="gridRadios"
                                                                                               id="gridRadios1"
                                                                                               value="option1" checked>
                                                                                        <label class="form-check-label"
                                                                                               for="gridRadios1">
                                                                                            First radio
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                               type="radio"
                                                                                               name="gridRadios"
                                                                                               id="gridRadios2"
                                                                                               value="option2">
                                                                                        <label class="form-check-label"
                                                                                               for="gridRadios2">
                                                                                            Second radio
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check disabled">
                                                                                        <input class="form-check-input"
                                                                                               type="radio"
                                                                                               name="gridRadios"
                                                                                               id="gridRadios3"
                                                                                               value="option3" disabled>
                                                                                        <label class="form-check-label"
                                                                                               for="gridRadios3">
                                                                                            Third disabled radio
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-2">Checkbox</div>
                                                                            <div class="col-sm-10">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                           type="checkbox"
                                                                                           id="gridCheck1">
                                                                                    <label class="form-check-label"
                                                                                           for="gridCheck1">
                                                                                        Example checkbox
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-sm-10">
                                                                                <button type="submit"
                                                                                        class="btn btn-primary">Sign in
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--**********************tab3 ********************** -->
                                                                <div class="tab-pane" id="rf_tab_3">
                                                                    <form class="needs-validation" novalidate>
                                                                        <div class="form-row">
                                                                            <div class="col-md-4 mb-3">
                                                                                <label for="validationTooltip01">First
                                                                                    name</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="validationTooltip01"
                                                                                       placeholder="First name"
                                                                                       value="Mark" required>
                                                                                <div class="valid-tooltip">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 mb-3">
                                                                                <label for="validationTooltip02">Last
                                                                                    name</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="validationTooltip02"
                                                                                       placeholder="Last name"
                                                                                       value="Otto" required>
                                                                                <div class="valid-tooltip">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 mb-3">
                                                                                <label for="validationTooltipUsername">Username</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"
                                                                                              id="validationTooltipUsernamePrepend">@</span>
                                                                                    </div>
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           id="validationTooltipUsername"
                                                                                           placeholder="Username"
                                                                                           aria-describedby="validationTooltipUsernamePrepend"
                                                                                           required>
                                                                                    <div class="invalid-tooltip">
                                                                                        Please choose a unique and valid
                                                                                        username.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="validationTooltip03">City</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="validationTooltip03"
                                                                                       placeholder="City" required>
                                                                                <div class="invalid-tooltip">
                                                                                    Please provide a valid city.
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for="validationTooltip04">State</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="validationTooltip04"
                                                                                       placeholder="State" required>
                                                                                <div class="invalid-tooltip">
                                                                                    Please provide a valid state.
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <label for="validationTooltip05">Zip</label>
                                                                                <input type="text" class="form-control"
                                                                                       id="validationTooltip05"
                                                                                       placeholder="Zip" required>
                                                                                <div class="invalid-tooltip">
                                                                                    Please provide a valid zip.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-primary" type="submit">
                                                                            Submit form
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- END timeline item -->
                        </ul>
                    </div>
                </section>

                <!-- <section> close ============================-->
                <!-- ============================================-->

                <footer class="page-footer">
                    <div class="bg-holder"
                         style="background-image:url(assets/img/navigation/1.jpg);background-position: 0 27%; transform: scale(1.1);"></div>
                    <!--/.bg-holder-->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="row align-items-center">
                                <div class="col-lg-6 text-lg-left">
                                    <p class="fs--1 text-uppercase ls font-weight-bold mb-0">Copyright &copy; 2019</p>
                                </div>
                                <div class="col-lg-6 text-lg-right mt-2 mt-lg-0">
                                    <p class="fs--1 text-uppercase ls font-weight-bold mb-0">Made with<span
                                                class="fas fa-heart mx-1"></span>by
                                        <a class="text-light" href="">HTC</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div class="col-lg-3 col-12 t-0 order-0 order-lg-1 position-absolute position-lg-relative">
                <div class="h-lg-100vh sticky-top py-4 sticky-area"><span class="btn-close"><img
                                class="d-none d-lg-block times" src="/private_account/assets/img/times.svg" width="25"
                                alt=""/><img
                                class="d-lg-none" src="/private_account/assets/img/times-black.svg" width="18"
                                alt=""/></span>
                    <div class="bg-holder"
                         style="background-image:url(/private_account/assets/img/navigation/1.jpg);"></div>
                    <!--/.bg-holder-->
                    <h1 class="page-title">مبادرات</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="page position-absolute t-0 w-100" id="service">
        <div class="row no-gutters minh-100vh">
            <div class="col-lg-9 order-1 order-lg-0 page-content pt-6 pt-lg-0">
                <!-- =========================*********************************** مبادرات نهاية  ******************************===================-->
                <!-- =========================*********************************** تقييمات بداية  ******************************===================-->
                <!-- <section> begin ============================-->
                <section class="pt-5 pt-xl-7 pt-xxl-8">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="text-center mb-5 mb-lg-6">
                                    <h2 class="fs-2 fs-sm-3"><span class="font-weight-medium">تقييمات </span></h2>
                                    <hr class="hr-ornate"/>
                                </div>
                                <!--start of sortable -->
                                <ul class="timeline ui-sortable">
                                    <li class="ui-sortable-handle">
                                        <span class="handle"></span>
                                        <div class="timeline-item relative">
                                            <i class="fa fa-remove f-cancel"></i>
                                            <div class="timeline-body">
                                                <div class="row-fluid">
                                                    <div class="row-fluid">
                                                        <div class="tabbable-panel">
                                                            <div class="tabbable-line">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="active m-r-40 f-s-16">
                                                                        <a href="#rf_tab_15" data-toggle="tab"
                                                                           aria-expanded="false">
                                                                            تقييماتي للمبادرة
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-r-40 f-s-16">
                                                                        <a href="#rf_tab_16" data-toggle="tab"
                                                                           aria-expanded="true">
                                                                            استبيان تقييم المبادرة
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-r-40 f-s-16">
                                                                        <a href="#rf_tab_17" data-toggle="tab"
                                                                           aria-expanded="true">
                                                                            عرض تقييم المبادرة
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <!--tab 1  -->

                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="rf_tab_15">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <input style="width:240px;height:50px"
                                                                                       type="search" name="" value=""
                                                                                       placeholder="بحث حسب">
                                                                            </div>
                                                                            <div class="col">
                                                                                <input style="width:240px;height:50px"
                                                                                       type="text" name="" value=""
                                                                                       placeholder="بحث حسب"
                                                                                       style="height:50px;">
                                                                            </div>
                                                                            <div class="col">
                                                                                <select class="form-control" id="sel1">
                                                                                    <option>فرزحسب</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-3 table-responsive">
                                                                            <table class="table table-bordered wow bounceIn">
                                                                                <thead>
                                                                                <tr style="background:grey;color:white;">
                                                                                    <th style="text-align: center;">#
                                                                                    </th>
                                                                                    <th style="text-align: center;">
                                                                                        عنوان التقييم
                                                                                    </th>
                                                                                    <th style="text-align: center;">
                                                                                        تاريخ التقييم
                                                                                    </th>
                                                                                    <th style="text-align: center;">
                                                                                        الحالة
                                                                                    </th>
                                                                                    <th style="text-align: center;">
                                                                                        العمليات
                                                                                    </th>

                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr style="background-color:white">
                                                                                    <th scope="row">1</th>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td style="text-align:center;">
                                                                                        <button type="button"
                                                                                                class="but btn  wow bounceInUp">
                                                                                            تعبئة
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn  wow bounceInUp">
                                                                                            عرض
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr style="background:#F0F0F0">
                                                                                    <th scope="row">2</th>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td style="text-align:center;">
                                                                                        <button type="button"
                                                                                                class="but btn  wow bounceInUp">
                                                                                            تعبئة
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn  wow bounceInUp">
                                                                                            عرض
                                                                                        </button>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr style="background-color:white">
                                                                                    <th scope="row">3</th>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td style="text-align:center;">
                                                                                        <button type="button"
                                                                                                class="but btn  wow bounceInUp">
                                                                                            تعبئة
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn  wow bounceInUp">
                                                                                            عرض
                                                                                        </button>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr style="background:#F0F0F0">
                                                                                    <th scope="row">4</th>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td style="text-align:center;"
                                                                                        style="text-align:center;">
                                                                                        <button type="button"
                                                                                                class="but btn  wow bounceInUp">
                                                                                            تعبئة
                                                                                        </button>
                                                                                        <button type="button"
                                                                                                class="btn  wow bounceInUp">
                                                                                            عرض
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="row-fluid m-t-20">

                                                                        </div>
                                                                    </div>
                                                                    <!--************tab2  **********************-->
                                                                    <div class="tab-pane" id="rf_tab_16">
                                                                        <div class="row mt-3">
                                                                            <table class="table table-bordered wow bounceIn">
                                                                                <thead>
                                                                                <tr style="background:grey;color:white;">
                                                                                    <th style="text-align: center;">#
                                                                                    </th>
                                                                                    <th style="text-align: center;">
                                                                                        السؤال
                                                                                    </th>
                                                                                    <th style="text-align: center;">
                                                                                        التقييم من 5
                                                                                    </th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr style="background-color:white">
                                                                                    <th scope="row">1</th>
                                                                                    <td>
                                                                                        <p> هل تعتقد أن مشاركتك في تنفيذ
                                                                                            أنشطة المبادرة أثر على
                                                                                            مفاهيمك تجاه دورك في التغيير
                                                                                            المجتمعي ك مواطن فاعل </p>
                                                                                    </td>
                                                                                    <td style="text-align: center;">
                                                                                        <div>
                                                                                            <input type="radio"
                                                                                                   id="contactChoice1"
                                                                                                   name="contact"
                                                                                                   value="email"
                                                                                                   class="wow bounceInUp"
                                                                                                   required>
                                                                                            <label for="contactChoice1"
                                                                                                   style="margin-left:20px;">نعم </label>
                                                                                            <input type="radio"
                                                                                                   id="contactChoice1"
                                                                                                   name="contact"
                                                                                                   value="email"
                                                                                                   class="wow bounceInUp"
                                                                                                   required>
                                                                                            <label for="contactChoice1"
                                                                                                   style="margin-left:20px;">لا </label>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <textarea name="name"
                                                                                                      rows="4" cols="50"
                                                                                                      placeholder="وضح"></textarea>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <th style="background:#F0F0F0"
                                                                                    scope="row">2
                                                                                </th>
                                                                                <td style="background:#F0F0F0"> بعد
                                                                                    مشاركتكم في المبادرة هل زادت قناعتك
                                                                                    بقدرتك على التأثير على ظروف
                                                                                    العيش </p>
                                                                                </td>
                                                                                <td style="text-align: center;background:#F0F0F0">
                                                                                    <div>
                                                                                        <input type="radio"
                                                                                               id="contactChoice1"
                                                                                               name="contact"
                                                                                               value="email"
                                                                                               class="wow bounceInUp"
                                                                                               required>
                                                                                        <label for="contactChoice1"
                                                                                               style="margin-left:20px;">نعم </label>
                                                                                        <input type="radio"
                                                                                               id="contactChoice1"
                                                                                               name="contact"
                                                                                               value="email"
                                                                                               class="wow bounceInUp"
                                                                                               required>
                                                                                        <label for="contactChoice1"
                                                                                               style="margin-left:20px;">لا </label>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <textarea name="name" rows="4"
                                                                                                  cols="50"
                                                                                                  placeholder="وضح"></textarea>
                                                                                    </div>
                                                                                </td>
                                                                                </tr>
                                                                                </tr>
                                                                                <tr style="background-color:white">
                                                                                    <th scope="row">3</th>
                                                                                    <td>
                                                                                        <p> هل ستستمر بالعمل بشكل تطوعي
                                                                                            للتأثير على ظروف العيش داخل
                                                                                            المخيم</p>
                                                                                    </td>
                                                                                    <td style="text-align: center;">
                                                                                        <div>
                                                                                            <input type="radio"
                                                                                                   id="contactChoice1"
                                                                                                   name="contact"
                                                                                                   value="email"
                                                                                                   class="wow bounceInUp"
                                                                                                   required>
                                                                                            <label for="contactChoice1"
                                                                                                   style="margin-left:20px;">نعم </label>
                                                                                            <input type="radio"
                                                                                                   id="contactChoice1"
                                                                                                   name="contact"
                                                                                                   value="email"
                                                                                                   class="wow bounceInUp"
                                                                                                   required>
                                                                                            <label for="contactChoice1"
                                                                                                   style="margin-left:20px;">لا </label>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <textarea name="name"
                                                                                                      rows="4" cols="50"
                                                                                                      placeholder="وضح"></textarea>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row"
                                                                                        style="background:#F0F0F0">4
                                                                                    </th>
                                                                                    <td style="background:#F0F0F0">
                                                                                        <p> هل تعتقد ان مثل هذه
                                                                                            المبادرات يساهم في تحسين
                                                                                            ظروف العيش داخل المخيم </p>
                                                                                    </td>
                                                                                    <td style="text-align: center;background:#F0F0F0">
                                                                                        <div>
                                                                                            <input type="radio"
                                                                                                   id="contactChoice1"
                                                                                                   name="contact"
                                                                                                   value="email"
                                                                                                   class="wow bounceInUp"
                                                                                                   required>
                                                                                            <label for="contactChoice1"
                                                                                                   style="margin-left:20px;">نعم </label>
                                                                                            <input type="radio"
                                                                                                   id="contactChoice1"
                                                                                                   name="contact"
                                                                                                   value="email"
                                                                                                   class="wow bounceInUp"
                                                                                                   required>
                                                                                            <label for="contactChoice1"
                                                                                                   style="margin-left:20px;">لا </label>
                                                                                        </div>
                                                                                        <div class="">
                                                                                            <textarea name="name"
                                                                                                      rows="4" cols="50"
                                                                                                      placeholder="وضح"></textarea>
                                                                                        </div>
                                                                        </div>
                                                                        </td>
                                                                        </tr>


                                                                        </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!--**********************tab3 ********************** -->
                                                                <div class="tab-pane" id="rf_tab_17">
                                                                    <form>
                                                                        <div class="form-group row">
                                                                            <label for="inputEmail3"
                                                                                   class="col-sm-2 col-form-label">العنوان</label>
                                                                            <div class="col-sm-10">
                                                                                <input readonly type="email"
                                                                                       class="form-control"
                                                                                       id="inputEmail3"
                                                                                       placeholder="تقييم مبادرة شباب على قيد الأمل">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputPassword3"
                                                                                   class="col-sm-2 col-form-label">المحتوى</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea readonly name="name" rows="8"
                                                                                          cols="60"
                                                                                          placeholder="هنايضاف نص يحتوي على محتوى التقييم"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="inputPassword3"
                                                                                   class="col-sm-2 col-form-label">تعليق
                                                                                الادراة</label>
                                                                            <div class="col-sm-10">
                                                                                <input readonly type="password"
                                                                                       class="form-control"
                                                                                       id="inputPassword3"
                                                                                       placeholder="هنا يضاف نص يحتوي على تعليق الادارة ">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-sm-4 col-form-label"></label>
                                                                            <div class="col-sm-8">
                                                                                <input type="submit" name="" value="">
                                                                            </div>
                                                                    </form>
                                                                    <button type="button" name="button">طباعة</button>
                                                                </div>


                                                                <div class="clearfix"></div>

                                                                <div class="clearfix"></div>

                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- END timeline item -->

                                                <!-- END timeline item -->
                                </ul>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".timeline").sortable({
                                            placeholder: "timeline-placeholder"
                                        });
                                        $(".timeline").disableSelection();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- end of .container-->
                </section>
                <!-- <section> close ============================-->

                <!-- ============================================-->

                <footer class="page-footer">
                    <div class="bg-holder"
                         style="background-image:url(assets/img/navigation/7.jpg);background-position: 0 41%; transform: scale(1.1);"></div>
                    <!--/.bg-holder-->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="row align-items-center">
                                <div class="col-lg-6 text-lg-left">
                                    <p class="fs--1 text-uppercase ls font-weight-bold mb-0">Copyright &copy; 2019</p>
                                </div>
                                <div class="col-lg-6 text-lg-right mt-2 mt-lg-0">
                                    <p class="fs--1 text-uppercase ls font-weight-bold mb-0">Made with<span
                                                class="fas fa-heart mx-1"></span>by
                                        <a class="text-light" href="">HTC</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div class="col-lg-3 col-12 t-0 order-0 order-lg-1 position-absolute position-lg-relative">
                <div class="h-lg-100vh sticky-top py-4 sticky-area"><span class="btn-close"><img
                                class="d-none d-lg-block times" src="/private_account/assets/img/times.svg" width="25"
                                alt=""/><img
                                class="d-lg-none" src="/private_account/assets/img/times-black.svg" width="18"
                                alt=""/></span>
                    <div class="bg-holder" style="background-image:url(assets/img/navigation/7.jpg);"></div>
                    <!--/.bg-holder-->
                    <h1 class="page-title">تقييمات</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- =========================*********************************** تقييمات نهاية  ******************************===================-->
    <!-- =========================*********************************** شكاوي بداية   ******************************===================-->
    <div class="page position-absolute t-0 w-100" id="portfolio">
        <div class="row no-gutters minh-100vh">


        </div>
    </div>


    </div>
    <!-- end of .container-->
    </section>


    <!-- =========================*********************************** شكاوي نهاية ******************************===================-->
    <!-- =========================***********************************اعدادات بداية ******************************===================-->
    <div class="page position-absolute t-0 w-100" id="contact">
        <div class="row no-gutters minh-100vh">
            <div class="col-lg-9 order-1 order-lg-0 page-content pt-6 pt-lg-0">

                <!-- ============================================-->
                <!-- <section> begin ============================-->
                <section class="pt-5 pt-xl-7 pt-xxl-8">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="text-center mb-5 mb-lg-6">
                                    <h2 class="fs-2 fs-sm-3"><span class="font-weight-medium">اعدادات</span></h2>
                                    <hr class="hr-ornate"/>
                                </div>
                                <!--start of sortable -->
                                <ul class="timeline ui-sortable">
                                    <li class="ui-sortable-handle">
                                        <span class="handle"></span>
                                        <div class="timeline-item relative">
                                            <i class="fa fa-remove f-cancel"></i>
                                            <div class="timeline-body">
                                                <div class="row-fluid">
                                                    <div class="row-fluid">
                                                        <div class="tabbable-panel">
                                                            <div class="tabbable-line">
                                                                <ul class="nav nav-tabs">
                                                                    <li class="active m-r-40 f-s-16">
                                                                        <a href="#rf_tab_10" data-toggle="tab"
                                                                           aria-expanded="false">
                                                                            تعديل الحساب
                                                                        </a>
                                                                    </li>
                                                                    <li class="m-r-40 f-s-16">
                                                                        <a href="#rf_tab_ii" data-toggle="tab"
                                                                           aria-expanded="true">
                                                                            تغيير كلمة المرور </a>
                                                                    </li>
                                                                    <li class="m-r-40 f-s-16">
                                                                        <a href="#rf_tab_iii" data-toggle="tab"
                                                                           aria-expanded="true">
                                                                            تسجيل خروج
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <!--************ tab 1  تعديل الحساب***********************-->
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="rf_tab_10">
                                                                        <div class="container">
                                                                            <style media="screen">
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

                                                                                .navbar-light .navbar-nav .active > .nav-link,
                                                                                h5 {
                                                                                    color: white;

                                                                                }

                                                                                h1 {
                                                                                    margin-top: 65px;
                                                                                }

                                                                                tags tag.tagify--noAnim {
                                                                                    display: none;
                                                                                }

                                                                                tags .input {
                                                                                    color: white
                                                                                }

                                                                                tags .input {
                                                                                    color: white
                                                                                }

                                                                                .fas .fa-user {
                                                                                    color: white;
                                                                                }

                                                                                input[type="radio"] {
                                                                                    margin-right: -35px;
                                                                                    height: 25px;
                                                                                }

                                                                                .input-group-prepend {
                                                                                }

                                                                                .input-group-text {
                                                                                    background: #c4233d;

                                                                                }

                                                                                label {
                                                                                    color: black;
                                                                                }

                                                                                .input-group-prepend {
                                                                                    margin-right: 33px;
                                                                                }
                                                                            </style>
                                                                            <div class="d-flex justify-content-center h-100">
                                                                                <!--1  -->
                                                                                <form>
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <div class="card">
                                                                                                <div class="card-header">
                                                                                                    <div class="d-flex justify-content-center ">
                                                                                                        <h3>البيانات
                                                                                                            الشخصية</h3>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card-body">

                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <div class="input-group form-group">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <span class="input-group-text"><i
                                                                                                                                class="fas fa-user"></i></span>
                                                                                                                </div>
                                                                                                                <input type="text"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="الاسم الأول">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <div class="input-group form-group">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <span class="input-group-text"><i
                                                                                                                                class="fas fa-user"></i></span>
                                                                                                                </div>
                                                                                                                <input type="text"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="اسم الأب ">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col">
                                                                                                            <div class="input-group form-group">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <span class="input-group-text"><i
                                                                                                                                class="fas fa-user"></i></span>
                                                                                                                </div>
                                                                                                                <input type="text"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="اسم الجد">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col">
                                                                                                            <div class="input-group form-group">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <span class="input-group-text"><i
                                                                                                                                class="fas fa-user"></i></span>
                                                                                                                </div>
                                                                                                                <input type="text"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="العائلة">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-key"></i></span>
                                                                                                        </div>
                                                                                                        <input type="password"
                                                                                                               class="form-control"
                                                                                                               placeholder="كلمة المرور">
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-key"></i></span>
                                                                                                        </div>
                                                                                                        <input type="password"
                                                                                                               class="form-control"
                                                                                                               placeholder="تأكيد كلمة المرور">
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-phone"></i></span>
                                                                                                        </div>
                                                                                                        <input type="number"
                                                                                                               class="form-control"
                                                                                                               placeholder="الهاتف">
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-mobile"></i></span>
                                                                                                        </div>
                                                                                                        <input type="number"
                                                                                                               class="form-control"
                                                                                                               placeholder="الجوال">
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-sort-numeric-up"></i></span>
                                                                                                        </div>
                                                                                                        <input type="number"
                                                                                                               class="form-control"
                                                                                                               placeholder="العمر ">
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-envelope"></i></span>
                                                                                                        </div>
                                                                                                        <input type="email"
                                                                                                               class="form-control"
                                                                                                               placeholder="الايميل">
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fab fa-facebook-f"></i></span>
                                                                                                        </div>
                                                                                                        <input type="text"
                                                                                                               class="form-control"
                                                                                                               placeholder="رابط حساب الفيس بوك">
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text">الجنس</span>
                                                                                                        </div>

                                                                                                        <input type="radio"
                                                                                                               class="form-control"
                                                                                                               name="2">
                                                                                                        <label for=""
                                                                                                               style="margin-right:-65px">ذكر</label>
                                                                                                        <input type="radio"
                                                                                                               class="form-control"
                                                                                                               name="2">
                                                                                                        <label for=""
                                                                                                               style="margin-right:-65px">أنثى</label>
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-table"></i></span>

                                                                                                        </div>
                                                                                                        <input id="datepicker"
                                                                                                               width="276"
                                                                                                               placeholder="تاريخ الميلاد"/>
                                                                                                        <script>
                                                                                                            $('#datepicker').datepicker({
                                                                                                                uiLibrary: 'bootstrap4'
                                                                                                            });
                                                                                                        </script>
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-city"></i></span>
                                                                                                        </div>
                                                                                                        <input name="country"
                                                                                                               list="country"
                                                                                                               class="form-control"
                                                                                                               placeholder="المحافظة">
                                                                                                        <datalist
                                                                                                                id="country">
                                                                                                            <option value="الغرب">
                                                                                                            </option>
                                                                                                            <option value="الشرق">
                                                                                                            </option>
                                                                                                            <option value="الشمال">
                                                                                                            </option>
                                                                                                            <option value="الجنوب">
                                                                                                            </option>
                                                                                                        </datalist>
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-city"></i></span>
                                                                                                        </div>
                                                                                                        <input name="city"
                                                                                                               list="city"
                                                                                                               class="form-control"
                                                                                                               placeholder="المدينة">
                                                                                                        <datalist
                                                                                                                id="city">
                                                                                                            <option value="غزة">
                                                                                                            </option>
                                                                                                            <option value="خانيونس">
                                                                                                            </option>
                                                                                                            <option value="النصيرات ">
                                                                                                            </option>
                                                                                                            <option value="بيت لاهيا"
                                                                                                            </option>
                                                                                                        </datalist>
                                                                                                    </div>
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-map-marker-alt"></i></span>
                                                                                                        </div>
                                                                                                        <input type="email"
                                                                                                               class="form-control"
                                                                                                               placeholder="العنوان">
                                                                                                    </div>


                                                                                                </div>

                                                                                            </div>
                                                                                        </div>


                                                                                        <!-- 2 -->
                                                                                        <div class="col">

                                                                                            <div class="card">
                                                                                                <div class="card-header">
                                                                                                    <div class="d-flex justify-content-center ">
                                                                                                        <h3>
                                                                                                            الاهتمامات</h3>

                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card-body">
                                                                                                    <!--  الاهتمامات-->
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"><i
                                                                                                                        class="fas fa-mobile"></i></span>
                                                                                                        </div>
                                                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                                                                                        <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
                                                                                                        <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css"
                                                                                                              rel="stylesheet"/>
                                                                                                        <select data-placeholder="اختر اهتماماتك من القائمة"
                                                                                                                multiple
                                                                                                                class="chosen-select"
                                                                                                                name="test">
                                                                                                            <option value=""></option>
                                                                                                            <option>دعم
                                                                                                                خدمات
                                                                                                                التعليم
                                                                                                            </option>
                                                                                                            <option>دعم
                                                                                                                خدمات
                                                                                                                الصحة
                                                                                                            </option>
                                                                                                            <option>دعم
                                                                                                                خدمات
                                                                                                                الدعم
                                                                                                                النفسي
                                                                                                                والاجتماعي
                                                                                                            </option>
                                                                                                            <option>دعم
                                                                                                                تمثيل
                                                                                                                الشباب
                                                                                                                داخل
                                                                                                                المخيمات
                                                                                                            </option>
                                                                                                            <option>دعم
                                                                                                                خدمات
                                                                                                                البنية
                                                                                                                التحتية
                                                                                                            </option>
                                                                                                        </select>


                                                                                                        <script type="text/javascript">
                                                                                                            $(".chosen-select").chosen({
                                                                                                                no_results_text: "Oops, nothing found!"
                                                                                                            })
                                                                                                        </script>

                                                                                                    </div>
                                                                                                    <!-- اخرى -->
                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">

                                                                                                            <label for=""
                                                                                                                   style="font-size:13px">أدخل
                                                                                                                اهتماماتك
                                                                                                                ان لم
                                                                                                                تجدها في
                                                                                                                القائمة
                                                                                                                السابقة
                                                                                                                ثم اضغط
                                                                                                                Enter</label>
                                                                                                        </div>
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text">أخرى</span>
                                                                                                        </div>
                                                                                                        <!-- <input type="text" class="form-control" placeholder="ان كان لديك اهتمامات أخرى غير أدخلها ..."> -->
                                                                                                        <input name='tags'
                                                                                                               style="margin-bottom:20px;"
                                                                                                               placeholder=''
                                                                                                               value='jQuery,Script,Net'>
                                                                                                        <!--  j[vfm]-->
                                                                                                        </head>

                                                                                                        <body>

                                                                                                    </div>

                                                                                                    <div class="input-group form-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <label for="">هل
                                                                                                                استفدت
                                                                                                                من مراكز
                                                                                                                العائلة
                                                                                                                سابقا؟</label>
                                                                                                        </div>
                                                                                                        <input type="radio"
                                                                                                               class="form-control"
                                                                                                               style="margin-right:-16px;"
                                                                                                               name="yes-no"
                                                                                                               id="yes">
                                                                                                        <label for=""
                                                                                                               style="margin-right:-24px;">نعم</label>

                                                                                                        <input type="radio"
                                                                                                               class="form-control"
                                                                                                               style="margin-right:-24px;"
                                                                                                               name="yes-no"
                                                                                                               id="no">
                                                                                                        <label for=""
                                                                                                               style="margin-right:-24px;">لا</label>

                                                                                                    </div>
                                                                                                    <div class="input-group form-group disp"
                                                                                                         style="display:none;">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="input-group-text"></span>
                                                                                                        </div>
                                                                                                        <textarea
                                                                                                                style="padding:5px"
                                                                                                                name="name"
                                                                                                                rows="6"
                                                                                                                cols="40"
                                                                                                                placeholder="اذا كانت اجابتك نعم , ماهي الزوايا التي استفدت منها؟"></textarea>

                                                                                                    </div>


                                                                                                    <div class="form-group"
                                                                                                         style="text-align:center">
                                                                                                        <input type="submit"
                                                                                                               value="حفظ التغييرات"
                                                                                                               class="btn  login_btn"
                                                                                                               style="text-align:center">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row-fluid m-t-20">

                                                                </div>

                                                                <!--************tab2   تغيير كلمة المرور**********************-->
                                                                <div class="tab-pane" id="rf_tab_ii">
                                                                    <form id="register-form" role="form"
                                                                          autocomplete="off" class="form" method="post">
                                                                        <div class="form-group">
                                                                            <div class="input-group col-md-11">
                                                                                <input id="password" name="email"
                                                                                       placeholder="كلمة المرور القديمة"
                                                                                       class="input form-control inp"
                                                                                       type="password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group col-md-11">
                                                                                <input id="password" name="email"
                                                                                       placeholder="كلمة المرور الجديدة "
                                                                                       class="input form-control inp"
                                                                                       type="password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group col-md-11">
                                                                                <input id="password" name="email"
                                                                                       placeholder="تأكيد كلمة المرور الجديدة"
                                                                                       class="input form-control inp"
                                                                                       type="password">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group  ">
                                                                            <div class="row">
                                                                                <label class="col-md-4" for=""></label>
                                                                                <input class="col-md-4"
                                                                                       name="recover-submit"
                                                                                       class="col-md-4 btn btn-lg  btn-block"
                                                                                       value="اعتماد كلمة المرور الجديدة"
                                                                                       type="reset"
                                                                                       style="padding:10px;background: grey;border-radius:20px;color:white"
                                                                                       data-toggle="modal"
                                                                                       data-target=".modal" id="myModal"
                                                                                       href="#myModal">
                                                                                <label class="col-md-4" for=""></label>

                                                                            </div>


                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <!--**********************tab3  تسجيل خروج********************** -->
                                                                <div class="tab-pane" id="rf_tab_iii">

                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- END timeline item -->
                                </ul>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".timeline").sortable({
                                            placeholder: "timeline-placeholder"
                                        });
                                        $(".timeline").disableSelection();
                                    });
                                </script>

                </section>
                <!-- <section> close ============================-->
                <!-- ============================================-->

                <footer class="page-footer">
                    <div class="bg-holder"
                         style="background-image:url(assets/img/navigation/1.jpg);background-position: 0 37%; transform: scale(1.1);"></div>
                    <!--/.bg-holder-->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="row align-items-center">
                                <div class="col-lg-6 text-lg-left">
                                    <p class="fs--1 text-uppercase ls font-weight-bold mb-0">Copyright &copy; 2019</p>
                                </div>
                                <div class="col-lg-6 text-lg-right mt-2 mt-lg-0">
                                    <p class="fs--1 text-uppercase ls font-weight-bold mb-0">Made with<span
                                                class="fas fa-heart mx-1"></span>by
                                        <a class="text-light" href="">HTC</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div class="col-lg-3 col-12 t-0 order-0 order-lg-1 position-absolute position-lg-relative">
                <div class="h-lg-100vh sticky-top py-4 sticky-area"><span class="btn-close"><img
                                class="d-none d-lg-block times" src="/private_account/assets/img/times.svg" width="25"
                                alt=""/><img
                                class="d-lg-none" src="/private_account/assets/img/times-black.svg" width="18"
                                alt=""/></span>
                    <div class="bg-holder"
                         style="background-image:url(/private_account/assets/img/navigation/1.jpg);"></div>
                    <!--/.bg-holder-->
                    <h1 class="page-title">اعدادات</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- =========================***********************************اعدادات نهاية ******************************===================-->
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->


<script src="/private_account/assets/js/jquery.min.js"></script>
<script src="/private_account/assets/js/popper.min.js"></script>
<script src="/private_account/assets/js/bootstrap.js"></script>
<script src="/private_account/assets/js/plugins.js"></script>
<script src="/private_account/assets/lib/prismjs/prism.js"></script>
<script src="/private_account/assets/lib/loaders.css/loaders.css.js"></script>
<script src="/private_account/assets/js/stickyfill.min.js"></script>
<script src="/private_account/assets/lib/remodal/remodal.js"></script>
<script src="/private_account/assets/lib/jtap/jquery.tap.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="/private_account/assets/lib/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/private_account/assets/lib/isotope-packery/packery-mode.pkgd.min.js"></script>
<script src="/private_account/assets/lib/lightbox2/js/lightbox.js"></script>
<script src="/private_account/assets/js/theme.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARdVcREeBK44lIWnv5-iPijKqvlSAVwbw&callback=initMap"
        async></script>
</body>

</html>
