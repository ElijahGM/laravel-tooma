<?php

namespace Tooma\Laravel\Api\Providers;


use Illuminate\Support\ServiceProvider;
use Tooma\APi\Sender;
class ToomaServiceProvider extends ServiceProvider
{
    
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
   
    protected $configName = 'tooma-api';


    public function boot()
    {
      

      $this->publishes([$this->getConfigPath() => config_path($this->configName.".php")],'config');
      $this->mergeConfigFrom($this->getConfigPath() , $this->configName);
       
       // dd([$this->configPath.$this->configName.".php" => config_path($this->configName.".php")]);
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
      
        
        $this->app->bind(Sender::class, Sender::class);
        $this->app->alias('TOOMA', Sender::class);

        $this->app->singleton('tooma', function ($app) {        

            return new Sender(config('tooma-api.apiKey', null),config('tooma-api.defaultSSlPath', null));
        });
    }
    private function getConfigPath()
    {
        return __DIR__ . sprintf('/../config/%s.php',$this->configName);
    }
}