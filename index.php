<?php
# front controller
ini_set('display_errors', E_ALL);
use App\Utilities\Url;
include_once __DIR__.'/bootstrap/init.php';

$route = Url::current_route();


if($route == '/colors/blue')
    include_once BASE_PATH."views/colors/blue.php";
if($route == '/colors/green')
    include_once BASE_PATH."views/colors/green.php";
if($route == '/colors/red')
    include_once BASE_PATH."views/colors/red.php";
