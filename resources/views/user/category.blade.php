@php
    $title = 'Category';
    $settings=  'active';
    $aria_category = 'true';
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
                                    <form id="work-platforms" class="section work-platforms password_update_form">
                                        @csrf
                                        <div class="info">
                                            <h5 class="">Create Category</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">

                                                    <div class="platform-div">
                                                        <div class="form-group">
                                                            <label for="platform-title"><strong>Category Name<span class="text-danger">*</span> </strong></label>
                                                            <input type="text" class="form-control mb-4" name="name" placeholder="Enter name of this category*" value="" >
                                                        </div>
                                                        <div class="form-group text-right">
                                                        <button id="add-work-platforms" class="btn btn-primary password_update_btn">Create</button>
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
                                                    <h5>Categories</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive mb-4 mt-4">
                                            <table id="zero-config" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S/n</th>
                                                        <th>Name</th>
                                                        <th>No. of products</th>
                                                        <th class="no-content"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- padding-bottom: 20px; --}}
                                                    @foreach ($categories as $k => $e)
                                                    <tr>
                                                        <td>{{ $k+1 }}</td>
                                                        <td>{{ $e->name }}</td>
                                                        <td>{{ $e->no_of_products }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown custom-dropdown">
                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                                </a>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">

                                                                    <a class="dropdown-item" href="{{ route('edit_category',$e->unique_id ) }}">Edit</a>
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
                                <p class="modal-text text-danger">
                                    If you click continue, this category & every product under it will be delete permanently. Reviewers won't be able to view products under this category.
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

                        $('.delete_modal').click(function(e) {
                            e.preventDefault();
                            // console.log(this);return;
                            append_id('delete_id', '.delete_modal_form', '#delete_modal', this)
                            $('#delete_modal').modal('toggle');
                        });
                    $('.delete_modal_btn').click(async function(e) {
                        e.preventDefault();
                        let delete_modal_form = $('.delete_modal_form').serializeArray();
                        // console.log(confirm_modal_form);
                        // return;
                        let form_data = set_form_data(delete_modal_form);
                        let returned = await ajaxRequest('/delete_category/'+delete_modal_form[1].value, form_data);
                        validator(returned, '/user/category');
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
                            let returned = await ajaxRequest('/create_category', form_data);
                            // console.log(returned);return;
                            validator(returned, '/user/category');
                        });


                    });
            //     });
            // });
                </script>
