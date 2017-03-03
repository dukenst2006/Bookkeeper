<?php

namespace Bookkeeper\Providers;


use Illuminate\Support\ServiceProvider;

class HtmlBuildersServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'bookkeeper.builders.contents',
            'bookkeeper.builders.forms',
        ];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerContentsHtmlBuilder();
        $this->registerFormsHtmlBuilder();
    }

    /**
     * Registers contents html builder
     */
    protected function registerContentsHtmlBuilder()
    {
        $this->app['bookkeeper.builders.contents'] = $this->app->share(function () {
            return $this->app->make('Bookkeeper\Html\Builders\ContentsHtmlBuilder');
        });
    }

    /**
     * Registers forms html builder
     */
    protected function registerFormsHtmlBuilder()
    {
        $this->app['bookkeeper.builders.forms'] = $this->app->share(function () {
            return $this->app->make('Bookkeeper\Html\Builders\FormsHtmlBuilder');
        });
    }

}