@include('includes.language')
@extends('layouts.default', ['page_header' =>'Login','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>'Login'])
@section('content')

    <section id="login" class="section"> <a id="lobby" ></a>
        <div class="col-12 col-sm-10 col-lg-8 d-flex justify-content-center">
            <div class="col-8">
                <div class="d-flex flex-wrap">
                    <div class="col-12 col-sm-4">
                        <div class="col-auto" style="margin-bottom: 50px;margin-top: 50px;">
                            <img class="center-block" style="max-width: 100%;" src="/img/logo-lg.jpg"/>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 d-flex flex-column justify-content-center">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
                            </div>
                            <input type="text" class="form-control" id="user" placeholder="{{trans('dictionary.account')}}">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="password" placeholder="{{trans('dictionary.password')}}" autocomplete="off">
                        </div>
                    </div>
                </div>


                <div class="col-12 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" id="login" onclick="login()" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.login')}}</button>
                </div>
            </div>
        </div>
    </section>


@stop
@section('end_script')
    <script>
        function login(){
            $.ajax({
                url: '/api/ease/member/login',
                method: 'POST',
                dataType: 'json',
                data: {'account': $('#user').val(), 'password': $('#password').val()},
                success: function (a) {
                    if (a.success)  window.location.href = '/member/dashboard/' + a.user
                    else $.growl.error({message: a.error});
                },
                error: function (a) {
                    console.log(a);
                },
            });
        }
    </script>

@stop
