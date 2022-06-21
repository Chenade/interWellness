@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Import_Video')])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="panel with-nav-tabs">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#video_tab" data-toggle="tab">{{trans('dictionary.Video_List')}}</a></li>
                            <li><a href="#task_tab" data-toggle="tab">{{trans('dictionary.Task')}}</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="video_tab">
                                <table id="videos" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>{{trans('dictionary.Video_ID')}}</th>
                                        <th>{{trans('dictionary.Video_Checkbox')}}</th>
                                        <th>{{trans('dictionary.Video_Snapshot')}}</th>
                                        <th>{{trans('dictionary.ID').'@'.trans('dictionary.Device_Id')}}</th>
                                        <th>{{trans('dictionary.Video_Title')}}</th>
                                        <th>{{trans('dictionary.Posting_Time')}}</th>
                                        <th>{{trans('dictionary.Video_Other')}}</th>
                                        <th>{{trans('dictionary.Management')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="task_tab">
                                <div class="col-md-4">
                                    <div class="vertical-divider">
                                        <h3>{{trans('dictionary.Task_Insert')}}</h3>
                                        <hr style="width: 95%">
                                        <div class="form-group">
                                            <label class="control-label">{{trans('dictionary.Task_Name')}}:</label><br/>
                                            <input type="text" class="form-control w-220" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">{{trans('dictionary.Task_Select_Time')}}:</label><br/>
                                            <span class="date-range-picker" id="task_time">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                                <span></span> <b class="caret"></b>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">{{trans('dictionary.Task_Select_Multiple_User')}}:</label><br/>
                                            <select class="selectpicker show-tick" data-live-search="true" id="users" multiple>
                                            </select>
                                        </div>
                                        @if(0)
                                            <div class="form-group">
                                                <label class="control-label">{{trans('dictionary.Task_Select_Area_Option')}}:</label><br/>
                                                <div class="form-inline">
                                                    <div class="checkbox" style="padding-top: 5px">
                                                        <label>
                                                            <input type="checkbox"/>
                                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        </label>
                                                    </div>
                                                    <button data-target="#map_modal" data-toggle="modal" data-backdrop="static" data-keyboard="false" class="btn btn-default btn-xs"><i class="fa fa-map"></i> {{trans('dictionary.Task_Open_Map')}}
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                        <button type="button" class="btn btn-default" id="create_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span> {{trans('dictionary.Processing')}}">
                                            {{trans('dictionary.Create')}}
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="vertical-divider">
                                        <h3>{{trans('dictionary.Task_List_Priority')}}</h3>
                                        <hr style="width: 95%">
                                        <ul id="priority" class="list-group priority">
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3>{{trans('dictionary.Task_Progress')}}</h3>
                                    <hr style="width: 95%">
                                    <div id="tree"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="player_modal" role="dialog">
        <div class="modal-dialog" style="width: 80%; height: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                    <small id="video_content"></small>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="col-md-12" style="padding-bottom: 10px">
                        <div class="input-group">
                            <span class="input-group-addon">{{trans('dictionary.Video_Title')}}</span>
                            <input type="text" class="form-control" id="video_title">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" id="video_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span> {{trans('dictionary.Processing')}}">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div id="player">
                                    <video playsinline controls id="plyr">
                                        <source type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="map0"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{trans('dictionary.Task_Start_Time')}}</th>
                                        <th>{{trans('dictionary.Task_end_Time')}}</th>
                                        <th>{{trans('dictionary.File_Size')}}</th>
                                        <th>{{trans('dictionary.File_Type')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody id="video_info">
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inline">
                                    <label>{{trans('dictionary.GPS_Information')}}({{trans('dictionary.Time')}}: {{trans('dictionary.Latitude')}},  {{trans('dictionary.Longitude')}}):</label>
                                    <div class="checkbox pull-right">
                                        <label>
                                            {{trans('dictionary.Automatic')}}&nbsp;&nbsp;
                                            <input type="checkbox" id="autoScroll" checked/>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <ul class="list-group" id="gps_list" style="max-height:180px;overflow-y:auto;"></ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="video_download"><i class="fa fa-download"></i> {{trans('dictionary.Download')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="map_modal" role="dialog">
        <div class="modal-dialog" style="width: 80%; height: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('dictionary.Task_Select_Area')}}</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="map2"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="search_modal" role="dialog">
        <div class="modal-dialog" style="width: 80%; height: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('dictionary.Task_Select_Area')}}</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3">{{trans('dictionary.Condition')}}:</label>
                                <div class="col-md-9">
                                    <div class="checkbox" style="padding-top: 7px">
                                        <label>
                                            {{trans('dictionary.User')}}&nbsp;&nbsp;
                                            <input type="checkbox" id="condition_user" checked/>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        </label>
                                        <label>
                                            {{trans('dictionary.Time')}}&nbsp;&nbsp;
                                            <input type="checkbox" id="condition_time" checked/>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        </label>
                                        <label>
                                            {{trans('dictionary.Area')}}&nbsp;&nbsp;
                                            <input type="checkbox" id="condition_area" checked/>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{trans('dictionary.Task_Select_Multiple_User')}}:</label>
                                <div class="col-md-9">
                                    <select class="selectpicker show-tick" data-live-search="true" id="searchUsers" multiple>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{trans('dictionary.Task_Select_Time')}}:</label>
                                <div class="col-md-9">
                                    <span class="date-range-picker" id="search_time">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        <span></span> <b class="caret"></b>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">{{trans('dictionary.Task_Select_Area')}}:</label>
                                <div class="col-md-9">
                                    <div id="map1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="searchBtn">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="task_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-4">{{trans('dictionary.Task_Name')}}:</label>
                                <div class="col-md-8">
                                    <input type="hidden" class="form-control" id="edit_id" readonly/>
                                    <input type="text" class="form-control" id="edit_name" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">{{trans('dictionary.Task_Create_Time')}}:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="edit_time" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">{{trans('dictionary.Task_Start_Time')}}:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="edit_start" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">{{trans('dictionary.Task_end_Time')}}:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="edit_end" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">{{trans('dictionary.Enabled')}}:</label>
                                <div class="checkbox col-md-8" style="padding-top: 7px">
                                    <label>
                                        <input type="checkbox" id="edit_enabled"/>
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-primary" id="edit_apply">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="user_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('dictionary.Task_Select_Multiple_User')}}</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="treeSearch_modal" placeholder="{{trans('dictionary.Search')}}..."/>
                            </div>
                        <hr>
                        <div style="overflow: auto;">
                            <div class="col-md-12" id="modal_tree"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="users_apply">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('end_script')
    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css">
    <link rel="stylesheet" href="css/daterangepicker.min.css">
    <link rel="stylesheet" href="css/plyr.min.css">
    <script src="js/lib/bootstrap-treeview.min.js"></script>

    <script src="js/lib/daterangepicker.min.js"></script>
    <script src="js/lib/jstree.min.js"></script>
    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/lib/sortable.min.js"></script>
    <script src="js/lib/plyr.polyfilled.min.js"></script>
    {{--<script src="js/lib/plyr.min.js"></script>--}}
    <script src="js/realtime.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/pipelining.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/fis.min.js?v={{Config::get('app.version')}}"></script>
@stop