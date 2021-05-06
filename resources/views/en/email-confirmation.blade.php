@php
    $title = 'Email Confirmation';
@endphp
@include('en_includes.head')
<body>

<!--body content wrap start-->
<div class="main">

    <!--hero section start-->
    <section class="hero-section ptb-100 background-img full-screen"
             style="background: url('{{ asset('en/img/hero-bg-1.jpg') }}')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="hero-content-left text-white text-center">
                        <h1 class="text-white text-capitalize"> Hello, {{ $user->first_name }}</h1>

                        <h5 class="text-white">Your Email address has been confirmed, successfully!</h5>

                        <div class="mb-5">
                            <a class="text-white" href="{{ route('login') }}">Proceed to Login?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

</div>
<!--body content wrap end-->

<!--jQuery-->
@include('en_includes.scripts')
<script>
</script>
