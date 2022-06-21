@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Live')])
@section('content')
    <div class="col-auto">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#device_tab">{{trans('dictionary.Device_View')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#map_tab">{{trans('dictionary.Map_View')}}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="device_tab">
                <div class="device-tab overflow-auto"></div>
            </div>
            <div class="tab-pane fade" id="map_tab">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="button" class="btn btn-info btn-sm" id="selection">
                            <i class="fas fa-list"></i> {{trans('dictionary.Channel_Selection')}}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="map_well">
                        <div id="map2" style="border-radius: 4px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="device_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col" id="video_content"></div>
                    </div>
                    <div class="row">
                        <div class="col-8 player-container" style="overflow: hidden;">
                            <video preload="none" id="plyr" autoplay controls crossorigin style="border-radius: 4px; width: 100% !important; height: auto !important;"></video>
                        </div>
                        <div class="col-4">
                            <div id="map1" style="border-radius: 4px"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 align-middle align-self-center">
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <button class="btn btn-secondary" id="position"><i class="fas fa-arrows-alt"></i></button>
                                    <button class="btn btn-secondary position" data-direction="right" style="top: 0; left: -30px;"><i class="fas fa-arrow-left"></i></button>
                                    <button class="btn btn-secondary position" data-direction="left" style="top: 0; left: 60px;"><i class="fas fa-arrow-right"></i></button>
                                    <button class="btn btn-secondary position" data-direction="up" style="top: 40px; left: 15px;"><i class="fas fa-arrow-down"></i></button>
                                    <button class="btn btn-secondary position" data-direction="down" style="top: -40px; left: 15px;"><i class="fas fa-arrow-up"></i></button>
                                    <span class="align-self-center">{{trans('dictionary.Digital_Zoom')}}:&ensp;<span id="zoom">1</span>x</span>
                                    <input type='range' class="form-range" min="1" max="4" step="0.01" value="1" id='digitalZoom' />
                                    <button class="btn btn-info" id="resetZoom">{{trans('dictionary.Reset_Zoom')}}</button>
                                </div>
                                <div>
                                    <button class="btn btn-link" id="Pause"><i class="fas fa-pause"></i></button>
                                    <button class="btn btn-link" id="Play" style="display: none"><i class="fas fa-play"></i></button>
                                    <button class="btn btn-link" id="Fullscreen"  title="Fullscreen"><i class="fas fa-expand"></i></button>
                                    <button class="btn btn-link" id="Mute"><i class="fas fa-volume-up"></i></button>
                                    <input type='range' class="form-range" min="0" max="1" step="0.01" value="1" id='volume' />
                                    <button class="btn btn-link" id="PIP" title="Picture in picture"><i class="fas fa-compress-arrows-alt"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="user_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('account.Select_Account')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="input-group" onsubmit="return false;" style="padding-bottom: 5px">
                                <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-success" id="user_search_btn" type="submit" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-search"></i> {{trans('dictionary.Search')}}</button>
                                </div>
                            </form>
                            <div class="overflow-auto">
                                <div id="user_tree" class="tree"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="users_apply">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('end_script')
    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css">

    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstree-grid.js"></script>

    <script src="js/lib/jquery-ui.min.js"></script>
    <script src="js/lib/jquery.ui.touch-punch.min.js"></script>

    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/mse.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/live.min.js?v={{Config::get('app.version')}}"></script>
@stop
