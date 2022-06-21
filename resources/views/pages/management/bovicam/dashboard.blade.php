<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">
                {{trans('bovicam.System_Status')}}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.CPU_Utilization')}}:</label>
                    <div id="cam_cpu" class="device-status-field">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Memory_Utilization')}}:</label>
                    <div id="cam_mem" class="device-status-field">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Disk_Utilization')}}:</label>
                    <div id="cam_disk" class="device-status-field">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.SD_Card_Utilization')}}:</label>
                    <div id="cam_sdcard" class="device-status-field">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.USB_Disk_Utilization')}}:</label>
                    <div id="cam_usbdisk" class="device-status-field">
                        <i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Time_Zone')}}:</label>
                    <div id="cam_timezone" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.System_Time')}}:</label>
                    <div id="cam_date" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.upTime')}}:</label>
                    <div id="cam_uptime" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.voltage')}}:</label>
                    <div id="cam_voltage" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.temperature')}}:</label>
                    <div id="cam_temperature" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">
                {{trans('bovicam.Network_Status')}}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.AP_SSID')}}:</label>
                    <div id="cam_ap_ssid" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.AP_IP')}}:</label>
                    <div id="cam_ap_ip" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Wired_IP')}}:</label>
                    <div id="cam_wired_ip" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Wifi_IP')}}:</label>
                    <div id="cam_wifi_ip" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.LTE_IP')}}:</label>
                    <div id="cam_lte_ip" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.VPN_IP')}}:</label>
                    <div id="cam_vpn_ip" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.GPS')}}:</label>
                    <div id="cam_gps_ip" class="device-status-field" style="margin-bottom: -12px;"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.transmit')}}:</label>
                    <div id="cam_transmit" class="device-status-field" style="margin-bottom: -12px;"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.receive')}}:</label>
                    <div id="cam_receive" class="device-status-field" style="margin-bottom: -12px;"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">
                {{trans('bovicam.Device_Status')}}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Channel_I')}}:</label>
                    <div id="cam_channel1_dev" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Channel_II')}}:</label>
                    <div id="cam_channel2_dev" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.GPS_Module')}}:</label>
                    <div id="cam_gps_dev" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.AP_Module')}}:</label>
                    <div id="cam_ap_dev" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Wifi_Module')}}:</label>
                    <div id="cam_wifi_dev" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.LTE_Module')}}:</label>
                    <div id="cam_lte_dev" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">
                {{trans('bovicam.Service_Status')}}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Live_Streaming')}}:</label>
                    <div class="row" style="padding-top: 0px; margin-bottom: -15px;">
                        <div class="col-md-2">
                            <p id="cam_live_channel1" class="device-status-field">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p id="cam_live_channel2" class="device-status-field">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Publishing')}}:</label>
                    <div class="row" style="padding-top: 0px; margin-bottom: -15px;">
                        <div class="col-md-2">
                            <p id="cam_publishing_channel1" class="device-status-field">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p id="cam_publishing_channel2" class="device-status-field">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.Recording')}}:</label>
                    <div class="row" style="padding-top: 0px; margin-bottom: -15px;">
                        <div class="col-md-2">
                            <p id="cam_recording_channel1" class="device-status-field">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p id="cam_recording_channel2" class="device-status-field">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.RTMP')}}:</label>
                    <div id="cam_rtmp" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.NTP')}}:</label>
                    <div id="cam_ntp" class="device-status-field"><i class="fas fa-circle-notch fa-spin"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>