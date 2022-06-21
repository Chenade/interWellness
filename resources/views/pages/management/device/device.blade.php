<div class="card">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
        <span style="font-size: 1.5em;">{{trans('deviceConfig.deviceInfo')}}</span>
        <button class="btn btn-success" id="deviceSave">{{trans('dictionary.Save')}}</button>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="col-form-label">{{trans('deviceConfig.deviceId')}}:</label>
            <input type="text" class="form-control" id="deviceId" placeholder="{{trans('deviceConfig.deviceId')}}" disabled>
        </div>
        <div class="form-group">
            <label class="col-form-label">{{trans('deviceConfig.deviceName')}}:</label>
            <input type="text" class="form-control" id="deviceName" placeholder="{{trans('deviceConfig.deviceName')}}">
        </div>
        <div class="form-group">
            <label class="col-form-label">{{trans('deviceConfig.deviceDescription')}}:</label>
            <input type="text" class="form-control" id="deviceDescription" placeholder="{{trans('deviceConfig.deviceDescription')}}">
        </div>
        <div class="form-group">
            <label class="col-form-label">{{trans('deviceConfig.supportedType')}}:</label>
            <div id="deviceType"></div>
        </div>
    </div>
</div>