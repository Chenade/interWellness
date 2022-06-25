@include('includes.language')
@extends('layouts.default', ['page_header' =>'Nearby','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>'Nearby'])
@section('content')

    <section id="nearby" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 col-lg-3">
                    <div class="nearby-search-area">
                        <div align="center"><h2>Search</h2></div>
                        <hr>
                        <div id="search"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-9" id="nearyList"></div>
            </div>
        </div>
    </section>

@stop
@section('end_script')
    <script src="/js/nearby.min.js"></script>
@stop
