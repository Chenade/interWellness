@include('includes.language')
@extends('layouts.default', ['page_header' => trans('ai.or')])
@section('content')
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#task_tab" style="display: none">{{trans('ai.orLive')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#event_tab">{{trans('ai.events')}}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="task_tab" >
                <div class="form-group streaming-container-group">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <input type="text" class="form-control" id="task_keyword" placeholder="{{trans('dictionary.Keyword')}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-success" id="task_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('ai.search')}}</button>
                            <button type="button" class="btn btn-info" id="task_view" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"  style="display: none;"><i class="fas fa-tasks"></i> {{trans('ai.lprLive')}}</button>
                            <button type="button" class="btn btn-info" id="task_list" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-tasks"></i> {{trans('ai.task')}}</button>
                            <button type="button" class="btn btn-primary" id="task_add" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-plus"></i> {{trans('ai.add')}}</button>
                        </span>
                    </form>
                    <div id="task_container" class="overflow-auto">
                        <div id="task_tree" class="tree"></div>
                    </div>
                    <div id="event_container" style="display: none">
                        <div class="row">
                            <div class="col-4">
                                <div class="align-self-center">
                                    <div class="d-flex">
                                        <h5>
                                            {{trans('ai.detection')}} <a class="text-info" id="video_title"></a>
                                        </h5>
                                        <div class="ml-auto">
                                            <button class="btn btn-warning btn-sm" id="device_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <small><span>{{trans('dictionary.Last_Updated')}}: </span><span id="event_detectTime"></span></small>
                                </div>
                                <div class="align-self-center" style="padding-bottom: 5px">
                                    <div id="draw-results-container" style="position: relative">
                                        <img src="/img/default.jpg" id="event_snapshot" style="position: absolute;border-radius: 4px;">
                                        <span style="position: absolute;"></span>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <h5>
                                        {{trans('ai.position')}} <a class="text-info" id="video_gps"></a>
                                    </h5>
                                </div>
                                <div class="align-self-center">
                                    <div id="map1"></div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="align-self-center">
                                    <h5>{{trans('ai.results')}}</h5>
                                </div>
                                <div class="align-self-center overflow-auto" id="results"></div>
                            </div>
                        </div>
                    </div>
                    <div id="muti_container" style="display: none">
                        <div class="row">
                            <div class="col-12">
                                <div class="align-self-center">
                                    <div class="d-flex"></div>
                                    <h4><i class="fas fa-tasks"></i>&ensp;{{trans('ai.task')}}{{trans('ai.results')}}&ensp;<a class="text-info" id="muti_title"></a></h4>
                                </div>
                                <div class="align-self-center overflow-auto" id="muti_results"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane active" id="event_tab">
                <div class="form-group">
                    <label class="col-form-label" for="conditions">{{trans('dictionary.Condition')}}:</label>
                    <div id="conditions" class="input-group">
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_users">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.user')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_group">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.group')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_object">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.object')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_time" checked>
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.time')}}&emsp;</span>
                        </label>
{{--                        <label class="custom-control overflow-checkbox">--}}
{{--                            <input type="checkbox" class="overflow-control-input" id="condition_keep">--}}
{{--                            <span class="overflow-control-indicator"></span>--}}
{{--                            <span class="material-control-description">{{trans('ai.keep')}}&emsp;</span>--}}
{{--                        </label>--}}
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_misjudged">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.misjudged')}}&emsp;</span>
                        </label>
                    </div>
                </div>
                <div class="form-group" id="users_row" style="display: none">
                    <label for="select_users" class="col-form-label">{{trans('ai.user')}}&ensp;({{trans('ai.multiple')}}):</label>
                    <select class="form-control selectpicker show-tick" id="select_users" multiple></select>
                </div>
                <div class="form-group" id="group_row" style="display: none">
                    <label class="col-form-label">{{trans('ai.group')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_group" data-size="1"></select>
                </div>
                <div class="form-group" id="object_row" style="display: none">
                    <label for="select_object" class="col-form-label">{{trans('ai.object')}}&ensp;({{trans('ai.multiple')}}):</label>
                    <select class="selectpicker show-tick form-control" id="select_object" data-size="7" multiple>
                        <option value="Person">Person</option>
                        <option value="Car">Car</option>
                        <option value="Bike">Bike</option>
                        <option value="Airplane">Airplane</option>
                        <option value="Bus">Bus</option>
                        <option value="Train">Train</option>
                        <option value="Truck">Truck</option>
                        <option value="Boat">Boat</option>
                        <option value="Bag">Bag</option>
                        <option value="Suitcase">Suitcase</option>
                    </select>
                </div>
                <div class="form-group" id="time_row">
                    <label for="search_time" class="col-form-label">{{trans('ai.time')}}:</label>
                    <div class="date-range-picker" id="search_time">
                        <i class="fas fa-calendar-alt"></i>
                        <span></span><i class="fas fa-caret-down"></i>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="eventSearchBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                        {{trans('dictionary.Search')}}
                    </button>
                </div>
                <hr>
                <table id="events" class="table table-striped table-bordered " cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>{{trans('ai.selection')}}</th>
                        <th>{{trans('ai.results')}}</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="modal fade" id="group_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
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
                            <div id="group_tree" class="tree"></div>
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
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
                            <div id="user_tree" class="tree"></div>
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
    <div class="modal fade" id="_user_modal" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
                                    <button class="btn btn-success" id="device_search_btn" type="submit" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-search"></i> {{trans('dictionary.Search')}}</button>
                                </div>
                            </form>
                            <div id="device_tree" class="tree"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="device_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('ai.frParameter')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="tab-pane active" id="lpr_tab">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-sm btn-outline-info form-control roi-btn" style="margin-bottom: 5px;">
                                    ROI
                                </button>
                            </div>
                            <div class="col-12" id="player">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('ai.enabled')}}:</label>
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" id="lpr_enabled">
                                        <span class="overflow-control-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('ai.follow')}}:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="device_follow" placeholder="rtsp://bovia.com.tw/cloud">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary select-user-modal">
                                                <i class="fas fa-video"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('ai.minPlateDim')}}:</label>
                                    <input type="number" class="form-control" id="minPlateDim" maxlength="5" min="1">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('ai.confidenceThreshold')}}:</label>
                                    <input type="number" class="form-control" id="confidenceThreshold" maxlength="5" step="0.01" min="0" max="1">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary task-btn" id="device_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary task-btn" id="device_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="original_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <div style="position: relative">
                                <img src="/img/default.jpg" style="position: absolute;max-width: 100%">
                                <span style="position: absolute;"></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div id="map2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="video_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-lg-8" id="left_content">
                            <div class="col-12" style="padding: 0;">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a id="nav_img" class="nav-link active" data-toggle="tab" href="#img">{{trans('ai.snapshot')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="nav_video" data-toggle="tab" href="#video">{{trans('ai.video')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="nav_map" data-toggle="tab" href="#map">{{trans('ai.map')}}</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="img" class="tab-pane active">
                                        <div style="position: relative">
                                            <img style="width: 100%; border-radius: 4px;" id="or_snapshot" onerror="this.src='/img/default.jpg';" style="position: absolute;max-width: 100%">
                                            <span style="position: absolute;"></span>
                                        </div>
                                    </div>
                                    <div id="video" class="tab-pane">
                                        <div id="player">
                                            <video preload="none" height="90%" id="plyr" controls crossorigin style="width: 100%"></video>
                                        </div>
                                    </div>
                                    <div id="map" class="tab-pane">
                                        <div class="col-12" style="padding: 0;">
                                            <div id="map_video"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-4" id="right_content">
                            <div class="col-12" style="padding: 0;">
                                <table class="table table-hover">
                                    <tbody id="video_info2">
                                    </tbody>
                                    <tfoot>
                                    <tr><th>{{trans('dictionary.GPS_Information')}}({{trans('dictionary.Latitude')}}, {{trans('dictionary.Longitude')}})</th></tr>
                                    <tr><td> <span class="text-info" id="video_latitude"></span>,<span class="text-info" id="video_longitude"></span></td></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="previous_event"><i class="fas fa-caret-left"></i>&ensp;{{trans('ai.pre_record')}}</button>
                    <button type="button" class="btn btn-primary" id="next_event">{{trans('ai.next_record')}}&ensp;<i class="fas fa-caret-right"></i></button>
                    <button type="button" class="btn btn-secondary" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="task_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('ai.taskInfo')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.enabled')}}:</label>
                                <label class="custom-control overflow-checkbox">
                                    <input type="checkbox" class="overflow-control-input" id="task_enabled">
                                    <span class="overflow-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.mailing')}}:</label>
                                <label class="custom-control overflow-checkbox">
                                    <input type="checkbox" class="overflow-control-input" id="task_mailing">
                                    <span class="overflow-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.description')}}:</label>
                                <input type="text" class="form-control" id="task_name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">Bot:</label>
                                <input type="text" class="form-control" id="task_line">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.parent')}}:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="task_group" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary select-group-modal">
                                            <i class="fas fa-users"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            {{--                            <div class="form-group">--}}
                            {{--                                <label class="col-form-label">E-Mail:</label>--}}
                            {{--                                <input type="text" class="form-control" id="task_email">--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.threshold')}}:</label>
                                <input type="number" class="form-control" id="task_score">
                            </div>
                        </div>
                        <div class="col-6">
                            {{--                            <div class="form-group">--}}
                            {{--                                <label class="col-form-label">TCPB:</label>--}}
                            {{--                                <input type="text" class="form-control" id="task_tpcb">--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.follow')}}:</label>
                                <select class="form-control selectpicker show-tick" id="task_follow" multiple></select>
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary task-btn" id="task_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning task-btn" id="task_revert" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-danger task-btn" id="task_delete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Delete')}}</button>
                    <button type="button" class="btn btn-secondary task-btn" id="task_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tag_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('ai.tag')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="tag[]" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-warning tag-revert d-none" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                            <i class="fas fa-history"></i></button>
                                        <button class="btn btn-success tag-add" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                            <i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="tag-list"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>


@stop
@section('end_script')
    <link rel="stylesheet" href="/lib/fileinput/fileinput.min.css">
    <link rel="stylesheet" href="/lib/fileinput/explorer-fas2.min.css">

    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css">

    <link rel="stylesheet" href="/lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="/lib/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="css/plyr.min.css">
    <script src="/lib/DataTables/datatables.min.js"></script>
    <script src="/lib/daterangepicker/daterangepicker.js"></script>

    <script src="/lib/fileinput/piexif.min.js"></script>
    <script src="/lib/fileinput/fileinput-sortable.min.js"></script>
    <script src="/lib/fileinput/fileinput.js"></script>
    <script src="/lib/fileinput/explorer-fas2.min.js"></script>

    <script src="js/lib/piexif.min.js"></script>
    <script src="js/lib/locales/zh.js"></script>

    <script src="js/lib/lazyload.min.js"></script>

    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstreegrid.min.js"></script>

    <script src="js/lib/svg.min.js"></script>
    <script src="js/lib/svg.draw.min.js"></script>
    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/lib/plyr.polyfilled.min.js"></script>
    <script src="js/lib/plyr.min.js"></script>
    <script src="js/lib/jquery.timer.min.js"></script>
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/pipelining.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/or.min.js?v={{Config::get('app.version')}}"></script>
@stop