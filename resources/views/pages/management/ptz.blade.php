@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Pan_Tilt_Zoom')])
@section('content')
    <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <symbol id="arrow-up-left" viewBox="0 0 32 32">
                <path d="M27.414 24.586l-16.586-16.586h7.172c1.105 0 2-0.895 2-2s-0.895-2-2-2h-12c-0.809 0-1.538 0.487-1.848 1.235-0.103 0.248-0.151 0.508-0.151 0.765h-0.001v12c0 1.105 0.895 2 2 2s2-0.895 2-2v-7.172l16.586 16.586c0.39 0.391 0.902 0.586 1.414 0.586s1.024-0.195 1.414-0.586c0.781-0.781 0.781-2.047 0-2.828z"></path>
            </symbol>
            <symbol id="arrow-up" viewBox="0 0 32 32">
                <path d="M27.414 12.586l-10-10c-0.781-0.781-2.047-0.781-2.828 0l-10 10c-0.781 0.781-0.781 2.047 0 2.828s2.047 0.781 2.828 0l6.586-6.586v19.172c0 1.105 0.895 2 2 2s2-0.895 2-2v-19.172l6.586 6.586c0.39 0.39 0.902 0.586 1.414 0.586s1.024-0.195 1.414-0.586c0.781-0.781 0.781-2.047 0-2.828z"></path>
            </symbol>
            <symbol id="arrow-up-right" viewBox="0 0 32 32">
                <path d="M7.414 27.414l16.586-16.586v7.172c0 1.105 0.895 2 2 2s2-0.895 2-2v-12c0-0.809-0.487-1.538-1.235-1.848-0.248-0.103-0.508-0.151-0.765-0.151v-0.001h-12c-1.105 0-2 0.895-2 2s0.895 2 2 2h7.172l-16.586 16.586c-0.391 0.39-0.586 0.902-0.586 1.414s0.195 1.024 0.586 1.414c0.781 0.781 2.047 0.781 2.828 0z"></path>
            </symbol>
            <symbol id="arrow-right" viewBox="0 0 32 32">
                <path d="M19.414 27.414l10-10c0.781-0.781 0.781-2.047 0-2.828l-10-10c-0.781-0.781-2.047-0.781-2.828 0s-0.781 2.047 0 2.828l6.586 6.586h-19.172c-1.105 0-2 0.895-2 2s0.895 2 2 2h19.172l-6.586 6.586c-0.39 0.39-0.586 0.902-0.586 1.414s0.195 1.024 0.586 1.414c0.781 0.781 2.047 0.781 2.828 0z"></path>
            </symbol>
            <symbol id="arrow-down-right" viewBox="0 0 32 32">
                <path d="M4.586 7.414l16.586 16.586h-7.171c-1.105 0-2 0.895-2 2s0.895 2 2 2h12c0.809 0 1.538-0.487 1.848-1.235 0.103-0.248 0.151-0.508 0.151-0.765h0.001v-12c0-1.105-0.895-2-2-2s-2 0.895-2 2v7.172l-16.586-16.586c-0.391-0.391-0.902-0.586-1.414-0.586s-1.024 0.195-1.414 0.586c-0.781 0.781-0.781 2.047 0 2.828z"></path>
            </symbol>
            <symbol id="arrow-down" viewBox="0 0 32 32">
                <path d="M27.414 19.414l-10 10c-0.781 0.781-2.047 0.781-2.828 0l-10-10c-0.781-0.781-0.781-2.047 0-2.828s2.047-0.781 2.828 0l6.586 6.586v-19.172c0-1.105 0.895-2 2-2s2 0.895 2 2v19.172l6.586-6.586c0.39-0.39 0.902-0.586 1.414-0.586s1.024 0.195 1.414 0.586c0.781 0.781 0.781 2.047 0 2.828z"></path>
            </symbol>
            <symbol id="arrow-down-left" viewBox="0 0 32 32">
                <path d="M24.586 4.586l-16.586 16.586v-7.172c0-1.105-0.895-2-2-2s-2 0.895-2 2v12c0 0.809 0.487 1.538 1.235 1.848 0.248 0.103 0.508 0.151 0.765 0.151v0.001l12-0c1.105 0 2-0.895 2-2s-0.895-2-2-2h-7.172l16.586-16.586c0.39-0.391 0.586-0.902 0.586-1.414s-0.195-1.024-0.586-1.414c-0.781-0.781-2.047-0.781-2.828 0v0z"></path>
            </symbol>
            <symbol id="arrow-left" viewBox="0 0 32 32">
                <path d="M12.586 27.414l-10-10c-0.781-0.781-0.781-2.047 0-2.828l10-10c0.781-0.781 2.047-0.781 2.828 0s0.781 2.047 0 2.828l-6.586 6.586h19.172c1.105 0 2 0.895 2 2s-0.895 2-2 2h-19.172l6.586 6.586c0.39 0.39 0.586 0.902 0.586 1.414s-0.195 1.024-0.586 1.414c-0.781 0.781-2.047 0.781-2.828 0z"></path>
            </symbol>
        </defs>
    </svg>
    <div class="row">
        <div class="col-3">
            <div class="overflow-auto">
                <div class="tree" id="ptz_tree"></div>
            </div>
        </div>
        <div class="col-9">
            <table class="table no-border" style="width: 1030px;">
                <tr class="new-ptz">
                    <td colspan="3">
                        <div class="input-group" id="configurations">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-circle" style="color: red"></i>
                                </span>
                                <span class="input-group-text">
                                    <i class="fas fa-save">&nbsp;1</i>
                                </span>
                            </div>
                            <input type="text" class="form-control" maxlength="32">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" id="save_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    {{trans('dictionary.Save')}}
                                </button>
                                <button type="button" class="btn btn-light" data-toggle="dropdown" id="dropdown-menu" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    <i class="fas fa-caret-down"></i></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="640" height="360" rowspan="2">
                        <video id="player" poster="/img/default.jpg" controls crossorigin autoplay></video>
                        <div class="old-ptz col-12" style="display: none">
                            <figure id="nespad">
                                <div class="cord"></div>
                                <section class="dpad-pane">
                                    <div class="dpad-hole"></div>
                                    <div id="dpad">
                                        <canvas height="150" id="dpad-body" width="150"></canvas>
                                        <button class="button old-ptz" id="up"></button>
                                        <button class="button old-ptz" id="right"></button>
                                        <button class="button old-ptz" id="down"></button>
                                        <button class="button old-ptz" id="left"></button>
                                    </div>
                                </section>
                                <section class="menu-pane">
                                    <div class="labels">
                                        <label class="select old-ptz" for="select">Select</label>
                                        <label class="start old-ptz" for="start">Start</label>
                                    </div>
                                    <div class="buttons">
                                        <button class="button select old-ptz" id="select">Select</button>
                                        <button class="button start old-ptz" id="start">Start</button>
                                    </div>
                                </section>
                                <section class="action-pane">
                                    <div class="logo">
                                        BOV<i>I</i>A
                                    </div>
                                    <div class="buttons">
                                        <label class="label" style="padding-top: 18px;">Z-
                                            <button class="button old-ptz" id="out"></button>
                                        </label>
                                        <label class="label" style="padding-top: 18px;">Z+
                                            <button class="button old-ptz" id="in"></button>
                                        </label>
                                    </div>
                                </section>
                            </figure>
                            <br>
                            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                            <span style="color: #31708f;"><i class="glyphicon glyphicon-info-sign"></i>
                                    <label>Z+ :</label> {{trans('dictionary.Zoom_In')}}
                                &nbsp;
                                    <label>Z- :</label> {{trans('dictionary.Zoom_Out')}}
                                </span>
                            <br>
                        </div>
                    </td>
                </tr>
                <tr class="new-ptz">
                    <td colspan="2">
                        <div class="row">
                            <div class="col-6">
                                <label class="control-label">{{trans('dictionary.Arrow')}}:</label>
                                <div class="btn-group">
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-up-left">
                                                <use xlink:href="#arrow-up-left"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-left">
                                                <use xlink:href="#arrow-left"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-down-left">
                                                <use xlink:href="#arrow-down-left"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-up">
                                                <use xlink:href="#arrow-up"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px; font-size: 1.6em">
                                            <i class="fas fa-home"></i></button>
                                        </button>
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-down">
                                                <use xlink:href="#arrow-down"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-up-right">
                                                <use xlink:href="#arrow-up-right"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-right">
                                                <use xlink:href="#arrow-right"></use>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-light" style="width: 53px; height: 53px">
                                            <svg class="arrow-icon arrow-down-right">
                                                <use xlink:href="#arrow-down-right"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="control-label">{{trans('dictionary.Position')}}:</label>
                                <div id="box" class="form-control box" style="padding: 12px 12px;">
                                    <div id="dragx" class="drag"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 25px">
                            <div class="col-12">
                                <label class="control-label">{{trans('dictionary.Step')}}:</label>
                                <div id="step"></div>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 62px">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" id="ir_sw">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('dictionary.IR_Mode')}}&emsp;&emsp;</span>
                                    </label>
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" id="hs_sw">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('dictionary.HS_Mode')}}&emsp;&emsp;</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="new-ptz">
                    <td colspan="3" height="130">
                        <label class="control-label">{{trans('dictionary.Zoom')}}:</label>
                        <div id="zoom"></div>
                    </td>
                </tr>
                <tr class="new-ptz">
                    <td height="150" colspan="3">
                        <label class="control-label">{{trans('dictionary.Focus')}}:</label>
                        <div class="row">
                            <div class="col-11">
                                <div id="focus"></div>
                            </div>
                            <div class="col-1">
                                <label class="custom-control overflow-checkbox">
                                    <input type="checkbox" class="overflow-control-input" id="focus_auto">
                                    <span class="overflow-control-indicator"></span>
                                    <span class="material-control-description">{{trans('dictionary.Auto')}}&emsp;</span>
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
@section('end_script')
    <link rel="stylesheet" href="css/proton/style.min.css">
    <link rel="stylesheet" href="css/nes-gamepad.min.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <script src="js/lib/jquery-ui.min.js"></script>
    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstree-grid.js"></script>
    <script src="js/lib/nes-gamepad.min.js"></script>
    <script src="js/lib/nouislider.min.js"></script>
    <script src="js/mse.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/ptz.min.js?v={{Config::get('app.version')}}"></script>
@stop
