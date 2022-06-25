@include('includes.language')
@extends('layouts.default', ['page_header' =>'About','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>''])
@section('content')

    <section id="welcome" class="section" style="height: 100%">
        <div class="single-welcome-slide bg-img" style="background-image: url(img/index5.jpg);" data-img-url="img/Room2.jpg">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        
                        <!-- <div class="container d-flex flex-wrap" style="margin-top: -5em;">
                            <div class="col-12 col-sm-5 animate__animated animate__fadeInLeft">
                                <img src="img/iw_logo_1.png" alt="" style="width:100%" />
                            </div>
                            <div class="col-12 col-sm-7 d-flex flex-column justify-content-center animate__animated animate__fadeInRight">
                                <div class="d-flex justify-content-start"><h3 style="line-height: 5rem;">{{trans('dictionary.solgan1')}}</h3></div>
                                <div class="d-flex justify-content-around"><h3 style="line-height: 5rem;">都在累積健康的資本</h3></div>
                            </div>
                        </div> -->

                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 class="animate__animated animate__fadeInLeft" data-animation="fadeInLeft" data-delay="200ms">{{trans('dictionary.interwellness')}}</h6>
                                <h2 class="animate__animated animate__fadeInRight" data-animation="fadeInLeft" data-delay="500ms" style="font-family:微軟正黑體;">{{trans('dictionary.solgan1')}} <br> {{trans('dictionary.solgan2')}}</h2>
                                <!-- <a href="#index" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="800ms">Discover Now</a> -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <a id="index"></a>
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: 20px;">
                <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                    <h6 class="tag text-center">About Us</h6>
                    <h2>{{trans('dictionary.About_us')}}</h2>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap nopadding">
                <div class="col-12 col-lg-9 nopadding">
                    <div class="about-us-content-title">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">願景</h5>
                    </div>
                    <div class="about-us-content" style="min-height: 50px;">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">{{trans('dictionary.index_wish')}}</h5>
                    </div>
                    <div class="about-us-content-title" style="margin-top: 50px;">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">使命</h5>
                    </div>
                    <div class="about-us-content">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">{{trans('dictionary.index_goal')}}</h5>
                    </div>
                </div>
                <!-- <div class="col-12 col-lg-1"></div> -->
                <!-- <div class="col-12 col-lg-3" style="padding-left: 50px;"> -->
                <div class="col-12 col-lg-3">
                    <div class="about-us-content-title">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms" style="margin-right: 4em; margin-left: 20px;">SDG 目標</h5>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="700ms" style="margin-left: 20px;">
                        <div class="row d-flex flex-wrap">
                            <div class="col-12 col-lg-7 nopadding row d-flex justify-content-around">
                                <div class="single-thumb col-2 col-lg-12 nopadding">
                                    <img src="img/E_PRINT_02.jpg" alt="">
                                </div>
                                <div class="single-thumb col-2 col-lg-12 nopadding">
                                    <img src="img/E_PRINT_03.jpg" alt="">
                                </div>
                                <div class="single-thumb col-2 col-lg-12 nopadding">
                                    <img src="img/E_PRINT_12.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="section">
        <div class="col-10 col-sm-10 col-lg-10 d-flex flex-column justify-content-center">
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: 20px;">
                <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                    <h6 class="tag text-center">Our Service</h6>
                    <h2>{{trans('dictionary.Service')}}</h2>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-around flex-wrap row">
               <div class="col-12 col-lg-5" style="padding: 25px;">
                    <div class="service-box" style="box-shadow:-0.5px 2px 10px 1px rgba(195, 99, 60, 0.17);">
                        <div class="post-thumbnail"><img src="img/YC-3.png" alt="" ></div>
                        <div class="col-12" style="padding-left: 2em;">
                            <div class="service-tag-title">客製化配餐服務</div>
                            <div class="service-detail">讓忙碌的你不必再費心午餐要吃什麼，<br>更能透過飲食安排達到體態與健康控管。</div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center" style="margin-top: 2em">
                        <button class="btn service-detail-btn"><i class="fas fa-solid fa-chevron-down fa-2x"></i></button>
                    </div>
               </div>
               <div class="col-12 col-lg-5" style="padding: 25px;">
                    <div class="service-box" style="box-shadow:-0.5px 2px 10px 1px rgba(56, 142, 144, 0.17);">
                        <div class="post-thumbnail"><img src="img/YCn-4.png" alt="" ></div>
                        <div class="col-12" style="padding-left: 2em;">
                            <div class="service-tag-title">友善飲食平臺</div>
                            <div class="service-detail">我們重視每種飲食需求<br>透過營養標籤篩選餐點<br>還能匯入飲食日記、線上訂餐。</div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center" style="margin-top: 2em">
                        <button class="btn service-detail-btn"><i class="fas fa-solid fa-chevron-down fa-2x"></i></button>
                    </div>
               </div>
               <!-- <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post-box wow fadeInUp" data-wow-delay="500ms">
                    <div class="post-thumbnail"><img src="img/news1.jpg" alt=""></div>
                    <div class="post-meta">
                        <a href="#" class="news-duration tag" data-id=" + news[id] + "> duration</a>
                    </div>
                    <div class="news-title" data-id=" + news[id] + "> + news[title] + </div>
                    <p> + news[caption] + </p>
                    <div class="news-detail" style="display: none" data-id=" + news[id] + "> + news[detail] + </div>
                    <button class="btn news-detail-btn col-12" data-id=" + news[id] + ">View Details <i class="fas fa-long-arrow-alt-right"></i></button>
                </div> -->
            </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="news_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding: 15px;">
                <div class="modal-header">
                    <h4 class="modal-title nopadding" id="news_title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <span class="input-group-prepend">
                            <button type="button" class="btn btn-primary" >期間</button>
                        </span>
                        <input type="text" class="form-control" id="news_duration">
                    </form>
                    <div class="col-12">
                        <img id="news_detail" class="col-12" src="/img/logo-lg.jpg" onerror="/img/logo-lg.jpg"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('end_script')
<script src="/js/index.min.js"></script>
@stop
