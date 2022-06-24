<?php
/*
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1');
header('X-Frame-Options: SAMEORIGIN');
header('Set-Cookie: HttpOnly');
*/
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Yangchi Kuo">
<meta name="_lang" content="<?php echo session()->has('setLocale') ? session('setLocale') : env('DEFAULT_LANGUAGE', 'zh')?>">
<title>interWellness 為你而思</title>
<link rel="icon" href="img/logo.ico">

<link rel="stylesheet" href="/lib/bootstrap-4.3.1-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/lib/fontawesome-free-5.9.0-web/css/all.min.css">
<link rel="stylesheet" href="/lib/bootstrap-select-1.13.9-dist/css/bootstrap-select.min.css">


<link rel="stylesheet" href="css/jquery.growl.min.css">
<link rel="stylesheet" href="css/iw.css?v={{Config::get('app.version')}}">

<script src="/lib/jquery/js/jquery-3.5.1.min.js"></script>
<script src="/lib/md5.min.js"></script>
<script src="/lib/popper/js/popper.min.js"></script>
<script src="/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script src="/lib/bootstrap-select-1.13.9-dist/js/bootstrap-select.min.js"></script>
<script src="/lib/bootbox.all.min.js"></script>


<script src="js/lib/jquery.lazyload.min.js"></script>

<script src="js/lib/jquery.growl.min.js"></script>

<script src="js/lib/moment.min.js"></script>
<script src="js/lib/moment-timezone.min.js"></script>

<script src="js/language.min.js?v={{Config::get('app.version')}}"></script>
<script src="js/general.min.js?v={{Config::get('app.version')}}"></script>