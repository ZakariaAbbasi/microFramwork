<?php
namespace App\Core\Routing;

use App\Core\Request;
use \App\Exceptions\{ConfigClassNotFoundException, ConfigMethodNotFoundException};
use App\Validations\ValidateRoute;

class Routers
{
    private $request;
    private $routes;
    private $current_route;
    private const BASE_COTROLLER = '\App\Controllers\\';

    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;

        $this->runRouteMiddleware();
        
    }
    private function runRouteMiddleware()
    {
        $middleware = $this->current_route['middleware'];

        foreach($middleware  as $middleware_class)
        {
            $middleware_obj = new $middleware_class();
            $middleware_obj->handle();
        }
    }


    public function findRoute(Request $request)
    {
        
        foreach ($this->routes as $route)
        {
            if (in_array($request->get_method(), $route['methods']) && $request->get_uri() == $route['uri']) {
                return $route;  
            } 
        }
        return null;
    }
    
        
    public function run()
    {
        # 405 : invalid request methods

        # 404 : uri not exist
        $dis_patch = new ValidateRoute();
        $dis_patch->dis_patch_404($this->current_route);
            
        $this->dis_patch($this->current_route);
    }

    private function dis_patch($route)
    {
        $action = $route['action'];

        # action : null
        if (is_null($action) || empty($action)) return;

        # action : clousure
        if (is_callable($route['action']))    
            call_user_func($action); # or $action() 

        # action : 'Cotroller@Method'
        if (is_string($action)) 
            $action =  explode('@', $action);
        
        # action : ['Cotroller' , 'Method']
        if (is_array($action)) {
            
            $class_name = self::BASE_COTROLLER.$action[0];
            $method_name = $action[1];

            if (!class_exists($class_name)) 
                throw new ConfigClassNotFoundException("Not Exists {$class_name}");

            $controller = new $class_name();

            if (!method_exists($class_name, $method_name)) 
                throw new ConfigMethodNotFoundException("Not Exists {$method_name}");

            $controller->{$method_name}();

        }
        

    }


}

