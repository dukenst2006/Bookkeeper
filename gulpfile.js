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
            'flash.js',
            'dropdowns.js',
            'modals.js'
        ], elixir.config.publicPath + '/js/app.js')
        .scripts([
            'passwords.js',
            'forms.js'
        ], elixir.config.publicPath + '/js/forms.js')
        .scripts([
            'updater.js'
        ], elixir.config.publicPath + '/js/updater.js')
        .scripts([
            'vendor/datetimepicker.min.js',
            'amounts.js',
            'searchers.js',
            'tags.js',
            'transactions.js',
        ], elixir.config.publicPath + '/js/transactions.js')
        .scripts([
            'vendor/Chart.bundle.min.js',
            'charts.js'
        ], elixir.config.publicPath + '/js/charts.js')
    ;
});
