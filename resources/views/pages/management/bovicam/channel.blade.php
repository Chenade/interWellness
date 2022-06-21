<div class="col">
    <div class="card">
        <div class="card-header font-weight-bold">
            Channel {{ $i }}
            <div class="float-sm-right">
                <div class="input-group" style="height: 20px; font-weight: normal">
                    <label class="custom-control overflow-checkbox">
                        <input type="checkbox" class="overflow-control-input" id="camSet_stream_ch{{$i}}_enabled">
                        <span class="overflow-control-indicator"></span>
                        <span class="material-control-description">{{trans('dictionary.Enabled')}}&emsp;</span>
                    </label>
                    <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#camSet_stream_qos_modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-cog"></i> {{trans('bovicam.advanced')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#camSet_stream_ch{{ $i }}_video">{{trans('bovicam.video')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#camSet_stream_ch{{ $i }}_live">{{trans('bovicam.live')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#camSet_stream_ch{{ $i }}_record">{{trans('bovicam.recording')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#camSet_stream_ch{{ $i }}_publish">{{trans('bovicam.publishing')}}</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="camSet_stream_ch{{ $i }}_video">
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.source')}}:</label>
                        <div class="input-group">
                            <select id="camSet_stream_ch{{ $i }}_video_dev" class="selectpicker show-tick form-control">
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" id="camSet_stream_ch{{ $i }}_check_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.flip')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="camSet_stream_ch{{ $i }}_video_flip">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.mirror')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="camSet_stream_ch{{ $i }}_video_mirror">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                </div>
                <div class="tab-pane" id="camSet_stream_ch{{ $i }}_live">
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.videoProfile')}}:</label>
                        <div class="input-group">
                            <select id="camSet_stream_ch{{ $i }}_live_profile" class="selectpicker show-tick form-control">
                                <option data-subtext="abcd">test</option>
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" id="camSet_stream_ch{{ $i }}_live_video_customBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    <i class="fas fa-sliders-h"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.audioCodec')}}:</label>
                        <select id="camSet_stream_ch{{ $i }}_live_audio" class="selectpicker show-tick form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.osdProfile')}}:</label>
                        <div class="input-group">
                            <select id="camSet_stream_ch{{ $i }}_live_osd" class="selectpicker show-tick form-control">
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" id="camSet_stream_ch{{ $i }}_live_osd_customBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    <i class="fas fa-sliders-h"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.rtspPort')}}:</label>
                        <input type="number" id="camSet_stream_ch{{ $i }}_live_rtsp" class="form-control" maxlength="5">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.rtpPort')}}:</label>
                        <div class="input-group">
                            <input type="number" id="camSet_stream_ch{{ $i }}_live_rtp1" class="form-control" style="border-radius: 4px" maxlength="5">
                            <span class="input-group-addon" style="background-color: #FFF;border: 0px;">~</span>
                            <input type="number" id="camSet_stream_ch{{ $i }}_live_rtp2" class="form-control" style="border-radius: 4px" maxlength="5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.maxConn')}}:</label>
                        <select id="camSet_stream_ch{{ $i }}_live_conn" class="selectpicker show-tick form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                </div>
                <div class="tab-pane" id="camSet_stream_ch{{ $i }}_record">
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.videoProfile')}}:</label>
                        <div class="input-group">
                            <select id="camSet_stream_ch{{ $i }}_record_profile" class="selectpicker show-tick form-control">
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" id="camSet_stream_ch{{ $i }}_recording_video_customBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    <i class="fas fa-sliders-h"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.osdProfile')}}:</label>
                        <div class="input-group">
                            <select id="camSet_stream_ch{{ $i }}_record_osd" class="selectpicker show-tick form-control">
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" id="camSet_stream_ch{{ $i }}_recording_osd_customBtn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    <i class="fas fa-sliders-h"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.duration')}}:</label>
                        <select id="camSet_stream_ch{{ $i }}_record_dur" class="selectpicker show-tick form-control">
                            <option data-subtext="minutes" selected>5</option>
                            <option data-subtext="minutes">10</option>
                            <option data-subtext="minutes">15</option>
                            <option data-subtext="minutes">30</option>
                            <option data-subtext="minutes">60</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.mute')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="camSet_stream_ch{{ $i }}_record_audio">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.recordAuto')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="camSet_stream_ch{{ $i }}_record_enable">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                </div>
                <div class="tab-pane" id="camSet_stream_ch{{ $i }}_publish">
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.username')}}:</label>
                        <input type="text" id="camSet_stream_ch{{ $i }}_publish_user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.password')}}:</label>
                        <input type="password" id="camSet_stream_ch{{ $i }}_publish_passwd" class="form-control" placeholder="(unchanged)" autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.mute')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="camSet_stream_ch{{ $i }}_publish_audio">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.publishAuto')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="camSet_stream_ch{{ $i }}_publish_enable">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="camSet_stream_ch{{ $i }}_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                    {{trans('dictionary.Apply')}}
                </button>
            </div>
        </div>
    </div>
</div>