@php
$title = 'About us';
$user = Auth::user();
@endphp
@include('en_includes.head')

<body>

    <!--header section start-->
    @include('en_includes.header')
    <!--header section end-->

    <!--body content wrap start-->
    <div class="main">

        <!--header section start-->
        <section class="hero-section ptb-100 background-img" style="background: url('{{ asset('en/img/hero-bg-2.jpg') }}')no-repeat center center / cover">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                            <h1 class="text-white mb-0 text-capitalize">Our Company</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--header section end-->

        <!--blog section start-->
        <div class="module">
            <section id="about" class="about-us ptb-100 gray-light-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="about-content-right">
                                <img src="{{ asset('en/img/delivery-app.svg') }}" width="500" alt="about us" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <span class="badge badge-primary badge-pill">Know about us</span>
                            <h2 class="mt-4">We're Reviewlude</h2>
                            <p class="mb-4 lh-190">Reviewlude hosts reviews to help consumers shop with confidence, and deliver rich insights to help businesses improve the experiences they offer. The more consumers use our platform and share their own opinions, the richer the insights we offer businesses, and the more opportunities they have to earn the trust of consumers from all around the world.</p>
                            <ul class="list-unstyled">
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-primary mr-3">
                                                <span class="ti-check"></span>
                                            </div>
                                        </div>
                                        <div><p class="mb-0">Consumers can share their experiences</p></div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-primary mr-3">
                                                <span class="ti-check"></span>
                                            </div>
                                        </div>
                                        <div><p class="mb-0">Businesses can create better experiences</p></div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-primary mr-3">
                                                <span class="ti-check"></span>
                                            </div>
                                        </div>
                                        <div><p class="mb-0">Helping consumers shop with confidence.</p></div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-primary mr-3">
                                                <span class="ti-check"></span>
                                            </div>
                                        </div>
                                        <div><p class="mb-0">Bringing consumers and businesses together</p></div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="badge badge-circle badge-primary mr-3">
                                                <span class="ti-check"></span>
                                            </div>
                                        </div>
                                        <div><p class="mb-0">Free and open to everyone.</p></div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <!--blog section end-->

    </div>
    <!--body content wrap end-->
    <!--footer section start-->
    @include('en_includes.footer')
    <!--footer section end-->
    @include('en_includes.scripts')
