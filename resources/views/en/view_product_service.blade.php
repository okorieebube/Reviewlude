@php
    $title = 'View';
    $tags = explode(',',$product->tags);
@endphp
@include('en_includes.head')
<body>

<!--header section start-->
@include('en_includes.header')
<!--header section end-->

<!--body content wrap start-->
<div class="main">

    <!--header section start-->
    <section class="hero-section ptb-100 background-img"
             style="background: url('{{ asset('en/img/hero-bg-2.jpg') }}')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">{{ $product->name }}</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                {{-- <li class="list-inline-item breadcrumb-item"><a href="/">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="list-inline-item breadcrumb-item active">Blog Left Sidebar</li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->

    <!--blog section start-->
    <div class="module ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="sidebar-left pr-4">
                        <aside class="widget widget-search">
                            <form>
                                <input class="form-control" type="search" placeholder="Write a review...">
                                <button class="search-button" type="submit"><span class="ti-search"></span></button>
                            </form>
                        </aside>
                        {{-- <div class="my-rating"></div> --}}
                        <aside class="widget widget-tag-cloud mb-4">
                            <div class="widget-title">
                                <h6>Give us a Rating</h6>
                            </div>
                            <div class="tag-cloud text-lowercase">
                                <div class="my-rating"></div>
                            </div>
                        </aside>
                        <!-- Tags widget-->
                        <aside class="widget widget-tag-cloud mb-4">
                            <div class="widget-title">
                                <h6>Tags</h6>
                            </div>
                            <div class="tag-cloud text-lowercase">
                                @foreach ($tags as $e)
                                <a href="#">{{ $e }}</a>
                                @endforeach
                                {{-- <a href="#">portfolio</a>
                                <a href="#">responsive</a>
                                <a href="#">bootstrap</a>
                                <a href="#">business</a>
                                <a href="#">corporate</a> --}}
                            </div>
                        </aside>


                        <!-- Subscribe widget-->
                        <aside class="widget widget-categories mb-4">
                            <div class="widget-title">
                                <h6>Company Email</h6>
                            </div>
                            <p>info@metalabs.com</p>
                        </aside>
                        <!-- Categories widget-->
                        <aside class="widget widget-categories d-none d-sm-block">
                            <div class="widget-title">
                                <h6>Other Categories</h6>
                            </div>
                            <ul>
                                @foreach ($categories as $e)
                                <li><a href="{{route('view_products',$e->slug)}}">{{ $e->name }} <span class="float-right">{{ $e->no_of_products }}</span></a></li>
                                @endforeach
                            </ul>
                        </aside>


                    </div>
                </div>
                <div class="col-lg-8 col-md-8">

                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><a href="#"><img src="{{asset('/storage/uploads/products/'.$product->cover_photo)}}" width="730px" height="304.17px" alt="blog"/></a></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h2 class="post-title"><a href="">{{ $product->name }} </a></h2>
                                <ul class="post-meta">
                                    <li>{{ $product->created_at->diffForhumans() }}</li>
                                    <li><a href="{{route('view_products',$product->categories->slug)}}">{{ $product->categories->name }}</a></li>
                                    <li><a href="#">3 Reviews</a></li>
                                </ul>
                                <ul class="post-meta post-rating">
                                    <li>
                                        <span class="trust-score-text"><strong>4.9&nbsp; Trust Score</strong> with an <strong>Excellent</strong> performance</span>
                                    </li>
                                </ul>
                                <ul class="post-meta post-rating">
                                    <li>
                                        <div class="main-rating"></div>
                                    </li>
                                </ul>
                            </div>

                            <div class="post-content">
                                <p>{!! $product->description !!}</p>
                            </div>
                            {{-- <div class="post-more pt-4 align-items-center d-flex"><a href="#" class="btn solid-btn">Read more <span class="ti-arrow-right"></span></a></div> --}}
                        </div>
                    </article>
                    <!-- Post end-->

                    <h3 class="post-title">Client Reviews </h3>
                    <div class="testimonial-quote-wrap my-lg-3 my-md-3 rounded white-bg shadow-sm p-4">
                        <div class="client-say">
                            <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid">  Rapidiously develop user friendly growth strategies after extensive initiatives. Conveniently grow innovative benefits through fully tested deliverables. Rapidiously utilize focused platforms through end-to-end schemas.</p>
                        </div>
                        <div class="media author-info mb-3">
                            <div class="author-img mr-3">
                                <img src="{{ asset('en/img/client-2.jpg')}}" alt="client" class="img-fluid rounded-circle">
                            </div>
                            <div class="media-body">
                                <h5 class="mb-0">Runu Mondol</h5>
                                <span>BizBite</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-quote-wrap my-lg-3 my-md-3 rounded white-bg shadow-sm p-4">
                        <div class="client-say">
                            <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid">  Rapidiously develop user friendly growth strategies after extensive initiatives. Conveniently grow innovative benefits through fully tested deliverables. Rapidiously utilize focused platforms through end-to-end schemas.</p>
                        </div>
                        <div class="media author-info mb-3">
                            <div class="author-img mr-3">
                                <img src="{{ asset('en/img/client-2.jpg')}}" alt="client" class="img-fluid rounded-circle">
                            </div>
                            <div class="media-body">
                                <h5 class="mb-0">Runu Mondol</h5>
                                <span>BizBite</span>
                            </div>
                        </div>
                    </div>

                    <!-- Page Navigation-->
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <nav class="custom-pagination-nav">
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
                    </div> --}}
                    <!-- Page Navigation end-->
                </div>

                {{-- <div class="col-md-6 col-sm-6 col-lg-6"> --}}
                    {{-- <div class="testimonial-quote-wrap my-lg-3 my-md-3 rounded white-bg shadow-sm p-5">
                        <div class="client-say">
                            <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid">  Rapidiously develop user friendly growth strategies after extensive initiatives. Conveniently grow innovative benefits through fully tested deliverables. Rapidiously utilize focused platforms through end-to-end schemas.</p>
                        </div>
                        <div class="media author-info mb-3">
                            <div class="author-img mr-3">
                                <img src="{{ asset('en/img/client-2.jpg')}}" alt="client" class="img-fluid rounded-circle">
                            </div>
                            <div class="media-body">
                                <h5 class="mb-0">Runu Mondol</h5>
                                <span>BizBite</span>
                            </div>
                        </div>
                    </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <!--blog section end-->

</div>
<!--body content wrap end-->

<!--footer section start-->
@include('en_includes.footer')
<!--footer section end-->
@include('en_includes.scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{{asset('en/custom/star-rating-svg/src/jquery.star-rating-svg.js')}}"></script>

<script>
    $(".my-rating").starRating({
        starShape: 'rounded',
        totalStars: 5,
        emptyColor: 'lightgray',
        hoverColor: 'slategray',
        activeColor: 'rgba(32, 40, 119, 0.95)',//cornflowerblue
        initialRating: 0,
        strokeWidth: 0,
        useGradient: false,
        minRating: 0,
        callback: function(currentRating, $el){
            // make a server call here
        }
    });
    $(".main-rating").starRating({
        starShape: 'rounded',
        totalStars: 5,
        emptyColor: 'lightgray',
        hoverColor: 'slategray',
        activeColor: 'rgba(32, 40, 119, 0.95)',//cornflowerblue
        initialRating: 2,
        strokeWidth: 0,
        useGradient: false,
        minRating: 0,
        readOnly: true,
        starSize: 25,
        callback: function(currentRating, $el){
            // make a server call here
        }
    });

</script>
