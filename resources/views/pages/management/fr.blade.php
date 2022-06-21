@include('includes.language')
@extends('layouts.default', ['page_header' => trans('ai.fr')])
@section('content')
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#task_tab">{{trans('ai.frLive')}}</a>
            </li>
            <li class="nav-item">
                <a id="event-nav" class="nav-link" data-toggle="tab" href="#event_tab">{{trans('ai.events')}}</a>
            </li>
            @if(session('group')['layer']<2)
                <li class="nav-item">
                    <a id="db-nav" class="nav-link" data-toggle="tab" href="#db_tab">{{trans('ai.database')}}</a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="task_tab">
                <div class="form-group streaming-container-group">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <input type="text" class="form-control" id="task_keyword" placeholder="{{trans('dictionary.Keyword')}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-success" id="task_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('ai.search')}}</button>
                            <button type="button" class="btn btn-info" id="task_view" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-tasks"></i> {{trans('ai.task')}}</button>
                            <button type="button" class="btn btn-primary" id="task_add" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-plus"></i> {{trans('ai.add')}}</button>
                        </span>
                    </form>
                    <div id="task_container" class="overflow-auto">
                        <div id="task_tree" class="tree"></div>
                    </div>
                    <div id="event_container" style="display: none">
                        <div class="d-flex flex-wrap">
                            <div class="col-12 col-sm-4">
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
                            <div class="col-12 col-sm-8">
                                <div class="align-self-center" id="results_head"></div>
                                <div class="align-self-center overflow-auto" id="results"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="event_tab">
                <div class="form-group">
                    <label class="col-form-label" for="conditions">{{trans('dictionary.Condition')}}:</label>
                    <div id="conditions" class="input-group">
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_task" checked>
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.task')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_group">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.group')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_camera">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.follow')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_time">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.time')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_name">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.name')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_idCard">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.idCard')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_wanted">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.wanted')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_tag">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.tag')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_keep">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.keep')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_misjudged">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.misjudged')}}&emsp;</span>
                        </label>
                    </div>
                </div>
                <div class="form-group" id="task_row">
                    <label for="select_task" class="col-form-label">{{trans('ai.task')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_task" data-size="7"></select>
                </div>
                <div class="form-group" id="group_row" style="display: none">
                    <label class="col-form-label">{{trans('ai.group')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_group" data-size="1"></select>
                </div>
                <div class="form-group" id="camera_row" style="display: none">
                    <label for="select_camera" class="col-form-label">{{trans('ai.follow')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_camera" data-size="7"></select>
                </div>
                <div class="form-group" id="name_row" style="display: none">
                    <label for="select_name" class="col-form-label">{{trans('ai.name')}}:</label>
                    <input class="form-control" id="select_name" placeholder="Cloud">
                </div>
                <div class="form-group" id="idCard_row" style="display: none">
                    <label for="select_idCard" class="col-form-label">{{trans('ai.idCard')}}:</label>
                    <input class="form-control" id="select_idCard" placeholder="A000000000">
                </div>
                <div class="form-group" id="wanted_row" style="display: none">
                    <label for="select_wanted" class="col-form-label">{{trans('ai.wanted')}}:</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" id="select_wanted" data-size="5" multiple></select>
                </div>
                <div class="form-group" id="tag_row" style="display: none">
                    <label for="select_tag" class="col-form-label">{{trans('ai.tag')}}:</label>
                    <div class="input-group">
                        <select class="selectpicker show-tick form-control" data-live-search="true" id="select_tag" data-size="5" multiple></select>
                        <div class="input-group-append">
                            <button class="btn btn-info tag-list" type="button"><i class="fas fa-list-ol"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="time_row" style="display: none">
                    <label for="search_time" class="col-form-label">{{trans('ai.time')}}:</label>
                    <div class="date-range-picker" id="search_time">
                        <i class="fas fa-calendar-alt"></i>
                        <span></span> <i class="fas fa-caret-down"></i>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="eventSearchBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                        {{trans('dictionary.Search')}}
                    </button>
                </div>
                <hr>
                <div id="events_head_info"></div>
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
            @if(session('group')['layer']<2)
                <div class="tab-pane" id="db_tab">
                    <div class="form-group">
                        <label class="col-form-label" for="conditions">{{trans('dictionary.Condition')}}:</label>
                        <div id="conditions" class="input-group">
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_dbName" checked>
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.name')}}&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_dbIdCard">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.idCard')}}&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_dbWanted">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.wanted')}}&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_dbTag">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.tag')}}&emsp;</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="dbName_row">
                        <label for="select_dbName" class="col-form-label">{{trans('ai.name')}}:</label>
                        <input class="form-control" id="select_dbName" placeholder="Cloud">
                    </div>
                    <div class="form-group" id="dbIdCard_row" style="display: none">
                        <label for="select_dbIdCard" class="col-form-label">{{trans('ai.idCard')}}:</label>
                        <input class="form-control" id="select_dbIdCard" placeholder="A000000000">
                    </div>
                    <div class="form-group" id="dbWanted_row" style="display: none">
                        <label for="select_dbWanted" class="col-form-label">{{trans('ai.wanted')}}:</label>
                        <select class="selectpicker show-tick form-control" data-live-search="true" id="select_dbWanted" data-size="5" multiple></select>
                    </div>
                    <div class="form-group" id="dbTag_row" style="display: none">
                        <label for="select_dbTag" class="col-form-label">{{trans('ai.tag')}}:</label>
                        <div class="input-group">
                            <select class="selectpicker show-tick form-control" data-live-search="true" id="select_dbTag" data-size="5" multiple></select>
                            <div class="input-group-append">
                                <button class="btn btn-info tag-list" type="button"><i class="fas fa-list-ol"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="dbSearchBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                            {{trans('dictionary.Search')}}
                        </button>
                    </div>
                    <hr>
                    <div id="dbTable_head_info"></div>
                    <table id="dbTable" class="table table-striped table-bordered " cellspacing="0" width="100%">
                        <thead style="display:none">
                        <tr>
                            <th>{{trans('ai.profile')}}</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            @endif
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
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#fr_tab">FR</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body" style="padding-top: 0px">
                            <div class="tab-content">
                                <div class="tab-pane active" id="fr_tab">
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
                                                    <input type="checkbox" class="overflow-control-input" id="fr_enabled">
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
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="col-form-label">{{trans('ai.minFaceDim')}}:</label>
                                                <input type="number" class="form-control" id="minFaceDim" maxlength="5" min="1">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="col-form-label">{{trans('ai.scoreThreshold')}}:</label>
                                                <input type="number" class="form-control" id="scoreThreshold" maxlength="5" min="0" max="100">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="col-form-label">{{trans('ai.confidenceThreshold')}}:</label>
                                                <input type="number" class="form-control" id="confidenceThreshold" maxlength="5" step="0.01" min="0" max="1">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="col-form-label">{{trans('ai.candidateScoreThreshold')}}:</label>
                                                <input type="number" class="form-control" id="candidateScoreThreshold" maxlength="5" min="0" max="100">
                                            </div>
                                        </div>
                                    </div>
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
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a id="nav_img" class="nav-link active" data-toggle="tab" href="#info">{{trans('ai.information')}}</a></li>
                        <li class="nav-item"><a id="nav_img" class="nav-link" data-toggle="tab" href="#rank">{{trans('ai.candidate')}}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="info" class="tab-pane active">
                            <div class="row">
                                <div class="col-12 col-sm-7">
                                    <div style="position: relative">
                                        <img id="original_img" src="/img/default.jpg" style="position: absolute;max-width: 100%">
                                        <span style="position: absolute;"></span>
                                    </div>
                                    <div class="col-12 d-flex flex-wrap" style="padding: 0; margin: 10px;">
                                        <div id="original_info1" class="col-12 col-lg-6 d-flex flex-column justify-content-start"></div>
                                        <div id="original_faceark1" class="col-12 col-lg-6 d-flex flex-column justify-content-start"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div id="map2"></div>
                                    <h5 class="">{{trans('dictionary.GPS_Information')}}({{trans('dictionary.Latitude')}}, {{trans('dictionary.Longitude')}}):
                                        <span class="text-info" id="original_latitude"></span>,
                                        <span class="text-info" id="original_longitude"></span>
                                    </h5>
                                    <div class="col-12" style="padding: 0;">
                                        <table class="table table-hover">
                                            <tbody id="original_info2">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="rank" class="tab-pane">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <img id="snapshot_img" src="/img/default.jpg" style="width: 100%">
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div id="candidateList" class="d-flex" style="width: 100%; overflow-x: auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="prvious_event"><i class="fas fa-caret-left"></i>&ensp;{{trans('ai.pre_record')}}</button>
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
    <div class="modal fade" id="human_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('ai.manInfo')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.idCard')}}:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <label class="custom-control overflow-checkbox" style="margin-bottom: 0px">
                                                <input type="checkbox" class="overflow-control-input" id="man_enabled">
                                                <span class="overflow-control-indicator"></span>
                                                <span class="material-control-description">{{trans('account.enabled')}}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="man_idCard">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.rfidNo')}}:</label>
                                <input type="text" class="form-control" id="man_rfid">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.name')}}:</label>
                                <input type="text" class="form-control" id="man_name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.city')}}:</label>
                                <input type="text" class="form-control" id="man_city">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.gender')}}:</label>
                                <select class="selectpicker show-tick form-control" id="man_gender">
                                    <option value="0">{{trans('ai.unknown')}}</option>
                                    <option value="1">{{trans('ai.male')}}</option>
                                    <option value="2">{{trans('ai.female')}}</option>
                                    <option value="9">{{trans('ai.notApplicable')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.address')}}:</label>
                                <input type="text" class="form-control" id="man_address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.phone')}}:</label>
                                <input type="text" class="form-control" id="man_phone">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.job')}}:</label>
                                <input type="text" class="form-control" id="man_job">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">{{trans('ai.birthday')}}:</label>
                            <input type="date" id="man_birthday" class="form-control">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.wanted')}}:</label>
                                <select class="selectpicker show-tick form-control" data-live-search="true" id="man_wanted" data-size="8" multiple></select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.birthPlace')}}:</label>
                                <input type="text" class="form-control" id="man_birthPlace">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.tag')}}:</label>
                                <div class="input-group">
                                    <select class="selectpicker show-tick form-control" data-live-search="true" id="man_tag" data-size="8" multiple></select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info tag-list" type="button">
                                            <i class="fas fa-list-ol"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="man_snapshot_row">
                        <div class="col-12">
                            <div class="file-loading">
                                <input id="uploadSnapshot" name="uploadSnapshot[]" type="file" multiple accept="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary human-btn" id="man_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning human-btn" id="man_revert" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-danger human-btn" id="man_delete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Delete')}}</button>
                    <button type="button" class="btn btn-secondary human-btn" id="man_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
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
    <link rel="stylesheet" href="/lib/fileinput/explorer-fas.min.css">

    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css">

    <link rel="stylesheet" href="/lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="/lib/daterangepicker/daterangepicker.css">

    <script src="/lib/DataTables/datatables.min.js"></script>
    <script src="/lib/daterangepicker/daterangepicker.js"></script>

    <script src="/lib/fileinput/piexif.min.js"></script>
    <script src="/lib/fileinput/fileinput-sortable.min.js"></script>
    <script src="/lib/fileinput/fileinput.js"></script>
    <script src="/lib/fileinput/explorer-fas.min.js"></script>

    <script src="js/lib/piexif.min.js"></script>
    <script src="js/lib/locales/zh.js"></script>

    <script src="js/lib/lazyload.min.js"></script>

    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstreegrid.min.js"></script>

    <script src="js/lib/svg.min.js"></script>
    <script src="js/lib/svg.draw.min.js"></script>
    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/lib/jquery.timer.min.js"></script>
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/pipelining.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/fr.min.js?v={{Config::get('app.version')}}"></script>
@stop