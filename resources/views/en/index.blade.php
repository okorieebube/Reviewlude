@php
    $title = 'Home';
@endphp
@include('en_includes.head')
<body>

<!--header section start-->
@include('en_includes.header')
<!--header section end-->

<!--body content wrap start-->
<div class="main">

    <!--hero section start-->
    <section class="hero-section background-img" style="background: url('{{ asset('en/img/hero-bg-2.jpg') }}')no-repeat center center / cover">
        <div class="video-section-wrap">
            <div class="background-video-overly ptb-100">
                <div class="player"
                     data-property="{videoURL:'https://www.youtube.com/watch?v=gOqlwlQjVis',containment:'.video-section-wrap', quality:'highres', autoPlay:true, showControls: false, startAt:0, mute:true, opacity: 1}"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-8 col-lg-7">
                            <div class="hero-content-left text-white text-center mt-5 ptb-100">
                                <h1 class="text-white text-capitalize">
                                    {{-- The best businesses live here --}}
                                    Read reviews. write reviews.
                                     </h1>
                                <p class="lead">Find out exactly how customers feel about different business & services around the globe. </p>

                                <a href="#" class="btn google-play-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <!--clients logo start-->
                    <div class="row justify-content-between">
                        <div class="col-md-12">
                            <div class="client-section-wrap d-flex flex-row align-items-center">
                                <p class="lead mr-5 mb-0 text-white">Trusted by companies like:</p>
                                <ul class="list-inline justify-content-between">
                                    <li class="list-inline-item"><img src="{{ asset('en/img/client-1-gray.png') }}" width="85" alt="client"
                                                                      class="img-fluid"></li>
                                    <li class="list-inline-item"><img src="{{ asset('en/img/client-2-gray.png') }}" width="85" alt="client"
                                                                      class="img-fluid"></li>
                                    <li class="list-inline-item"><img src="{{ asset('en/img/client-3-gray.png') }}" width="85" alt="client"
                                                                      class="img-fluid"></li>
                                    <li class="list-inline-item"><img src="{{ asset('en/img/client-4-gray.png') }}" width="85" alt="client"
                                                                      class="img-fluid"></li>
                                    <li class="list-inline-item"><img src="{{ asset('en/img/client-5-gray.png') }}" width="85" alt="client"
                                                                      class="img-fluid"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--clients logo end-->
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="section-heading mb-5">
                        <span class="badge badge-success badge-pill">Key features</span>
                        <h5 class="h5 mt-3 mb-6">We help your
                            business explore how consumers feel about your services.</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-lg-0">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-credit-card icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Modular</h5>
                                <p class="text-muted mb-0">All components are built to be used in any combination.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-control-record icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Responsive</h5>
                                <p class="text-muted mb-0">Quick is optimized to work for most devices.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-vector icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Scalable</h5>
                                <p class="text-muted mb-0">Remain consistent while developing new features.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-receipt icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Customizable</h5>
                                <p class="text-muted mb-0">Change a few variables and the whole theme adapts.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->

    <!--about us section start-->
    <section id="about" class="about-us ptb-100 gray-light-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                    <div class="about-content-left section-heading">
                        <h2 class="">ReviewLude helps great businesses <span>get customer feedbacks</span></h2>
                        <p>Proactively syndicate open-source e-markets after low-risk high-yield synergy. Professionally
                            simplify visionary technology before team driven sources. </p>

                        <div class="single-feature mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="ti-vector rounded mr-3 icon icon-color-1"></span>
                                <h5 class="mb-0">Easy to use</h5>
                            </div>
                            <p>Synergistically deliver next-generation relationships whereas bleeding-edge resources. Continually pontificate stand-alone benefits whereas.</p>
                        </div>
                        <div class="single-feature mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="ti-dashboard rounded mr-3 icon icon-color-2"></span>
                                <h5 class="mb-0">Trust & Safety</h5>
                            </div>
                            <p>Phosfluorescently empower compelling intellectual capital and revolutionary web services. Compellingly develop cross-media.</p>
                        </div>

                        <div class="single-feature mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="ti-alarm-clock rounded mr-3 icon icon-color-3"></span>
                                <h5 class="mb-0">Thriving Community</h5>
                            </div>
                            <p>Phosfluorescently matrix enterprise-wide metrics vis-a-vis extensive imperatives. Energistically empower best-of-breed human</p>
                        </div>
                        <a href="#" class="btn solid-btn mt-2">View additional 10+ features</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-content-right">
                        <img src="{{ asset('en/img/about-img.png')}}" alt="about us" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about us section end-->

    <!--our video promo section start-->
    <section class="video-promo ptb-100 background-img"
             style="background: url('img/video-bg.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="video-promo-content mt-4 text-center">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="popup-youtube video-play-icon d-inline-block"><span class="ti-control-play"></span></a>
                        <h5 class="mt-4 text-white">Watch video overview</h5>

                        <div class="download-btn mt-5">
                            <a href="#" class="btn google-play-btn mr-3"><span class="ti-android"></span> Google
                                Play</a>
                            <a href="#" class="btn app-store-btn"><span class="ti-apple"></span> App Store</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--our video promo section end-->


    <!--our team section start-->
    {{-- <section id="team" class="team-member-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Our team members</h2>
                        <p class="lead">
                            Following reasons show advantages of adding AppCo to your lead pages, demos and checkouts
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team-member position-relative">
                        <div class="team-image">
                            <img src="img/team-4.jpg" alt="Team Members" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-white rounded-circle d-flex flex-column align-items-center justify-content-center">
                            <h5 class="mb-0">Edna Mason</h5>
                            <h6>Senior Designer</h6>
                            <ul class="list-inline team-social social-icon mt-4 text-white">
                                <li class="list-inline-item"><a href="#"><span class="ti-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-github"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team-member position-relative">
                        <div class="team-image">
                            <img src="img/team-1.jpg" alt="Team Members" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-white rounded-circle d-flex flex-column align-items-center justify-content-center">
                            <h5 class="mb-0">Edna Mason</h5>
                            <h6>Senior Designer</h6>
                            <ul class="list-inline team-social social-icon mt-4 text-white">
                                <li class="list-inline-item"><a href="#"><span class="ti-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-github"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team-member position-relative">
                        <div class="team-image">
                            <img src="img/team-2.jpg" alt="Team Members" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-white rounded-circle d-flex flex-column align-items-center justify-content-center">
                            <h5 class="mb-0">Edna Mason</h5>
                            <h6>Senior Designer</h6>
                            <ul class="list-inline team-social social-icon mt-4 text-white">
                                <li class="list-inline-item"><a href="#"><span class="ti-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-github"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team-member position-relative">
                        <div class="team-image">
                            <img src="img/team-3.jpg" alt="Team Members" class="img-fluid rounded-circle">
                        </div>
                        <div class="team-info text-white rounded-circle d-flex flex-column align-items-center justify-content-center">
                            <h5 class="mb-0">Edna Mason</h5>
                            <h6>Senior Designer</h6>
                            <ul class="list-inline team-social social-icon mt-4 text-white">
                                <li class="list-inline-item"><a href="#"><span class="ti-facebook"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-twitter"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-github"></span></a></li>
                                <li class="list-inline-item"><a href="#"><span class="ti-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--our team section end-->


    <!--testimonial section start-->
    <section class="testimonial-section gray-light-bg ptb-100">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6">
                    <div class="section-heading mb-5">
                        <h2>Testimonials <br><span>what clients say</span></h2>
                        <p class="lead">
                            Rapidiously morph transparent internal or "organic" sources whereas resource sucking
                            e-business. Conveniently innovate compelling internal.
                        </p>

                        <div class="client-section-wrap d-flex flex-row align-items-center">
                            <ul class="list-inline">
                                <li class="list-inline-item"><img src="{{ asset('en/img/client-1-color.png') }}" width="85" alt="client"
                                                                  class="img-fluid"></li>
                                <li class="list-inline-item"><img src="{{ asset('en/img/client-6-color.png') }}" width="85" alt="client"
                                                                  class="img-fluid"></li>
                                <li class="list-inline-item"><img src="{{ asset('en/img/client-3-color.png') }}" width="85" alt="client"
                                                                  class="img-fluid"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="owl-carousel owl-theme client-testimonial arrow-indicator">
                        <div class="item">
                            <div class="testimonial-quote-wrap">
                                <div class="media author-info mb-3">
                                    <div class="author-img mr-3">
                                        <img src="{{ asset('en/img/client-1.jpg')}}" alt="client" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">John Charles</h5>
                                        <span>Google</span>
                                    </div>
                                </div>
                                <div class="client-say">
                                    <p> <img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid"> Interactively optimize fully researched expertise vis-a-vis plug-and-play relationships. Intrinsicly develop viral core competencies for fully tested customer service. Enthusiastically create next-generation growth strategies and.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-quote-wrap">
                                <div class="media author-info mb-3">
                                    <div class="author-img mr-3">
                                        <img src="{{ asset('en/img/client-2.jpg')}}" alt="client" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Arabella Ora</h5>
                                        <span>Amazon</span>
                                    </div>
                                </div>
                                <div class="client-say">
                                    <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid">  Rapidiously develop user friendly growth strategies after extensive initiatives. Conveniently grow innovative benefits through fully tested deliverables. Rapidiously utilize focused platforms through end-to-end schemas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-quote-wrap">
                                <div class="media author-info mb-3">
                                    <div class="author-img mr-3">
                                        <img src="{{ asset('en/img/client-1.jpg')}}" alt="client" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Jeremy Jere</h5>
                                        <span>Themetags</span>
                                    </div>
                                </div>
                                <div class="client-say">
                                    <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid"> Objectively synthesize client-centered e-tailers for maintainable channels. Holisticly administrate customer directed vortals whereas tactical functionalities. Energistically monetize reliable imperatives through client-centric best practices. Collaboratively.</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-quote-wrap">
                                <div class="media author-info mb-3">
                                    <div class="author-img mr-3">
                                        <img src="{{ asset('en/img/client-1.jpg')}}" alt="client" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">John Charles</h5>
                                        <span>Google</span>
                                    </div>
                                </div>
                                <div class="client-say">
                                    <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid"> Enthusiastically innovate B2C data without clicks-and-mortar convergence. Monotonectally deliver compelling testing procedures vis-a-vis B2B testing procedures. Competently evisculate integrated resources whereas global processes. Enthusiastically.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial section end-->

    <!--client section start-->
    <section class="client-section gray-light-bg ptb-100">
        <div class="container">
            <!--clients logo start-->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Trusted by companies</h2>
                        <p class="lead">
                            Rapidiously morph transparent internal or "organic" sources whereas resource sucking
                            e-business. Conveniently innovate compelling internal.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme clients-carousel dot-indicator">
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-5-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-1-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-6-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-3-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-4-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-5-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-7-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-2-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-1-color.png')}}" alt="client logo" class="client-img">
                        </div>
                        <div class="item single-client">
                            <img src="{{ asset('en/img/client-3-color.png')}}" alt="client logo" class="client-img">
                        </div>
                    </div>
                </div>
            </div>
            <!--clients logo end-->
        </div>
    </section>
    <!--client section start-->

</div>
<!--body content wrap end-->


<!--footer section start-->
@include('en_includes.footer')
<!--footer section end-->
@include('en_includes.scripts')


