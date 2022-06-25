{{--@include('includes.language')--}}
@extends('layouts.manage', ['page_header' =>'Booking'])
@section('content')

    <section id="manage_booking">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list_tab">列表</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#upcoming_tab">Upcoming</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#complete_tab">Complete</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cancelled_tab">Cancelled</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="list_tab" role="tabpanel">
                <div class="col-12" style="padding: 15px;">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                        </div>
                        <input class="form-control search" data-target="bookingList" type="text" placeholder="Search..">
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center col-12" id="bookingList"></div>
            </div>
            <div class="tab-pane fade show" id="upcoming_tab" role="tabpanel">
                <div class="col-12" style="padding: 15px;">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                        </div>
                        <input class="form-control search" data-target="bookingList_upcoming" type="text" placeholder="Search..">
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center col-12" id="bookingList_upcoming"></div>
            </div>
            <div class="tab-pane fade show" id="complete_tab" role="tabpanel">
                <div class="col-12" style="padding: 15px;">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                        </div>
                        <input class="form-control search" data-target="bookingList_complete" type="text" placeholder="Search..">
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center col-12" id="bookingList_complete"></div>
            </div>
            <div class="tab-pane fade show" id="cancelled_tab" role="tabpanel">
                <div class="col-12" style="padding: 15px;">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                        </div>
                        <input class="form-control search" data-target="bookingList_cancelled" type="text" placeholder="Search..">
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center col-12" id="bookingList_cancelled"></div>
            </div>
        </div>

    </section>

    <div class="modal fade" id="booking_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">編輯訂單資料</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-wrap">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.name')}}:</label>
                                <input type="text" class="form-control" id="booking_name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.mobile')}}:</label>
                                <input type="text" class="form-control" id="booking_mobile">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{trans('dictionary.contact_mail')}}:</label>
                            <input type="text" class="form-control" id="booking_email" >
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="col-9">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.bed')}}:</label>
                                <input type="text" class="form-control" id="booking_type" >
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.count')}}:</label>
                                <input type="text" class="form-control" id="booking_count"  >
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.check_in')}}:</label>
                                <input type="text" class="form-control" id="booking_start" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('dictionary.check_out')}}:</label>
                                <input type="text" class="form-control" id="booking_end"  >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success action-btn" data-action="apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.save')}}</button>
                    <button type="button" class="btn btn-danger action-btn" data-action="delete" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.delete')}}</button>
                </div>
            </div>
        </div>
    </div>



@stop
@section('end_script')

    <script src="/lib/bootstrap/js/bootbox.min.js"></script>
    <script src="/js/manage/booking.min.js"></script>

@stop
