<?php

namespace AnilcanCakir\Former;

use AnilcanCakir\Former\Contracts\Former as FormerContract;
use AnilcanCakir\Former\Contracts\FormerHelper as FormerHelperContract;
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
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'former');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();

        $this->app->singleton(FormerHelperContract::class, function ($app) {
            return new FormerHelper($app['view'], $app['translator'], $app['config'], $app['url']);
        });

        $this->app->singleton(FormerContract::class, function ($app) {
            return new Former($app[FormerHelperContract::class]);
        });
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
}
