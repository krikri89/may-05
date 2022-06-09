<?php

namespace Bankas;

use Bankas\Controllers\HomeController;
use Bankas\Controllers\LoginController;
use Bankas\Messages;


class App
{
    const DOMAIN = 'bankobankas.lt';
    const APP = __DIR__ . '/../';
    private static $html;

    public static function start()
    {
        session_start(); // startuonam sesija
        Messages::init(); // startuojam msg
        ob_start();
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($uri);
        self::route($uri);
        self::$html = ob_get_contents();
        ob_end_clean();
    }
    public static function sent()
    {
        echo self::$html;
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
    public static function authAdd(object $user)
    {
        $_SESSION['auth'] = 1; //rasoma bet ka, patikrini ar yra kasnors ar ne
        $_SESSION['auth'] = $user;
    }
    public static function authRem(object $user)
    {
        unset($_SESSION['auth'], $_SESSION['user']);
    }
    // public static function auth(object $user): bool
    // {
    // }


    private static function route(array $uri)
    {
        $m = $_SERVER['REQUEST_METHOD'];

        if (count($uri) == 1 && $uri[0] === '') {
            return (new HomeController)->index();
        }
        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'forma') {
            // if (!self::auth()) {
            //     return self::redirect('login');
            // }
            return (new HomeController)->form();
        }
        if ('POST' == $m && count($uri) == 1 && $uri[0] === 'forma') {
            return (new HomeController)->doForm();
        } else {
            echo 'kita';
        }
    }
}
