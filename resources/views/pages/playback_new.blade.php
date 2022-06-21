@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Video')])
@section('content')
    <div class="col">
        <div class="row">
            <div class="col-12 col-sm-4 input-group" style="margin-bottom: 1em;">
                <label for="select_users" class="col-form-label">{{trans('dictionary.Select_Account')}}:</label>
                <select class="form-control selectpicker show-tick" id="select_users" multiple></select>
            </div>
            <div class="col-12 col-sm-8" style="margin-bottom: 1em;">
                <form class="input-group" onsubmit="return false;">
                    <input type="text" class="form-control" id="video_title" placeholder="{{trans('dictionary.Video_Title')}}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" id="video_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                            <i class="fas fa-edit"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col text-center" id="load_container">
        <i class="fa fa-spinner fa-pulse fa-5x"></i>
    </div>
    <div class="overflow-auto" id="plyr_container" style="display: none">
        <div class="col">
            <div class="row">
                <div class="col-6" id="left_content">
                    <div class="col-12" style="padding: 0;">
                        <div id="live_tag" style="position: absolute; color: red;z-index: 100;display: none;">
                            <i class="fas fa-circle"></i>&ensp;LIVE
                        </div>
                        <div id="player">
                            <video preload="none" id="plyr" autoplay controls crossorigin></video>
                        </div>
                        <div class="row justify-content-around control-container">
                            <button class="btn btn-primary col-2" id="download"><i class="fa fa-download"></i> {{trans('dictionary.Download')}}</button>
                            <button class="btn btn-primary col-2" id="screenShot"><i class="fa fa-camera"></i> {{trans('dictionary.ScreenShot')}}</button>

                            <span id="read" align="center" class="col-2 align-self-center"></span>
                            <button class="btn btn-warning col-2" id="rewind"><i class="fas fa-fast-backward"></i> {{trans('dictionary.Rewind')}}</button>
                            <button class="btn btn-primary col-2" id="forward" style="display: none"><i class="fas fa-fast-forward"></i> {{trans('dictionary.Play')}}</button>
                            <button class="btn btn-success col-2" id="Go_Live"><i class="fas fa-play"></i>&emsp;Go Live </button>
                        </div>
                        <div class="row justify-content-around control-container">
                            <div class="col-12" style="height:42px;">
                                <div class="finger col-6"></div>
                                <div id="timeline-container">
                                    <div class="father-timeline" id="father-timeline"><div></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="row control-container"  style="height: 1.7em;">
                            <div class="d-flex col-6 align-self-center" id="left_time"></div>
                            <div class="d-flex col-6 align-self-center justify-content-end" id="right_time"></div>
                        </div>
                        <div class="row control-container"  style="height: 3.5em; border-top: solid #bbb 1px;">
                            <div class="col-4 align-middle align-self-center">
                                <form class="input-group" onsubmit="return false;">
                                    <span class="align-self-center">{{trans('dictionary.time')}}:&ensp;</span>
                                    <input type="text" class="form-control" id="datetimepicker1" placeholder="{{trans('dictionary.time')}}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary" id="timeSearch" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                            <i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex col-3 align-middle align-self-center">
                                <div class="align-self-center"> <span>{{trans('dictionary.unit')}}：</span> </div>
                                <select class="selectpicker align-self-center" data-width="fit" data-size="5" id="unit">
                                    <option value="hours">{{trans('dictionary.hour')}}</option>
                                    <option value="minutes" selected>{{trans('dictionary.minute')}}</option>
                                    {{--                                            <option value="seconds">{{trans('dictionary.second')}}</option>--}}
                                </select>
                            </div>
                            <div class="col-5 align-middle align-self-center">
                                <div class="row">
                                    <div class="col-7">
                                        <span class="align-self-center">{{trans('dictionary.Digital_Zoom')}}:&ensp;<span id="zoom">1</span>x</span>
                                        <input type='range' class="form-range" min="1" max="4" step="0.01" value="1" id='digitalZoom' />
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-info" id="resetZoom"><i class="fas fa-redo"></i></button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-secondary" id="position"><i class="fas fa-arrows-alt"></i></button>
                                        <button class="btn btn-secondary position" data-direction="right" style="top: 0; left: -30px;"><i class="fas fa-arrow-left"></i></button>
                                        <button class="btn btn-secondary position" data-direction="left" style="top: 0; left: 60px;"><i class="fas fa-arrow-right"></i></button>
                                        <button class="btn btn-secondary position" data-direction="up" style="top: 40px; left: 15px;"><i class="fas fa-arrow-down"></i></button>
                                        <button class="btn btn-secondary position" data-direction="down" style="top: -40px; left: 15px;"><i class="fas fa-arrow-up"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 map_show" style="padding: 0;">
                        <table class="table table-hover">
                            <tbody id="video_info">
                            <tr><th>{{trans('dictionary.startTime')}}</th><td id="startTime"></td></tr>
                            <tr><th>{{trans('dictionary.stopTime')}}</th><td id="stopTime"></td></tr>
                            <tr><th>{{trans('dictionary.deviceModel')}}</th><td id="device_info_type"></td></tr>
                            <tr><th>{{trans('dictionary.File_Size')}}</th><td id="file_size"></td></tr>
                            <tr><th>{{trans('dictionary.File_Type')}}</th><td id="type"></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6" id="right_content">
                    <div class="col-12 map_hide" style="padding: 0; display: none;">
                        <table class="table table-hover">
                            <tbody id="video_info2">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 map_show" style="padding: 0;">
                        <div id="map1"></div>
                    </div>
                    <div class="col-12 map_show" style="padding: 0;">
                        <div class="d-flex justify-content-between">
                            <label class="">{{trans('dictionary.GPS_Information')}}({{trans('dictionary.Time')}}
                                : {{trans('dictionary.Latitude')}}, {{trans('dictionary.Longitude')}}):</label>
                            <label class="custom-control overflow-checkbox">
                                <span class="material-control-description">{{trans('dictionary.Automatic')}}</span>
                                <input type="checkbox" class="overflow-control-input" id="autoScroll" checked>
                                <span class="overflow-control-indicator"></span>
                            </label>
                        </div>
                        <div id="gps_container" style="overflow-x: hidden; overflow-y: auto;">
                            <ul class="list-group overflow-auto map_show" id="gps_list"></ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <table id="videos" class="table table-striped table-bordered " cellspacing="0" width="100%" >
        <thead style="display:none">
        <tr>
            <th>{{trans('dictionary.Video_Snapshot')}}</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

{{--    <div class="modal fade" id="player_modal" role="dialog">--}}
{{--        <div class="modal-dialog modal-xl">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title"></h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row"> <!-- mark -->--}}
{{--                        <div class="col-12">--}}
{{--                            <form class="input-group" onsubmit="return false;">--}}
{{--                                <input type="text" class="form-control" id="video_title" placeholder="{{trans('dictionary.Video_Title')}}">--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <button type="submit" class="btn btn-primary" id="video_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">--}}
{{--                                        <i class="fas fa-edit"></i></button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12 col-lg-6" id="left_content">--}}
{{--                            <div class="col-12" style="padding: 0;">--}}
{{--                                <div id="player">--}}
{{--                                    <video preload="none" id="plyr" autoplay controls crossorigin></video>--}}
{{--                                </div>--}}
{{--                                <div class="row justify-content-around control-container">--}}
{{--                                    <button type="button" class="btn btn-primary col-2" id="download">--}}
{{--                                        <i class="fa fa-download"></i> {{trans('dictionary.Download')}}</button>--}}

{{--                                    <span id="read" align="center" class="col-3 align-self-center"></span>--}}
{{--                                    <button type="button" class="btn btn-primary col-2" id="screenShot"><i class="fa fa-camera"></i> {{trans('dictionary.ScreenShot')}}</button>--}}
{{--                                    <button class="btn btn-success col-3" id="Go_Live"><i class="fas fa-play"></i>&emsp;Go Live </button>--}}
{{--                                </div>--}}
{{--                                <div class="row justify-content-around control-container">--}}
{{--                                    <div class="col-12" style="height:42px;">--}}
{{--                                        <div class="finger col-6"></div>--}}
{{--                                        <div id="timeline-container">--}}
{{--                                            <div class="father-timeline" id="father-timeline"><div></div></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row control-container"  style="height: 3.5em;">--}}
{{--                                    <div class="d-flex col-4 align-self-center" id="left_time"></div>--}}
{{--                                    <div class="d-flex col-4 align-middle align-self-center">--}}
{{--                                        <div class="align-self-center"> <span>{{trans('dictionary.unit')}}：</span> </div>--}}
{{--                                        <select class="selectpicker align-self-center" data-width="fit" data-size="5" id="unit">--}}
{{--                                            <option value="hours">{{trans('dictionary.hour')}}</option>--}}
{{--                                            <option value="minutes" selected>{{trans('dictionary.minute')}}</option>--}}
{{--                                            <option value="seconds">{{trans('dictionary.second')}}</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex col-4 align-self-center justify-content-end" id="right_time"></div>--}}
{{--                                </div>--}}
{{--                                <div class="row control-container"  style="height: 3.5em; border-top: solid #bbb 1px;">--}}
{{--                                    <div class="d-flex col-6 align-middle">--}}
{{--                                        <div class="align-self-center"> {{trans('dictionary.date')}}：</div>--}}
{{--                                            <select class="datepicker selectpicker align-self-center" data-width="fit" data-size="5" id="year"></select>--}}
{{--                                            <select class="datepicker selectpicker align-self-center" data-width="fit" data-size="5" id="month"></select>--}}
{{--                                            <select class="datepicker selectpicker align-self-center" data-width="fit" data-size="5" id="day"></select>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex col-4 align-right" style="padding: 0">--}}
{{--                                        <div class="align-self-center"> <span>{{trans('dictionary.time')}}：</span> </div>--}}
{{--                                        <select class="datepicker selectpicker align-self-center" data-width="fit" data-size="5" id="hour"></select>--}}
{{--                                        <select class="datepicker selectpicker align-self-center" data-width="fit" data-size="5" id="min"></select>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex col-2 align-right">--}}
{{--                                        <button type="button" class="btn btn-xs btn-primary" id="timeSearch">{{trans('dictionary.Search')}}</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-12 map_show" style="padding: 0;">--}}
{{--                                <table class="table table-hover">--}}
{{--                                    <tbody id="video_info">--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-12 col-lg-6" id="right_content">--}}
{{--                            <div class="col-12 map_hide" style="padding: 0; display: none;">--}}
{{--                                <table class="table table-hover">--}}
{{--                                    <tbody id="video_info2">--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 map_show" style="padding: 0;">--}}
{{--                                <div id="map1"></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 map_show" style="padding: 0;">--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <label class="">{{trans('dictionary.GPS_Information')}}({{trans('dictionary.Time')}}--}}
{{--                                        : {{trans('dictionary.Latitude')}}, {{trans('dictionary.Longitude')}}):</label>--}}
{{--                                    <label class="custom-control overflow-checkbox">--}}
{{--                                        <span class="material-control-description">{{trans('dictionary.Automatic')}}</span>--}}
{{--                                        <input type="checkbox" class="overflow-control-input" id="autoScroll" checked>--}}
{{--                                        <span class="overflow-control-indicator"></span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div id="gps_container" style="overflow-x: hidden; overflow-y: auto;">--}}
{{--                                    <ul class="list-group overflow-auto map_show" id="gps_list"></ul>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-info map_show" id="map_hide"><i class="fas fa-map-marked-alt"></i>&emsp;{{trans('dictionary.hide_map')}}</button>--}}
{{--                    <button type="button" class="btn btn-info map_hide" id="map_show" style="display: none;"><i class="fas fa-map-marked-alt"></i>&emsp;{{trans('dictionary.show_map')}}</button>--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="modal fade" id="group_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('account.Select_Group')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="input-group" onsubmit="return false;">
                                <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-success" id="group_search_btn" type="submit" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-search"></i> {{trans('dictionary.Search')}}</button>
                                </div>
                            </form>
                            <div class="overflow-auto">
                                <div id="group_tree" class="tree"></div>
                            </div>
                        </div>
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
    <link rel="stylesheet" href="/lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="/lib/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/lib/datetimepicker/datetimepicker.min.css">

    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css">


    <link rel="stylesheet" href="css/plyr.min.css">
    <script src="/lib/hls.min.js"></script>


    <script src="/lib/DataTables/datatables.min.js"></script>
    <script src="js/lib/jquery.fileDownload.min.js"></script>
    <script src="js/lib/moment.min.js"></script>
    <script src="js/lib/moment-timezone.min.js"></script>

    <script src="/lib/daterangepicker/daterangepicker.js"></script>
    <script src="/lib/datetimepicker/moment-with-locales.min.js"></script>
    <script src="/lib/datetimepicker/datetimepicker.min.js"></script>
    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstree-grid.js"></script>

    <script src="js/lib/jquery-ui.min.js"></script>
    <script src="js/lib/jquery.ui.touch-punch.min.js"></script>

    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/lib/plyr.polyfilled.min.js"></script>
    <script src="js/lib/plyr.min.js"></script>
    <script src="js/pipelining.min.js"></script>
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/playback_new.min.js?v={{Config::get('app.version')}}"></script>
@stop