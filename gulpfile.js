var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// Reactor elixir
elixir.config.assetsPath = 'resources/assets/bookkeeper';
elixir.config.publicPath = 'public_html/assets/bookkeeper';

elixir(function (mix) {
    mix
        .sass('app.sass', elixir.config.publicPath + '/css/app.css')
        .scripts([
            'vendor/Modernizr.min.js',
            'vendor/jquery.min.js',
            'vendor/perfect-scrollbar.min.js',
            'common.js',
            'helpers.js',
            'dropdowns.js',
            'modals.js'
        ], elixir.config.publicPath + '/js/app.js')
        .scripts([
            'vendor/datetimepicker.min.js',
            'passwords.js',
            'searchers.js',
            'forms.js'
        ], elixir.config.publicPath + '/js/forms.js')
    ;
});
