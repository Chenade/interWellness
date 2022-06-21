@include('includes.language')
@extends('layouts.default', ['page_header' => trans('va.va')])
@section('content')

    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#task_view">{{trans('va.taskView')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#event_manage">{{trans('va.events')}}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="task_view">
                <div id="taskList">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <input type="text" class="form-control" id="task_keyword" placeholder="{{trans('dictionary.Keyword')}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-success" id="task_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('ai.search')}}</button>
                            <button type="button" class="btn btn-primary" id="task_add" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-plus"></i> {{trans('ai.add')}}</button>
                        </span>
                    </form>
                    <div id="task_container" class="overflow-auto">
                        <div id="task_tree" class="tree"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="event_manage">
                <div class="form-group">
                    <label class="col-form-label" for="conditions">{{trans('dictionary.Condition')}}:</label>
                    <div id="conditions" class="input-group">
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_triggers" checked>
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('va.triggers')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_group">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('dictionary.Group')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_users">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('dictionary.User')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_time">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('dictionary.Time')}}&emsp;</span>
                        </label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="condition_keyword">
                            <span class="overflow-control-indicator"></span>
                            <span class="material-control-description">{{trans('va.keyword')}}&emsp;</span>
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
                <div class="form-group" id="triggers_row">
                    <label class="col-form-label">{{trans('va.triggers')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_triggers" data-size="3">
                        <option value="man" selected>{{trans('va.man')}}</option>
                        <option value="car">{{trans('va.car')}}</option>
                        <option value="motorcycle">{{trans('va.motorcycle')}}</option>
                    </select>
                </div>
                <div class="form-group" id="group_row" style="display: none">
                    <label class="col-form-label">{{trans('dictionary.Group')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_group" data-size="1"></select>
                </div>
                <div class="form-group" id="users_row" style="display: none">
                    <label class="col-form-label">{{trans('dictionary.User')}}:</label>
                    <select class="selectpicker show-tick form-control" id="select_users" data-size="1"></select>
                </div>
                <div class="form-group" id="keyword_row" style="display: none">
                    <label class="col-form-label">{{trans('va.keyword')}}:</label>
                    <input type="text" class="form-control" id="select_keyword">
                </div>
                <div class="form-group" id="time_row" style="display: none">
                    <label for="search_time" class="col-form-label">{{trans('dictionary.Time')}}:</label>
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
                <table id="videos" class="table table-striped table-bordered " cellspacing="0" width="100%">
                    <thead style="display:none">
                    <tr>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
                    <button type="button" class="btn btn-primary" id="user_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="trigger_modal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('va.trigger')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('va.taskName')}}:</label>
                                <input type="text" class="form-control" id="trigger_description" disabled>
                            </div>
                            <hr>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" name="trigger[]" id="trigger_person">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('va.man')}}</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" name="trigger[]" id="trigger_car">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('va.car')}}</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" name="trigger[]" id="trigger_motorcycle">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">{{trans('va.motorcycle')}}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="trigger_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
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
                        <div class="form-group col-12">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="draw_type" value="rect">
                                        <label class="form-check-label">{{trans('va.rect')}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="draw_type" value="poly">
                                        <label class="form-check-label">{{trans('va.polygon')}}</label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-info btn-sm roi-btn">
                                        <i class="fas fa-draw-polygon"> {{trans('va.area')}}</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="task_edit_player"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('ai.enabled')}}:</label>
                                <label class="custom-control overflow-checkbox">
                                    <input type="checkbox" class="overflow-control-input" id="task_edit_enabled">
                                    <span class="overflow-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('va.taskName')}}:</label>
                                <input type="text" class="form-control" id="task_edit_description" placeholder="{{trans('va.taskName')}}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('va.parent')}}:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="task_edit_parent" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary select-group-modal" disabled>
                                            <i class="fas fa-users"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('va.trigger')}}:</label>
                                <div class="input-group">
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="task_edit_trigger[]" id="task_edit_person">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('va.man')}}&ensp;</span>
                                    </label>
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="task_edit_trigger[]" id="task_edit_car">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('va.car')}}&ensp;</span>
                                    </label>
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="task_edit_trigger[]" id="task_edit_motorcycle">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('va.motorcycle')}}&ensp;</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('va.notice')}}:</label>
                                <label class="custom-control overflow-checkbox">
                                    <input type="checkbox" class="overflow-control-input" id="task_edit_notice">
                                    <span class="overflow-control-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('va.source')}}:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="task_edit_source" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary select-user-modal">
                                            <i class="fas fa-video"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label class="col-form-label">Bot:</label>
                                <input type="text" class="form-control" id="task_edit_line">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary task-btn" id="task_edit_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning task-btn" id="task_edit_revert" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-danger task-btn" id="task_edit_delete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Delete')}}</button>
                    <button type="button" class="btn btn-secondary task-btn" id="task_edit_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
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
                        <div class="col-6" id="player">
                            <video preload="none" id="plyr" controls crossorigin></video>
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


@stop
@section('end_script')
    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css">
    <link rel="stylesheet" href="css/plyr.min.css">

    <link rel="stylesheet" href="/lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="/lib/daterangepicker/daterangepicker.css">

    <script src="/lib/DataTables/datatables.min.js"></script>
    <script src="/lib/daterangepicker/daterangepicker.js"></script>

    <script src="js/lib/lazyload.min.js"></script>

    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstreegrid.min.js"></script>

    <script src="js/lib/svg.min.js"></script>
    <script src="js/lib/svg.draw.min.js"></script>
    <script src="js/lib/axios.min.js"></script>
    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/lib/plyr.polyfilled.min.js"></script>
    <script src="js/lib/plyr.min.js"></script>
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/pipelining.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/va.min.js?v={{Config::get('app.version')}}"></script>
@stop
