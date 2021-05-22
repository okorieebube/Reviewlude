@php
$title = 'Edit Product';
$product= 'active';
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
                                <div class="col-lg-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content widget-content-area">
                                            <div class="widget-header">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                        <h5>Update Product Details</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="tag_inputs" value="{{ $the_product->tags }}">
                                            <div id="circle-basic" class="">
                                                <h3>Basic Info</h3>
                                                <section>
                                                    <form id="contact" class="section contact create_product_form">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $the_product->unique_id }}">
                                                        <div class="info">
                                                            <div class="row">
                                                                <div class="col-md-11 mx-auto">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="location">Name<span class="text-danger">*</span> </label>
                                                                                <input type="text" class="form-control mb-4" name="name" placeholder="Enter name of product*" value="{{ $the_product->name }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="country">Category<span class="text-danger">*</span> </label>
                                                                                <select name="category" class="form-control" required>
                                                                                    <option value="">Select a category for product</option>
                                                                                    @foreach ($categories as $e)
                                                                                    <option @if ($e->unique_id == $the_product->category)
                                                                                        selected="selected"
                                                                                        @else @endif value="{{ $e->unique_id }}">{{ $e->name }}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="location">Tags<span class="text-danger">*</span> </label>
                                                                                <input type="text" class="form-control form_tags mb-4" data-role="tagsinput" value="{{ $the_product->tags }}" placeholder="Add tags associated with your product">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="location">Description<span class="text-danger">*</span> </label>
                                                                                <textarea id="desc" cols="30" rows="20" class="form-control desc mb-4">{{ $the_product->description }}</textarea>
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
                                                    <div class="row">

                                                        <div class="col-xl-10 col-lg-12 col-md-12 m-auto">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <input type="file" id="input-file-max-fs" class="dropify" data-default-file="{{asset('/storage/uploads/products/'.$the_product->cover_photo)}}" data-max-file-size="10M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Select a cover Photo</p>
                                                                <p>Preferrable file size: 730px by 304px</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
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
                                If the details for this product is corrected, click the update button below to continue.
                            </p>
                        </div>
                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                            <button type="button" class="btn btn-primary create_product_btn">Update</button>
                        </div>
                    </div>
                </div>
            </div>

            @include('user_includes.scripts')
            <script>
                tinymce.init({
                    selector: '#desc',
                });
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
                        let returned = await ajaxRequest('/update_product_service', form_data);
                        // console.log(returned);
                        // return;
                        validator(returned, '/user/product/'+basic_info[1].value);
                    });


                });
            </script>
