<?php
# front controller

use App\Core\Routing\Routers;


ini_set('display_errors', E_ALL);

include_once __DIR__.'/bootstrap/init.php';


$router = new Routers();
$router->run();
