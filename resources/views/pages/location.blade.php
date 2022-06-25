@include('includes.language')
@extends('layouts.default', ['page_header' =>'Map','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>'Map'])
@section('content')

    <section id="room" class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 col-sm-4">
                    <iframe style="width:100%; height:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.9239070711496!2d120.68137445133273!3d24.139310279646384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693d149c9ec27b%3A0x9124bb23c4343869!2z5a6c6IiN5Zau5Lq65peF5bqXIChFYXNlIFNpbmdsZSBJbm4p!5e0!3m2!1sen!2stw!4v1572596134956!5m2!1sen!2stw"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-12 col-sm-8">
                    <ul>
                        <li style="margin-left:30px;"> <h6>{{trans('dictionary.by_car')}}：</h6></li>
                        <li style="margin-left:60px;"> <span></span><span>{{trans('dictionary.EASE_address')}}</span></li>
                        <br>
                        <li style="margin-left:30px;"> <h6>{{trans('dictionary.by_train')}}：</h6></li>
                        <li style="margin-left:60px;"> <span>搭至台中火車站</span></li>
                        <br>
                        <li style="margin-left:30px;"> <h6>{{trans('dictionary.by_bus')}}：</h6></li>
                        <li style="margin-left:60px;"> <span>第一廣場</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <span>台中車站</span></li>
                    </ul>
                </div>
            </div>
            <div>
        </div>
    </section>

@stop
@section('end_script')

@stop
