@php
$title = 'All Users';
$users= 'active';
    $aria_users = 'true';
$user = Auth::user();
@endphp
@include('user_includes.head')

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
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
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h5>Registered Users</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive mb-4 mt-4">
                                            <table id="zero-config" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S/n</th>
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Account Status</th>
                                                        <th>Email Verification</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- padding-bottom: 20px; --}}
                                                    @foreach ($all_users as $k => $e)
                                                    <tr>
                                                        <td>{{ $k+1 }}</td>
                                                        @if ($e->user_type == 'business')
                                                        <td>{{ $e->company_name }}</td>
                                                        @else
                                                        <td>{{ $e->first_name.' '.$e->last_name }}</td>
                                                        @endif
                                                        <td class="text-capitalize">{{ $e->user_type }}</td>
                                                        @if ($e->is_blocked == '0')
                                                        <td class="text-success">
                                                            <strong>Active</strong>
                                                        </td>
                                                        @else
                                                        <td class="text-danger">
                                                            <strong>Blocked</strong>
                                                        </td>
                                                        @endif
                                                        @if ($e->is_email_validated == '1')
                                                        <td class="text-success">
                                                            <strong>Verified</strong>
                                                        </td>
                                                        @else
                                                        <td class="text-warning">
                                                            <strong>Not Verified</strong>
                                                        </td>
                                                        @endif
                                                        <td class="text-center">
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">

                                                                    <a class="dropdown-item" href="{{ route('edit_product',$e->unique_id ) }}">View</a>
                                                                    <a id="{{ $e->unique_id }}" class="dropdown-item pointer confirm_modal">Confirm</a>
                                                                    @if ($e->is_blocked == 0)
                                                                    <a id="{{ $e->unique_id }}" class="dropdown-item pointer block_modal">Block</a>
                                                                    @else
                                                                    <a id="{{ $e->unique_id }}" class="dropdown-item pointer unblock_modal">Unblock</a>
                                                                    @endif
                                                                    <a id="{{ $e->unique_id }}" class="dropdown-item pointer delete_modal">Delete</a>
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
            <div id="confirm_modal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
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
                        <form class="confirm_modal_form">
                            @csrf
                            <div class="modal-body">
                                <p class="modal-text">
                                    If you click continue, this product will be made visible to reviewers.
                                </p>
                            </div>
                        </form>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                            <button type="button" class="btn btn-primary confirm_modal_btn">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="delete_modal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
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
                        <form class="delete_modal_form">
                            @csrf
                            <div class="modal-body">
                                <p class="modal-text">
                                    If you click continue, this account will be deleted permanently. <br>
                                    Users won't be able to find this account.
                                </p>
                            </div>
                        </form>
                        {{-- <div class="modal-body">
                            <p class="modal-text">
                                If you click continue, this product will be made visible to reviewers.
                            </p>
                        </div> --}}
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                            <button type="button" class="btn btn-primary delete_modal_btn">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

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
                                    Click continue to deactivate this account. This user wont have access to this account.
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
                                    Click continue to activate this account. User will regain access to this account.
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
                tinymce.init({
                    selector: '#desc',
                });
                // var ss = $(".category").select2({
                //     tags: true,
                // });
                $(document).ready(function() {
                    $('.confirm_modal').click(function(e) {
                        e.preventDefault();
                        append_id('confirm_id', '.confirm_modal_form', '#confirm_modal', this)
                        $('#confirm_modal').modal('toggle');
                    });
                    $('.delete_modal').click(function(e) {
                        e.preventDefault();
                        // console.log(this);return;
                        append_id('delete_id', '.delete_modal_form', '#delete_modal', this)
                        $('#delete_modal').modal('toggle');
                    });
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
                            validator(returned, '/user/all');
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
                            validator(returned, '/user/all');
                        });

                    $('.confirm_modal_btn').click(async function(e) {
                        e.preventDefault();
                        let confirm_modal_form = $('.confirm_modal_form').serializeArray();
                        // console.log(confirm_modal_form);
                        // return;
                        let form_data = set_form_data(confirm_modal_form);
                        let returned = await ajaxRequest('/user/confirm/'+confirm_modal_form[1].value, form_data);
                        validator(returned, '/user/all');
                    });
                    $('.delete_modal_btn').click(async function(e) {
                        e.preventDefault();
                        let delete_modal_form = $('.delete_modal_form').serializeArray();
                        // console.log(confirm_modal_form);
                        // return;
                        let form_data = set_form_data(delete_modal_form);
                        let returned = await ajaxRequest('/user/delete/'+delete_modal_form[1].value, form_data);
                        validator(returned, '/user/all');
                    });

                    $("li:contains(Finish)").click(function(e) {
                    e.preventDefault();
                    // console.log(e);
                    $('#confirmation_modal').modal('toggle');
                    });

                    // process form for creating course
                    $('.create_product_btn').click(async function(e) {
                        e.preventDefault();
                        let data = [];

                        // basic info
                        let basic_info = $('.create_product_form').serializeArray();
                        basic_info.forEach(e => {
                        data.push(e);
                        });

                        let tags = $(".form_tags").val();
                        data.push({
                        name: "tags",
                        value: tags
                        });
                        // tiny mce description
                        let desc = tinymce.get("desc").getContent();
                        data.push({
                            name: "desc",
                            value: desc
                        });

                        // file upload
                        let cover_img = $('#input-file-max-fs').prop('files')[0];
                        data.push({
                            name: "cover_img",
                            value: cover_img
                        });
                        // console.log(data); return;

                        // append to form data object
                        let form_data = set_form_data(data);
                        let returned = await ajaxRequest('/create_product', form_data);
                        // console.log(returned);
                        // return;
                        validator(returned, '/user/products');
                    });


                });
            </script>
