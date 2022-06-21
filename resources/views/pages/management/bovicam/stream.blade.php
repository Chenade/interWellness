<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#camSet_stream_general">{{trans('bovicam.generalSetting')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#camSet_stream_channels">{{trans('bovicam.chSetting')}}</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="camSet_stream_general">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header font-weight-bold">{{trans('bovicam.publishing')}}
                                <div class="float-sm-right" style="height: 20px; font-weight: normal">
                                    <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#camSet_stream_publish_modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-cog"></i>&nbsp;{{trans('bovicam.advanced')}}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('bovicam.version')}}:</label>
                                    <select id="camSet_stream_publishingVersion" class="selectpicker show-tick form-control">
                                        <option value="2">V1</option>
                                        <option value="5" selected>V2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('bovicam.address')}}:</label>
                                    <input type="text" id="camSet_stream_host" class="form-control form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('bovicam.port')}}:</label>
                                    <input type="number" id="camSet_stream_port" class="form-control  form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('bovicam.duration')}}:</label>
                                    <select id="camSet_stream_publishingDuration" class="selectpicker show-tick form-control">
                                        <option data-subtext="unlimited" value="0" selected>&infin;</option>
                                        <option data-subtext="minutes" value="5">5</option>
                                        <option data-subtext="minutes" value="10">10</option>
                                        <option data-subtext="minutes" value="15">15</option>
                                        <option data-subtext="minutes" value="30">30</option>
                                        <option data-subtext="minutes" value="60">60</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="camSet_stream_publish_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        {{trans('dictionary.Apply')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="camSet_stream_channels">
                <div class="row">
                    @for($i=1; $i<3; $i++)
                        @include('pages.management.bovicam.channel')
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="camSet_stream_publish_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Advanced Setting of BoviLive</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="col-form-label">Max Retry:</label>
                            <select id="camSet_stream_retryTimes" class="selectpicker show-tick form-control">
                                <option value="1" data-subtext="times">1</option>
                                <option value="3" data-subtext="times">3</option>
                                <option value="5" data-subtext="times">5</option>
                                <option value="10" data-subtext="times">10</option>
                                <option value="30" data-subtext="times">30</option>
                                <option value="-1">Unlimited</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Keep Alive Timer:</label>
                            <select id="camSet_stream_keepAliveInterval" class="selectpicker show-tick form-control">
                                <option data-subtext="minutes">1</option>
                                <option data-subtext="minutes">2</option>
                                <option data-subtext="minutes">3</option>
                                <option data-subtext="minutes">4</option>
                                <option data-subtext="minutes">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status Report Timer:</label>
                            <select id="camSet_stream_statusReportInterval" class="selectpicker show-tick form-control">
                                <option data-subtext="seconds">5</option>
                                <option data-subtext="seconds">10</option>
                                <option data-subtext="seconds">15</option>
                                <option data-subtext="seconds">30</option>
                                <option data-subtext="seconds">60</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="camSet_stream_publish_adv_apply"
                        data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                    Apply
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="camSet_stream_qos_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">QoS Parameter</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="overflow-auto">
                    <div class="form-group">
                        <label class="col-form-label">TCP select Timeout:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="camSet_stream_tcpSelectTimeout">
                            <div class="input-group-append">
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Send-fail Tolerance:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_sendFailTolerance" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">sec</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Up-level Duration:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_upDuration" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Down-level Duration:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_downDuration" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Drop-level Duration:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_dropDuration" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Up-level Threshold:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_upThreshold" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Down-level Threshold:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_downThreshold" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Drop-level Threshold:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_dropThreshold" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">QoS Mode:</label>
                        <select id="camSet_stream_dropFrameMode" class="selectpicker show-tick form-control">
                            <option value="0">Smooth</option>
                            <option value="1">Quality</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="camSet_stream_qos_adv_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                    Apply
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="camSet_stream_video_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Customized Video Profile</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <small class="text-info">capabilities may be different according to video source</small>
                <div class="form-group">
                    <label class="col-form-label">Resolution:</label>
                    <select id="camSet_stream_video_resolution" class="selectpicker show-tick form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Frame rate:</label>
                    <div id="camSet_stream_video_fps_row">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Bit rate:</label>
                    <div id="camSet_stream_video_bitrate_row">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="camSet_stream_video_preview_apply"
                        data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                    Apply
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="camSet_stream_osd_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Customized OSD Profile</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <small class="text-info">capabilities may be different according to video source</small>
                <div class="form-group">
                    <label class="col-form-label">Channel Name:</label>
                    <input type="text" id="camSet_stream_osd_ch_name" class="form-control" maxlength="8">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Display Bitrate:</label>
                    <label class="custom-control overflow-checkbox">
                        <input type="checkbox" class="overflow-control-input" id="camSet_stream_osd_bitrate_enb">
                        <span class="overflow-control-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Font Size:</label>
                    <select id="camSet_stream_osd_text_size" class="selectpicker show-tick form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Font Color:</label>
                    <select id="camSet_stream_osd_text_color" class="selectpicker show-tick form-control">
                    </select>
                </div>
                <div id="camSet_stream_osd_text_bg_row" class="form-group">
                    <label class="col-form-label">Font Outline Color:</label>
                    <select id="camSet_stream_osd_text_bg" class="selectpicker show-tick form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Font Preview:</label>
                    <h4 id="camSet_stream_osd_text_preview" style="letter-spacing: 1px;"></h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="camSet_stream_osd_preview_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                    Apply
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>