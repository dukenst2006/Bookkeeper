<?php

namespace Bookkeeper\Providers;

use Bookkeeper\Finance\Account;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    const VERSION = '0.9-alpha.3';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();

        $this->registerCurrencyHelper();
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
     * Registers the currency helper
     */
    public function registerCurrencyHelper()
    {
        $this->app['bookkeeper.support.currency'] = $this->app->share(function () {
            return $this->app->make('Bookkeeper\Support\Currencies\CurrencyHelper');
        });
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

        view()->composer('transactions.create', function ($view)
        {
            $view->with('accountCurrencies', Account::all()
                ->pluck('currency', 'id')->toArray());
        });
        view()->composer('transactions.edit', function ($view)
        {
            $view->with('accountCurrencies', Account::all()
                ->pluck('currency', 'id')->toArray());
        });
    }

}
