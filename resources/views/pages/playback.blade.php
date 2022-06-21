@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Video')])
@section('content')
    <div class="col-12">
        <div class="form-group">
            <label class="col-form-label" for="conditions">{{trans('dictionary.Condition')}}:</label>
            <div id="conditions" class="input-group">
                <label class="custom-control overflow-checkbox">
                    <input type="checkbox" class="overflow-control-input" id="condition_users">
                    <span class="overflow-control-indicator"></span>
                    <span class="material-control-description">{{trans('dictionary.User')}}&emsp;</span>
                </label>
                <label class="custom-control overflow-checkbox">
                    <input type="checkbox" class="overflow-control-input" id="condition_time" checked>
                    <span class="overflow-control-indicator"></span>
                    <span class="material-control-description">{{trans('dictionary.Time')}}&emsp;</span>
                </label>
                <label class="custom-control overflow-checkbox">
                    <input type="checkbox" class="overflow-control-input" id="condition_group">
                    <span class="overflow-control-indicator"></span>
                    <span class="material-control-description">{{trans('dictionary.Group')}}&emsp;</span>
                </label>
                @if( env('CUSTOMIZE') == 'npa')
                    <label class="custom-control overflow-checkbox">
                        <input type="checkbox" class="overflow-control-input" id="condition_npa">
                        <span class="overflow-control-indicator"></span>
                        <span class="material-control-description">{{trans('account.petition')}}&emsp;</span>
                    </label>
                @endif
            </div>
        </div>
        @if( env('CUSTOMIZE') == 'npa')
            <div class="form-group" id="npa_row" style="display: none">
                <label for="select_npa" class="col-form-label">{{trans('account.petition')}}:</label>
                <input class="form-control" id="select_npa">
            </div>
        @endif
        <div class="form-group" id="group_row" style="display: none">
            <label for="select_group" class="col-form-label">{{trans('dictionary.Select_Group')}}:</label>
            <select class="form-control selectpicker show-tick" id="select_group"></select>
        </div>
        <div class="form-group" id="users_row" style="display: none">
            <label for="select_users" class="col-form-label">{{trans('dictionary.Task_Select_Multiple_User')}}:</label>
            <select class="form-control selectpicker show-tick" id="select_users" multiple></select>
        </div>
        <div class="form-group" id="time_row">
            <label for="search_time" class="col-form-label">{{trans('dictionary.Task_Select_Time')}}:</label>
            <div class="date-range-picker" id="search_time">
                <i class="fas fa-calendar-alt"></i>
                <span></span> <i class="fas fa-caret-down"></i>
            </div>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="searchBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                {{trans('dictionary.Search')}}
            </button>
        </div>
        <hr>
        <div class="form-group">
            <table id="videos" class="table table-striped table-bordered " cellspacing="0" width="100%">
                <thead style="display:none">
                <tr>
                    <th>{{trans('dictionary.Video_Snapshot')}}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="player_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="input-group" onsubmit="return false;">
                                <input type="text" class="form-control" id="video_title" placeholder="{{trans('dictionary.Video_Title')}}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" id="video_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-edit"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div id="player">
                                <video preload="none" id="plyr" autoplay controls crossorigin></video>
                            </div>
                        </div>
                        <div class="col-6">
                            <div id="map1"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-hover">
                                <tbody id="video_info">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-between">
                                <label class="">{{trans('dictionary.GPS_Information')}}({{trans('dictionary.Time')}}
                                    : {{trans('dictionary.Latitude')}}, {{trans('dictionary.Longitude')}}):</label>
                                <label class="custom-control overflow-checkbox">
                                    <span class="material-control-description">{{trans('dictionary.Automatic')}}</span>
                                    <input type="checkbox" class="overflow-control-input" id="autoScroll" checked>
                                    <span class="overflow-control-indicator"></span>
                                </label>
                            </div>
                            <ul class="list-group overflow-auto" id="gps_list"></ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="video_download">
                        <i class="fa fa-download"></i> {{trans('dictionary.Download')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
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

    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css">

    <link rel="stylesheet" href="css/plyr.min.css">
    <script src="/lib/hls.min.js"></script>

    <script src="/lib/DataTables/datatables.min.js"></script>
    <script src="js/lib/jquery.fileDownload.min.js"></script>

    <script src="/lib/daterangepicker/daterangepicker.js"></script>
    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstree-grid.js"></script>

    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/lib/plyr.polyfilled.min.js"></script>
    <script src="js/lib/plyr.min.js"></script>
    <script src="js/pipelining.min.js"></script>
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/playback.min.js?v={{Config::get('app.version')}}"></script>
@stop