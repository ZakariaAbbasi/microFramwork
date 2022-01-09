<?php
# front controller

use App\Core\StupidRouter;

ini_set('display_errors', E_ALL);

include_once __DIR__.'/bootstrap/init.php';

$route = new StupidRouter();
$route->ran();