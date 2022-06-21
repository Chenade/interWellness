@include('includes.language')
@extends('layouts.default', ['page_header' => trans('deviceConfig.deviceConfig')])
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-6 col-sm-4 overflow-auto " id="List">
                <div class="form-group">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <div id="conditions" class="input-group">
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_faceArk">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">FaceArk&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_BoviBox">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">BoviBox&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_BoviCast">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">BoviCast&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_BoviShow">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">BoviShow&emsp;</span>
                            </label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="condition_BoviSense">
                                <span class="overflow-control-indicator"></span>
                                <span class="material-control-description">BoviSense&emsp;</span>
                            </label>
                        </div>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search"></i> {{trans('dictionary.Search')}}</div>
                        </div>
                        <input type="text" class="form-control" id="device_keyword" placeholder="{{trans('dictionary.Keyword')}}">
                    </form>
                </div>
                <hr>
                <div class="" id="deviceList"></div>
            </div>
            <div class="col-6 col-sm-8" id="deviceConfig" style="overflow-y: auto; overflow-x: hidden">
                <div class="d-flex w-100">
                    <div><button class="btn btn-secondary btn-xs {{-- d-block d-lg-none --}}" style="padding: 6px 1px;" id="hideList"><i class="fas fa-angle-double-left"></i></button></div>
                    <div class="col-12" style="padding-left: 0!important;">
                        <ul class="nav nav-tabs" style="width: 100%">
                            <li class="nav-item" id="device_tab">
                                <a id="device_index" class="nav-link active" data-toggle="tab" href="#Device_content">{{trans('deviceConfig.deviceInfo')}}</a>
                            </li>
                            <li class="nav-item nav-type slideHide" id="status_tab">
                                <a id="device_index" class="nav-link" data-toggle="tab" href="#Status_content">{{trans('deviceConfig.deviceStatus')}}</a>
                            </li>
                            <li class="nav-item nav-type slideHide" id="FaceArk_tab">
                                <a class="nav-link" data-toggle="tab" href="#FaceArk_content">FaceArk</a>
                            </li>
                            <li class="nav-item nav-type slideHide" id="BoviBox_tab">
                                <a class="nav-link" data-toggle="tab" href="#BoviBox_content">BoviBox</a>
                            </li>
                            <li class="nav-item nav-type slideHide" id="BoviCast_tab">
                                <a class="nav-link" data-toggle="tab" href="#BoviCast_content">BoviCast</a>
                            </li>
                            <li class="nav-item nav-type slideHide" id="BoviShow_tab">
                                <a class="nav-link" data-toggle="tab" href="#BoviShow_content">BoviShow</a>
                            </li>
                            <li class="nav-item nav-type slideHide" id="BoviSense_tab">
                                <a class="nav-link" data-toggle="tab" href="#BoviSense_content">BoviSense</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="Device_content">
                                <div class="camSet_container">
                                    @include('pages.management.device.device')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Status_content">
                                <div class="camSet_container">
                                    @include('pages.management.device.status')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="FaceArk_content">
                                <div class="camSet_container">
                                    @include('pages.management.device.faceArk')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="BoviBox_content">
                                <div class="camSet_container">
                                    {{--                            @include('pages.management.device.BoviBox')--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="BoviCast_content">
                                <div class="camSet_container">
                                    {{--                            @include('pages.management.device.BoviCast')--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="BoviShow_content">
                                <div class="camSet_container" id="bovicam_group">
                                    {{--                            @include('pages.management.device.BoviShow')--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="BoviSense_content">
                                <div class="camSet_container">
                                    {{--                            @include('pages.management.device.BoviSense')--}}
                                </div>
                            </div>
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


    <script src="js/lib/jquery-ui.min.js"></script>
    <script src="js/lib/jquery.ui.touch-punch.min.js"></script>

    <script src="/lib/jstree/jstree.min.js"></script>

    <script src="js/lib/nouislider.min.js"></script>

    <script src="/lib/daterangepicker/daterangepicker.js"></script>

    <script src="/lib/DataTables/datatables.min.js"></script>

	<script src="js/deviceConfig-default.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/deviceConfig.min.js?v={{Config::get('app.version')}}"></script>
@stop
