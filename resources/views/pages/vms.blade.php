@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.VMS')])
@section('content')
    <div class="row">
        <div class="col">
            <div class="d-flex" style="padding: 10px; margin-top: -20px">
                <div class="p-1">
                    <label class="label-default">&ensp;{{trans('dictionary.Display')}}&ensp;</label>
                </div>
                <div class="p-1">
                    <select id="cells">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="p-1">
                    &ensp;x&ensp;
                </div>
                <div class="p-1">
                    <select id="rows">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="p-1">
                    &ensp;=&ensp;
                </div>
                <div class="p-1" id="nums">
                    1
                </div>
                <div class="ml-auto p-1">
                    <button type="button" class="btn btn-info btn-sm" id="selection">
                        <i class="fas fa-list"></i> {{trans('dictionary.Channel_Selection')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding:10px;margin-top: -20px">
        <div class="col">
            <div class="form-group vms-tab" id="vms-tab">
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
                                <div class="col-auto" style="padding-top: 5px">
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" id="hideOffline">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('dictionary.hideOffline')}}</span>
                                    </label>
                                </div>
                            </form>
                            <div class="overflow-auto" id="tree">
                                <div id="user_tree" class="tree"></div>
                            </div>
                            <div class="overflow-auto d-none" id="_tree">
                                <div id="hide_tree" class="tree"></div>
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
    <link rel="stylesheet" href="css/proton/style.min.css">
    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstreegrid.min.js"></script>
    <script src="js/mse.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/vms.min.js?v={{Config::get('app.version')}}"></script>
@stop
