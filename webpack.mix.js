const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
        'public/user/assets/js/libs/jquery-3.1.1.min.js',
        'public/user/bootstrap/js/popper.min.js',
        'public/user/bootstrap/js/bootstrap.min.js'
        ], 'public/user/webpack')
    // .postCss('resources/css/app.css', 'public/css', [
    //     //
    // ]);
