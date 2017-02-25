<?php

namespace Bookkeeper\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    const VERSION = '0.9-alpha.0';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();
    }

    /**
     * Registers helper methods
     */
    protected function registerHelpers()
    {
        require_once __DIR__ . '/../Support/helpers.php';

        require_once __DIR__ . '/../Html/Builders/snippets.php';
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->registerViewBindings();
    }

    /**
     * Registers view bindings
     */
    protected function registerViewBindings()
    {
        if ( ! is_installed())
        {
            return;
        }

        view()->composer('*', function ($view)
        {
            $view->with('currentUser', auth()->user());
        });
    }

}
