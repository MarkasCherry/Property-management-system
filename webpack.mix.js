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

mix.js('resources/js/app.js', 'public/assets/js')
    .postCss('resources/css/custom.css', 'public/assets/css', [
        require('postcss-import')
    ])
    .postCss('resources/css/livewire-datatables.css', 'public/assets/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .postCss('resources/css/star-rating.css', 'public/assets/css', [
        require('postcss-import')
    ]);

mix.copy('node_modules/notyf/notyf.min.js', 'public/assets/libraries/js/notyf/notyf.min.js');
mix.copy('node_modules/notyf/notyf.min.js', 'public/assets/libraries/css/notyf/notyf.min.css');

mix.js('resources/js/remember-tab.js', 'public/assets/js');
