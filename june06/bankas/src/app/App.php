<?php

namespace Bankas;

use Bankas\Controllers\HomeController;

class App
{
    public static function start()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
        print_r(($uri));
        echo 'Valio';
    }
    public static function view($name)
    {
        return require __DIR__ . '/../views/' . $name . '.php';
    }
    private static function route(array $uri)
    {
        if (count($uri) == 1 && $uri[0] === '') {
            return (new HomeController)->index();
        } else {
            echo 'kita';
        }
    }
}
