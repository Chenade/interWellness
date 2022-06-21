@include('includes.language')
@extends('layouts.default', ['page_header' => trans('ai.lpr')])
@section('content')
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item" id="nav_task">
                <a class="nav-link active" data-toggle="tab" href="#task_tab">{{trans('ai.frLive')}}</a>
            </li>
            <li class="nav-item" id="nav_event">
                <a class="nav-link" data-toggle="tab" href="#event_tab">{{trans('ai.events')}}</a>
            </li>
            @if(session('group')['layer']<2)
                <li class="nav-item" id="nav_database">
                    <a class="nav-link" data-toggle="tab" href="#db_tab">{{trans('ai.database')}}</a>
                </li>
            @endif
            <li class="nav-item" id="nav_report">
                <a class="nav-link" data-toggle="tab" href="#report_tab">{{trans('ai.report')}}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="task_tab">
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
                            <div class="col-6 col-sm-4">
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
                            <div class="col-6 col-sm-8">
                                <div class="align-self-center" id="results_head"></div>
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
                                <div class="align-self-center" id="muti_head"></div>
                                <div class="align-self-center overflow-auto" id="muti_results"></div>
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
                            <input type="checkbox" class="overflow-control-input" id="condition_content">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.results')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_licensePlate">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.compare')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_classification">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.classification')}}&emsp;</span>
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
                <div class="form-group" id="content_row" style="display: none">
                    <label for="select_content" class="col-form-label">{{trans('ai.results')}}:</label>
                    <input class="form-control" id="select_content" placeholder="AAA-0000">
                </div>
                <div class="form-group" id="licensePlate_row" style="display: none">
                    <label for="select_licensePlate" class="col-form-label">{{trans('ai.compare')}}:</label>
                    <div class="input-group">
                        <select class="selectpicker show-tick form-control col-3" id="select_match">
                            <option value="1" data-input="true">{{trans('ai.customized')}}</option>
                            <option value="1" data-input="false">{{trans('ai.allFound')}}</option>
                            <option value="0" data-input="false">{{trans('ai.notFound')}}</option>
                        </select>
                        <input class="form-control col-9" id="select_licensePlate" placeholder="AAA-0000">
                    </div>
                </div>
                <div class="form-group" id="classification_row" style="display: none">
                    <label for="select_classification" class="col-form-label">{{trans('ai.classification')}}:</label>
                    <input class="form-control" id="select_classification" placeholder="Compact">
                </div>
                <!--<div class="form-group" id="wanted_row" style="display: none">
                    <label for="select_wanted" class="col-form-label">{{trans('ai.wanted')}}:</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" id="select_wanted" data-size="5" multiple></select>
                </div> -->
                <div class="form-group" id="tag_row" style="display: none">
                    <label for="select_Tag" class="col-form-label">{{trans('ai.tag')}}:</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" id="select_Tag" data-size="5" multiple></select>
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
                                <input type="checkbox" class="overflow-control-input" id="condition_dblicensePlate" checked>
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.licensePlate')}}&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_dbClassification">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.classification')}}&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_dbname">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.owner_name')}}&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_dbidCard">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('ai.owner_idCard')}}&emsp;</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="dblicensePlate_row">
                        <label for="select_dblicensePlate" class="col-form-label">{{trans('ai.licensePlate')}}:</label>
                        <input class="form-control" id="select_dblicensePlate" placeholder="AAA-0000">
                    </div>
                    <div class="form-group" id="dbClassification_row" style="display: none">
                        <label for="select_dbClassification" class="col-form-label">{{trans('ai.classification')}}:</label>
                        <select data-live-search="true" data-live-search-style="contains" class="selectpicker show-tick form-control" id="select_dbClassification"></select>
                    </div>
                    <div class="form-group" id="dbname_row" style="display: none">
                        <label for="select_dbname" class="col-form-label">{{trans('ai.owner_name')}}:</label>
                        <input class="form-control" id="select_dbname" placeholder="Cloud">
                    </div>
                    <div class="form-group" id="dbidCard_row" style="display: none">
                        <label for="select_dbidCard" class="col-form-label">{{trans('ai.owner_idCard')}}:</label>
                        <input class="form-control" id="select_dbidCard" placeholder="A000000000">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="dbSearchBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                            {{trans('dictionary.Search')}}
                        </button>
                    </div>
                    <hr>
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

            <div class="tab-pane" id="report_tab">
                <div class="form-group">
                    <label class="col-form-label" for="conditions">{{trans('dictionary.Condition')}}:</label>
                    <div id="conditions" class="input-group">
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rptask" checked>
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.task')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rpgroup">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.group')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rpcamera">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.follow')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rpcontent">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.results')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rplicensePlate">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.compare')}}&emsp;</span>
                        </label>
{{--                        <label class="custom-control overflow-checkbox">--}}
{{--                            <input type="checkbox" class="overflow-control-input" id="condition_rpbrand">--}}
{{--                            <span class="overflow-control-indicator"></span>--}}
{{--                            <span class="material-control-description">{{trans('ai.brand')}}&emsp;</span>--}}
{{--                        </label>--}}
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rpmodel">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.model')}}&emsp;</span>
                        </label>
{{--                        <label class="custom-control overflow-checkbox">--}}
{{--                            <input type="checkbox" class="overflow-control-input" id="condition_rpcolor">--}}
{{--                            <span class="overflow-control-indicator"></span>--}}
{{--                            <span class="material-control-description">{{trans('ai.color')}}&emsp;</span>--}}
{{--                        </label>--}}
{{--                        <label class="custom-control overflow-checkbox">--}}
{{--                            <input type="checkbox" class="overflow-control-input" id="condition_rpclassification">--}}
{{--                            <span class="overflow-control-indicator"></span>--}}
{{--                            <span class="material-control-description">{{trans('ai.classification')}}&emsp;</span>--}}
{{--                        </label>--}}
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rponame">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.owner_name')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rpoidCard">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.owner_idCard')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rptag">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.tag')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_rpmisjudged">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('ai.misjudged')}}&emsp;</span>
                        </label>
                    </div>
                </div>
                <div class="form-group" id="rptask_row">
                    <label for="select_rptask" class="col-form-label">{{trans('ai.task')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_rptask" data-size="7"></select>
                </div>
                <div class="form-group" id="rpgroup_row" style="display: none">
                    <label class="col-form-label">{{trans('ai.group')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_rpgroup" data-size="1"></select>
                </div>
                <div class="form-group" id="rpcamera_row" style="display: none">
                    <label for="select_rpcamera" class="col-form-label">{{trans('ai.follow')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_rpcamera" data-size="7"></select>
                </div>
                <div class="form-group" id="rpcontent_row" style="display: none">
                    <label for="select_rpcontent" class="col-form-label">{{trans('ai.results')}}:</label>
                    <input class="form-control" id="select_rpcontent" placeholder="AAA-0000">
                </div>
                <div class="form-group" id="rplicensePlate_row" style="display: none">
                    <label for="select_rplicensePlate" class="col-form-label">{{trans('ai.compare')}}:</label>
                    <input class="form-control" id="select_rplicensePlate" placeholder="AAA-0000">
                </div>
{{--                <div class="form-group" id="rpbrand_row" style="display: none">--}}
{{--                    <label for="select_rpbrand" class="col-form-label">{{trans('ai.brand')}}:</label>--}}
{{--                    <input class="form-control" id="select_rpbrand" placeholder="brand">--}}
{{--                </div>--}}
                <div class="form-group" id="rpmodel_row" style="display: none">
                    <label for="select_rpmodel" class="col-form-label">{{trans('ai.model')}}:</label>
                    <input class="form-control" id="select_rpmodel" placeholder="model">
                </div>
{{--                <div class="form-group" id="rpcolor_row" style="display: none">--}}
{{--                    <label for="select_rpcolor" class="col-form-label">{{trans('ai.color')}}:</label>--}}
{{--                    <input class="form-control" id="select_rpcolor" placeholder="color">--}}
{{--                </div>--}}
{{--                <div class="form-group" id="rpclassification_row" style="display: none">--}}
{{--                    <label for="select_rpclassification" class="col-form-label">{{trans('ai.classification')}}:</label>--}}
{{--                    <input class="form-control" id="select_rpclassification" placeholder="Compact">--}}
{{--                </div>--}}
                <div class="form-group" id="rponame_row" style="display: none">
                    <label for="select_rponame" class="col-form-label">{{trans('ai.owner_name')}}:</label>
                    <input class="form-control" id="select_rponame" placeholder="owner_name">
                </div>
                <div class="form-group" id="rpoidCard_row" style="display: none">
                    <label for="select_rpoidCard" class="col-form-label">{{trans('ai.owner_idCard')}}:</label>
                    <input class="form-control" id="select_rpoidCard" placeholder="owner_idCard">
                </div>
                <div class="form-group" id="rptag_row" style="display: none">
                    <label for="select_rpTag" class="col-form-label">{{trans('ai.tag')}}:</label>
                    <select class="selectpicker show-tick form-control" data-live-search="true" id="select_rpTag" data-size="5" multiple></select>
                </div>
                <div class="form-group" id="rptime_row">
                    <label for="search_rptime" class="col-form-label">{{trans('ai.time')}}:</label>
                    <div id="search_rptime" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; border-radius: 4px;">
                        <i class="fas fa-calendar-alt"></i>
                        <span></span> <i class="fas fa-caret-down"></i>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" id="rp_description" placeholder="{{trans('ai.note')}}">
                    <span class="input-group-append">
                           <button type="button" class="btn btn-primary" id="reportPostBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                            {{trans('ai.export')}}
                        </button>
                    </span>
                </div>
                <hr>
                <table id="reports" class="table table-striped table-bordered " cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>{{trans('ai.files')}}</th>
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
                        <div class="col-6">
                            <div style="position: relative">
                                <img id="original_img" src="/img/default.jpg" style="position: absolute;max-width: 100%">
                                <span style="position: absolute;"></span>
                            </div>

                            <div class="col-12" style="padding: 0; margin: 10px;">
                                <div id="original_info1" class="d-flex flex-column justify-content-center"></div>
                            </div>

                        </div>
                        <div class="col-6">
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
    <div class="modal fade" id="vehicle_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('ai.carInfo')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.enabled')}}:</label>
                                <label class="custom-control overflow-checkbox">
                                    <input type="checkbox" class="overflow-control-input" id="car_enabled">
                                    <span class="overflow-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.licensePlate')}}:(<span style="color:red;">*</span>)</label>
                                <input type="text" class="form-control" id="car_licensePlate" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.brand')}}:</label>
                                <select data-live-search="true" data-live-search-style="contains" data-size="5" class="selectpicker show-tick form-control" id="car_brand">
                                    <optgroup label="{{trans('ai.Motorcycle')}}" id="Motorcycle"></optgroup>
                                    <optgroup label="{{trans('ai.Car')}}" id="Car"></optgroup>
                                </select>
                                <input type="text" class="form-control" id="car_brand_customized"  style="display: none; margin-top: 1em;" placeholder="{{trans('ai.brand')}}({{trans('ai.customized')}})">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">{{trans('ai.classification')}}:</label>
                            <select data-live-search="true" data-live-search-style="contains" class="selectpicker show-tick form-control" id="car_classification">

                            </select>
                            <input type="text" class="form-control" id="car_classification_customized"  style="display: none; margin-top: 1em;" placeholder="{{trans('ai.classification')}}({{trans('ai.customized')}})">
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">{{trans('ai.color')}}:</label>
                            <select data-live-search="true" data-live-search-style="contains" data-size="5" class="selectpicker show-tick form-control" id="car_color">

                            </select>
                            <input type="text" class="form-control" id="car_color_customized"  style="display: none; margin-top: 1em;" placeholder="{{trans('ai.color')}}({{trans('ai.customized')}})">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.model')}}:</label>
                                <input type="text" class="form-control" id="car_model">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="car_tag" class="col-form-label">{{trans('ai.tag')}}:</label>
                                <div class="input-group">
                                    <select class="selectpicker show-tick form-control" data-live-search="true" id="car_tag" data-size="5" multiple></select>
                                    <div class="input-group-append">
                                        <button class="btn btn-info tag-list" type="button"><i class="fas fa-list-ol"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.owner_name')}}:(<span style="color:red;">*</span>)</label>
                                <input type="text" class="form-control" id="car_owner_name" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.owner_idCard')}}:(<span style="color:red;">*</span>)</label>
                                <input type="text" class="form-control" id="car_owner_idCard"  required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.note')}}:</label>
                                <input type="text" class="form-control" id="car_note">
                            </div>
                        </div>
                    </div>

                    <div class="row" id="car_snapshot_row">
                        <div class="col-12">
                            <div class="file-loading">
                                <input id="uploadSnapshot" name="uploadSnapshot[]" type="file" multiple accept="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary vehicle-btn" id="car_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning vehicle-btn" id="car_revert" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-danger vehicle-btn" id="car_delete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Delete')}}</button>
                    <button type="button" class="btn btn-secondary vehicle-btn" id="car_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
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
    <script src="js/lib/jquery.timer.min.js"></script>
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/pipelining.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/lpr.min.js?v={{Config::get('app.version')}}"></script>
@stop