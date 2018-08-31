<?php

namespace Fomvasss\LastVisit;

use Illuminate\Contracts\Http\Kernel;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishedConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/last-visit.php', 'last-visit');
    }

    protected function publishedConfig()
    {
        $this->publishes([__DIR__ . '/../config/last-visit.php' => config_path('last-visit.php')
        ], 'last-visit-config');
    }
}
