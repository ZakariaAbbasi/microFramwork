<?php
namespace App\Core;

use App\Utilities\Url;

class StupidRouter
{
    private $routers;

    public function __construct()
    {
        $this->routers = [
            '/colors/blue' => 'colors/blue.php',
            '/colors/red' => 'colors/red.php',
            '/colors/green' => 'colors/green.php'
        ];   
    }

    public function ran()
    {
        $current_route = Url::current_route();
        foreach ($this->routers as $route => $view) {
            if ($current_route == $route) 
                $this->include_and_die(BASE_PATH."views/{$view}");   
        }
        $this->include_and_die(BASE_PATH."views/errors/404.php");   


    }

    private function include_and_die($viewPath)
    {
        include_once $viewPath;
        die;
    }
}