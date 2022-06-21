@include('includes.language')
@extends('layouts.default', ['page_header' => trans('dictionary.Channel_Sharing')])
@section('content')
    <div class="col">
        <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">
            <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
            <span class="input-group-append">
                <button type="submit" class="btn btn-success" id="task_search_btn" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fa fa-search"></i> {{trans('dictionary.Search')}}</button>
                <button type="button" class="btn btn-primary" id="task_add" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>"><i class="fas fa-plus"></i> {{trans('account.add')}}</button>
            </span>
        </form>
        <div class="overflow-auto">
            <div id="task_tree" class="tree"></div>
        </div>
    </div>

    <div class="modal fade" id="select_group_modal" role="dialog">
        <div class="modal-dialog">
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
                            <div class="overflow-auto" style="padding-top: 5px;">
                                <div id="group_tree" class="tree"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="select_user_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('share.selectMember')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="input-group" onsubmit="return false;" style="padding-bottom: 5px">
                                <input type="text" class="form-control" placeholder="{{trans('dictionary.Keyword')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-success" id="user_search_btn" type="submit" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">
                                        <i class="fas fa-search"></i> {{trans('dictionary.Search')}}</button>
                                </div>
                            </form>
                            <div class="overflow-auto" style="padding-top: 5px;">
                                <div id="user_tree" class="tree"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="task_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('share.info')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('share.name')}}:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="task_name">
                                    <div id="task_name_edit" class="input-group-append">
                                        <button id="task_name_modify" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('share.department')}}:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="task_dept" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary select-modal" data-target="group">
                                            <i class="fas fa-users"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="isTask">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('share.member')}}:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="task_member" disabled>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary select-modal" data-target="user">
                                                <i class="fas fa-users"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('share.provider')}}:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="task_provider" disabled>
                                        <div class="input-group-append">
                                            <button class="btn btn-info select-modal" data-target="provider">
                                                <i class="fas fa-list-ol"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('share.notificationObject')}}:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="task_notification" disabled>
                                        <div class="input-group-append">
                                            <button class="btn btn-info select-modal" data-target="notification">
                                                <i class="fas fa-list-ol"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="task_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning" id="task_reset" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-danger" id="task_delete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" id="task_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="select_provider_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('share.provider')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <select id="task_provider_add" data-live-search="true" data-width="100%" data-live-search-style="contains" class="selectpicker show-tick form-control" multiple></select>
                                </div>
                            </div>
                            <div class="row" id="provider-list"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="select_notification_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('share.notificationObject')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-success form-control" id="notify_add"><i class="fas fa-plus"></i> {{trans('dictionary.Insert')}}{{trans('share.notificationObject')}}</button>
                    <div id="notify_container" style="border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; border: solid #bbb 2px; padding: 0.5em;display: none">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('share.type')}}:</label>
                                    <div class="input-group">
                                        <select class="selectpicker show-tick form-control" id="notification_type">
                                            <option value="1">Line</option>
                                            <option value="2">Telegram</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('share.to')}}:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="notification_to">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('share.description')}}:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="notification_description">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success" id="notification_add" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Insert')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="row" id="notification-list"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="modal fade" id="add_notification_modal" role="dialog">--}}
{{--        <div class="modal-dialog modal-dialog-scrollable">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">{{trans('dictionary.Insert')}}{{trans('share.notificationObject')}}</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-success" id="notification_add" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Insert')}}</button>--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Close')}}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@stop
@section('end_script')
    <link rel="stylesheet" href="css/proton/style.min.css">
    <script src="/lib/jstree/jstree.min.js"></script>
    <script src="/lib/jstree/jstree-grid.js"></script>
    <script src="js/sharing.min.js?v={{Config::get('app.version')}}"></script>
    <script src="js/lib/jquery-ui.min.js"></script>
    <script src="js/lib/jquery.ui.touch-punch.min.js"></script>
@stop