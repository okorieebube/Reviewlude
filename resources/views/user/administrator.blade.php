@php
    $title = 'Admin';
    $admin=  'active';
    $aria_admin = 'true';
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

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="contact" class="section contact create_admin_form">
                                        @csrf
                                        <div class="info">
                                            <h5 class="">Create Admin</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row m-auto">
                                                        <div class="col-md-8 m-auto">
                                                            <div class="form-group">
                                                                <label for="address">Email Address<span class="text-danger">*</span> </label>
                                                                <input type="text" class="form-control mb-4" name="email" placeholder="Email Address" value="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 m-auto">
                                                            <div class="form-group">
                                                                <label for="location"> Password<span class="text-danger">*</span> </label>
                                                                <input type="password" class="form-control mb-4" name="password" placeholder="Password" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 m-auto">
                                                            <div class="form-group">
                                                                <label for="phone">Confirm Password<span class="text-danger">*</span> </label>
                                                                <input type="password" class="form-control mb-4" name="password_confirmation" placeholder="Confirm Password" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 m-auto">
                                                            <div class="form-group">
                                                                <div class="col-md-12 text-right mb-5">
                                                                    <button id="add-education" class="btn btn-primary create_admin_btn">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row layout-top-spacing" id="cancel-row">
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h5>Administrators</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive mb-4 mt-4">
                                            <table id="zero-config" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S/n</th>
                                                        <th>Email Address</th>
                                                        <th>Status</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- padding-bottom: 20px; --}}
                                                    @foreach ($users as $e => $k)
                                                    <tr>
                                                        <td>{{ $e+1 }}</td>
                                                        <td>{{ $k->email }}</td>
                                                        @if ($k->is_blocked  == 1)
                                                        <td>Blocked</td>
                                                        @else
                                                        <td>Not Blocked</td>
                                                        @endif
                                                        <td class="text-center">
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                                    <a id="{{ $k->unique_id }}" class="dropdown-item pointer block_modal">Block</a>
                                                                    <a class="dropdown-item pointer unblock_modal" id="{{ $k->unique_id }}">Unblock</a>
                                                                    <a id="{{ $k->unique_id }}" class="dropdown-item pointer delete_modal">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

            <div id="block_modal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title">Confirm*</h5> --}}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <form class="block_form">
                            @csrf
                            <div class="modal-body">
                                <p class="modal-text text-danger ">
                                    Click continue to block this account. Admin won't access this account.
                                </p>
                            </div>
                        </form>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                            <button type="button" class="btn btn-primary block_btn">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="unblock_modal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title">Confirm*</h5> --}}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <form class="unblock_form">
                            @csrf
                            <div class="modal-body">
                                <p class="modal-text text-danger ">
                                    Click continue to activate this account. Admin will access this account.
                                </p>
                            </div>
                        </form>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                            <button type="button" class="btn btn-primary unblock_btn">Continue</button>
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
                    $('.block_modal').click(function(e) {
                        e.preventDefault();
                        append_id('block_id', '.block_form', '#block_modal', this)
                        $('#block_modal').modal('toggle');
                    });
                    $('.unblock_modal').click(function(e) {
                        e.preventDefault();
                        append_id('unblock_id', '.unblock_form', '#unblock_modal', this)
                        $('#unblock_modal').modal('toggle');
                    });

                        $('.create_admin_btn').click(async function(e) {
                            e.preventDefault();
                            let data = [];
                            // basic info
                            let login = $('.create_admin_form').serializeArray();
                            // console.log(login);
                            // return;

                            // append to form data object
                            let form_data = set_form_data(login);
                            let returned = await ajaxRequest('/register_admin', form_data);
                            // console.log(returned);return;
                            validator(returned, '/user/register');
                        });
                        // other_info

                        $('.block_btn').click(async function(e) {
                            e.preventDefault();
                            let data = [];
                            // basic info
                            let login = $('.block_form').serializeArray();
                            // console.log(login);
                            // return;

                            // append to form data object
                        let form_data = set_form_data(login);
                        let returned = await ajaxRequest('/admin/block/'+login[1].value, form_data);
                            // console.log(returned);return;
                            validator(returned, '/user/register');
                        });
                        $('.unblock_btn').click(async function(e) {
                            e.preventDefault();
                            let data = [];
                            // basic info
                            let login = $('.unblock_form').serializeArray();
                            // console.log(login);
                            // return;

                            // append to form data object
                            let form_data = set_form_data(login);
                            let returned = await ajaxRequest('/admin/unblock/'+login[1].value, form_data);
                            // console.log(returned);return;
                            validator(returned, '/user/register');
                        });


                    });
            //     });
            // });
                </script>
