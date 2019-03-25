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

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/plugins/index.js', 'public/plugins/');
mix.js('resources/js/vali/admin.base.js', 'public/js');
mix.js('resources/js/vali/admin.illusion.js', 'public/js');
mix.scripts([
    'public/js/admin.base.js',
    'public/js/admin.illusion.js',
], 'public/js/vali.js');
mix.copyDirectory('resources/plugins/ckeditor5', 'public/plugins/ckeditor5');
mix.sass('resources/sass/main.scss', 'public/css');
mix.sass('resources/sass/style.scss', 'public/css');


