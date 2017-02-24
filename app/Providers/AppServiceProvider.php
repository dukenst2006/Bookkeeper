<?php

namespace Bookkeeper\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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

}
