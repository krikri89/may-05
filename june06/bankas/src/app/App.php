<?php

namespace Bankas;

use Bankas\Controllers\HomeController;
use Bankas\Messages;

class App
{
    const DOMAIN = 'bankobankas.lt';

    public static function start()
    {
        session_start(); // startuonam sesija
        Messages::init(); // startuojam msg
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
    }
    public static function view(string $name, array $data = [])
    {
        extract($data);
        return require __DIR__ . '/../views/' . $name . '.php';
    }
    public static function redirect($url = '')
    {
        header('Location:http://' . self::DOMAIN . '/' . $url);
    }
    private static function route(array $uri)
    {
        $m = $_SERVER['REQUEST_METHOD'];

        if (count($uri) == 1 && $uri[0] === '') {
            return (new HomeController)->index();

            if ('GET' == $m && count($uri) == 1 && $uri[0] === 'forma') {
                return (new HomeController)->form();
            }
            if ('POST' == $m && count($uri) == 1 && $uri[0] === 'forma') {
                return (new HomeController)->doForm();
            } else {
                echo 'kita'; 
            }
        }
    }
}
