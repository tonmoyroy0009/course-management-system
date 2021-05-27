<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Pingpong\Modules\Facades\Module;

class InstallApp extends Command
{
    
    protected $signature = 'app:install';

    
    protected $description = 'Comando para ejecutar la instalacion de LMS-Laravel';

    
    public function __construct()
    {
        parent::__construct();
    }

    
    public function handle() {

        $modules = Module::getOrdered();
        $this->info('Generate Key');
        $this->call('key:generate');
        $this->info('Migrations Basics');
        $this->call('migrate');
        $this->info('Executing Seeders');
        $this->call('db:seed');
        $this->info('Executing Migrations Modules');
        $this->call('module:migrate');
        $this->info('Executing Seeders Modules');
        foreach($modules as $module)
        {
            $this->info("Executing Seed for module $module->name");
            $this->call('module:seed', ['module' => $module->name]);
        }

        $this->info('Activate theme: Default');
        \Theme::set('default');
    }
}
