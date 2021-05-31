@php
    $title = 'Login';
$user = Auth::user();
@endphp
@include('en_includes.head')
<body>

<!--body content wrap start-->
<div class="main">

    <!--hero section start-->
    <section class="hero-section full-screen gray-light-bg">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">

                <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

                    <!-- Image -->
                    <div class="bg-cover vh-100 ml-n3 background-img" style="background-image: url(en/img/hero-bg-3.jpg);">
                        <div class="position-absolute login-signup-content">
                            <div class="position-relative text-white col-md-12 col-lg-7">
                                <h2 class="text-white">Forgot Password ? <br> Don't Worry You Can Reset it.</h2>
                                {{-- <p class="lead">Keep your face always toward the sunshine - and shadows will fall behind you. Continually pursue fully researched niches whereas timely platforms. Credibly parallel task optimal catalysts for change after focused catalysts for change.</p> --}}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6">
                    <div class="login-signup-wrap px-4 px-lg-5 my-5">
                        <!-- Heading -->
                        <h1 class="text-center mb-1">
                            Password Reset
                        </h1>

                        <!-- Subheading -->
                        <p class="text-muted text-center mb-5">
                            Enter your email to get a password reset link.
                        </p>

                        <!-- Form -->
                        <form class="login-signup-form">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-email color-primary"></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="name@address.com">
                                </div>
                            </div>
                            <!-- Submit -->
                            <button class="btn btn-lg btn-block solid-btn border-radius mt-4 mb-3">
                                Reset Password
                            </button>

                            <!-- Link -->
                            <div class="text-center">
                                <small class="text-muted text-center">
                                    Remember your password? <a href="login.html">Log in</a>.
                                </small>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div>
    </section>
    <!--hero section end-->

</div>
<!--body content wrap end-->

<!--jQuery-->
@include('en_includes.scripts')
<script>

$(document).ready(function() {


    // $('.enroll_modal').click(function(e) {
    //     e.preventDefault();
    //     append_id('enroll_id', '.enroll_form', '#enroll_modal', this)
    //     $('#enroll_modal').modal('toggle');
    // });

    // process form for creating live stream
    $('.login_btn').click(async function(e) {
        e.preventDefault();
        // console.log('yh');return;
        let data = [];
        // basic info
        let login = $('.login_form').serializeArray();
        console.log(login);
        // return;

        // append to form data object
        let form_data = set_form_data(login);
        let returned = await ajaxRequest('/login_acct', form_data);
        // console.log(returned);return;
        if (returned.status == false) {
            validator(returned, '/user/overview');
        }else if(returned.status == true){
            if(returned.user_type == 'business' || returned.user_type == 'admin'){
                validator(returned, '/user/overview');
            }else if(returned.user_type == 'reviewer'){
                validator(returned, '/categories');
            }
        }
    });

});
</script>
