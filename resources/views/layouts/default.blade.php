<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
@include('includes.navbar')
<main role="main">

    <audio id="audio-calling" loop>
        <source src="/files/calling.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <audio id="audio-notification" loop>
        <source src="/files/notification.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <div class="col" style="margin-bottom: 15px">
        <h2>{{$page_header}}</h2>
        <div class="border-bottom"></div>
    </div>
    <div class="col text-center loading-container">
        <span class="spinner-grow spinner-grow"></span>
    </div>
    <div class="main-page" style="display: none;">
        @yield('content')
    </div>

    <div class="modal fade" id="user-card-modal" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5><i class="fas fa-id-card"> </i></h5>
                        <small>{{trans('dictionary.Last_Logged')}}: <span id="user-card-lastLogin"></span></small>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.userName')}}:</label>
                                <input type="text" class="form-control" id="user-card_name" placeholder="Cloud">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="col-form-label">{{trans('account.videoTitle')}}:</label>
                                <input type="text" class="form-control" id="user-card_videoTitle" placeholder="">
                            </div>
                        </div>
                    </div>
                    @if( env('CUSTOMIZE') != 'npa')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.email')}}:</label>
                                    <input type="text" class="form-control" id="user-card_email" placeholder="cloud@bovia.com.tw">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.phone')}}:</label>
                                    <input type="text" class="form-control" id="user-card_phone" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="col-form-label">{{trans('account.note')}}:</label>
                                    <input type="text" class="form-control" id="user-card_note" placeholder="">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <button class="btn btn-info form-control" id="changePassword">{{trans('account.changePassword')}}</button>
                            </div>
                        </div>
                    </div>
                    @if(config('services.2fa_enable'))
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <button class="btn btn-danger form-control" id="change2fa">{{trans('account.2fa')}}</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="user-card_apply" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Apply')}}</button>
                    <button type="button" class="btn btn-warning" id="user-card_reset" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('dictionary.Reset')}}</button>
                    <button type="button" class="btn btn-secondary" id="user-card_close" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="password-modal" role="dialog">
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
                    <button type="button" class="btn btn-secondary" id="password_cancel"  data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('dictionary.Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="2fa-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>{{trans('account.2fa')}}</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body d-flex flex-column align-content-center justify-content-center">
                    <div id="fa_index" class="faArea">
                        <div class="col-12 d-flex align-items-around">
                            <div class="col-2"><i class="fas fa-qrcode fa-4x"></i></div>
                            <div class="col-10">
                                <h5 class="align-self-center">{{ trans('account.faTitle1') }}</h5>
                                <p>{{ trans('account.faCaption1') }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary btn-lg" id="2fa_step1">{{ trans('account.active') }} <i class="fas fa-long-arrow-alt-right"></i></button>
                        </div>
                    </div>
                    <div id="fa_qrcode" class="faArea">
                        <div class="col-12 d-flex align-items-around">
                            <div class="col-2"><i class="fas fa-qrcode fa-4x"></i></div>
                            <div class="col-10">
                                <h5 class="align-self-center">{{ trans('account.faTitle2') }}</h5>
                                <p>{{ trans('account.faCaption2') }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-center">
                            <img id="faQRCode" src="">
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary btn-lg" id="2fa_step2">{{ trans('account.next') }} <i class="fas fa-long-arrow-alt-right"></i></button>
                        </div>
                    </div>
                    <div id="fa_input" class="faArea">
                        <div class="col-12 d-flex align-items-around">
                            <div class="col-2"><i class="fas fa-qrcode fa-4x"></i></div>
                            <div class="col-10">
                                <h5 class="align-self-center">{{ trans('account.faTitle3') }}</h5>
                                <p>{{ trans('account.faCaption3') }}。</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-center">
                            <div id="twoFaCodeArea" class="row SMSArea">
                                <div class="col-2">
                                    <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="twoFaCode text-center rounded-lg" />
                                </div>
                                <div class="col-2">
                                    <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="twoFaCode text-center rounded-lg" />
                                </div>
                                <div class="col-2">
                                    <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="twoFaCode text-center rounded-lg" />
                                </div>
                                <div class="col-2">
                                    <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="twoFaCode text-center rounded-lg" />
                                </div>
                                <div class="col-2">
                                    <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="twoFaCode text-center rounded-lg" />
                                </div>
                                <div class="col-2">
                                    <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="twoFaCode text-center rounded-lg" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary btn-lg" id="2fa_step3">{{ trans('account.next') }} <i class="fas fa-long-arrow-alt-right"></i></button>
                        </div>
                    </div>
                    <div id="fa_final" class="faArea">
                        <div class="col-12 d-flex align-items-around">
                            <div class="col-2"><i class="fas fa-qrcode fa-4x"></i></div>
                            <div class="col-10">
                                <h5 class="align-self-center">{{ trans('account.faTitle1') }}&emsp;<span class="badge badge-success">{{ trans('account.hasActive') }}</span></h5>
                                <p>{{ trans('account.faCaption1') }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-danger btn-lg" id="2fa_disable"><i class="fas fa-ban"></i> {{ trans('account.disable') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="webrtc-modal" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>{{trans('webrtc.voice')}}</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">-</button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-wrap webrtcContent">
                        <div class="col-12 col-sm-9 name"><h4>unKnown</h4></div>
                        <div class="col-12 col-sm-3 time">00:00</div>
                    </div>
                    <div class="col text-center" id="connecting">
                        <span class="spinner-grow spinner-grow"></span>
                    </div>
                    <div class="row" style="display: none">
                        <div class="col-sm-12">
                            <div class="video-box">
                                <video id="remote-video" autoplay>
                                    Your browser does not support the video tag.
                                </video>
                                <video id="local-video" muted autoplay>
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="hangup" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>">{{trans('webrtc.hangup')}}</button>
                    <button type="button" class="btn btn-secondary" data-loading-text="<span class='spinner-grow spinner-grow-sm'></span>" data-dismiss="modal">{{trans('webrtc.hide')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ptt-modal" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>{{trans('webrtc.talkie')}}</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <select id="roomList" class="selectpicker form-control"></select>
                    </div>
                    <div id="RoomControl">
                        <div class="col-12" style="padding-top: 1em;">
                            <div class="d-flex align-items-center">
                                <button id="ptt_exit" class="btn btn-danger">{{trans('webrtc.exitRoom')}}</button>
                                <span style="margin-left: 2em;"><span id="members">0</span>&ensp;{{trans('webrtc.members')}}</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="roomMember" class="overflow-auto" style="border: solid #bbb 2px; margin: 1em;"></div>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <button id="ptt_talk" class="btn btn-secondary w-100"><i class="fas fa-microphone-alt-slash"></i>&ensp;{{trans('webrtc.muted')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="calling" style="">
        <a href="#webrtc" onclick="return false;"><i class="fas fa-phone-alt"> {{trans('webrtc.voice')}} </i></a>
    </div>
</main>
<footer class="footer">
    <div class="col d-flex">
        <div class="mr-auto">
            @if(env('CUSTOMIZE')=='fet')
                {{trans('contact.fet')}} &nbsp;&nbsp; {{trans('contact.fetMailName1')}}
                /{{trans('contact.fetMailName2')}}
                &nbsp; {{trans('contact.fetPhone')}}
                @elseif(env('CUSTOMIZE')=='wibase')
                &ensp;
            @else
                Copyright © Bovia Co., Ltd.
            @endif
        </div>
        <div>
            @if(session('rent'))
                <a href="/privacy" target="_blank" style="color: #888888">{{trans('dictionary.privacy')}}</a>&emsp;
                <a href="/terms" target="_blank" style="color: #888888">{{trans('dictionary.terms')}}</a>&emsp;
            @endif
            @if(env('CUSTOMIZE')=='wibase')
                &nbsp;
            @else
                <a href="/contact" target="_blank" style="color: #888888">{{trans('dictionary.contact')}}</a>
            @endif
        </div>
    </div>
</footer>
@yield('end_script')
</body>
</html>