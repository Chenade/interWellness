{{--@include('includes.language')--}}
@extends('layouts.manage', ['page_header' =>'Nearby'])
@section('content')

    <section id="manage_member">
        <div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">類別</th>
                    <th scope="col">子類別</th>
                    <th scope="col">名稱</th>
                    <th scope="col">營業時間</th>
                    <th scope="col">電話</th>
                    <th scope="col">網站</th>
                    <th scope="col">推薦</th>
                    <th scope="col">圖片</th>
                </tr>
                </thead>
                <tbody id="memberList">
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="member_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">編輯會員資料</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{trans('dictionary.account')}}:</label>
                            <input type="text" class="form-control" id="edit_account">
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.name')}}:</label>
                                <input type="text" class="form-control" id="edit_name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.IDcard')}} / {{trans('dictionary.passport')}}:</label>
                                <input type="text" class="form-control" id="edit_idcard"  >
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.mobile')}}:</label>
                                <input type="text" class="form-control" id="edit_mobile" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.tel')}}:</label>
                                <input type="text" class="form-control" id="ediit_tel"  >
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{trans('dictionary.contact_mail')}}:</label>
                            <input type="text" class="form-control" id="edit_email" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success member-btn" data-action="apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.save')}}</button>
                    <button type="button" class="btn btn-danger member-btn" data-action="delete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.delete')}}</button>
                </div>
            </div>
        </div>
    </div>



@stop
@section('end_script')

    <script src="/lib/bootstrap/js/bootbox.min.js"></script>
    <script src="/js/manage/nearby.min.js"></script>

@stop
