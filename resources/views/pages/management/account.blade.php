@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Account_Group_Management')])
@section('content')
    <div class="col">
        <div class="form-group">
            <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                <span class="input-group-append">
                    <button type="submit" class="btn btn-success" id="user_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('dictionary.Search')}}</button>
                    <button type="button" class="btn btn-primary insert" data-toggle="dropdown" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-plus"></i> {{trans('account.add')}}</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#add-user"><i class="fas fa-child">&nbsp;{{trans('account.addUser')}}</i></a>
                        <a class="dropdown-item" href="#add-group"><i class="fas fa-users">&nbsp;{{trans('account.addGroup')}}</i></a>
                    </div>
                    {{--<button type="button" class="btn btn-danger delete-node" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-trash"></i></button>--}}
                </span>
            </form>
            <div class="overflow-auto">
                <div id="user_tree" class="tree"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('dictionary.User_Info')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.id')}}:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <label class="custom-control overflow-checkbox" style="margin-bottom: 0px">
                                                <input type="checkbox" class="overflow-control-input" id="edit_enabled">
                                                <span class="overflow-control-indicator"></span>
                                                <span class="material-control-description">{{trans('account.enabled')}}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="edit_id" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.userName')}}:</label>
                                <input type="text" class="form-control" id="edit_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.videoTitle')}}:</label>
                                <input type="text" class="form-control" id="edit_videoTitle">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.parent')}}:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="edit_group" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary select-group-modal">
                                            <i class="fas fa-users"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                                <label class="col-form-label">{{trans('account.role')}} / {{trans('account.permission')}}:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="selectpicker show-tick form-control" data-size="5" id="edit_role" data-width="100">
                                            <option value="0">{{trans('account.manual')}}</option>
                                        </select>
                                    </div>
                                    <select class="selectpicker show-tick form-control" data-size="7" id="edit_permission" multiple  data-actions-box="true">
                                        <optgroup label="{{trans('account.general')}}">
                                            @if(session('user')['permission']['write'])
                                                <option value="write">{{trans('account.publishAble')}}</option>@endif
                                            @if(session('user')['permission']['self'])
                                                <option value="self">{{trans('account.viewSelf')}}</option>@endif
                                            @if(session('user')['permission']['read'])
                                                <option value="read">{{trans('account.viewAble')}}</option>@endif
                                            @if(session('user')['permission']['cross'])
                                                <option value="cross">{{trans('account.crossAble')}}</option>@endif
                                        </optgroup>
                                        <optgroup label="{{trans('account.manage')}}">
                                            @if(session('user')['permission']['account'])
                                                <option value="account">{{trans('account.accountAble')}}</option>@endif
                                            @if(session('user')['permission']['groupTask'])
                                                <option value="groupTask">{{trans('account.sharingAble')}}</option>@endif
                                            @if(session('user')['permission']['video'])
                                                <option value="video">{{trans('account.videoAble')}}</option>@endif
                                            {{--@if(session('user')['permission']['import'])--}}
                                            {{--<option value="import">{{trans('account.fisAble')}}</option>@endif--}}
                                            @if(session('user')['permission']['remote'])
                                                <option value="remote">{{trans('account.ptzAble')}}</option>@endif
                                            @if(session('user')['permission']['streaming'])
                                                <option value="streaming">{{trans('account.streamingAble')}}</option>@endif
                                            @if(session('user')['permission']['server'])
                                                <option value="server">{{trans('account.serverAble')}}</option>@endif
                                            @if(session('user')['permission']['license'])
                                                <option value="license">{{trans('account.licenseAble')}}</option>@endif
                                            @if(session('user')['permission']['device'])
                                                <option value="device">{{trans('account.DeviceAble')}}</option>@endif
                                            @if(session('user')['permission']['analyze'])
                                                <option value="analyze">{{trans('va.va')}}</option>@endif
                                            @if(session('user')['permission']['fr'])
                                                <option value="fr">{{trans('ai.fr')}}</option>@endif
                                            @if(session('user')['permission']['lpr'])
                                                <option value="lpr">{{trans('ai.lpr')}}</option>@endif
                                            @if(session('user')['permission']['or'])
                                                <option value="or">{{trans('ai.or')}}</option>@endif
{{--                                            @if(session('user')['permission']['mmr'])--}}
{{--                                                <option value="lpr">{{trans('mmr.mmr')}}</option>@endif--}}
                                        </optgroup>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.GPS_Lock')}}:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <label class="custom-control overflow-checkbox" style="margin-bottom: 0px">
                                                <input type="checkbox" class="overflow-control-input" id="edit_gpsLock">
                                                <span class="overflow-control-indicator"></span>
                                                <span class="material-control-description">{{trans('dictionary.Enabled')}}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="edit_gps">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" id="edit_map"><i class="fas fa-map-pin"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if( env('CUSTOMIZE') != 'npa')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.email')}}:</label>
                                    <input type="text" class="form-control" id="edit_email">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.phone')}}:</label>
                                    <input type="text" class="form-control" id="edit_phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.note')}}:</label>
                                    <input type="text" class="form-control" id="edit_note">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('dictionary.Service_Plan')}}:</label>
                                    <select class="selectpicker show-tick form-control" data-size="7" id="edit_keep">
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="0">0</option>
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="1">1</option>
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="3">3</option>
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="7">7</option>
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="14">14</option>
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="30">30</option>
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="60">60</option>
                                        <option data-subtext="{{trans('dictionary.Days')}}" value="90">90</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div id="passwordCreate">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.password')}}:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="edit_password" autocomplete="new-password" aria-autocomplete="none">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary edit-password-view">
                                                <i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.confirmPassword')}}:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="edit_password2" autocomplete="new-password" aria-autocomplete="none">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary edit-password-view">
                                                <i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="passwordRow">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.password')}}:</label>
                                    <div class="form-group">
                                        <button class="btn btn-info form-control" id="changePwd">{{trans('account.changePassword')}}</button>
                                    </div>
                                </div>
                            </div>
                            @if(config('services.2fa_enable'))
                                <div class="col" id="2faDisable">
                                    <div class="form-group">
                                        <label class="col-form-label">{{trans('account.2fa')}}:</label>
                                        <div class="form-group">
                                            <button class="btn btn-danger form-control" id="disable2fa"><i class="fas fa-ban"></i> {{trans('account.disable')}}</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(session('rent'))
                        <div class="row" id="user_license_row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-info" id="edit_userLicense" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-plus"> {{trans('dictionary.License_Info')}}</i>
                                    </button>
                                </div>
                                <div id="user_license_container"></div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="edit_userApply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning" id="edit_userReset" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-danger delete-node" id="edit_userDelete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" id="edit_userClose" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="password_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>{{trans('account.changePassword')}}</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
                        <div class="row col-12">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.password')}}:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" autocomplete="new-password" aria-autocomplete="none" placeholder="({{trans('dictionary.Unchanged')}})">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary edit-password-view">
                                                <i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.confirmPassword')}}:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password2" autocomplete="new-password" aria-autocomplete="none" placeholder="({{trans('dictionary.Unchanged')}})">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary edit-password-view">
                                                <i class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="password_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" id="password_cancel"  data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="permission_modal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('account.permission')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.id')}}:</label>
                                <input type="text" class="form-control" id="permission_id" disabled>
                            </div>
                            <hr style="margin-bottom: 0">
                            <div class="col-form-label text-secondary">{{trans('account.general')}}</div>
                            <div style="margin-left: 25px">
                                @if(session('user')['permission']['write'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_write">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.publishAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['self'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_self">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.viewSelf')}}
                                            &nbsp;&nbsp;</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['read'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_read">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.viewAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['cross'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_cross">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.crossAble')}}</span>
                                    </label>
                                @endif
                            </div>
                            <hr style="margin-bottom: 0">
                            <div class="col-form-label text-secondary">{{trans('account.manage')}}</div>
                            <div style="margin-left: 25px">
                                @if(session('user')['permission']['account'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_account">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.accountAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['groupTask'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_groupTask">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('dictionary.Channel_Sharing')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['video'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_video">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.videoAble')}}</span>
                                    </label>
                                @endif
                                {{--@if(session('user')['permission']['import'])--}}
                                {{--<label class="custom-control overflow-checkbox">--}}
                                {{--<input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_import">--}}
                                {{--<span class="overflow-control-indicator"></span>--}}
                                {{--<span class="material-control-description">{{trans('account.fisAble')}}</span>--}}
                                {{--</label>--}}
                                {{--@endif--}}
                                @if(session('user')['permission']['remote'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_remote">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.ptzAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['streaming'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_streaming">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.streamingAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['server'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_server">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.serverAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['license'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_license">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.licenseAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['device'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_device">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('account.DeviceAble')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['analyze'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_analyze">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('va.va')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['fr'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_fr">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('ai.fr')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['lpr'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_lpr">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('ai.lpr')}}</span>
                                    </label>
                                @endif
                                @if(session('user')['permission']['or'])
                                    <label class="custom-control overflow-checkbox">
                                        <input type="checkbox" class="overflow-control-input" name="permission[]" id="permission_or">
                                        <span class="overflow-control-indicator"></span>
                                        <span class="material-control-description">{{trans('ai.or')}}</span>
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="permission_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="map_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('account.map')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <input type="text" class="form-control" disabled>
                                <div class="input-group-append">
                                    <button class="btn btn-info get-client-position" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div id="map1"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="map_btn">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="select_group_modal" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('account.Select_Group')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="input-group" onsubmit="return false;">
                                <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-success" id="group_search_btn" type="submit" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-search"></i> {{trans('dictionary.Search')}}</button>
                                </div>
                            </form>
                            <div id="group_tree" class="tree"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="group_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('account.group')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.groupName')}}:</label>
                                <input type="text" class="form-control" id="edit_groupName">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.parent')}}:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="edit_groupParent" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary select-group-modal">
                                            <i class="fas fa-users"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session('rent'))
                        <div class="row" id="group_license_row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-info" id="edit_groupLicense" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-plus"> {{trans('dictionary.License_Info')}}</i>
                                    </button>
                                </div>
                                <div id="group_license_container"></div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="edit_groupApply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning" id="edit_groupReset" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-danger delete-node" id="edit_groupDelete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" id="edit_groupClose" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('end_script')
    <link rel="stylesheet" href="css/leaflet.min.css">
    <link rel="stylesheet" href="css/leaflet.extra-markers.min.css">
    <link rel="stylesheet" href="css/proton/style.min.css?v={{Config::get('app.version')}}">

    <link rel="stylesheet" href="/lib/daterangepicker/daterangepicker.css">

    <script src="/lib/daterangepicker/daterangepicker.js"></script>
    <script src="/lib/jstree/jstree.min.js"></script>

    <script src="/lib/jstree/jstreegrid.min.js"></script>
    <script src="js/lib/leaflet.min.js"></script>
    <script src="js/lib/leaflet.extra-markers.min.js"></script>
    <script src="js/account.min.js?v={{Config::get('app.version')}}"></script>
@stop