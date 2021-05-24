@php
    $title = 'View';
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
                                <li class="list-inline-item breadcrumb-item"><a href="/">Home</a></li>
                                <li class="list-inline-item breadcrumb-item"><a href="#">{{ $product->company->company_name }}</a></li>
                                <li class="list-inline-item breadcrumb-item active">Review</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->

    <!--blog section start-->
    {{-- <div class="module ptb-100"> --}}
        <section id="contact" class="contact-us ptb-100 gray-light-bg pt-5">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-12 pb-3 message-box d-none">
                        <div class="alert alert-danger"></div>
                    </div> --}}
                    <div class="col-md-7 m-auto card pt-5">
                        <form  id="contactForm" class="contact-us-form submit_review_form" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->unique_id }}">
                            <input type="hidden" name="slug" value="{{ $product->slug }}">
                            <h5>How would you rate your experience?</h5>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <div class="my-rating"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="review" id="message" class="form-control" rows="7" cols="25"
                                                  placeholder="Describe what your experience with this product or service was like. Your feedback should be honest, helpful, & constructive..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn solid-btn submit_review_btn" id="btnContactUs">
                                        Submit Review
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </section>
    {{-- </div> --}}
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
    var rating;
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
            rating = currentRating;
        }
    });

    $('.submit_review_btn').click(async function(e) {
        e.preventDefault();
        let data = $('.submit_review_form').serializeArray();
        data.push({
        name: "star_rating",
        value: rating,
        });
        console.log(data);
        // return;
        let form_data = set_form_data(data);
        let returned = await ajaxRequest('/submit_review/'+data[1].value, form_data);
        validator(returned, '/review/'+data[2].value, form_data);
    });


</script>
