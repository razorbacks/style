<?php

namespace razorbacks\style\laravel;

use Illuminate\Support\ServiceProvider;

class StyleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/blade/dist', 'razorbacks');

        $this->publishes([
            __DIR__.'/../../laravel/config/razorbacks-style.php' => config_path('razorbacks-style.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../laravel/blade/dist' => resource_path('views/vendor/razorbacks'),
        ], 'views');
    }
}
