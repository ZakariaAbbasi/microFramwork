<?php
namespace App\Controllers;

class ArchiveController
{
    public function index(){
        view('archive.index');
    }

    public function product(){
        view('archive.product');
    }
    public function article(){
        view('archive.article');
    }

}