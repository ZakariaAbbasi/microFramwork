<?php
 namespace App\Utilities;

class Assets
{
    public static function __callStatic($name, $route)
    {
        return $_ENV['HOST']."assets/{$name}/".$route[0];  
    }
}