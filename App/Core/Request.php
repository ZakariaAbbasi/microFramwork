<?php
namespace App\Core;

class Request
{
    private $params;
    private $method;
    private $agent;
    private $ip;
    private $uri;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->uri = strtok($_SERVER['REQUEST_URI'], '?');
    }

   

    public function get_params()
    {
        return $this->params;
    }
    public function get_method()
    {
        return $this->method;
    }
    public function get_agent()
    {
        return $this->agent;
    }
    public function get_ip()
    {
        return $this->ip;
    }
    public function get_uri()
    {
        return $this->uri;
    }

    public function input($key)
    {
        return  $this->params[$key] ?? null; 
    }

    public function isset($key)
    {
        return  isset($this->params[$key]); 
    }

    public function redirect($route)
    {
        header('location:'.site_url($route)); 
    }



    public function __get($name)
    {
        return $this->params[$name];
    }
}

