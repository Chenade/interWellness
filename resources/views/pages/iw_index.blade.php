@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Tools')])
@section('content')
    <div id="banner" class="d-flex justify-content-center align-items-center col-12" style="background-color: grey; height: 100vh; padding:0; margin:0;">
        <!-- <h1>BANNER</h1> -->
        <div class="container d-flex flex-wrap" style="margin-top: -5em;">
            <div class="col-12 col-sm-5 animate__animated animate__fadeInLeft">
                <img src="img/iw_logo_1.png" alt="" style="width:100%" />
            </div>
            <div class="col-12 col-sm-7 d-flex flex-column justify-content-center animate__animated animate__fadeInRight">
                <div class="d-flex justify-content-start"><h3 style="line-height: 5rem;">讓吃下的每一口</h3></div>
                <div class="d-flex justify-content-around"><h3 style="line-height: 5rem;">都在累積健康的資本</h3></div>
            </div>
        </div>
    </div>

    <section id="about" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <a id="index"></a>
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 col-lg-6 align-self-center">
                    <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                        <h6 class="tag">About Us</h6>
                        <h2>{{trans('dictionary.welcome')}}<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{trans('dictionary.EASE')}}</h2>
                    </div>
                    <div class="about-us-content">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">{{trans('dictionary.index_about')}}</h5>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="wow fadeInUp" data-wow-delay="700ms">
                        <div class="row">
                            <div class="col-6 nopadding">
                                <div class="single-thumb">
                                    <img src="img/index1.jpg" alt="">
                                </div>
                                <div class="single-thumb">
                                    <img src="img/index2.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-6 nopadding">
                                <div class="single-thumb">
                                    <img src="img/index3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="about_us" class="d-flex flex-column flex-wrap col-12" style="background-color: lightgray; height: 100vh; padding:2em; margin:0;">
        <!-- <h1>BANNER</h1> -->
        <div class="container">
            <h3 class="home_tag">About Us | 關於我們</h3>
            <div class="col-8 d-flex flex-wrap">
                <div class="col-12 col-sm-5 animate__animated animate__fadeInLeft">
                    <img src="img/iw_logo_1.png" alt="" style="width:100%" />
                </div>
                <div class="col-12 col-sm-7 d-flex flex-column justify-content-center animate__animated animate__fadeInRight">
                    <div class="d-flex justify-content-start"><h3 style="line-height: 5rem;">讓吃下的每一口</h3></div>
                    <div class="d-flex justify-content-end"><h3 style="line-height: 5rem;">都在累積健康的資本</h3></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div id="about_us" class="d-flex justify-content-center align-items-center row flex-wrap col-12" style="background-color: green; height: 100vh;">
        <h1>about_us</h1>
        <div class="col-8 d-flex flex-wrap">
            <div class="col-12 col-sm-5 animate__animated animate__fadeInLeft">
                <img src="img/iw_logo_1.png" alt="" style="width:100%">
            </div>
            <div class="col-12 col-sm-7 d-flex flex-column justify-content-center animate__animated animate__fadeInRight">
                <div class="d-flex justify-content-start"><h3 style="line-height: 5rem;">讓吃下的每一口</h3></div>
                <div class="d-flex justify-content-end"><h3 style="line-height: 5rem;">都在累積健康的資本</h3><div>
            </div>
        </div>
    </div>
    <div id="banner" class="d-flex justify-content-center align-items-center row flex-wrap col-12" style="background-color: lightgray; height: 100vh;">
        <h1>BANNER</h1>
        <div class="col-8 d-flex flex-wrap">
            <div class="col-12 col-sm-5 animate__animated animate__fadeInLeft">
                <img src="img/iw_logo_1.png" alt="" style="width:100%">
            </div>
            <div class="col-12 col-sm-7 d-flex flex-column justify-content-center animate__animated animate__fadeInRight">
                <div class="d-flex justify-content-start"><h3 style="line-height: 5rem;">讓吃下的每一口</h3></div>
                <div class="d-flex justify-content-end"><h3 style="line-height: 5rem;">都在累積健康的資本</h3><div>
            </div>
        </div>
    </div> -->
    <!-- <div id="about_us" class="d-flex justify-content-center align-items-center" style="background-color: green; height: 100vh; width: 98.5vw;">
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
    </div> -->
    <!-- <div class="container">
        <h2>TEST</h2>
    </div> -->
@stop
@section('end_script')
    <!-- <script src="js/tools.min.js?v={{Config::get('app.version')}}"></script> -->
@stop