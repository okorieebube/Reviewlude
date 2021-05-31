@php
    $title = 'User Profile';
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
    <section class="hero-section ptb-100 background-img"
             style="background: url('{{ asset('en/img/hero-bg-2.jpg') }}')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">User Profile</h1>
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
    <div class="module pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 m-auto" >
                    <div class="testimonial-quote-wrap my-lg-3 my-md-3 rounded white-bg shadow-sm p-4 mb-5">
                        <div class="media author-info mb-3">
                            <div class="author-img mr-3">
                                <a href="{{ route('user_profile',$user_profile->unique_id) }}">
                                    <img src="{{ asset('en/img/client-2.jpg')}}" alt="client" class="img-fluid rounded-circle">
                                </a>
                            </div>
                            <div class="media-body pt-3">
                                <?php if($user_profile->user_type == 'business'){ ?>
                                    <h5 class="mb-0 text-capitalize">{{ $user_profile->company_name }}</h5>
                                <?php }elseif($user_profile->user_type == 'reviewer'){ ?>
                                    <h5 class="mb-0 text-capitalize">{{ $user_profile->first_name }} {{ $user_profile->last_name }}</h5>
                                <?php }elseif($user_profile->user_type == 'admin'){ ?>
                                    <h5 class="mb-0 text-capitalize">Administrator</h5>
                                <?php } ?>
                                <p>3 Total Reviews</p>
                            </div>
                        </div>
                    </div>
                    <h5 class="post-title mt-5 mb-2">Previous Reviews </h5>
                @foreach ($reviews as $e)
                    <div class="testimonial-quote-wrap my-lg-3 my-md-3 rounded white-bg shadow-sm p-4">
                        <p>
                            <strong>
                                Review of <a href="{{ route('view_product', $e->product->slug) }}" class="purple-text">{{ $e->product->name }}</a>
                            </strong>
                        </p>
                        <div class="media author-info mb-3">
                            <div class="author-img mr-3">
                                <a href="{{ route('user_profile',$user_profile->unique_id) }}">
                                    <img src="{{ asset('en/img/client-2.jpg')}}" alt="client" class="img-fluid rounded-circle">
                                </a>
                            </div>
                            <div class="media-body">
                                <?php if($e->user->user_type == 'business'){ ?>
                                    <h5 class="mb-0 text-capitalize">{{ $e->user->company_name }}</h5>
                                <?php }elseif($e->user->user_type == 'reviewer'){ ?>
                                    <h5 class="mb-0 text-capitalize">{{ $e->user->first_name }} {{ $e->user->last_name }}</h5>
                                <?php }elseif($e->user->user_type == 'admin'){ ?>
                                    <h5 class="mb-0 text-capitalize">Administrator</h5>
                                <?php } ?>
                                <div class="client-rating{{ $e->unique_id }}"></div>
                            </div>
                        </div>
                        <div class="client-say">
                            <p><img src="{{ asset('en/img/quote.png')}}" alt="quote" class="img-fluid">
                                {{ $e->review }}
                            </p>
                        </div>
                    </div>
                @endforeach

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

<!--footer section start-->
@include('en_includes.footer')
<!--footer section end-->
@include('en_includes.scripts')
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> --}}
<script src="{{asset('en/custom/star-rating-svg/src/jquery.star-rating-svg.js')}}"></script>

<script>

    $('.delete_btn').click(function(e) {
        e.preventDefault();
        append_id('review_id', '.delete_form', '#confirm_modal', this)
        $('#confirm_modal').modal('toggle');
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


         @foreach ($reviews as $e)
            $(".client-rating{{ $e->unique_id }}").starRating({
                starShape: 'rounded',
                totalStars: 5,
                emptyColor: 'lightgray',
                hoverColor: 'slategray',
                activeColor: '#6730e3',//cornflowerblue
                initialRating: {{ $e->star_rating }},
                strokeWidth: 0,
                useGradient: false,
                minRating: 0,
                readOnly: true,
                starSize: 25,
                callback: function(currentRating, $el){
                    // make a server call here
                }
            });
        @endforeach


</script>
