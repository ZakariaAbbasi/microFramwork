<?php

function site_url($route) {

    return $_ENV['HOST']. $route;
} 

function assets_url($route) {

    return site_url("assets/".$route);
} 

function view($path, $data = []) {

    extract($data);
    $path = str_replace('.', '/', $path);
    $full_path = BASE_PATH."views/{$path}.php";
   include_once $full_path;
   
}