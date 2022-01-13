<?php

namespace App\Validations;

class ValidateRoute
{
    public function dis_patch_404($current_route)
    {
        if (is_null($current_route)){
            header("HTTP/1.0 404 Not Found");
            view('errors.404');
            die;
        }
    }

}