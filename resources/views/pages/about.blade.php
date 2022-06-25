@include('includes.language')
@extends('layouts.default', ['page_header' =>'About','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>'About Us'])
@section('content')

    <section id="Testimonials" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12 d-flex justify-content-around flex-wrap">
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail wow fadeInUp" data-wow-delay="100ms">
                        <img src="img/about3.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-around">
                    <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                        <h6 class="tag">Testimonials</h6>
                        <h2>{{trans('dictionary.about_title_1')}}</h2>
                    </div>
                    <div class="about-content wow fadeInUp" data-wow-delay="500ms">
                        <p>&emsp;&emsp;{{trans('dictionary.about_description_1')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Security" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12 d-flex justify-content-around flex-wrap flex-row-reverse">
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail wow fadeInUp" data-wow-delay="100ms">
                        <img src="img/about3.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-around">
                    <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                        <h6 class="tag">Security</h6>
                        <h2>{{trans('dictionary.about_title_2')}}</h2>
                    </div>
                    <div class="about-content wow fadeInUp" data-wow-delay="500ms">
                        <p>&emsp;&emsp;{{trans('dictionary.about_description_2')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Convenience" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12 d-flex justify-content-around flex-wrap">
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail wow fadeInUp" data-wow-delay="100ms">
                        <img src="img/about1.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-around">
                    <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                        <h6 class="tag">Convenience</h6>
                        <h2>{{trans('dictionary.about_title_3')}}</h2>
                    </div>
                    <div class="about-content wow fadeInUp" data-wow-delay="500ms">
                        <p>&emsp;&emsp;{{trans('dictionary.about_description_3')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@section('end_script')

@stop
