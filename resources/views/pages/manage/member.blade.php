{{--@include('includes.language')--}}
@extends('layouts.manage', ['page_header' =>'Member'])
@section('content')

    <section id="manage_member">
        <div class="col-12">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                </div>
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
        </div>
        <div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">姓名</th>
                    <th scope="col">帳號</th>
                    <th scope="col" class="mobile-hide">身份證字號</th>
                    <th scope="col" class="mobile-hide">電話</th>
                    <th scope="col">訂單</th>
                    <th scope="col">操作</th>
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
    <script src="/js/manage/member.min.js"></script>

@stop
