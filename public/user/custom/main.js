requirejs.config({
    //By default load any module IDs from js/lib
    baseUrl: '/user',

    // <script src="{{ asset('user/custom/custom-tagify.js') }}"></script>
    // <!-- Snackbar toaster -->
    // <script src="{{ asset('user/custom/js-snackbar/dist/js-snackbar.js') }}"></script>
    // <script src="{{ asset('user/custom/js-snackbar/dist/site.js') }}"></script>
    // <!-- Snackbar toaster -->
    // <script src="{{asset('user/custom/Basic-function.js')}}"></script>
    paths: {
        jquery:'assets/js/libs/jquery-3.1.1.min',
        popper:'bootstrap/js/popper.min',
        bootstrap:'bootstrap/js/bootstrap.min',
        perfect_scrollbar:'plugins/perfect-scrollbar/perfect-scrollbar.min',
        app:'assets/js/app',
        custom:'assets/js/custom.js',
        apexcharts:'plugins/apex/apexcharts.min',
        dash_2:'assets/js/dashboard/dash_2',
        dropify:'plugins/dropify/dropify.min',
        jquery_blockUI:'plugins/blockui/jquery.blockUI.min',
        account_settings:'assets/js/users/account-settings',
        scrollspyNav:'assets/js/scrollspyNav',
        jquery_steps:'plugins/jquery-step/jquery.steps.min',
        custom_tagify:'custom/custom-tagify',
        js_snackbar:'custom/js-snackbar/dist/js-snackbar',
        site:'custom/js-snackbar/dist/site',
        Basic_function:'custom/Basic-function',
        custom_jquery:'plugins/jquery-step/custom-jquery.steps',
    }
});

// Start the main app logic.
// require(['jquery'],
// function   ($) {
//     //jQuery, canvas and the app/sub module are all
//     //loaded and can be used here now.
// });
