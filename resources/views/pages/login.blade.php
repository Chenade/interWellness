{{Lang::setLocale(session('setLocale'))}}
        <!doctype html>
<html>
<head>
    @include('includes.head')
</head>
@if(env('CUSTOMIZE')=='fet')
    <style>
        body {
            background: url('img/fet.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
@endif
<body>
<div class="container" style="margin-top: 15%">
    <div class="col-auto" style="margin-bottom: 50px;margin-top: 50px;">
        @if(env('CUSTOMIZE')=='fet')
            <img class="center-block" style="max-width: 100%;" src="img/fet_portal.png"/>
        @elseif(env('CUSTOMIZE')=='wibase')
            <div class="text-center">
                <img style="max-width: 100%;" src="img/wibase.png"/>
            </div>
        @elseif(strlen(env('CUSTOMIZE')))
            <img class="center-block" style="max-width: 100%;" src="img/{{env('CUSTOMIZE')}}.png" onerror="this.src='/img/bovia.png'"/>
        @else
            <img class="center-block" style="max-width: 100%;" src="img/bovia.png"/>
        @endif
    </div>
    <div class="col-auto">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
            </div>
            <input type="text" class="form-control" id="user" placeholder="{{trans('account.id')}}">
        </div>
    </div>
    <div class="col-auto">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-key"></i></div>
            </div>
            <input type="password" class="form-control" id="password" placeholder="{{trans('account.password')}}" autocomplete="off">
        </div>
    </div>
    <div id="is2fa" data-enable="{{config('services.2fa_enable')}}"></div>
    <div class="col-auto" id="isRecaptcha" data-enable="{{config('services.recaptcha_enable')}}">
        @if(config('services.recaptcha_enable'))
            <div class="d-flex flex-wrap flex-row-reverse">
            <div class="col-12 col-sm-6 d-flex justify-content-end mb-3" style="padding: 0">
                <div class="ml-auto" style="padding-right: 5px">
                    <select class="selectpicker show-tick" id="language" data-width="140px">
                        <option value="en">English</option>
                        <option value="zh">繁體中文</option>
                        <option value="jp">日文</option>
                    </select>
                </div>
                <div>
                    <a class="btn btn-info" href="/tools"><i class="fas fa-download"></i></a>
                </div>
            </div>
            <div class="col-12 col-sm-6" style="padding: 0">
                <div class="ml-auto mb-3">
                    <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha_site_key')}}"></div>
                </div>
                <div class="ml-auto" style="padding-right: 5px">
                    <button type="button" class="btn btn-primary" id="login" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('account.login')}}</button>
                </div>
            </div>
        </div>
        @else
            <div class="d-flex">
                <div class="w-100">
                    <button type="button" class="btn btn-primary" id="login" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('account.login')}}</button>
                </div>
                <div class="ml-auto" style="padding-right: 5px">
                    <select class="selectpicker show-tick" id="language" data-width="140px">
                        <option value="en">English</option>
                        <option value="zh">繁體中文</option>
                        <option value="jp">日文</option>
                    </select>
                </div>
                <div class="ml-auto">
                    <a class="btn btn-info" href="/tools"><i class="fas fa-download"></i></a>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="modal fade" id="SMS-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5>{{trans('account.2fa')}}</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div id="SMSArea" class="row SMSArea">
                    <div class="col-2">
                        <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                    </div>
                    <div class="col-2">
                        <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                    </div>
                    <div class="col-2">
                        <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                    </div>
                    <div class="col-2">
                        <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                    </div>
                    <div class="col-2">
                        <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                    </div>
                    <div class="col-2">
                        <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="SMS_confirm" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                <button type="button" class="btn btn-secondary" id="SMS_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Cancel')}}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newPassword-modal" role="dialog">
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
                                    <input type="password" class="form-control" id="newPassword" autocomplete="new-password" aria-autocomplete="none" placeholder="({{trans('dictionary.Unchanged')}})">
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
                                    <input type="password" class="form-control" id="newPassword2" autocomplete="new-password" aria-autocomplete="none" placeholder="({{trans('dictionary.Unchanged')}})">
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
                <button type="button" class="btn btn-primary" id="password_confirm" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                <button type="button" class="btn btn-warning" id="password_cancel"  data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('account.changeNextTime')}}</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
<script src="js/login.min.js?v={{Config::get('app.version')}}"></script>
</body>
</html>