<?php namespace App;

use Styde\Html\Facades\Menu;

abstract class BaseMenu
{

    protected $class = null;

    
    public function setClass($class)
    {
        $this->class = $class;
    }
    
    abstract function items();

    public function boot()
    {
        return Menu::make($this->items(), $this->class);
    }
}