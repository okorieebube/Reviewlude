@php
$title = 'View';
$tags = explode(',',$product->tags);
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
                                    <input class="form-control review_input" type="search" placeholder="Write a review...">
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
                                    <a href="/search?search={{ $e }}">{{ $e }}</a>
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
                            <div class="post-preview"><a href="#"><img src="{{asset('/storage/uploads/products/'.$product->cover_photo)}}" width="730px" height="304.17px" alt="blog" /></a></div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h2 class="post-title"><a href="">{{ $product->name }} </a></h2>
                                    <ul class="post-meta">
                                        <li>{{ $product->created_at->diffForhumans() }}</li>
                                        <li><a href="{{route('view_products',$product->categories->slug)}}">{{ $product->categories->name }}</a></li>
                                        <li><a href="#">{{ count($reviews) }} Reviews</a></li>
                                    </ul>
                                    <ul class="post-meta post-rating">
                                        <li>
                                            <span class="trust-score-text"><strong>{{ $trust_score }}&nbsp; Trust Score</strong> with a <strong class="text-capitalize">{{ $performance }}</strong> performance</span>
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
                        @if (count($reviews) > 0)
                            @foreach ($reviews as $e)
                                <div class="testimonial-quote-wrap my-lg-3 my-md-3 rounded white-bg shadow-sm p-4">
                                    @auth

                                    @if ($user->user_type == 'admin')

                                    <button style="float: right;" id="{{ $e->unique_id }}" type="button" class="btn btn-danger btn-sm delete_btn">Delete</button>
                                    @endif
                                    @endauth
                                    <div class="media author-info mb-3">
                                        <div class="author-img mr-3">
                                            <a href="{{ route('user_profile',$e->user->unique_id) }}">
                                                <img src="{{ asset('/storage/uploads/logo/'.$e->settings->logo) }}" alt="client" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{ route('user_profile',$e->user->unique_id) }}">

                                                <?php if ($e->user->user_type == 'business') { ?>
                                                    <h5 class="mb-0 text-capitalize">{{ $e->user->company_name }}</h5>
                                                <?php } elseif ($e->user->user_type == 'reviewer') { ?>
                                                    <h5 class="mb-0 text-capitalize">{{ $e->user->first_name }} {{ $e->user->last_name }}</h5>
                                                <?php } elseif ($e->user->user_type == 'admin') { ?>
                                                    <h5 class="mb-0 text-capitalize">Administrator</h5>
                                                <?php } ?>
                                            </a>
                                            <div class="client-rating{{ $e->unique_id }}"></div>
                                        </div>
                                    </div>
                                    <div class="client-say">
                                        <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid">
                                            {{ $e->review }}
                                        </p>
                                    </div>
                                    @auth

                                    @if ($user->unique_id == $product->company->unique_id)

                                    <p>
                                        <strong id="{{ $e->unique_id }}" class="purple-text cursor-pointer reply_btn">
                                            Reply Review
                                        </strong>
                                    </p>
                                    @endif
                                    @endauth
                                    <p>
                                        <strong id="{{ $e->unique_id }}" class="purple-text">
                                            Posted {{ $e->created_at->diffForhumans() }}
                                        </strong>
                                    </p>
                                </div>
                                @if ($e->replies)
                                    @foreach ($e->replies as $k)
                                    <div class="testimonial-quote-wrap my-lg-3 my-md-3 rounded white-bg shadow-sm p-4 reply-review">
                                        <div class="media author-info mb-3">
                                            <div class="author-img mr-3">
                                                <img src="{{ asset('/storage/uploads/logo/'.$k->settings->logo) }}" alt="client" class="img-fluid rounded-circle">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-0">{{ $k->user->company_name }}</h5>
                                                <?php if ($e->user->user_type == 'business') { ?>
                                                    <span><em>Replying to {{ $e->user->company_name }}</em></span>
                                                <?php } elseif ($e->user->user_type == 'reviewer') { ?>
                                                    <span><em>Replying to {{ $e->user->first_name }} {{ $e->user->last_name }}</em></span>
                                                <?php } elseif ($e->user->user_type == 'admin') { ?>
                                                    <span><em>Replying to Administrator</em></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="client-say">
                                            <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid"> {{ $k->review }}</p>
                                        </div>
                                        <p>
                                            <strong id="{{ $e->unique_id }}" class="purple-text">
                                                Posted {{ $k->created_at->diffForhumans() }}
                                            </strong>
                                        </p>
                                    </div>
                                    @endforeach
                                @endif
                            @endforeach
                        @else
                        <div class="alert alert-secondary text-left text-capitalize" role="alert">
                            Sorry, this product has not been reviewed. If you are the owner, you can invite your customers to review it.
                        </div>
                        @endif

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
                </div>
            </div>
        </div>
        <!--blog section end-->

    </div>
    <!--body content wrap end-->

    <div id="confirm_modal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm delete*</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form class="delete_form">
                    @csrf
                    <div class="modal-body">
                        <p class="modal-text text-danger">
                            If you click continue, this review will be deleted. Visitors won't see this review.
                        </p>
                    </div>
                </form>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                    <button type="button" class="btn btn-primary delete_modal_btn">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div id="reply_modal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reply Review*</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form class="reply_form">
                    @csrf
                    <div class="modal-body">
                        {{-- <input type="text" class="form-control" name="reply_review"> --}}
                        <textarea name="reply" id="" cols="30" rows="5" class="form-control" placeholder="Type in your reply message...."></textarea>
                    </div>
                </form>
                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                    <button type="button" class="btn btn-primary reply_modal_btn">Reply</button>
                </div>
            </div>
        </div>
    </div>

    <!--footer section start-->
    @include('en_includes.footer')
    <!--footer section end-->
    @include('en_includes.scripts')
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> --}}
    <script src="{{asset('en/custom/star-rating-svg/src/jquery.star-rating-svg.js')}}"></script>

    <script>
        $('.review_input').focus(function(e) {
            e.preventDefault();
            window.location.href = '/review/{{ $product->slug }}';

        });

        $('.delete_btn').click(function(e) {
            e.preventDefault();
            append_id('review_id', '.delete_form', '#confirm_modal', this)
            $('#confirm_modal').modal('toggle');
        });
        $('.reply_btn').click(function(e) {
            e.preventDefault();
            append_id('review_id', '.reply_form', '#reply_modal', this)
            $('#reply_modal').modal('toggle');
        });

        $('.delete_modal_btn').click(async function(e) {
            e.preventDefault();
            let data = $('.delete_form').serializeArray();

            // console.log(data); return;p
            let form_data = set_form_data(data);
            let returned = await ajaxRequest('/delete_review/' + data[1].value, form_data);
            validator(returned, '/product/{{ $product->slug }}');
        });
        $('.reply_modal_btn').click(async function(e) {
            e.preventDefault();
            let data = $('.reply_form').serializeArray();

            // console.log(data); return;
            let form_data = set_form_data(data);
            let returned = await ajaxRequest('/reply_review', form_data);
            validator(returned, '/product/{{ $product->slug }}');
        });
        $(".my-rating").starRating({
            starShape: 'rounded',
            totalStars: 5,
            emptyColor: 'lightgray',
            hoverColor: 'slategray',
            activeColor: 'rgba(32, 40, 119, 0.95)', //cornflowerblue
            initialRating: 0,
            strokeWidth: 0,
            useGradient: false,
            minRating: 0,
            callback: function(currentRating, $el) {
                window.location.href = '/review/{{ $product->slug }}';
            }
        });
        $(".main-rating").starRating({
            starShape: 'rounded',
            totalStars: 5,
            emptyColor: 'lightgray',
            hoverColor: 'slategray',
            activeColor: '#6730e3', //cornflowerblue
            initialRating: {{ $trust_score }},
            strokeWidth: 0,
            useGradient: false,
            minRating: 0,
            readOnly: true,
            starSize: 25,
            callback: function(currentRating, $el) {
                // make a server call here
            }
        });


        @foreach($reviews as $e)
        $(".client-rating{{ $e->unique_id }}").starRating({
            starShape: 'rounded',
            totalStars: 5,
            emptyColor: 'lightgray',
            hoverColor: 'slategray',
            activeColor: '#6730e3', //cornflowerblue
            initialRating:{{ $e->star_rating }},
            strokeWidth: 0,
            useGradient: false,
            minRating: 0,
            readOnly: true,
            starSize: 25,
            callback: function(currentRating, $el) {
                // make a server call here
            }
        });
        @endforeach
    </script>
