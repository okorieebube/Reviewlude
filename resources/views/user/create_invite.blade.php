@php
$title = 'Create Invite';
$invite= 'active';
    $aria_invite = 'true';
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
                                                    <h5>Registered Products</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive mb-4 mt-4">
                                            <p>Copy the link for your intended product and send to your clients. <br> It will take them to your product or service page directly.</p>
                                            <table id="zero-config" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>S/n</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Invite Link</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- padding-bottom: 20px; --}}
                                                    @foreach ($products as $k => $e)
                                                    <tr>
                                                        <td>{{ $k+1 }}</td>
                                                        <td>{{ $e->name }}</td>
                                                        @if ($e->status == 'pending')
                                                        <td class="text-warning">
                                                            <strong>{{ $e->status }}</strong>
                                                        </td>
                                                        @else
                                                        <td class="text-success">
                                                            <strong>{{ $e->status }}</strong>
                                                        </td>
                                                        @endif

                                                        {{-- <td>{{ route('view_product',$e->slug) }}</td> --}}
                                                        <td>
                                                                    {{-- <input type="text" class="form-control mb-4" id="input-copy{{ $e->unique_id }}" disabled value="{{ route('view_product',$e->slug) }}">
                                                                    <a class="mb-2 btn btn-primary" href="javascript:;" data-clipboard-action="copy" data-clipboard-target="#input-copy{{ $e->unique_id }}"><svg> ... </svg> Copy</a> --}}

                                                            {{-- <div class="clipboard copy-txt"> --}}
                                                                <p class="mb-2"><span id="advanced-paragraph{{ $e->unique_id }}">{{ route('view_product',$e->slug) }}</span></p>
                                                                <a class="mb-2 btn btn-primary" href="javascript:;" data-clipboard-action="copy" data-clipboard-target="#advanced-paragraph{{ $e->unique_id }}"><svg> ... </svg> Copy</a>
                                                            {{-- </div> --}}
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                    {{-- <tr>
                                                        <td>2</td>
                                                        <td>Garrett Winters</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>63</td>
                                                        <td>2011/07/25</td>
                                                        <td>$170,750</td>
                                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Ashton Cox</td>
                                                        <td>Junior Technical Author</td>
                                                        <td>San Francisco</td>
                                                        <td>66</td>
                                                        <td>2009/01/12</td>
                                                        <td>$86,000</td>
                                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></td>
                                                    </tr> --}}
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
                                    If you click continue, this product will be delete permanently. Reviewers won't be able to review this product.
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

            <div id="confirmation_modal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
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
                        <div class="modal-body">
                            <p class="modal-text">
                                If the details for this product is validated, click the `create` button below to continue.
                            </p>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                            <button type="button" class="btn btn-primary create_product_btn">Create</button>
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

                    $('.confirm_modal_btn').click(async function(e) {
                        e.preventDefault();
                        let confirm_modal_form = $('.confirm_modal_form').serializeArray();
                        // console.log(confirm_modal_form);
                        // return;
                        let form_data = set_form_data(confirm_modal_form);
                        let returned = await ajaxRequest('/confirm_product/'+confirm_modal_form[1].value, form_data);
                        validator(returned, '/user/products');
                    });
                    $('.delete_modal_btn').click(async function(e) {
                        e.preventDefault();
                        let delete_modal_form = $('.delete_modal_form').serializeArray();
                        // console.log(confirm_modal_form);
                        // return;
                        let form_data = set_form_data(delete_modal_form);
                        let returned = await ajaxRequest('/delete_product/'+delete_modal_form[1].value, form_data);
                        validator(returned, '/user/products');
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
