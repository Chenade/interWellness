<div class="card">
    <div class="card-header d-flex flex-wrap align-items-center justify-content-start">
        <span style="font-size: 1.5em;">{{trans('deviceConfig.deviceStatus')}}</span>
    </div>
    <div class="card-body">
      <div class="d-flex flex-wrap">
          <div class="col-12 col-sm-6 form-group status" id="status_camera">
              <label class="col-form-label">{{trans('deviceConfig.camera')}}:</label>
              <div class="statusContent"><i class="fa fa-spinner fa-pulse fa-fw"></i></div>
          </div>
          <div class="col-12 col-sm-6 form-group status" id="status_nfc">
              <label class="col-form-label">{{trans('deviceConfig.nfc')}}:</label>
              <div class="statusContent"><i class="fa fa-spinner fa-pulse fa-fw"></i></div>
          </div>
          <div class="col-12 col-sm-6 form-group status" id="status_thermal">
              <label class="col-form-label">{{trans('deviceConfig.thermal')}}:</label>
              <div class="statusContent"><i class="fa fa-spinner fa-pulse fa-fw"></i></div>
          </div>
          <div class="col-12 col-sm-6 form-group status" id="status_websocket">
              <label class="col-form-label">{{trans('deviceConfig.websocket')}}:</label>
              <div class="statusContent"><i class="fa fa-spinner fa-pulse fa-fw"></i></div>
          </div>

      </div>
    </div>
</div>