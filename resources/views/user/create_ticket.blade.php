@php
    $title = 'Ticket';
    $ticket=  'active';
    $aria_ticket = 'true';
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
                            <div class="row">

                                <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                                @if ($user->user_type == 'business')
                                    <form id="work-platforms" class="section work-platforms reply_support_form">
                                        @csrf
                                        <div class="info">
                                            <h5 class="blue-text">Create Ticket</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">

                                                    <div class="platform-div">
                                                        <div class="form-group">
                                                            <label for="platform-title"><strong>Title<span class="text-danger">*</span> </strong></label>
                                                            <input type="text" class="form-control mb-4" name="title" placeholder="Enter a title*" value="" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="platform-title"><strong>Message<span class="text-danger">*</span> </strong></label>
                                                            <textarea rows="10" class="form-control" name="message" placeholder="Describe your issue or share your ideas..."></textarea>
                                                        </div>
                                                        <div class="form-group text-right">
                                                        <button id="add-work-platforms" class="btn btn-primary reply_support_btn">Create Ticket</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>

                                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                                    <div class="user-profile layout-spacing">
                                        <div class="widget-content widget-content-area">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped mb-4">
                                                    <thead>
                                                        <tr>
                                                            <th>SUBMITTED TICKETS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!$tickets->isEmpty())
                                                            @foreach ($tickets as $e)
                                                        <tr>
                                                            <td class="text-capitalize">
                                                                <a href="{{ route('reply_ticket', $e->unique_id) }} ">{{ $e->title }}</a>
                                                                <p style="font-size: 14px" class="lead text-warning">{{ $e->created_at->diffForhumans() }}</p>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td class="text-center"> No Records Found </td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
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
            // require(['custom/main'], function() {
                // Configuration loaded now, safe to do other require calls
                // that depend on that config.
                // require(['jquery','Basic_function'], function($,Basic_function) {


                    $(document).ready(function() {

                        $('.reply_support_btn').click(async function(e) {
                            e.preventDefault();
                            let data = $('.reply_support_form').serializeArray();
                            // console.log(data);return;
                            let form_data = set_form_data(data);
                            let returned = await ajaxRequest('/ticket/create', form_data);
                            // console.log(returned);
                            // return;
                            validator(returned, '/user/ticket');
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
            //     });
            // });
                </script>
