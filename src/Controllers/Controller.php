<?php

namespace Azatakmyradov\Routing\Controllers;

class Controller
{
    public static function load($controller_data, $wildcards)
    {
        $controller_class = $controller_data[0];
        $controller_method = $controller_data[1];

        $controller = new $controller_class();
        return $controller->{$controller_method}(...$wildcards);
    }
}