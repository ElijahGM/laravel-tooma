<?php

namespace Laravel\Tooma\Api\Providers;


use Illuminate\Support\ServiceProvider;
use Tooma\APi\Sender;
class ToomaServiceProvider extends ServiceProvider
{
    protected $defer = false;
    protected $configPath  = __DIR__.'/../config/';
    protected $configName = 'tooma-api';


    public function boot()
    {
       $this->publishes([$this->config_path.$this->configName.".php" => config_path($this->configName.".php")],'config');
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
      
        $this->mergeConfigFrom($this->config_path.$this->configName.".php", $this->configName);
        $this->app->bind(Sender::class, Sender::class);
        $this->app->alias('TOOMA', Sender::class);

        $this->app->singleton('tooma', function ($app) {        

            return new Sender(config('tooma-api.apiKey', null),config('tooma-api.defaultSSlPath', null));
        });
    }
}