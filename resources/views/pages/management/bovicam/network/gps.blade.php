<div class="row">
    <div class="col">
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.enabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" id="camSet_network_gps_enabled">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div id="camSet_network_gps_group">
            <div class="form-group">
                <label class="form-control-label">{{trans('bovicam.baudRate')}}:</label>
                <select class="selectpicker form-control show-tick" id="camSet_network_gps_baudRate">
                    <option data-subtext="bps">4800</option>
                    <option data-subtext="bps">9600</option>
                    <option data-subtext="bps">19200</option>
                    <option data-subtext="bps">115200</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-control-label">{{trans('bovicam.fetchFreq')}}:</label>
                <select class="selectpicker form-control show-tick" id="camSet_network_gps_interval">
                    <option data-subtext="Seconds">3</option>
                    <option data-subtext="Seconds">5</option>
                    <option data-subtext="Seconds">10</option>
                    <option data-subtext="Seconds">15</option>
                    <option data-subtext="Seconds">30</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-control-label">{{trans('bovicam.preservation')}}:</label>
                <select class="selectpicker form-control show-tick" id="camSet_network_gps_preserveDay">
                    <option data-subtext="Days">3</option>
                    <option data-subtext="Days">7</option>
                    <option data-subtext="Days">14</option>
                    <option data-subtext="Days">30</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-control-label">{{trans('bovicam.mock')}}:</label>
                <label class="custom-control overflow-checkbox">
                    <input type="checkbox" class="overflow-control-input" id="camSet_network_gps_mock">
                    <span class="overflow-control-indicator"></span>
                </label>
            </div>
            <div class="form-group">
                <label class="form-control-label">{{trans('bovicam.reporter')}}:</label>
                <label class="custom-control overflow-checkbox">
                    <input type="checkbox" class="overflow-control-input" id="camSet_network_gps_reporting">
                    <span class="overflow-control-indicator"></span>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="camSet_network_gps_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                    {{trans('dictionary.Apply')}}
                </button>
            </div>
        </div>
    </div>
</div>