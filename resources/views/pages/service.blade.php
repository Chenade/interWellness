@include('includes.language')
@extends('layouts.default', ['page_header' =>'Service','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>'Service'])
@section('content')

{{--    <section id="service" class="section">--}}
{{--        <div class="col-12 col-sm-10 col-lg-8">--}}
{{--            <div class="col-12">--}}
{{--                <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">--}}
{{--                    <h6 class="tag">Ultimate Solutions</h6>--}}
{{--                    <h2>Inside EASE Single Inn</h2>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-12 d-flex flex-wrap">--}}
{{--                <div class="col-12 col-md-1 col-lg-4">--}}
{{--                    <div class="single-service-area wow fadeInUp" data-wow-delay="300ms">--}}
{{--                        <img src="img/facilities1.jpg" alt="">--}}
{{--                        <div class="service-title d-flex align-items-center justify-content-center">--}}
{{--                            <h5>大廳櫃檯</h5>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-md-1 col-lg-4">--}}
{{--                    <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="300ms">--}}
{{--                        <img src="img/facilities1.jpg" alt="">--}}
{{--                        <a href="#lobby">--}}
{{--                            <div class="service-title d-flex align-items-center justify-content-center">--}}
{{--                                <h5>公共交誼廳</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-md-1 col-lg-4">--}}
{{--                    <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="300ms">--}}
{{--                        <img src="img/facilities1.jpg" alt="">--}}
{{--                        <a href="#lobby">--}}
{{--                            <div class="service-title d-flex align-items-center justify-content-center">--}}
{{--                                <h5>公共衛浴</h5>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section id="lobby" class="section"> <a id="lobby" ></a>
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12">
                <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                    <h6 class="tag">Service</h6>
                    <h2>{{trans('dictionary.service_title_1')}}</h2>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 col-lg-7 wow fadeInUp" data-wow-delay="300ms"><img src="img/index5.jpg"></div>
                <div class="col-12 col-lg-5">
                    <div class="about-content wow fadeInUp" data-wow-delay="500ms" style="margin:15px;">
                        <br>
                        <p>1. {{trans('dictionary.service_description_11')}}</p>
                        <p>2. {{trans('dictionary.service_description_12')}}</p>
                        <p>3. {{trans('dictionary.service_description_13')}}  <span style=" margin-left:10px;color:blue;"> {{trans('dictionary.service_description_13_notice')}} </span></p>
                        <p>4. {{trans('dictionary.service_description_14')}}</p>
                        <p>5. {{trans('dictionary.service_description_15')}}</p>
                        <p>6. {{trans('dictionary.service_description_16')}}</p>
                        <p>7. {{trans('dictionary.service_description_17')}}</p>
                        <p>8. {{trans('dictionary.service_description_18')}}</p>
                        <p>9. {{trans('dictionary.service_description_19')}} <span style=" margin-left:10px;color:red;"> {{trans('dictionary.service_description_19_notice')}}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="social" class="section"> <a id="social" ></a>
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12">
                <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                    <h6 class="tag">Connect</h6>
                    <h2>{{trans('dictionary.service_title_2')}}</h2>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap flex-row-reverse">
                <div class="col-12 col-lg-7 wow fadeInUp" data-wow-delay="300ms"><img src="img/index5.jpg"></div>
                <div class="col-12 col-lg-5">
                    <div class="about-content wow fadeInUp" data-wow-delay="500ms" style="margin:15px;">
                        <br>
                        <p>1. {{trans('dictionary.service_description_21')}} <span style=" margin-left:10px;color:blue;"> {{trans('dictionary.service_description_21_notice')}}</span></p>
                        <p>2. {{trans('dictionary.service_description_22')}} <span style=" margin-left:10px;color:blue;"> {{trans('dictionary.service_description_22_notice')}}</span></p>
                        <p>3. {{trans('dictionary.service_description_23')}}</p>
                        <p>4. {{trans('dictionary.service_description_24')}}</p>
                        <p>5. {{trans('dictionary.service_description_25')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="shower" class="section"> <a id="shower" ></a>
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12">
                <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                    <h6 class="tag">Facilities</h6>
                    <h2>{{trans('dictionary.service_title_3')}}</h2>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 col-lg-7 wow fadeInUp" data-wow-delay="300ms"><img src="img/index5.jpg"></div>
                <div class="col-12 col-lg-5">
                    <div class="about-content wow fadeInUp" data-wow-delay="500ms" style="margin:15px;">
                        <br>
                        <p>1. {{trans('dictionary.service_description_31')}}</p>
                        <p>2. {{trans('dictionary.service_description_32')}}</p>
                        <p>3. {{trans('dictionary.service_description_33')}}</p>
                        <p>4. {{trans('dictionary.service_description_34')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
@section('end_script')

@stop
