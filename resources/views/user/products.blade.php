@php
    $title = 'Create Product';
    $product=  'active';
    $user = Auth::user();
@endphp
@include('user_includes.head')
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        @include('user_includes.header')
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('user_includes.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">

                    <div class="row layout-top-spacing" id="cancel-row">
                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Register Product</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div id="circle-basic" class="">
                                        <h3>Basic Info</h3>
                                        <section>
                                            <form id="contact" class="section contact other_info_form">
                                                @csrf
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-11 mx-auto">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="location">Name<span class="text-danger">*</span> </label>
                                                                        <input type="text" class="form-control mb-4" name="name" placeholder="Enter name of product*" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="country">Category<span class="text-danger">*</span> </label>
                                                                        <select name="country" class="form-control" required>
                                                                            <option value="">Select a category for product</option>
                                                                            <option value="Afganistan">Afghanistan</option>
                                                                            <option value="Albania">Albania</option>
                                                                            <option value="Algeria">Algeria</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="location">Tags </label>
                                                                        <input type="text" class="form-control mb-4" name="product_tags" data-role="tagsinput" value="" placeholder="Add tags associated with your product">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </section>
                                        <h3>Cover Photo</h3>
                                        <section>
                                            <p>Wonderful transition effects.</p>
                                        </section>
                                    </div>

                                    <div class="code-section-container">

                                        <button class="btn toggle-code-snippet"><span>Code</span></button>

                                        <div class="code-section text-left">
                                            <pre>
                                            $("selector").steps({
                                                cssClass: 'circle wizard'
                                            });
                                            </pre>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                        </div>
                    </div>

                    @include('user_includes.footer')
                </div>
                <!--  END CONTENT AREA  -->


            </div>
            <!-- END MAIN CONTAINER -->

            <div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal Header</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                        <div class="modal-body">
                              <p class="modal-text">Nulla imperdiet sed ipsum non lacinia. Duis accumsan egestas nulla, vel commodo orci tempus quis. </p>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            @include('user_includes.scripts')
            <script>

                $(document).ready(function() {

                    $('.about_company_btn').click(async function(e) {
                        e.preventDefault();
                        let data = [];
                        // basic info
                        let login = $('.about_company_form').serializeArray();
                        // console.log(login);
                        // return;

                        // append to form data object
                        let form_data = set_form_data(login);
                        let returned = await ajaxRequest('/update_about_company', form_data);
                        // console.log(returned);return;
                        validator(returned, '/user/settings');
                    });
                    // other_info

                    $('.other_info_btn').click(async function(e) {
                        e.preventDefault();
                        let data = [];
                        // basic info
                        let login = $('.other_info_form').serializeArray();
                        // console.log(login);
                        // return;

                        // append to form data object
                        let form_data = set_form_data(login);
                        let returned = await ajaxRequest('/update_company_info', form_data);
                        // console.log(returned);return;
                        validator(returned, '/user/settings');
                    });
                    $('.password_update_btn').click(async function(e) {
                        e.preventDefault();
                        let data = [];
                        // basic info
                        let login = $('.password_update_form').serializeArray();
                        // console.log(login);
                        // return;

                        // append to form data object
                        let form_data = set_form_data(login);
                        let returned = await ajaxRequest('/update_password', form_data);
                        // console.log(returned);return;
                        validator(returned, '/user/settings');
                    });


                });
                </script>
