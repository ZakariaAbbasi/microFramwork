<?php

namespace App\Core\Routing;

use Exception;

class Route
{
    private static $routes = [];
    const ARRAY_VERDS = ["get", "post", "put", "patch", "delete"];

    public static function add($methods, $uri, $action = null, $middleware = [])
    {
       
        $methods = is_array($methods) ? $methods : [$methods];  #standard variables
        
        self::$routes[] = [

            'methods'=> $methods, 
            'uri' => $uri, 
            'action' => $action,
            'middleware' => $middleware
        ];


    }

    public static function __callStatic($method, $params)
    {   
		if(!in_array($method, self::ARRAY_VERDS))  
			throw new Exception('method not supported');  	
    
        $uri = $params[0];
        $action = $params[1] ?? null;
        $middleware = $params[2] ?? [];
        self::add($method, $uri, $action, $middleware);
    }

    public static function routes()
    {
         return self::$routes;
    }
}