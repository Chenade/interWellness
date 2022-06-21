<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header font-weight-bold">
                BoviCast
            </div>
            <div class="card-body">
                <form onsubmit='return false;'>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.username')}}:</label>
                        <input type="text" id="appSet_bovicast_username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.cameraIndex')}}:</label>
                        <select id="appSet_bovicast_camera" class="selectpicker show-tick form-control">
                            <option value="0">Front</option>
                            <option value="1">Back</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.flip')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="appSet_bovicast_flip">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.mirror')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="appSet_bovicast_mirror">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.mute')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="appSet_bovicast_mute">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.recordAuto')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="appSet_bovicast_record_enable">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{trans('bovicam.publishAuto')}}:</label>
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" class="overflow-control-input" id="appSet_bovicast_publish_enable">
                            <span class="overflow-control-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="appSet_bovicast_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                            {{trans('dictionary.Apply')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>