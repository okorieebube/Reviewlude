@php
    $title = 'Login';
$user = Auth::user();
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
             style="background: url('en/img/hero-bg-1.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5 pt-sm-5 pt-md-5 pt-lg-0">
                <div class="col-md-7 col-lg-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white">Welcome Back!</h1>
                        <p class="lead">
                            Read reviews. Write reviews. Find companies.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h5 class="h3">Login</h5>
                                <p class="text-muted mb-0">Sign in to your account to continue.</p>
                            </div>

                            <!--login form-->
                            <form class="login-signup-form login_form">
                                @csrf
                                <div class="form-group">
                                    <label class="pb-1">Email Address</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-email color-primary"></span>
                                        </div>
                                        <input type="email" name="email" class="form-control" placeholder="name@yourdomain.com">
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1">Password</label>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ route('forgot_password') }}" class="form-text small text-muted">
                                                Forgot password?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock color-primary"></span>
                                        </div>
                                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-lg btn-block solid-btn border-radius mt-4 mb-3 login_btn">
                                    Sign in
                                </button>

                            </form>
                        </div>
                        <div class="card-footer bg-transparent border-top px-md-5"><small>Not registered?</small>
                             Join as a<a href="{{ route('register_business') }}" class="small"> Business</a> or<a href="{{ route('register_business') }}" class="small"> Reviewer</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-img-absolute">
            <img src="img/hero-bg-shape-1.svg" alt="wave shape" class="img-fluid">
        </div>
    </section>
    <!--hero section end-->


</div>
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
            if(returned.user_type == 'business'){
                validator(returned, '/user/overview');
            }else if(returned.user_type == 'reviewer'){
                validator(returned, '/categories');
            }else if(returned.user_type == 'admin'){
                validator(returned, '/admin/overview');
            }
        }
    });

});
</script>
