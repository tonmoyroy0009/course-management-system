<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class LocalEnvironmentServiceProvider extends ServiceProvider
{
    
    protected $localProviders = [
        \Barryvdh\Debugbar\ServiceProvider::class,
        \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
    ];

    
    protected $facadeAliases = [
        'Debugbar' => \Barryvdh\Debugbar\Facade::class,
    ];

  
    public function boot() {
        if ($this->app->environment('local')) {
            $this->registerServiceProviders();
            $this->registerFacadeAliases();
        }
    }

  
    public function register() {
    }

 
    protected function registerServiceProviders() {
        foreach ($this->localProviders as $provider) {
            $this->app->register($provider);
        }
    }

    
    public function registerFacadeAliases() {
        $loader = AliasLoader::getInstance();
        foreach ($this->facadeAliases as $alias => $facade) {
            $loader->alias($alias, $facade);
        }
    }
}
