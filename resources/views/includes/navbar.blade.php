@include('includes.language')
<header class="fixed-top">
    <!-- <div class="d-flex align-items-center top-header-area" style="height: 50px;">
        <div class="container d-flex">
            <div class="col-6 d-flex align-items-center top-header-content justify-content-start">
                <a href="#"><i class="fas fa-phone-alt"></i> <span class="mobile-hide"> (+886)-4-2225-0948</span></a>
                <a href="#"><i class="fas fa-envelope"></i> <span class="mobile-hide">easesingleinn@gmail.com</span></a>
            </div>
            <div class="col-6 d-flex align-items-center top-header-content justify-content-end">
                <a href="https://www.facebook.com/easesingleinn/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.tripadvisor.com.tw/Hotel_Review-g13792757-d9867568-Reviews-Ease_Single_Inn-Central_District_Taichung.html" target="_blank"><i class="fab fa-tripadvisor"></i></a>
                <a href="https://www.instagram.com/easesingleinn/" target="_blank"><i class="fab fa-instagram"></i></a>
                @if(session('setLocale') == 'en')
                    <button class="btn btn-outline-info language" style="margin: 0;" id="zh">中文</button>
                @else
                    <button class="btn btn-outline-info language" style="margin: 0;" id="en">English</button>
                @endif
            </div>
        </div>
    </div> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class=""><img src="/img/logo_icon.png" style="margin-bottom: 5px" width="20" height="20"/>
                    <b>interWellness</b>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="collapse navbar-collapse" id="navbarNavDropdown" style="margin: 0;">
                <ul class="navbar-nav w-100">
                    <div class="ml-auto"></div>
{{--                    <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>--}}
                    <li class="nav-item" style="margin: 0 2em;"><a class="nav-link" href="#about_us">{{trans('dictionary.About_us')}}</a></li>
                    <li class="nav-item" style="margin: 0 2em;"><a class="nav-link" href="#service">{{trans('dictionary.Service')}}</a></li>
                    <li class="nav-item" style="margin: 0 2em;"><a class="nav-link" href="#article">{{trans('dictionary.Article')}}</a></li>
                    <li class="nav-item" style="margin: 0 2em;"><a class="nav-link" href="#fnq">{{trans('dictionary.Fnq')}}</a></li>
                    <!-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="videodrop" data-toggle="dropdown">{{trans('dictionary.Member')}}</a>
                        <ul class="dropdown-menu">
                            @if(session('account') == 'admin@gmail.com'))
                                <li><a class="dropdown-item" href="/member/dashboard">{{trans('dictionary.member_center')}}</a></li>
                                <li><a class="dropdown-item" href="/member/logout">{{trans('dictionary.logout')}}</a></li>
                            @else
                                <li><a class="dropdown-item" href="/member/login">{{trans('dictionary.login')}}</a></li>
                                <li><a class="dropdown-item" href="/member/join">{{trans('dictionary.join_member')}}</a></li>
                            @endif
                        </ul>
                    </li> -->
                </ul>
            </ul>
        </div>
    </nav>
</header>
