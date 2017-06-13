<?php

namespace Laravel\Tooma\Api\Providers;


use Illuminate\Support\ServiceProvider;
use Tooma\APi\Sender;
class ToomaServiceProvider extends ServiceProvider
{

    public function boot()
    {
       $this->publishes([__DIR__.'/../config/tooma.php' => config_path('tooma.php')]);
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Sender::class, function ($app) {
            $config = config('tooma');
            $apiKey = $config['apiKey'];
            
            return new Sender($apiKey);
        });
    }
}