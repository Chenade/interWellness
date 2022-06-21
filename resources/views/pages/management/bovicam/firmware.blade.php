<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#camSet_firmware">{{trans('bovicam.firmware')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#camSet_firmware_changelog">{{trans('bovicam.changelog')}}</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="camSet_firmware">
                <div class="form-group">
                    <label class="form-control-label">{{trans('bovicam.product')}}:</label>
                    <input type="text" class="form-control" id="camSet_firmware_product" readonly/>
                </div>
                <div class="form-group">
                    <label class="form-control-label">{{trans('bovicam.model')}}:</label>
                    <input type="text" class="form-control" id="camSet_firmware_model" readonly/>
                </div>
                <div class="form-group">
                    <label class="form-control-label">{{trans('bovicam.version')}}:</label>
                    <input type="text" class="form-control" id="camSet_firmware_version" readonly/>
                </div>
                <div class="form-group">
                    <label class="form-control-label">{{trans('bovicam.kernel')}}:</label>
                    <input type="text" class="form-control" id="camSet_firmware_kernel" readonly/>
                </div>
                <div class="form-group" style="display: none">
                    <label class="form-control-label">{{trans('bovicam.release')}}:</label>
                    <input type="text" class="form-control" id="camSet_firmware_date" readonly/>
                </div>
                <div class="form-group">
                    <label class="form-control-label">{{trans('bovicam.modules')}}:</label>
                    <div class="panel-group" id="camSet_firmware_modules">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#camSet_firmware_modules" href="#camSet_firmware_modules1">click me <i class="fa fa-hand-o-left"></i></a>
                                </h4>
                            </div>
                            <div id="camSet_firmware_modules1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-horizontal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label class="form-control-label">{{trans('bovicam.progress')}}:</label>--}}
{{--                    <div class="progress">--}}
{{--                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <p class="pd-best">Inactive</p>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <button type="button" class="btn btn-danger" id="camSet_firmware_check_apply"--}}
{{--                            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">--}}
{{--                        {{trans('bovicam.checkUpdate')}}--}}
{{--                    </button>--}}
{{--                </div>--}}
            </div>
            <div class="tab-pane" id="camSet_firmware_changelog">
                <textarea rows="30" class="form-control" style="font-family: monospace;height: 100%;width: 100%" readonly></textarea>
            </div>
        </div>
    </div>
</div>