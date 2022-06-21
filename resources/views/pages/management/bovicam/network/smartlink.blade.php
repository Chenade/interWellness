<div class="row">
    <div class="col">
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.enabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" id="camSet_network_smartlink_enabled">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.checkSite')}}:</label>
            <select id="camSet_network_smartlink_target" class="selectpicker show-tick form-control">
                <option value="vpn">VPN Server</option>
                <option value="publishing">BoviCloud Server</option>
                <option value="custom">Manual</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.address')}}:</label>
            <input type="text" class="form-control" placeholder="www.google.com.tw" id="camSet_network_smartlink_ip">
        </div>
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.port')}}:</label>
            <input type="number" class="form-control" placeholder="80" id="camSet_network_smartlink_port">
        </div>
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.interval')}}:</label>
            <select class="selectpicker show-tick form-control" id="camSet_network_smartlink_interval">
                <option data-subtext="Seconds">15</option>
                <option data-subtext="Seconds">30</option>
                <option data-subtext="Seconds">60</option>
                <option data-subtext="Seconds">120</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.priority')}}:</label>
            <select class="selectpicker show-tick form-control" id="camSet_network_smartlink_priority">
                <option value="latency">{{trans('bovicam.autoPri')}}</option>
                <option value='["lte","wifi","wired"]'>LTE > Wi-Fi > Wired</option>
                <option value='["lte","wired","wifi"]'>LTE > Wired > Wi-Fi</option>
                <option value='["wifi","lte","wired"]'>Wi-Fi > LTE > Wired</option>
                <option value='["wifi","wired","lte"]'>Wi-Fi > Wired > LTE</option>
                <option value='["wired","lte","wifi"]'>Wired > LTE > Wi-Fi</option>
                <option value='["wired","wifi","lte"]'>Wired > Wi-Fi > LTE</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="camSet_network_smartlink_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                {{trans('dictionary.Apply')}}
            </button>
        </div>
    </div>
</div>