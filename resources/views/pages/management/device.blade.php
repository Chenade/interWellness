@include('includes.language')
@extends('layouts.default', ['page_header' => trans('bovicam.devmgr')])
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                        <span class="input-group-append">
                        <button type="submit" class="btn btn-success" id="device_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('dictionary.Search')}}</button>
                    </span>
                    </form>
                    <div class="overflow-auto">
                        <div id="device_tree" class="tree"></div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#device_tab">{{trans('bovicam.Device_Status')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#system_tab">{{trans('bovicam.system')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#network_tab">{{trans('bovicam.network')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#streaming_tab">{{trans('bovicam.stream')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#firmware_tab">{{trans('bovicam.firmwareUpgrade')}}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active overflow-auto" id="device_tab">
                        @include('pages.management.bovicam.dashboard')
                    </div>
                    <div class="tab-pane fade overflow-auto" id="system_tab">
                        <div class="camSet_container">
                            @include('pages.management.bovicam.system')
                        </div>
                    </div>
                    <div class="tab-pane fade overflow-auto" id="network_tab">
                        <div class="camSet_container">
                            @include('pages.management.bovicam.network')
                        </div>
                    </div>
                    <div class="tab-pane fade overflow-auto" id="streaming_tab">
                        <div class="camSet_container" id="bovicam_group">
                            @include('pages.management.bovicam.stream')
                        </div>
                        <div class="appSet_container overflow-auto" id="app_group" style="display: none">
                            @include('pages.management.bovicam.app')
                        </div>
                    </div>
                    <div class="tab-pane fade overflow-auto" id="firmware_tab">
                        <div class="camSet_container">
                            @include('pages.management.bovicam.firmware')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('end_script')
    <link rel="stylesheet" href="css/proton/style.min.css">
    <link rel="stylesheet" href="css/nouislider.min.css">

    <link rel="stylesheet" href="/lib/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/lib/DataTables/datatables.min.css">

    <script src="/lib/jstree/jstree.min.js"></script>

    <script src="js/lib/nouislider.min.js"></script>

    <script src="/lib/daterangepicker/daterangepicker.js"></script>

    <script src="/lib/DataTables/datatables.min.js"></script>

    <script src="js/bovicam/dashboard.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/bovicam/system.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/bovicam/stream.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/bovicam/network.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/bovicam/device.min.js?v={{Config::get('app.version')}}"></script>
@stop
