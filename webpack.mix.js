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
mix.js('resources/js/tinymce.js', 'public/plugins/tinymce.min.js');
mix.copy('node_modules/tinymce/skins', 'public/plugins/skins');
mix.sass('resources/sass/main.scss', 'public/css');
mix.sass('resources/sass/style.scss', 'public/css');


