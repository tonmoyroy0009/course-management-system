<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ViewComposers\AllComposer;


class ComposerServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        view()->composer('*', AllComposer::class);
    }

   
    public function register()
    {

    }
}
