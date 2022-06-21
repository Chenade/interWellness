<div class="row form-group">
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">
                {{trans('bovicam.wired')}}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="col-form-label">{{trans('bovicam.dhcp')}}:</label>
                    <select id="camSet_netConn_wired_dhcp" class="selectpicker show-tick form-control">
                        <option>Auto</option>
                        <option>Manual</option>
                    </select>
                </div>
                <div id="camSet_netConn_wired_static" style="display: none">
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.address')}}:</label>
                        <input type="text" class="form-control is-invalid" id="camSet_netConn_wired_ip" maxlength="15" placeholder="192.168.1.101">
                        <div class="valid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.mask')}}:</label>
                        <input type="text" class="form-control is-invalid" id="camSet_netConn_wired_mask" maxlength="15" placeholder="255.255.255.0">
                        <div class="valid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.gateway')}}:</label>
                        <input type="text" class="form-control is-invalid" id="camSet_netConn_wired_gateway" maxlength="15" placeholder="192.168.1.1">
                        <div class="valid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.dns')}}:</label>
                        <input type="text" class="form-control is-invalid" id="camSet_netConn_wired_dns" maxlength="15" placeholder="168.95.1.1">
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="camSet_netConn_wired_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                        {{trans('dictionary.Apply')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row form-group">
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">{{trans('bovicam.wifi')}}</div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#camSet_netConn_client">Client</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#camSet_netConn_ap">AP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#camSet_netConn_sw">{{trans('bovicam.modeSwitch')}}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="camSet_netConn_client">
                        <div id="wifi_ssid_row" class="form-group">
                            <label class="form-control-label">{{trans('bovicam.accessPoint')}}:</label>
                            <input type="text" class="form-control" id="camSet_netConn_wifi_ssid_hidden" style="display: none">
                            <div class="input-group">
                                <select id="camSet_netConn_wifi_ssid" class="selectpicker show-tick form-control" data-live-search="true" data-size="5">
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-info" id="camSet_netConn_wifi_scan" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-wifi"> {{trans('bovicam.scan')}}</i>
                                    </button>
                                </div>
                            </div>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="camSet_netConn_wifi_hidden">
                                <span class="overflow-control-indicator"></span>
                                Manual ({{trans('bovicam.hidden')}} SSID)
                            </label>
                        </div>
                        <div class="form-group" style="display: none">
                            <label class="form-control-label">{{trans('bovicam.encryption')}}:</label>
                            <select class="selectpicker form-control" id="camSet_netConn_wifi_encryption">
                                <option value="WPA-PSK">WPA / WPA2-PSK</option>
                                <option value="NONE">Open</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{trans('account.password')}}:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="camSet_netConn_wifi_passwd" autocomplete="new-password" aria-autocomplete="none">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary edit-password-view">
                                        <i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{trans('bovicam.dhcp')}}:</label>
                            <select id="camSet_netConn_wifi_dhcp" class="selectpicker show-tick form-control">
                                <option>Auto</option>
                                <option>Manual</option>
                            </select>
                        </div>
                        <div id="camSet_netConn_wifi_static" style="display: none">
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.address')}}:</label>
                                <input type="text" class="form-control is-invalid" id="camSet_netConn_wifi_ip" maxlength="15" placeholder="192.168.1.101">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.mask')}}:</label>
                                <input type="text" class="form-control is-invalid" id="camSet_netConn_wifi_mask" maxlength="15" placeholder="255.255.255.0">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.gateway')}}:</label>
                                <input type="text" class="form-control is-invalid" id="camSet_netConn_wifi_gateway" maxlength="15" placeholder="192.168.1.1">
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.dns')}}:</label>
                                <input type="text" class="form-control is-invalid" id="camSet_netConn_wifi_dns" maxlength="15" placeholder="168.95.1.1">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="camSet_netConn_wifi_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                {{trans('dictionary.Apply')}}
                            </button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="camSet_netConn_ap">
                        <div class="form-group">
                            <label class="form-control-label">{{trans('bovicam.enabled')}}:</label>
                            <label class="custom-control overflow-checkbox">
                                <input type="checkbox" class="overflow-control-input" id="camSet_netConn_ap_enabled">
                                <span class="overflow-control-indicator"></span>
                            </label>
                        </div>
                        <div id="ap_group">
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.address')}}:</label>
                                <input type="text" class="form-control" value="192.168.120.1" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">SSID:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="camSet_netConn_ap_ssid">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="camSet_netConn_ap_default" type="button">
                                            Default
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.hidden')}} SSID:</label>
                                <label class="custom-control overflow-checkbox">
                                    <input type="checkbox" class="overflow-control-input" id="camSet_netConn_ap_hidden">
                                    <span class="overflow-control-indicator"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.encryption')}}:</label>
                                <select class="selectpicker form-control show-tick">
                                    <option>WPA2-PSK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{trans('bovicam.password')}}:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="camSet_netConn_ap_password" autocomplete="new-password" aria-autocomplete="none" placeholder="(unchanged)">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary edit-password-view">
                                            <i class="fas fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="camSet_netConn_ap_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="camSet_netConn_sw">
                        <div class="form-group">
                            <label class="form-control-label">Mode:</label>
                            <select class="selectpicker show-tick form-control" id="camSet_netConn_sw_mode">
                                <option>Client</option>
                                <option>AP</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="camSet_netConn_sw_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                {{trans('dictionary.Apply')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row form-group">
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">{{trans('bovicam.lte')}}</div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-control-label">APN:</label>
                    <input type="text" class="form-control" id="camSet_netConn_lte_apn" placeholder="internet">
                </div>
                <div class="form-group">
                    <label class="form-control-label">{{trans('bovicam.username')}}:</label>
                    <input type="text" class="form-control" id="camSet_netConn_lte_username" placeholder="any">
                </div>
                <div class="form-group">
                    <label class="form-control-label">{{trans('bovicam.password')}}:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="camSet_netConn_lte_password" autocomplete="new-password" aria-autocomplete="none" placeholder="(unchanged)">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary edit-password-view">
                                <i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="camSet_netConn_lte_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                        {{trans('dictionary.Apply')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
