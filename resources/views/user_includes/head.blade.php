<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo6/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Nov 2020 02:11:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/user/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('/user/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/user/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
     --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&amp;display=swap"
    rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/user/plugins/bootstrap-4-Tag-Input/tagsinput.css') }}">
    <link href="{{ asset('/user/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/user/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/user/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('/user/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/user/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/user/plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('/user/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/user/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/user/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/user/plugins/jquery-step/jquery.steps.css') }}">
    <link href="{{ asset('/user/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/user/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/user/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/user/assets/css/forms/custom-clipboard.css') }}">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('user/custom/js-snackbar/dist/js-snackbar.css')}}">
    <link rel="stylesheet" href="{{asset('user/custom/custom-app.css')}}">
    <link rel="stylesheet" href="{{ asset('user/custom/loader/assets/loader.css') }}">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

    <!-- ajax loader -->
    <div style="display: none;" id="the_load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!-- ajax loader -->
