@php
    $title = 'Register';
@endphp
@include('en_includes.head')
<body>

<!--header section start-->
@include('en_includes.header')
<!--header section end-->

<!--body content wrap start-->
<div class="main">

    <!--hero section start-->
    <section class="hero-section ptb-100 background-img full-screen"
             style="background: url('img/hero-bg-1.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5 pt-sm-5 pt-md-5 pt-lg-0">
                <div class="col-md-7 col-lg-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white">Join our Ecosystem</h1>
                        <p class="lead">
                            Keep your face always toward the sunshine - and shadows will fall behind you.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h6 class="h3">Register Business</h6>
                                <p class="text-muted mb-0">Made with love by developers for developers.</p>
                            </div>
                            <form class="login-signup-form register_form">
                                @csrf
                                <!-- Password -->
                                <div class="form-group">
                                    <!-- Input group -->
                                <div class="form-group">
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            name="company_name"   placeholder="Company name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control"
                                            name="email"   placeholder="Work email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock color-primary"></span>
                                        </div>
                                        <input type="password" class="form-control"
                                            name="password"   placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock color-primary"></span>
                                        </div>
                                        <input type="password" class="form-control"
                                            name="password_confirmation"   placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="my-4">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="check-terms">
                                        <label class="custom-control-label" for="check-terms">I agree to the <a href="#">terms and conditions</a></label>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-lg btn-block solid-btn border-radius mt-4 mb-3 register_btn">
                                    Sign up
                                </button>
                            </form>

                        </div>
                        <div class="card-footer px-md-5 bg-transparent border-top"><small>Already have an account?</small>
                            <a href="{{ route('login') }}" class="small">Sign in</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-img-absolute">
            <img src="img/wave-shap.svg" alt="wave shape" class="img-fluid">
        </div>
    </section>
    <!--hero section end-->


</div>
<!--body content wrap end-->
<!--body content wrap end-->
<!--footer section end-->
@include('en_includes.scripts')
<script>
    $(document).ready(function() {


        // $('.enroll_modal').click(function(e) {
        //     e.preventDefault();
        //     append_id('enroll_id', '.enroll_form', '#enroll_modal', this)
        //     $('#enroll_modal').modal('toggle');
        // });

        // process form for creating live stream
        $('.register_btn').click(async function(e) {
            e.preventDefault();
            // console.log('yh');return;
            let data = [];
            // basic info
            let register = $('.register_form').serializeArray();
            console.log(register);
            // return;

            // append to form data object
            let form_data = set_form_data(register);
            let returned = await ajaxRequest('/register_business', form_data);
            // console.log(returned);return;
            validator(returned, '/register/business');
        });

    });
</script>
