const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
// mix.js([
//    'resources/js/app.js',
//    'public/theme/files/bower_components/jquery/js/jquery.min.js',
//    'public/theme/files/bower_components/jquery-ui/js/jquery-ui.min.js',
//    'public/theme/files/bower_components/popper.js/js/popper.min.js',
//    'public/js/bootstrap.min.js',
//    'public/theme/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
//    'public/theme/files/bower_components/modernizr/js/modernizr.js',
//    'public/theme/files/bower_components/modernizr/js/css-scrollbars.js',
//    'public/theme/files/assets/js/pcoded.min.js',
//    'public/theme/files/assets/js/vartical-layout.min.js',
//    'public/theme/files/assets/js/jquery.mCustomScrollbar.concat.min.js',
//    'public/theme/files/assets/js/jquery.mousewheel.min.js',
//    'public/theme/files/assets/js/script.js',
// ], 'public/js/all.js')
//    .styles([
//       'public/css/bootstrap.min.css',
//       'public/vendor/dataTables/dataTables.bootstrap4.min.css',
//       'public/theme/files/assets/css/style.css',
//       'public/theme/files/assets/css/jquery.mCustomScrollbar.css',
//    ], 'public/css/all.css');
