<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\Form\Factory;
use Illuminate\Support\ServiceProvider;

class FormerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
    }

    /**
     * Register the Former resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'former');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->registerFactories();
    }

    /**
     * Setup the configuration for Former.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/former.php', 'former'
        );
    }

    /**
     * Register the factories for Former.
     *
     * @return void
     */
    protected function registerFactories()
    {
        $this->app->singleton(Factory::class, function ($app) {
            return new FormFactory($app['view'], $app['translator'], $app['config']);
        });
    }
}
