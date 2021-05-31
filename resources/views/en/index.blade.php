@php
    $title = 'Home';
$user = Auth::user();
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
                                <p class="lead">Find out exactly how consumers feel about different business & services around the globe. </p>

                                <a href="{{ route('register_reviewer') }}" class="btn google-play-btn">Start Reviewing</a>
                            </div>
                        </div>
                    </div>
                    <!--clients logo start-->
                    <div class="row justify-content-between">
                        <div class="col-md-12">
                            <div class="client-section-wrap d-flex flex-row align-items-center m-auto">
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
                            <div class="pt-2 pb-3"><h5>For Consumers</h5>
                                <p class="text-muted mb-0">Consumers can share their experiences.</p>
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
                            <div class="pt-2 pb-3"><h5>For Business</h5>
                                <p class="text-muted mb-0">Businesses can create better experiences.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-vector icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Trust</h5>
                                <p class="text-muted mb-0">Helping consumers shop with confidence.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card single-promo-card single-promo-hover mb-lg-0">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="ti-receipt icon-md color-secondary"></span>
                            </div>
                            <div class="pt-2 pb-3"><h5>Connection</h5>
                                <p class="text-muted mb-0">Bringing consumers and businesses together.</p></div>
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
                        <h2 class="">ReviewLude helps businesses <span>get consumer feedbacks</span></h2>
                        <p>Behind every consumers review is an experience that matters to us alot. </p>

                        <div class="single-feature mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="ti-vector rounded mr-3 icon icon-color-1"></span>
                                <h5 class="mb-0">Be heard</h5>
                            </div>
                            <p>Reviewlude is free and open to every company and consumer everywhere. Sharing your experiences helps others make better choices and companies up their game.</p>
                        </div>
                        <div class="single-feature mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="ti-dashboard rounded mr-3 icon icon-color-2"></span>
                                <h5 class="mb-0">We protect and promote trust</h5>
                            </div>
                            <p>We take the necessary measures and steps to ensure our platform’s integrity.</p>
                        </div>

                        <div class="single-feature mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="ti-alarm-clock rounded mr-3 icon icon-color-3"></span>
                                <h5 class="mb-0">Commited to Transparency</h5>
                            </div>
                            <p>We give all consumers a powerful voice and all companies a way to listen, respond and continually improve. This builds trust because this happens in a transparent environment with no pre-moderation or censorship</p>
                        </div>
                        <a href="{{ route('about') }}" class="btn solid-btn mt-2">Learn more</a>
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
                            <a href="{{ route('register_business') }}" class="btn google-play-btn mr-3">Join as Business
                                </a>
                            <a href="{{ route('register_reviewer') }}" class="btn app-store-btn">Join as Reviewer</a>
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
                            I rely a lot on reviews I read on Reviewlude and therefore am always willing to review companies, including Reviewlude itself.
Its a great resource.
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
                                        <h5 class="mb-0">William Muir</h5>
                                        <span>Google</span>
                                    </div>
                                </div>
                                <div class="client-say">
                                    <p> <img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid"> Reviewlude is amazing for finding information and reviews about websites and businesses as well as writing reviews and sharing information with others. I love how easy if is to write a review and as soon as a review is posted it can be seen by others. Reviewlude is really easy to use and is great for finding out and sharing information about businesses or websites.</p>
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
                                        <h5 class="mb-0">Lesley Peters</h5>
                                        <span>Amazon</span>
                                    </div>
                                </div>
                                <div class="client-say">
                                    <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid">  I love this site since I can share my online business and Social media using experiences here free! It helps me to find legit app and business site reviews simply.</p>
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
                                    <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid"> I had a negative review to post regarding very bad customer service from the plant website of Sarah Raven. It was easy to navigate Reviewlude and I am happy that I was able to express my opinion.</p>
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
                                    <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid"> Truth be told, some websites offer incentives for people to give them five stars on Reviewlude, so some of the reviews are not genuine. Reviewlude is still one of the best guides out there.</p>
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
                            The more consumers use our platform and share their own opinions, the richer the insights we offer businesses.
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


