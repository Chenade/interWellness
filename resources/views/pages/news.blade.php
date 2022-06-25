@include('includes.language')
@extends('layouts.default', ['page_header' =>'News','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>'News'])
@section('content')

    <section id="room" class="section">
        <div class="col-12 col-sm-11 col-lg-10">
            <div class="col-12 d-flex d-flex flex-wrap" id="newsList"></div>
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
    <script src="/js/news.min.js"></script>
@stop
