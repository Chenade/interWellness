@include('includes.language')
@extends('layouts.default', ['page_header' =>'Member','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>'Member'])
@section('content')

    <section id="dashboard" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 col-sm-8">
                    <section id="booking" style="margin-bottom: 50px;" class="wow fadeInUp" data-wow-delay="100">
                        <div class="col-12">
                            <div class="section-heading">
                                <h6 class="tag">Upcoming</h6>
                                <h2>{{trans('dictionary.booking')}}</h2>
                                <hr>
                            </div>
                            <div class="col-12 d-flex flex-wrap" id="bookingList">

                            </div>
                        </div>
                        <div class="col-12 d-flex flex-wrap">
                        </div>
                    </section>
                    <section id="bonus" class="wow fadeInUp" data-wow-delay="400ms">
                        <div class="col-12">
                            <div class="section-heading">
                                <h6 class="tag">bonus</h6>
                                <h2>{{trans('dictionary.bonus')}}</h2>
                                <hr>
                            </div>
                        </div>
                        <div class="col-12">
                            <p style="text-indent: 2em;">目前紅利:&ensp;<span id="current_bonus"></span></p>
                            <p style="text-indent: 2em;">暫存紅利:&ensp;<span id="tmp_bonus"></span></p>
                        </div>
                    </section>
                </div>
                <div class="col-12 col-sm-4 wow fadeInUp" id="member-info" data-wow-delay="700ms">
                    <div class="section-heading">
                        <h6 class="tag">info</h6>
                        <h2>{{trans('dictionary.member_info')}}</h2>
                        <hr>
                    </div>
{{--                    <form onsubmit="return false;" class="input-group" style="padding-bottom: 5px">--}}
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{trans('dictionary.name')}}</div>
                            </div>
                            <input type="text" class="form-control" id="name" placeholder="{{trans('dictionary.name')}}" disabled>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{trans('dictionary.account_mail')}}</div>
                            </div>
                            <input type="text" class="form-control" id="account_mail" placeholder="{{trans('dictionary.account_mail')}}" disabled>
                        </div>
                        <div class="input-group mb-2 d-flex align-items-center">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{trans('dictionary.IDcard')}}<br>/ {{trans('dictionary.passport')}}</div>
                            </div>
                            <input type="text" class="form-control" id="IDcard" placeholder="{{trans('dictionary.IDcard')}}" disabled>
                        </div>
                    <hr style="border-style: dashed">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{trans('dictionary.mobile')}}</div>
                            </div>
                            <input type="tel" class="form-control" id="mobile" placeholder="{{trans('dictionary.mobile')}}" required>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{trans('dictionary.tel')}}</div>
                            </div>
                            <input type="tel" class="form-control" id="tel" placeholder="{{trans('dictionary.tel')}}">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">{{trans('dictionary.contact_mail')}}</div>
                            </div>
                            <input type="email" class="form-control" id="contact_mail" placeholder="{{trans('dictionary.contact_mail')}}" >
                        </div>
                        <button id="update" class="btn btn-primary col-12">確認更新</button>
                        <button id="password-modal" class="btn btn-success col-12">修改密碼</button>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="password_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding: 15px;">
                <div class="modal-header">
                    <h4 class="modal-title nopadding">修改密碼</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{trans('dictionary.password')}}</div>
                        </div>
                        <input type="password" class="form-control" id="password" placeholder="{{trans('dictionary.password')}}">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">{{trans('dictionary.password')}}</div>
                        </div>
                        <input type="password" class="form-control" id="password2" placeholder="{{trans('dictionary.password')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="change_pwd">{{trans('dictionary.confirm')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('end_script')
    <script src="/js/dashboard.min.js"></script>

@stop
