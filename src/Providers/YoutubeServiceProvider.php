<?php
/**
 * Created by PhpStorm.
 * User: mio
 * Date: 22.04.18
 * Time: 17:34
 */

namespace densul\oautwitube\Providers;

use Illuminate\Support\ServiceProvider;

class YoutubeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerServices();
    }

    public function boot()
    {
        $this->addConfig();
    }

    private function registerServices()
    {
        $this->app->bind('densul\oautwitube\Services\YoutubeApiService', 'densul\oautwitube\Services\YoutubeApiService');
    }

    private function addConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/oautwitube-api.php' => config_path('oautwitube-api.php')
        ]);
    }
}