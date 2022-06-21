<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        @if(env('CUSTOMIZE')=='npa')
            <div class="form-inline">
                <img src="img/npa.ico" style="margin-bottom: 5px" width="20" height="20"/>
                <b>現場影音傳送系統</b>
            </div>
        @elseif(env('CUSTOMIZE')=='fet')
            <div class="form-inline">
                <img src="img/fet.ico" style="margin-bottom: 5px" width="20" height="20"/>
                <b>雲端行動影音管理平台</b>
            </div>
        @elseif(env('CUSTOMIZE')=='tsmc')
            <div class="form-inline">
                <img src="img/tsmc_.png" style="margin-bottom: 5px" height="20"/>
                <b>行動即時影像指揮系統</b>
            </div>
        @elseif(env('CUSTOMIZE')=='wibase')
            <div class="form-inline">
                <img src="img/wibase.png" style="margin-bottom: 5px" height="20"/>
                <b></b>
            </div>
        @else
            <div class=""><img src="img/logo.ico" style="margin-bottom: 5px" width="20" height="20"/>
                <b>Bovi-Live</b>
            </div>
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="collapse navbar-collapse" id="navbarNavDropdown" style="margin: 0;">
        <ul class="navbar-nav w-100">
            @if(session('management'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{trans('dictionary.Administrator')}}
                    </a>

                    <ul class="dropdown-menu">
                        @if(session('user')['permission']['server'] || session('user')['permission']['streaming'])
                            <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt"></i> {{trans('dictionary.Dashboard')}}</a></li>
                        @endif
                        @if(session('user')['permission']['account'])
                            <li><a class="dropdown-item" href="/user"><i class="fas fa-users"></i> {{trans('dictionary.Account_Group_Management')}}</a></li>
                        @endif
                        @if(session('user')['permission']['groupTask'])
                            <li><a class="dropdown-item" href="/sharing"><i class="fas fa-share-alt"></i> {{trans('dictionary.Channel_Sharing')}}</a></li>
                        @endif
                        @if(session('user')['permission']['remote'])
                            <li><a class="dropdown-item" href="/ptz"><i class="fas fa-binoculars"></i> {{trans('dictionary.Pan_Tilt_Zoom')}}</a></li>
                        @endif
                        @if(session('user')['permission']['analyze'])
                            <li><a class="dropdown-item" href="/va"><i class="fas fa-diagnoses"></i> {{trans('va.va')}}</a></li>
                        @endif
                        @if(session('user')['permission']['fr'] or session('user')['permission']['lpr'] or session('user')['permission']['or'] or session('user')['permission']['mmr'])
                            <li class="drop-right">
                                <a  class="dropdown-item" id="ai_recognize"><i class="fas fa-microchip"></i> {{trans('dictionary.ai_recognize')}}</a>
                                <ul class="dropdown-menu">
                                    @if(array_key_exists("fr", session('user')['permission']) and session('user')['permission']['fr'])
                                        <li><a class="dropdown-item" href="/fr"><i class="fas fa-user-circle"></i> {{trans('ai.fr')}}</a></li>
                                    @endif
                                    @if(array_key_exists("lpr", session('user')['permission']) and session('user')['permission']['lpr'])
                                        <li><a class="dropdown-item" href="/lpr"><i class="fas fa-car"></i> {{trans('ai.lpr')}}</a></li>
                                    @endif
                                    @if(array_key_exists("or", session('user')['permission']) and session('user')['permission']['or'])
                                        <li><a class="dropdown-item" href="/or"><i class="fas fa-boxes"></i> {{trans('ai.or')}}</a></li>
                                    @endif
                                    {{--                                    @if(array_key_exists("mmr", session('user')['permission']) and session('user')['permission']['mmr'])--}}
                                    {{--                                         <li><a class="dropdown-item" href="/mmr"><i class="fas fa-car"></i> {{trans('mmr.mmr')}}</a></li>--}}
                                    {{--                                    @endif--}}

                                </ul>
                            </li>
                        @endif
                        @if(session('user')['permission']['device'])
                            <li><a class="dropdown-item" href="/device"><i class="fas fa-video"></i> {{trans('bovicam.devmgr')}}</a></li>
                            <li><a class="dropdown-item" href="/deviceConfig"><i class="fas fa-cogs"></i> {{trans('deviceConfig.deviceConfig')}}</a></li>
                        @endif
                        <li><a class="dropdown-item" href="/logs"><i class="fas fa-book"></i> {{trans('logs.log')}}</a></li>
                    </ul>
                </li>
            @endif
            <li class="nav-item"><a class="nav-link" href="/">{{trans('dictionary.Live')}}</a></li>
            <li class="nav-item"><a class="nav-link" href="/vms">{{trans('dictionary.VMS')}}</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="videodrop" data-toggle="dropdown">{{trans('dictionary.Video')}}</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/playback"><i class="fas fa-photo-video"></i> {{trans('dictionary.Video_List')}}</a></li>
                    <li><a class="dropdown-item" href="/playback_new"><i class="fas fa-video"></i> {{trans('dictionary.userPlayback')}}</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="/tools">{{trans('dictionary.Tools')}}</a></li>
            <div class="ml-auto"></div>
            @if(session('user'))
                <li class="nav-item">
                    <a class="nav-link" href="#pushToTalk" onclick="return false;"><i class="fas fa-broadcast-tower"> {{trans('webrtc.talkie')}} </i></a>
                </li>
            @endif
            @if(session('user'))
                <li class="nav-item">
                    <a class="nav-link" href="#webrtc" onclick="return false;"><i class="fas fa-phone-alt"> {{trans('webrtc.voice')}} </i></a>
                </li>
            @endif
            @if(session('user') && session('user')['permission']['site'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarSite" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-sitemap"></i>
                        {{session('siteList')[session('site')]['name']}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarSite">
                        @foreach(session('siteList') as $key => $site)
                            @if($site['itri'])
                                <a class="dropdown-item" href="{{$site['itriUrl']}}" data-name="{{$site['name']}}">{{$site['name']}}</a>
                            @else
                                <a class="dropdown-item change-site" href="#" data-name="{{$site['name']}}" data-id="{{$key}}">{{$site['name']}}</a>
                            @endif
                        @endforeach
                    </div>
                </li>
            @endif
            <li class="nav-item dropdown">
                <a id="dropdownMenu1" href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">
                    <i class="fas fa-user">
                        @if(session('user'))
                            {{session('user')['id']}}
                        @else
                            Anonymous
                        @endif
                    </i>
                </a>
                <ul aria-labelledby="dropdownMenu1" class="dropdown-menu" style="margin-left: -3em;">
                    @if(session('user'))
                        <li><a href="#user-card-modal" class="dropdown-item" onclick="return false;"><i class="fas fa-id-card"> {{trans('dictionary.User_Profile')}}</i></a></li>
                        <li class="dropdown-divider"></li>
                    @endif
                    <li class="dropdown-submenu">
                        <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" class="dropdown-item dropdown-toggle"><i class="fas fa-language"> {{trans('dictionary.Language')}}</i></a>
                        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu">
                            <li><a href="/language/en" class="dropdown-item">English</a></li>
                            <li><a href="/language/zh" class="dropdown-item">繁體中文</a></li>
                            <li><a href="/language/jp" class="dropdown-item">日文</a></li>
                        </ul>
                    </li>
                    @if(session('user'))
                        <li class="dropdown-divider"></li>
                        <li><a href="/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"> {{trans('dictionary.Logout')}}</i></a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </ul>
</nav>