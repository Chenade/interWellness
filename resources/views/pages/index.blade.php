@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Tools')])
@section('content')
    <div id="banner" class="d-flex justify-content-center align-items-center" style="background-color: blue; height: 100vh; width: 98.5vw;">
        <h1>BANNER</h1>
        <!-- <div>
            <p>讓吃下的每一口</p>
            <p>都在累積健康的資本</p>
        </div> -->
    </div>
    <div id="about_us" class="d-flex justify-content-center align-items-center" style="background-color: green; height: 100vh; width: 98.5vw;">
        <h1>About Us</h1>
    </div>
    <div id="service" class="d-flex justify-content-center align-items-center" style="background-color: cyan; height: 100vh; width: 98.5vw;">
        <h1>Service</h1>
    </div>
    <div id="article" class="d-flex justify-content-center align-items-center" style="background-color: yellow; height: 100vh; width: 98.5vw;">
        <h1>相關報導</h1>
    </div>
    <div id="fnq" class="d-flex justify-content-center align-items-center" style="background-color: red; height: 100vh; width: 98.5vw;">
        <h1>常見問題</h1>
    </div>
    <!-- <div class="container">
        <h2>TEST</h2>
    </div> -->
@stop
@section('end_script')
    <!-- <script src="js/tools.min.js?v={{Config::get('app.version')}}"></script> -->
@stop