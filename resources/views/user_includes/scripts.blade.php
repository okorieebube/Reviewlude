
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    {{-- <script data-main="{{ asset('user/custom/main.js') }}" src="{{asset('user/custom/require.js')}}"></script> --}}
    {{-- <script src="{{asset('user/custom/require.js')}}"></script> --}}
    {{-- <script src="{{asset('user/custom/main')}}"></script> --}}
    {{-- <script>
        require(['main'],function () {
            require(['Basic-function'])
        })
    </script> --}}
    <script src="{{ asset('/user/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/user/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/user/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/user/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/user/assets/js/app.js') }}"></script>
    <script src="{{ asset('/user/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('/user/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/user/assets/js/dashboard/dash_2.js') }}"></script>
    <script src="{{ asset('/user/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('/user/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{ asset('/user/assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('/user/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('/user/plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('/user/plugins/jquery-step/custom-jquery.steps.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('user/custom/custom-tagify.js') }}"></script>
    <script src="{{ asset('/user/plugins/bootstrap-4-Tag-Input/tagsinput.js') }}"></script>

    <!-- Snackbar toaster -->
    <script src="{{ asset('user/custom/js-snackbar/dist/js-snackbar.js') }}"></script>
    <script src="{{ asset('user/custom/js-snackbar/dist/site.js') }}"></script>
    <!-- Snackbar toaster -->
    <script src="{{asset('user/custom/Basic-function.js')}}"></script>

</body>
</html>
