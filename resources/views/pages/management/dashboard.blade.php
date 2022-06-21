@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Dashboard')])
@section('content')
    <div class="col">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#servers_tab">{{trans('server.server')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#streaming_tab">{{trans('server.streaming')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#loading_tab">{{trans('server.loading')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#online_tab">{{trans('server.connections')}}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="servers_tab">
                <div class="overflow-auto">
                    <div id="grid_tree" class="tree"></div>
                </div>
            </div>
            <div class="tab-pane" id="streaming_tab">
                <div class="form-group streaming-container-group">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-success" id="streaming_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('dictionary.Search')}}</button>
                            @if( env('CUSTOMIZE') != 'npa')
                                <button type="button" class="btn btn-warning" id="license_revert" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-redo"></i> {{trans('dictionary.Reset')}}</button>
                                <button type="button" class="btn btn-primary" id="license_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-edit"></i> {{trans('dictionary.Edit')}}</button>
                            @endif
                        </span>
                        <label class="col-form-label">&emsp;{{trans('server.banTime')}}:&emsp;</label>
                        <select class="selectpicker" id="suspend">
                            <option value="5" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">&emsp;5</option>
                            <option value="10" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">
                                &emsp;10
                            </option>
                            <option value="30" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">
                                &emsp;30
                            </option>
                            <option value="60" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">
                                &emsp;60
                            </option>
                        </select>
                    </form>
                    <div class="overflow-auto">
                        <div id="streaming_tree" class="tree"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="loading_tab">
                <div class="form-group streaming-container-group">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-success" id="loading_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('dictionary.Search')}}</button>
                        </span>
                        <label class="col-form-label">&emsp;{{trans('server.banTime')}}:&emsp;</label>
                        <select class="selectpicker" id="suspend2">
                            <option value="5" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">&emsp;5</option>
                            <option value="10" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">
                                &emsp;10
                            </option>
                            <option value="30" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">
                                &emsp;30
                            </option>
                            <option value="60" data-icon="fas fa-unlink" data-subtext="{{trans('server.minute')}}">
                                &emsp;60
                            </option>
                        </select>
                    </form>
                    <div class="overflow-auto">
                        <div id="loading_tree" class="tree"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="online_tab">
                <div class="form-group online-container-group">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <select class="selectpicker" id="online_display">
                            <option value="online_all" selected>{{trans('server.deviceAll')}}</option>
                            <option value="online_only">{{trans('server.deviceOnline')}}</option>
                        </select>
                        <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-success" id="online_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('dictionary.Search')}}</button>
                        </span>
                    </form>
                    <div class="overflow-auto connection" id="online_all">
                        <div id="online_tree" class="tree"></div>
                    </div>
                    <div class="overflow-auto connection" id="online_only" style="display: none">
                        <div id="online_only_tree" class="tree"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="server_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('server.keepSpace')}}:</label>
                                <select class="form-control selectpicker show-tick" data-show-subtext="true" id="keepSpace">
                                    <option data-subtext="GB">10</option>
                                    <option data-subtext="GB">20</option>
                                    <option data-subtext="GB">50</option>
                                    <option data-subtext="GB">100</option>
                                    <option data-subtext="GB">200</option>
                                    <option data-subtext="GB">500</option>
                                    <option data-subtext="GB">1000</option>
                                    <option data-subtext="GB">1500</option>
                                    <option data-subtext="GB">3000</option>
                                    <option data-subtext="GB">5000</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <div class="d-flex">
                                    <div>
                                        <div class="col-form-label" style="font-size: 1.25rem;">Server:</div>
                                    </div>
                                    <div class="ml-auto" style="margin-top: 12px">
                                        <label class="custom-control overflow-checkbox">
                                            <input type="checkbox" class="overflow-control-input" id="enabled">
                                            <span class="overflow-control-indicator"></span>
                                            <span class="material-control-description text-primary">{{trans('server.enabled')}}&emsp;</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{trans('server.domain')}}</span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="domain">
                                </div>
                                <div style="padding-top: 5px"></div>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{trans('server.externalIp')}}</span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="externalIp">
                                </div>
                            </div>
                            <div id="service_group"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="server_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('server.apply')}}</button>
                    <button type="button" class="btn btn-warning" id="server_reset" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('server.revert')}}</button>
                    <button type="button" class="btn btn-danger" id="server_restart" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('server.restart')}}</button>
                    <button type="button" class="btn btn-secondary" id="server_close" data-dismiss="modal" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('server.close')}}</button>
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
                        <div class="col-6">
                            <img src="" style="width: 100%; border-radius: 4px">
                        </div>
                        <div class="col-6">
                            <table class="table table-hover">
                                <tbody id="video_info">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('server.close')}}</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('end_script')
    <link rel="stylesheet" href="css/proton/style.min.css?v={{Config::get('app.version')}}">

    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstree-grid.js"></script>
    <script src="js/dashboard.min.js?v={{Config::get('app.version')}}"></script>
@stop
