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
    .js('resources/js/back_display.js', 'public/js')
    .js('resources/js/left_side.js', 'public/js')
    .js('resources/js/create_article.js', 'public/js')
    .js('resources/js/jquery.autoexpand.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .setResourceRoot('../');
