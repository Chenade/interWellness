@include('includes.language')
@extends('layouts.default', ['page_header' => trans('logs.log')])
@section('content')
    <div class="col-auto">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#access_tab">{{trans('logs.accessLog')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#resource_tab">{{trans('logs.resourceLog')}}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="access_tab">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="access_level" class="col-form-label">{{trans('logs.logLevel')}}:</label>
                            <select class="form-control selectpicker show-tick" id="access_level" data-size="7" multiple>
                                <option value="0">{{trans('logs.levelBook_0')}}</option>
                                <option value="1">{{trans('logs.levelBook_1')}}</option>
                                <option value="2">{{trans('logs.levelBook_2')}}</option>
                                <option value="3" selected>{{trans('logs.levelBook_3')}}</option>
                                <option value="4">{{trans('logs.levelBook_4')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="access_user" class="col-form-label">{{trans('logs.id')}}:</label>
                            <select class="form-control selectpicker show-tick" id="access_user" data-size="7" multiple></select>
                        </div>
                        <div class="form-group">
                            <label for="access_target" class="col-form-label">{{trans('logs.target')}}:</label>
                            <select class="form-control selectpicker show-tick" id="access_target" data-size="7" multiple>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="access_action" class="col-form-label">{{trans('logs.action')}}:</label>
                            <select class="form-control selectpicker show-tick" id="access_action" data-size="7" multiple>
                                <option value="1">{{trans('logs.actionBook_1')}}</option>
                                <option value="2" selected>{{trans('logs.actionBook_2')}}</option>
                                <option data-divider="true"></option>
                                <option value="101">{{trans('logs.actionBook_101')}}</option>
                                <option value="102">{{trans('logs.actionBook_102')}}</option>
                                <option value="103">{{trans('logs.actionBook_103')}}</option>
                                <option value="104">{{trans('logs.actionBook_104')}}</option>
                                <option value="105">{{trans('logs.actionBook_105')}}</option>
                                <option value="106">{{trans('logs.actionBook_106')}}</option>
                                <option data-divider="true"></option>
                                <option value="201">{{trans('logs.actionBook_201')}}</option>
                                <option value="202">{{trans('logs.actionBook_202')}}</option>
                                <option value="203">{{trans('logs.actionBook_203')}}</option>
                                <option value="204">{{trans('logs.actionBook_204')}}</option>
                                <option value="205">{{trans('logs.actionBook_205')}}</option>
                                <option value="206">{{trans('logs.actionBook_206')}}</option>
                                <option value="207">{{trans('logs.actionBook_207')}}</option>
                                <option data-divider="true"></option>
                                <option value="301">{{trans('logs.actionBook_301')}}</option>
                                <option value="302">{{trans('logs.actionBook_302')}}</option>
                                <option value="303">{{trans('logs.actionBook_303')}}</option>
                                <option data-divider="true"></option>
                                <option value="401">{{trans('logs.actionBook_401')}}</option>
                                <option value="402">{{trans('logs.actionBook_402')}}</option>
                                <option value="403">{{trans('logs.actionBook_403')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="access_time" class="col-form-label">{{trans('dictionary.Task_Select_Time')}}
                                :</label>
                            <div class="date-range-picker" id="access_time">
                                <i class="fas fa-calendar-alt"></i>
                                <span></span> <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="access_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span> {{trans('dictionary.Processing')}}">
                                {{trans('dictionary.Search')}}
                            </button>
                        </div>


                        <hr>
                        <table id="access_log" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>{{trans('logs.logLevel')}}</th>
                                <th>{{trans('logs.id')}}</th>
                                <th>{{trans('logs.device')}}</th>
                                <th>{{trans('logs.target')}}</th>
                                <th>{{trans('logs.time')}}</th>
                                <th>{{trans('logs.action')}}</th>
                                <th>{{trans('logs.ip')}}</th>
                                <th>{{trans('logs.content')}}</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="resource_tab">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="resource_level" class="col-form-label">{{trans('logs.logLevel')}}:</label>
                            <select class="form-control selectpicker show-tick" id="resource_level" data-size="7" multiple>
                                <option value="0">{{trans('logs.levelBook_0')}}</option>
                                <option value="1">{{trans('logs.levelBook_1')}}</option>
                                <option value="2">{{trans('logs.levelBook_2')}}</option>
                                <option value="3">{{trans('logs.levelBook_3')}}</option>
                                <option value="4" selected>{{trans('logs.levelBook_4')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resource_user" class="col-form-label">{{trans('logs.id')}}:</label>
                            <select class="form-control selectpicker show-tick" id="resource_user" data-size="7" multiple></select>
                        </div>
                        <div class="form-group">
                            <label for="resource_target" class="col-form-label">{{trans('logs.target')}}:</label>
                            <select class="form-control selectpicker show-tick" id="resource_target" data-size="7" multiple>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resource_action" class="col-form-label">{{trans('logs.action')}}:</label>
                            <select class="form-control selectpicker show-tick" id="resource_action" data-size="7" multiple>
                                <option value="501" selected>{{trans('logs.actionBook_501')}}</option>
                                <option value="502">{{trans('logs.actionBook_502')}}</option>
                                <option data-divider="true"></option>
                                <option value="601">{{trans('logs.actionBook_601')}}</option>
                                <option value="602">{{trans('logs.actionBook_602')}}</option>
                                <option data-divider="true"></option>
                                <option value="701">{{trans('logs.actionBook_701')}}</option>
                                <option value="702">{{trans('logs.actionBook_702')}}</option>
                                <option data-divider="true"></option>
                                <option value="801">{{trans('logs.actionBook_801')}}</option>
                                <option value="802">{{trans('logs.actionBook_802')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resource_time" class="col-form-label">{{trans('dictionary.Task_Select_Time')}}
                                :</label>
                            <div class="date-range-picker" id="resource_time">
                                <i class="fas fa-calendar-alt"></i>
                                <span></span> <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="resource_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span> {{trans('dictionary.Processing')}}">
                                {{trans('dictionary.Search')}}
                            </button>
                        </div>
                        <hr>
                        <table id="resource_log" class="table table-striped table-bordered " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>{{trans('logs.logLevel')}}</th>
                                <th>{{trans('logs.id')}}</th>
                                <th>{{trans('logs.device')}}</th>
                                <th>{{trans('logs.target')}}</th>
                                <th>{{trans('logs.startTime')}}</th>
                                <th>{{trans('logs.endTime')}}</th>
                                <th>{{trans('logs.action')}}</th>
                                <th>{{trans('logs.ip')}}</th>
                                <th>{{trans('logs.content')}}</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="select_user_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('account.Select_Account')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="input-group" onsubmit="return false;">
                                <input type="text" class="form-control" placeholder="{{trans('dictionary.Search')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-success" id="user_search_btn" type="submit" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span> {{trans('dictionary.Processing')}}">
                                        <i class="fas fa-search"></i></button>
                                </div>
                            </form>
                            <div class="overflow-auto" style="padding-top: 5px;">
                                <div id="user_tree" class="tree"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="select_user_apply">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('end_script')
    <link rel="stylesheet" href="/lib/DataTables/datatables.min.css">
    <link rel="stylesheet" href="/lib/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="css/proton/style.min.css">

    <script src="/lib/daterangepicker/daterangepicker.js"></script>
    <script src="/lib/DataTables/datatables.min.js"></script>

    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstreegrid.min.js"></script>

    <script src="js/logs.min.js?v={{Config::get('app.version')}}"></script>
@stop