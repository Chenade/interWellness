<!DOCTYPE HTML>
<html>
<head>
    @include('includes.head')
    <title>Bookkeeping</title>
    <title>管理系統 | 宜舍單人旅店</title>
    <link rel="icon" href="/img/logo.jpg">
    <link rel="stylesheet" href="/css/manage.css">
    <meta charset="utf-8" />
</head>

<body class="body-wrapper" style="overflow: hidden;">
<div class="container" style="margin-top: 15%">
    <div class="col-auto" style="margin-bottom: 50px;margin-top: 50px;">
        <img class="center-block" style="max-width: 100%;" src="/img/logo-lg.jpg"/>
    </div>
    <div class="col-auto">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
            </div>
            <input type="text" class="form-control" id="account" placeholder="{{trans('account.id')}}">
        </div>
    </div>
    <div class="col-auto">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-key"></i></div>
            </div>
            <input type="password" class="form-control" id="password" placeholder="{{trans('account.password')}}" autocomplete="off">
        </div>
    </div>
    <div class="col-auto">
        <div class="d-flex">
            <div class="ml-auto">
                <button type="button" class="btn btn-primary" id="login" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('account.login')}}</button>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    $('#login').on('click', function () {
        window.location.href = '/manage/member';
    });
</script>

</html>
