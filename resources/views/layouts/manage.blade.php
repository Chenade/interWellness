<!doctype html>
<html>
<head>
    @include('includes.head')
    <title>管理系統 | 宜舍單人旅店</title>
    <link rel="icon" href="/img/logo.jpg">
    <link rel="stylesheet" href="/css/manage.css">
</head>
<body>

<main class="col-12 h-100 d-flex nopadding">
    <div class="mobile-hide" id="nav-side">
        <button class="btn btn-outline-light w-100 mobile-show nav-trigger"><i class="fa fa-long-arrow-alt-left"></i> MENU</button>
        <div style="padding: 20px 5px;text-align: center">
            <img src="/img/logo2.jpg" style="width: 100%" />
            <h3 class="nopadding" style="color: white;">宜舍單人旅店</h3>
            <h3 class="nopadding" style="color: white;">管理系統</h3>
        </div>
        <div style="margin-top: 5em;">
            <button class="nav-btn" onclick=location.href="/manage/member">會員資料</button>
            <button class="nav-btn" onclick=location.href="/manage/booking">訂單資料</button>
            <button class="nav-btn" onclick=location.href="/manage/news">最新消息</button>
            <button class="nav-btn" onclick=location.href="/manage/nearby">周邊景點</button>
            <button class="nav-btn" onclick=location.href="/manage/logout">登出</button>
        </div>
    </div>

    <div class="col-12 col-sm-10 nopadding" style="overflow-y: auto">
        <div class="col-12 d-flex mobile-show justify-content-center align-items-center" id="nav-top">
            <button class="btn btn-light mobile-show nav-trigger" style="margin: 0;position: absolute;left: 0;">三</button>
            <img src="/img/logo2.jpg" style="height: 100%; margin: 0 15px;" />
            <h3 class="nopadding">管理系統</h3>
        </div>
        <div class="col-12">
            <H1 style="margin: 0.5em 0;">{{$page_header}}</H1>
            <hr>
            @yield('content')
        </div>
    </div>
</main>

<script>
    new WOW().init();

    $('.language').on('click', function () {
        var val = $(this).attr('id');
        window.location.href = '/language/' + val;
    });

    $('.nav-trigger').on('click', function () {
        $('#nav-side').toggle("slide", {direction: 'left'});
    });

</script>
@yield('end_script')
</body>
</html>
