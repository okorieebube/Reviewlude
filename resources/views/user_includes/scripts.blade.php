    <script src="{{ asset('/user/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/user/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/user/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/user/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
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
    <script src="{{ asset('/user/plugins/table/datatable/datatables.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('user/custom/custom-tagify.js') }}"></script>
    <script src="{{ asset('/user/plugins/bootstrap-4-Tag-Input/tagsinput.js') }}"></script>

    <!-- Snackbar toaster -->
    <script src="{{ asset('user/custom/js-snackbar/dist/js-snackbar.js') }}"></script>
    <script src="{{ asset('user/custom/js-snackbar/dist/site.js') }}"></script>
    <!-- Snackbar toaster -->
    <script src="{{asset('user/custom/Basic-function.js')}}"></script>
    <script src="{{ asset('/user/assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>

</body>
</html>
