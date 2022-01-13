<?php

use App\Core\Routing\Route;
use App\Middleware\BlockFireFox;

Route::get('/', 'HomeController@index');
Route::get('/todo/list', 'TodoController@list', [BlockFireFox::class]);
Route::get('/todo/list', 'TodoController@add');


Route::get('/archive', 'ArchiveController@index');
Route::get('/archive/products', 'ArchiveController@product');
Route::get('/archive/article', 'ArchiveController@article');



Route::get('/b', function(){
    echo "saveForm";
});

Route::put('/d', ['Cotroller' , 'Method']);

Route::get('/e', 'Cotroller@Method');

