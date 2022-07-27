@include('includes.language')
@extends('layouts.default', ['page_header' =>'About','page_parent' =>'Home','page_parent_path' =>'/','page_path' =>''])
@section('content')

    <section id="welcome" class="section col-12 nopadding" style="height: 100%">
        <div class="single-welcome-slide bg-img" style="background-image: url(img/cover.jpg);" data-img-url="img/Room2.jpg">
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        
                        <!-- <div class="container d-flex flex-wrap" style="margin-top: -5em;">
                            <div class="col-12 col-sm-5 animate__animated animate__fadeInLeft">
                                <img src="img/iw_logo_1.png" alt="" style="width:100%" />
                            </div>
                            <div class="col-12 col-sm-7 d-flex flex-column justify-content-center animate__animated animate__fadeInRight">
                                <div class="d-flex justify-content-start"><h3 style="line-height: 5rem;">{{trans('dictionary.solgan1')}}</h3></div>
                                <div class="d-flex justify-content-around"><h3 style="line-height: 5rem;">都在累積健康的資本</h3></div>
                            </div>
                        </div> -->

                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <img class="pc-hidden" src="img/logo_icon.png" alt="" style="width:28%; margin-bottom: 2em;" />
                                <h6 class="animate__animated animate__fadeInLeft" data-animation="fadeInLeft" data-delay="200ms">{{trans('dictionary.interwellness')}}</h6>
                                <h2 class="animate__animated animate__fadeInRight" data-animation="fadeInLeft" data-delay="500ms" style="font-family:微軟正黑體;">{{trans('dictionary.solgan1')}} <br> {{trans('dictionary.solgan2')}}</h2>
                                <!-- <a href="#index" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="800ms">Discover Now</a> -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a id="about_us" class="target"></a>
    <section class="section">
        <div class="col-12 col-sm-10 col-lg-8">
            <a id="index"></a>
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: 20px;">
                <div class="section-heading">
                    <h6 class="tag text-center">About Us</h6>
                    <h2 class="">{{trans('dictionary.About_us')}}</h2>
                </div>
            </div>
            <div class="col-12 d-flex flex-wrap nopadding">
                <div class="col-12 col-lg-9 nopadding">
                    <div class="about-us-content-title auct_first">
                        <h5>願景</h5>
                    </div>
                    <div class="d-flex justify-content-center"><hr class="about-hr"></div>
                    <div class="about-us-content" style="min-height: 50px;">
                        <h5>{{trans('dictionary.index_wish')}}</h5>
                    </div>
                    <div class="about-us-content-title" style="margin-top: 50px;">
                        <h5>使命</h5>
                    </div>
                    <div class="d-flex justify-content-center"><hr class="about-hr"></div>
                    <div class="about-us-content">
                        <h5>{{trans('dictionary.index_goal')}}</h5>
                    </div>
                </div>
                <!-- <div class="col-12 col-lg-1"></div> -->
                <!-- <div class="col-12 col-lg-3" style="padding-left: 50px;"> -->
                <div class="col-12 col-lg-3">
                    <div class="about-us-content-title">
                        <h5 class="auct_third">SDG 目標</h5>
                    </div>
                    <div class="d-flex justify-content-center"><hr class="about-hr hr-sdg"></div>
                    <div style="margin-left: 20px;">
                        <div class="row d-flex flex-wrap">
                            <div class="col-12 col-lg-7 nopadding row d-flex justify-content-around">
                                <div class="single-thumb col-2 col-lg-12 nopadding" data-addr="https://sdgs.un.org/goals/goal2">
                                    <img src="img/E_PRINT_02.jpg" alt="" style="width:90%;">
                                </div>
                                <div class="single-thumb col-2 col-lg-12 nopadding" data-addr="https://sdgs.un.org/goals/goal3">
                                    <img src="img/E_PRINT_03.jpg" alt="" style="width:90%;">
                                </div>
                                <div class="single-thumb col-2 col-lg-12 nopadding" data-addr="https://sdgs.un.org/goals/goal12">
                                    <img src="img/E_PRINT_12.jpg" alt="" style="width:90%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a id="service" class="target"></a>
    <section class="section">
        <div class="col-10 col-sm-10 col-lg-10 d-flex flex-column justify-content-center">
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: 20px;">
                <div class="section-heading" data-wow-delay="100ms">
                    <h6 class="tag text-center">Our Service</h6>
                    <h2>{{trans('dictionary.Service')}}</h2>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-around flex-wrap row">
               <div class="col-12 col-lg-5" style="padding: 25px;">
                    <div class="service-box" style="box-shadow:-0.5px 2px 10px 1px rgba(195, 99, 60, 0.17);">
                        <div class="post-thumbnail"><img src="img/service_Lc.jpg" alt="" ></div>
                        <div class="col-12" style="padding-left: 2em;">
                            <div class="service-tag-title">客製化配餐服務</div>
                            <div class="service-detail">讓忙碌的你不必再費心午餐要吃什麼，<br>更能透過飲食安排<br>達到體態與健康控管。</div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center mobile-hidden" style="margin-top: 1em">
                        <button class="btn service-detail-btn" data-type="1" target="_blank"><i class="fas fa-solid fa-chevron-down fa-2x"></i></button>
                    </div>
               </div>
               <div class="col-12 col-lg-5" style="padding: 25px;">
                    <div class="service-box" style="box-shadow:-0.5px 2px 10px 1px rgba(56, 142, 144, 0.17);">
                        <div class="post-thumbnail"><img src="img/photo1.jpg" alt="" ></div>
                        <div class="col-12" style="padding-left: 2em;">
                            <div class="service-tag-title">友善飲食平臺</div>
                            <div class="service-detail">我們重視每種飲食需求<br>透過營養標籤篩選餐點<br>還能匯入飲食日記、線上訂餐。</div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center mobile-hidden" style="margin-top: 1em">
                    <button class="btn service-detail-btn" data-type="2" target="_blank"><i class="fas fa-solid fa-chevron-down fa-2x"></i></button>
                    </div>
               </div>
            </div>
        </div>
    </section>

    <a id="article" class="target"></a>
    <section class="section service-section" style="flex-direction: column">
        <div class="col-12">
            <div class="section-heading text-center">
                <h6 class="tag">Article </h6>
                <h2>{{trans('dictionary.Article')}}</h2>
            </div>
        </div>
        <div class="col-12">
            <!-- {{--            owl-carousel--}} -->
            <div class="projects-slides owl-carousel">
                <!-- Single Project Slide -->
                <div class="single-project-slide active bg-img" style="background-image: url(img/article/bao2.jpg);" data-addr="https://www.pcalife.com.tw/zh/news/20220426/">
                    <div class="project-content">
                        <div class="text">
                            <h6>2022 Apr.</h6>
                            <h5>第一屆保誠創新智造所<br>首獎 | 創新未來獎</h5>
                        </div>
                    </div>
                    <div class="hover-effects">
                        <div class="text">
                            <h6>道地小吃</h6>
                            <h5>台中第二市場</h5>
                            <p>第二市場自創立已有近八十年的歷史，原為日治時期的新富町市場，主要販售精美高價的貨品，又有「日本人的市場」之稱，後經台中市政府全面整修而成現今風貌，內部集結眾多知名的美味小吃...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- Single Project Slide -->
                <div class="single-project-slide bg-img" style="background-image: url(img/article/podcast.jpg);" data-addr="https://open.firstory.me/story/cl19sfiihn1qd0hawdh0v7gjs">
                    <!-- Project Text -->
                    <div class="project-content">
                        <div class="text">
                            <h6>2021 Dec.</h6>
                            <h5>大學生創業家 林芳如 - <br>用美食幫助慢性病患</h5>
                        </div>
                    </div>
                    <!-- Hover Effects -->
                    <div class="hover-effects">
                        <div class="text">
                            <h6>夜景欣賞</h6>
                            <h5>柳川河岸</h5>
                            <p>而晚上的柳川充滿浪漫的氛圍，走在璀璨的燈火下，看著閃閃亮光的柳樹和裝置藝術天鵝，不僅是拍夜景的好地方，也適合情侶夜晚來此散步...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Project Slide -->
                <div class="single-project-slide bg-img" style="background-image: url(img/article/1a.jpg);" data-addr="https://www.taipeitimes.com/News/taiwan/archives/2021/09/13/2003764294">
                    <!-- Project Text -->
                    <div class="project-content">
                        <div class="text">
                            <h6>2021 Aug.</h6>
                            <h5>NTU’s ‘interWellness’competes <br> in Hult Prize Challenge</h5>
                        </div>
                    </div>
                    <!-- Hover Effects -->
                    <div class="hover-effects">
                        <div class="text">
                            <h6>歷史古蹟</h6>
                            <h5>道禾六藝文化館</h5>
                            <p>又稱台中刑務所演武場，興建於日治時期昭和12年(西元1937年)，為司獄官、警察日常練武之武道館舍，屬本市僅存之演武場，歷史原貌保存完整， 極具保存、再利用及建築研究價值...</p>
                        </div>
                        <a href="./location2.html" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Project Slide -->
                <div class="single-project-slide bg-img" style="background-image: url(img/article/a3.jpg);" data-addr="https://www.ocac.gov.tw/OCAC/Pages/Detail.aspx?nodeid=3214&pid=28622893">
                    <!-- Project Text -->
                    <div class="project-content">
                        <div class="text">
                            <h6>2021 Aug.</h6>
                            <h5>首度在臺辦理學生界諾貝爾獎<br>青年力量讓臺灣發光</h5>
                        </div>
                    </div>
                    <!-- Hover Effects -->
                    <div class="hover-effects">
                        <div class="text">
                            <h6>吃喝玩樂</h6>
                            <h5>一中商圈</h5>
                            <p>位於中友百貨附近，與三民商圈連成一氣，小吃攤、飲食店林立，各種新潮流行資訊在這隨處可見、隨手可得。各式新潮前衛的玩意都會在此先出現，若你是流行的追求者，一中夜市絕對不能錯過...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Project Slide -->
                <div class="single-project-slide bg-img" style="background-image: url(img/article/a4.jpg);" data-addr="https://dep.mohw.gov.tw/OOIC/cp-1529-60672-119.html">
                    <!-- Project Text -->
                    <div class="project-content">
                        <div class="text">
                            <h6>2021 May</h6>
                            <h5>霍特獎臺灣區第一名得獎團隊<br>拜會陳時中部長</h5>
                        </div>
                    </div>
                    <!-- Hover Effects -->
                    <div class="hover-effects">
                        <div class="text">
                            <h6>吃喝玩樂</h6>
                            <h5>一中商圈</h5>
                            <p>位於中友百貨附近，與三民商圈連成一氣，小吃攤、飲食店林立，各種新潮流行資訊在這隨處可見、隨手可得。各式新潮前衛的玩意都會在此先出現，若你是流行的追求者，一中夜市絕對不能錯過...</p>
                        </div>
                        <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- {{--            owl-carousel--}} -->
        </div>
    </section>

    <section id="fnq" class="section" style="margin-bottom  :80px">
        <div class="col-12 col-sm-10 col-lg-8 d-flex flex-column justify-content-center">
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: 20px;">
                <div class="section-heading">
                    <h6 class="tag text-center">FAQ</h6>
                    <h2>{{trans('dictionary.Fnq')}}</h2>
                </div>
            </div>
            <div class="col-12" style="padding: 10px;">
                <div class="fnq-box">
                    <div class="col-12 fnq-q" data-id="1">
                        <div class="col-12 row d-flex flex-wrap jsutify-content-between">
                            <div class="col-12 col-sm-11 fnq-tag-title">為你而思目前有提供哪些服務呢？我適合什麼方案？</div>
                            <div class="col-12 col-sm-1 d-flex align-items-center justify-content-end"><i class="fas fa-solid fa-chevron-down fa-2x"></i></div>
                        </div>
                    </div>
                    <div class="col-12 fnq-ans" data-id="1">
                        <h6>為你而思目前提供的主要服務是「客製化配餐服務」，提供公司/團體/個人長期訂餐，餐點可根據口味或身體健康需求如減重、健身減脂、低糖調整。我們也正在開發「友善飲食平臺」，預計08月01日正式上線。希望提供正在進行飲食控制的夥伴們「營養標籤搜尋」、「飲食記錄」、「訂餐」與「社群」的平臺，一同落實健康生活。「客製化配餐服務」請至服務項目詳閱。</h6>
                    </div>
                </div>
            </div>
            <div class="col-12" style="padding: 10px;">
                <div class="fnq-box">
                    <div class="col-12 fnq-q" data-id="2">
                        <div class="col-12 row d-flex flex-wrap">
                            <div class="col-12 col-sm-11 fnq-tag-title">公司或團體想長期配合可以嗎？</div>
                            <div class="col-12 col-sm-1 d-flex align-items-center justify-content-center"><i class="fas fa-solid fa-chevron-down fa-2x"></i></div>
                        </div>
                    </div>
                    <div class="col-12 fnq-ans" data-id="2">
                        <h6>由公司承辦人員與為你而思聯繫，我們將有專人向公司承辦人員了解需求，並根據需求提供配餐計畫書，雙方確認內容後便可開始配餐。詳情請閱讀服務項目。</h6>
                    </div>
                </div>
            </div>
            <div class="col-12" style="padding: 10px;">
                <div class="fnq-box">
                    <div class="col-12 fnq-q" data-id="3">
                        <div class="col-12 row d-flex flex-wrap">
                            <div class="col-12 col-sm-11 fnq-tag-title">餐點運送的服務範圍有限制嗎？</div>
                            <div class="col-12 col-sm-1 d-flex align-items-center justify-content-center"><i class="fas fa-solid fa-chevron-down fa-2x"></i></div>
                        </div>
                    </div>
                    <div class="col-12 fnq-ans" data-id="3">
                        <h6>目前提供服務的範圍僅有臺北市、新北市的外帶、外送服務，無內用服務。以公司團單為主，若有個人想詢問服務細節，歡迎直接與我們聯繫；另外，若是非臺北地區的朋友希望此服務未來擴及至您的所在地區，也歡迎告知我們，讓我們更有動力擴及服務喔！</h6>
                    </div>
                </div>
            </div>
            <div class="col-12" style="padding: 10px;">
                <div class="fnq-box">
                    <div class="col-12 fnq-q" data-id="4">
                        <div class="col-12 row d-flex flex-wrap">
                            <div class="col-12 col-sm-11 fnq-tag-title">該如何聯繫為你而思詢問服務、訂餐？</div>
                            <div class="col-12 col-sm-1 d-flex align-items-center justify-content-center"><i class="fas fa-solid fa-chevron-down fa-2x"></i></div>
                        </div>
                    </div>
                    <div class="col-12 fnq-ans" data-id="4">
                        <h6>若有任何想詢問的問題，都歡迎用<a href="https://lin.ee/6sCf4OU" target="_blank"><i class="fab fa-brands fa-line"></i>line</a>聯絡我們，或是<a href="mailto:contact@interwellness.life">寄信至contact@interwellness.life</a>。</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="service_1_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding: 15px;">
                <div class="row">
                    <div class="d-flex flex-wrap col-11">
                        <h4 class="col-12 col-lg-3 modal-title nopadding nobreak">客製化配餐服務</h4>
                        <h class="col-12 col-lg-9 nopadding nobreak">|| 客製化｜專業建議｜營養資訊</h4>
                    </div>
                    <div class="col-1">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-wrap align-items-center" style="background-color: #b2c3c5; width: 100%; padding: 10px;">
                        <div class="col-12 col-sm-10">
                            <h6 style="word-wrap:break-word; color:#144142;">
                                為你而思正在進行企業夥伴健康飲食專案，透過專人與公司承辦人員接洽了解員工飲食需求，為你而思的團隊有營養師能協助篩選、搭配餐點。讓員工可以在配餐當天享用到營養健康的餐點，並能看到餐點營養標示。讓忙碌的你不再費心午餐要吃什麼，還能利用飲食控制體態與健康。
                            </h6>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button class="btn btn-info" onclick=location.href="https://lin.ee/6sCf4OU" target="_blank">聯絡我們<br>索取報價</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start" style="margin-top: 30px;"><div class="service-tag-title">服務特色</div></div>
                    <div class="d-flex flex-wrap">
                        <div  class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                            <div class="d-flex justify-content-center align-items-center" style="margin: 10px; border-radius: 100px; background-color: #144142; color: white; word-wrap:break-word; width: 120px; height: 120px; font-size: 20px;">客製化</div>
                            <h6 style="word-wrap:break-word; color:#144142;">
                                根據健康需求、口味、預算等客製餐點內容。
                            </h6>
                        </div>
                        <div  class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                            <div class="d-flex justify-content-center align-items-center" style="margin: 10px; border-radius: 100px; background-color: #144142; color: white; word-wrap:break-word; width: 120px; height: 120px; font-size: 20px;">專業建議</div>
                            <h6 style="word-wrap:break-word; color:#144142;">
                                營養師根據健康需求如減重、疾病狀況等，及飲食需求搭配餐點。
                            </h6>
                        </div>
                        <div  class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                            <div class="d-flex justify-content-center align-items-center" style="margin: 10px; border-radius: 100px; background-color: #144142; color: white; word-wrap:break-word; width: 120px; height: 120px; font-size: 20px;">資訊透明</div>
                            <h6 style="word-wrap:break-word; color:#144142;">
                                提供之餐點將附上餐廳資訊、營養標示。
                            </h6>
                        </div>
                        <div  class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                            <div class="d-flex justify-content-center align-items-center" style="margin: 10px; border-radius: 100px; background-color: #144142; color: white; word-wrap:break-word; width: 120px; height: 120px; font-size: 20px;">選擇多樣</div>
                            <h6 style="word-wrap:break-word; color:#144142;">
                                有不同餐廳餐點供選擇，讓執行飲食計畫不再無趣、單調。
                            </h6>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start" style="margin-top: 30px;"><div class="service-tag-title">服務流程</div></div>
                    <div class="d-flex flex-wrap">
                        <div  class="col-12 col-lg-4 d-flex flex-column align-items-center" style="margin-bottom: 10px;">
                            <div class="d-flex justify-content-center align-items-center" style="margin: 10px; background-color: #144142; color: white; word-wrap:break-word; width: 100%; line-height: 2em; font-size: 20px;">
                                Step 1 專人了解需求
                            </div>
                            <h6 style="word-wrap:break-word; color:#144142; padding: 10px!important;">
                                為你而思將由專人與公司承辦人員了解需求，如員工人數、預算、飲食習慣與需求等。承辦人員也能向公司的人資、CSR部門提案，使餐點安排成為EAP的服務內容。
                            </h6>
                        </div>
                        <div  class="col-12 col-lg-4 d-flex flex-column align-items-center" style="margin-bottom: 10px;">
                            <div class="d-flex justify-content-center align-items-center" style="margin: 10px; background-color: #144142; color: white; word-wrap:break-word; width: 100%; line-height: 2em; font-size: 20px;">
                                Step 2 專業配餐提案
                            </div>
                            <h6 style="word-wrap:break-word; color:#144142; padding: 10px!important;">
                                根據承辦人員提出之需求，由營養師篩選、搭配餐點，並提供配餐計畫。
                            </h6>
                        </div>
                        <div  class="col-12 col-lg-4 d-flex flex-column align-items-center" style="margin-bottom: 10px;">
                            <div class="d-flex justify-content-center align-items-center" style="margin: 10px; background-color: #144142; color: white; word-wrap:break-word; width: 100%; line-height: 2em; font-size: 20px;">
                                Step 3 雙方確認內容
                            </div>
                            <h6 style="word-wrap:break-word; color:#144142; padding: 10px!important;">
                                雙方確認餐廳、餐點、營養標示、送餐時間、價格等。
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="service_2_modal" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="padding: 15px;">
                <div class="row">
                    <div class="d-flex flex-wrap col-11">
                        <h4 class="col-12 col-lg-3 modal-title nopadding nobreak">友善飲食平臺</h4>
                        <h class="col-12 col-lg-9 nopadding nobreak">|| 營養標籤｜篩選餐點｜搜集餐點</h4>
                    </div>
                    <div class="col-1">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-wrap align-items-center" style="background-color: #b2c3c5; width: 100%; padding: 10px;">
                        <!-- <div class="col-12 col-sm-10"> -->
                            <h6 style="word-wrap:break-word; color:#144142; margin-bottom: 50px;">
                                為了可以更規模化服務，我們正在開發友善飲食平臺。
                                讓在乎健康的你可以透過「低糖」、「高蛋白」、「低GI」等營養標籤，
                                快速找到符合自身需求的飲食，搜尋到合適、喜歡的餐點也能將餐點儲存起來。
                                未來也能將這份餐點的營養資訊記錄在屬於自己的飲食日記中。
                                我們初期將先與健康餐合作，將營養資訊電子化。
                                也將與物流搭配，讓餐點能準時抵達您的手中。
                            </h6>
                        <!-- </div> -->
                    </div>
                    <img src="/img/web_demo.png" style="width: 100%" />
                    <div class="d-flex flex-wrap">
                        <div class="d-flex justify-content-center align-items-center col-12 col-sm-4" 
                             style="margin: 20px 10px; background-color: #144142; color: white; word-wrap:break-word; width: 100%; line-height: 2em; font-size: 20px;">
                            標籤定義
                        </div>
                        <div class="col-12 col-lg-7 d-flex align-items-center" style="word-wrap:break-word; color:#144142; ">各個飲食標籤各有「為你而思」定義的標準範圍，故在使用標籤時還是需要根據個人需求，並且注意我們的文字說明。</div>
                    </div>
                    <hr>
                    <div class="d-flex flex-wrap flex-row-reverse">
                        <div class="d-flex justify-content-center align-items-center col-12 col-sm-4" 
                             style="margin: 20px 10px; background-color: #144142; color: white; word-wrap:break-word; width: 100%; line-height: 2em; font-size: 20px;">
                             使用方式
                        </div>
                        <div class="col-12 col-lg-7 d-flex align-items-center" style="word-wrap:break-word; color:#144142; ">根據自己的身體狀況、目標，或是專業人士建議過飲食後，至為你而思官網選擇符合自己飲食需求的標籤。可以同時選擇多個標籤呦</div>
                    </div>
                    <hr>
                    <div class="d-flex flex-wrap">
                        <div class="d-flex justify-content-center align-items-center col-12 col-sm-4" 
                             style="margin: 20px 10px; background-color: #144142; color: white; word-wrap:break-word; width: 100%; line-height: 2em; font-size: 20px;">
                             收集餐點
                        </div>
                        <div class="col-12 col-lg-7 d-flex align-items-center" style="word-wrap:break-word; color:#144142; ">利用營養標籤篩選完餐點後，可以將喜歡的餐點留存起來，之後就可以在自己的清單內選擇餐點囉！</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dictionary.close')}}</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('end_script')
<script src="/js/index.min.js"></script>
@stop
