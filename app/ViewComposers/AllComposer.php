<?php

namespace App\ViewComposers;

use Illuminate\Contracts\View\View;
use Modules\Dashboard\Repositories\DashboardRepository;

class AllComposer
{

    
    private $dashboard;

    public function __construct(DashboardRepository $dashboard)
    {

        $this->dashboard = $dashboard;
    }

    
    public function compose(View $view)
    {
        $view->with('data', $this->dashboard->all()[0]);
    }
}