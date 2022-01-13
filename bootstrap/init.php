<?php



define('BASE_PATH', __DIR__.'/../');

include_once BASE_PATH.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$request = new App\Core\Request();

include_once BASE_PATH.'/helpers/helpers.php';
include_once BASE_PATH.'/routes/web.php';
