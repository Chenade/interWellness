
{{--                General--}}
<div class="title" data-target="general" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.FaceArk')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox general" data-scenario="{{ $scenario }}">
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.scenariosName')}}:</label>
            <input type="text" class="form-control" data-type="string" data-id="scenariosName" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.scenariosName')}}">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isScreenshotEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isScreenshotEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isHelpButtonEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isHelpButtonEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isLocationEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isLocationEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
</div>

{{--                Display--}}
<div class="title" data-target="display" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.display')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide display" data-scenario="{{ $scenario }}" >
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayCalendarEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayCalendarEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayWeatherEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayWeatherEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayPersonInfoSignEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayPersonInfoSignEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayBodyTemperatureEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayBodyTemperatureEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayThermalImageEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayThermalImageEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayMaxTempEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayMaxTempEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayForeheadAreaEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayForeheadAreaEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.displayNamePolicies')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="displayNamePolicies" data-scenario="{{ $scenario }}">
                <option value="0">{{trans('deviceConfig.displayFull')}}</option>
                <option value="1">{{trans('deviceConfig.displayNonId')}}</option>
                <option value="2">{{trans('deviceConfig.displayNone')}}</option>
            </select>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.displayIdPolicies')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="displayIdPolicies" data-scenario="{{ $scenario }}">
                <option value="0">{{trans('deviceConfig.displayFull')}}</option>
                <option value="1">{{trans('deviceConfig.displayNonId')}}</option>
                <option value="2">{{trans('deviceConfig.displayNone')}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayTemperatureMeasuringAreaEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayTemperatureMeasuringAreaEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isDisplayOsdEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isDisplayOsdEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.attendanceDisplayDuration')}}:</label>
            <input type="number" min="1" max="10" step="1" class="form-control" data-type="int" data-id="attendanceDisplayDuration" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.attendanceDisplayDuration')}}">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.attendanceDisplayAmount')}}:</label>
            <input type="number" min="1" max="100" step="1" class="form-control" data-type="int" data-id="attendanceDisplayAmount" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.attendanceDisplayAmount')}}">
        </div>
    </div>
</div>

{{--                Notification--}}
<div class="title" data-target="notification" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.notification')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide notification" data-scenario="{{ $scenario }}">
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isNotificationSoundsPassedSoundsEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isNotificationSoundsPassedSoundsEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.notificationSoundsAlertSoundsEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="notificationSoundsAlertSoundsEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.notificationSoundsAlertCycle')}}:</label>
            <input type="number" max="10" min="1" step="1" class="form-control" data-type="int" data-id="notificationSoundsAlertCycle" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.notificationSoundsAlertCycle')}}">
        </div>
    </div>
</div>

{{--                Body Temperature Measurement--}}
<div class="title" data-target="BodyTemperatureMeasurement" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.BodyTemperatureMeasurement')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide BodyTemperatureMeasurement" data-scenario="{{ $scenario }}" >
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isBodyTemperatureMeasurementEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isBodyTemperatureMeasurementEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementDegreeUnit')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="bodyTemperatureMeasurementDegreeUnit" data-scenario="{{ $scenario }}">
                <option value="0">°C</option>
                <option value="1">°F</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementFever')}}:</label>
            <input type="number" min="35" max="45" step="0.01" class="form-control temp" data-type="float" data-id="bodyTemperatureMeasurementFever" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.bodyTemperatureMeasurementMeasuringPeriod')}}">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementOperatingTemperatureRange')}}:</label>
            <div class="d-flex justify-content-around">
                <div><input type="number" min="20" max="55" step="0.01" class="form-control temp tempRange" data-type="float" data-id="bodyTemperatureMeasurementOperatingTemperatureRangeFrom" data-scenario="{{ $scenario }}"></div>
                <div>~</div>
                <div><input type="number" min="20" max="55" step="0.01" class="form-control temp tempRange" data-type="float" data-id="bodyTemperatureMeasurementOperatingTemperatureRangeTo" data-scenario="{{ $scenario }}"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementMeasuringPeriod')}}:</label>
            <input type="number" min="0" max="5" step="0.01" class="form-control" data-type="float" data-id="bodyTemperatureMeasurementMeasuringPeriod" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.bodyTemperatureMeasurementMeasuringPeriod')}}">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementForeheadAndRoiOverlapRatio')}}:</label>
            <input type="number" min="0" max="1" step="0.01" class="form-control" data-type="float" data-id="bodyTemperatureMeasurementForeheadAndRoiOverlapRatio" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.bodyTemperatureMeasurementForeheadAndRoiOverlapRatio')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementMinRoiOverlapRatio')}}:</label>
            <input type="number" min="0" max="1" step="0.01" class="form-control" data-type="float" data-id="bodyTemperatureMeasurementMinRoiOverlapRatio" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.bodyTemperatureMeasurementMinRoiOverlapRatio')}}">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isBodyTemperatureMeasurementAdjustTemperatureRoiEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isBodyTemperatureMeasurementAdjustTemperatureRoiEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementStabilizationTime')}}:</label>
            <input type="number" min="1" max="100" step="1" class="form-control" data-type="int" data-id="bodyTemperatureMeasurementStabilizationTime" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.bodyTemperatureMeasurementStabilizationTime')}}">
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.bodyTemperatureMeasurementCalculation')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="bodyTemperatureMeasurementCalculation" data-scenario="{{ $scenario }}">
                <option value="0">{{trans('deviceConfig.formula')}}&ensp;1</option>
                <option value="1">{{trans('deviceConfig.formula')}}&ensp;2</option>
            </select>
        </div>
    </div>
</div>

{{--                FaceID--}}
<div class="title" data-target="FaceID" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.FaceID')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide FaceID" data-scenario="{{ $scenario }}">
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isFaceIdStrangerEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isFaceIdStrangerEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isFaceIdFmdEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isFaceIdFmdEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.faceIdFmdConfidenceThreshold')}}:</label>
            <input type="number" min="0" max="1" step="0.01" class="form-control" data-type="float" data-id="faceIdFmdConfidenceThreshold" data-scenario="{{ $scenario }}" placeholder="{{trans('deviceConfig.faceIdFmdConfidenceThreshold')}}">
        </div>
    </div>
</div>

{{--                rfid--}}
<div class="title" data-target="rfid" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.rfid')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide rfid" data-scenario="{{ $scenario }}"data-scenario="{{ $scenario }}">
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isRfidEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isRfidEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.rfidAuthenticationType')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="rfidAuthenticationType" data-scenario="{{ $scenario }}">
                <option value="0">{{trans('deviceConfig.rfidOnly')}}</option>
                <option value="1">{{trans('deviceConfig.rfidAndFd')}}</option>
            </select>
        </div>
    </div>
</div>

{{--                accessControl--}}
<div class="title" data-target="accessControl" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.accessControl')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide accessControl" data-scenario="{{ $scenario }}">
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isAccessControlEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isAccessControlEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.accessControlType')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="accessControlType" data-scenario="{{ $scenario }}">
                <option value="0">TCP/IP</option>
                <option value="1">RS485</option>
                <option value="2">DI/DO</option>
            </select>
        </div>
    </div>
</div>

{{--                Streaming--}}
<div class="title" data-target="streaming" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.streaming')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide streaming" data-scenario="{{ $scenario }}">
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isStreamingEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isStreamingEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.streamingProfile')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="streamingProfile" data-scenario="{{ $scenario }}">
                <option value="1920x1080@30$10">1080p</option>
                <option value="1280x720@30$1">720p</option>
                <option value="640x480@30$1">480p</option>
                <option value="320x240@30$0.5">240p</option>
                <option value="176x144@30$0.2">144p</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isStreamingMuteEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isStreamingMuteEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
</div>

{{--                Recording--}}
<div class="title" data-target="recording" data-scenario="{{ $scenario }}"><div>{{trans('deviceConfig.recording')}}</div><div><i class="fas fa-chevron-down"></i></div></div>
<div class="slideBox slideHide recording" data-scenario="{{ $scenario }}">
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isRecordingEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isRecordingEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.recordingProfile')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="recordingProfile" data-scenario="{{ $scenario }}">
                <option value="1920x1080@30$10">1080p</option>
                <option value="1280x720@30$1">720p</option>
                <option value="640x480@30$1">480p</option>
                <option value="320x240@30$0.5">240p</option>
                <option value="176x144@30$0.2">144p</option>
            </select>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.recordingDuration')}}:</label>
            <select class="selectpicker form-control" data-type="string" data-id="recordingDuration" data-scenario="{{ $scenario }}">
                <option value="1">1&ensp;{{trans('dictionary.minute')}}</option>
                <option value="3">3&ensp;{{trans('dictionary.minute')}}</option>
                <option value="5">5&ensp;{{trans('dictionary.minute')}}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isRecordingCyclicRecordingEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isRecordingCyclicRecordingEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <div class="col-12 col-sm-6 form-group">
            <label class="col-form-label">{{trans('deviceConfig.isRecordingMuteEnabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" data-type="boolean" data-id="isRecordingMuteEnabled" data-scenario="{{ $scenario }}">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
    </div>
</div>

<button class="col-12 btn btn-danger reset" data-target="faceArk" data-scenario="{{ $scenario }}">{{trans('deviceConfig.resetDefault')}}</button>