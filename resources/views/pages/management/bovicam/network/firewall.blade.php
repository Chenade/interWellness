<div class="row">
    <div class="col">
        <div class="form-group">
            <label class="form-control-label">{{trans('bovicam.enabled')}}:</label>
            <label class="custom-control overflow-checkbox">
                <input type="checkbox" class="overflow-control-input" id="camSet_network_fw_enabled">
                <span class="overflow-control-indicator"></span>
            </label>
        </div>
        <hr>
        <table id="camSet_network_fw_iptable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>{{trans('bovicam.define')}}</th>
                <th>{{trans('bovicam.name')}}</th>
                <th>{{trans('bovicam.protocol')}}</th>
                <th>{{trans('bovicam.port')}}</th>
                <th>{{trans('dictionary.Edit')}}</th>
                <th>{{trans('dictionary.Delete')}}</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="camSet_network_fw_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('dictionary.Edit')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="col-form-label">{{trans('bovicam.name')}}:</label>
                            <input type="text" class="form-control" id="camSet_network_fw_edit_name">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">{{trans('bovicam.protocol')}}:</label>
                            <select class="selectpicker show-tick form-control" id="camSet_network_fw_edit_protocol">
                                <option value="all" selected="selected">TCP + UDP</option>
                                <option value="tcp">TCP</option>
                                <option value="udp">UDP</option>
                                <option value="icmp">ICMP</option>
                            </select>
                        </div>
                        <div id="camSet_network_fw_edit_port_row" class="form-group">
                            <label class="col-form-label">{{trans('bovicam.port')}}:</label>
                            <input type="text" class="form-control numeric" id="camSet_network_fw_edit_port">
                            <label class="text-info">* Port Range (e.g. 10200:10300)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="camSet_network_fw_edit_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                <button type="button" class="btn btn-secondary" id="camSet_network_fw_edit_cancel" data-dismiss="modal">{{trans('dictionary.Cancel')}}</button>
            </div>
        </div>
    </div>
</div>