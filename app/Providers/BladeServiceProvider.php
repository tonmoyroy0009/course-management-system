<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Modules\Dashboard\Repositories\DashboardRepository;

class BladeServiceProvider extends ServiceProvider
{


    public function boot()
    {
        Blade::directive('route', function($name) {
            return "<?php echo route($name) ?>";
        });

        Blade::directive('trans', function($expression) {
            return "<?php echo trans($expression) ?>";
        });
    }

    public function register()
    {
        
    }
}
