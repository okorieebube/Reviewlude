@php
$title = 'All Products';
@endphp
@include('en_includes.head')

<body>

    <!--header section start-->
    @include('en_includes.header')
    <!--header section end-->

    <!--body content wrap start-->
    <div class="main">

        <!--header section start-->
        <section class="hero-section ptb-100 background-img" style="background: url({{ asset('en/img/hero-bg-2.jpg') }})no-repeat center center / cover">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                            <h1 class="text-white mb-0">Products & Services</h1>
                            <div class="custom-breadcrumb">
                                <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                    <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="list-inline-item breadcrumb-item"><a href="{{ route('view_categories') }}">Categories</a></li>
                                    <li class="list-inline-item breadcrumb-item active">{{ $category->name }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--header section end-->

        <!--blog section start-->
        <section class="our-blog-section ptb-100 gray-light-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="section-heading mb-5">
                            <h2>From Verified Companies </h2>
                            {{-- <p>
                            Enthusiastically drive revolutionary opportunities before emerging leadership. Distinctively
                            transform tactical methods of empowerment via resource sucking core.
                        </p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        @if (count($products) > 0)
                        @foreach ($products as $e)
                        <div style="float: left;" class="col-md-6 col-lg-4">
                            <a href="{{ route('view_product',$e->slug) }}">
                                <div class="single-blog-card card border-0 shadow-sm">
                                    <span class="category position-absolute badge badge-pill badge-primary">
                                        {{ $e->company->company_name }}
                                    </span>
                                    {{-- {{asset('/storage/uploads/products/'.$e->cover_photo)}} --}}
                                    <img src="{{asset('/storage/uploads/products/'.$e->cover_photo)}}" class="card-img-top position-relative" alt="blog" width="213.33px" height="134.81px">
                                    <div class="card-body card-categories pt-0">
                                        <div class="post-meta mb-2">
                                            <ul class="list-inline meta-list">
                                                <li class="list-inline-item">{{ $e->created_at->diffForhumans() }}</li>
                                                <li class="list-inline-item"><span>{{ $e->no_of_reviews }}</span> Reviews</li>
                                            </ul>
                                        </div>
                                        {{-- <h3 class="h5 card-title">{{ $e->name }}</h3> --}}

                                        <p class="h5 card-title over-flow">{{ $e->name }}</p>
                                        <a href="{{ route('view_product',$e->slug) }}" class="detail-link">Read more <span class="ti-arrow-right"></span></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                        @else
                        <div class="alert alert-secondary text-center text-capitalize" role="alert">
                            Sorry, No registered products or services under this category. Try other categories.
                        </div>
                        @endif


                    </div>
                    <div class="col-md-4">
                        <div class="sidebar-left single-blog-card card border-0 shadow-sm p-4">
                            <!-- Categories widget-->
                            <aside class="widget widget-categories">
                                <div class="widget-title">
                                    <h6>All Categories</h6>
                                </div>
                                <ul>
                                    @foreach ($categories as $e)
                                    <li><a href="{{route('view_products',$e->slug)}}">{{ $e->name }} <span class="float-right">{{ $e->no_of_products }}</span></a></li>
                                    @endforeach
                                </ul>
                            </aside>
                        </div>
                    </div>

                </div>

                <!--pagination start-->
                <div class="row">
                    <div class="col-md-12">
                        <nav class="custom-pagination-nav mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-left"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!--pagination end-->

            </div>
        </section>
        <!--blog section end-->

    </div>
    <!--body content wrap end-->

    <!--footer section start-->
    @include('en_includes.footer')
    <!--footer section end-->
    @include('en_includes.scripts')
