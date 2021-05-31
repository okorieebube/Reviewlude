@php
$title = 'Business Profile';
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
                            <h1 class="text-white mb-0 text-capitalize">{{ $profile->company_name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--header section end-->

        <!--blog section start-->
        <div class="module">
            <section class="team-single-section ptb-100">
                <div class="container">
                    <div class="row align-items-center m-auto">
                        <div class="col-md-12 col-sm-12 col-lg-3">
                            <div class="team-single-img">
                                <img src="{{ asset('/storage/uploads/logo/'.$profile->settings->logo) }}" alt="member" class="img-fluid rounded shadow-sm"/>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-6">
                            <div class="team-single-text">
                                <div class="team-name mb-4">
                                    <h3 class="mb-1 text-capitalize">{{ $profile->company_name }}</h3>
                                    <span>{{ $profile->website }}</span>
                                </div>
                                <h5 class="mb-1 text-capitalize">Contact us</h5>
                                <ul class="team-single-info">
                                    <li><strong>Phone:</strong><span> {{ $profile->phone }}</span></li>
                                    <li><strong>Company Email:</strong><span> {{ $profile->email }}</span></li><br>
                                </ul>
                                <h5 class="mb-1 text-capitalize">Location</h5>
                                <ul class="team-single-info">
                                    <li><strong>Address:</strong><span> {{ $info->street_address }}</span></li>
                                    <li><strong>City:</strong><span> {{ $info->city }}</span></li>
                                    <li><strong>Country:</strong><span> {{ $info->country }}</span></li>
                                    <li><strong>Zip code:</strong><span> {{ $info->zip_code }}</span></li><br>
                                </ul>
                                <h5 class="mb-1 text-capitalize">What we do</h5>
                                <div class="text-content mt-20">
                                    <p>{{$info->description}}</p>
                                </div>
                                {{-- <ul class="team-social-list list-inline mt-4">
                                    <li class="list-inline-item"><a href="#" class="color-primary"><span class="ti-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="#" class="color-primary"><span class="ti-instagram"></span></a></li>
                                    <li class="list-inline-item"><a href="#" class="color-primary"><span class="ti-dribbble"></span></a></li>
                                    <li class="list-inline-item"><a href="#" class="color-primary"><span class="ti-linkedin"></span></a></li>
                                </ul> --}}
                            </div>
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
