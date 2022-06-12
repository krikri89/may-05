<?php

namespace Bankas;

use Bankas\Controllers\HomeController;
// use Bankas\Controllers\DataController;
// use Bankas\Controllers\LoginController;
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

    public static function json(array $data = [])
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public static function redirect($url = '')
    {
        header('Location: http://' . self::DOMAIN . '/' . $url);
    }

    public static function url($url = '')
    {
        return 'http://' . self::DOMAIN . '/' . $url;
    }

    public static function authAdd(object $user)
    {
        $_SESSION['auth'] = 1; //rasoma bet ka, patikrini ar yra kasnors ar ne
        $_SESSION['user'] = $user;
    }
    public static function authRem()
    {
        unset($_SESSION['auth'], $_SESSION['user']);
    }

    public static function auth(): bool
    {
        return isset($_SESSION['auth']) && $_SESSION['auth'] == 1;
    }

    public static function authName(): string
    {
        return $_SESSION['user']->full_name;
    }

    public static function csrf()
    {
        return md5('jdhsoifuoieuwnfdsasaweh' . $_SERVER['HTTP_USER_AGENT']);
    }

    private static function route(array $uri) //methods
    {
        $m = $_SERVER['REQUEST_METHOD'];

        // if ('GET' == $m && count($uri) == 1 && $uri[0] === 'login') {
        //     if (self::auth()) {
        //         return self::redirect();
        //     }
        //     return (new LoginController)->showLogin();
        // }

        // if ('POST' == $m && count($uri) == 1 && $uri[0] === 'login') {
        //     return (new LoginController)->doLogin();
        // }

        // if ('POST' == $m && count($uri) == 1 && $uri[0] === 'logout') {
        //     return (new LoginController)->doLogout();
        // }



        if (count($uri) == 1 && $uri[0] === '') {
            return (new HomeController)->index();
        }

        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'json') {
            return (new HomeController)->indexJson();
        }

        // if ('GET' == $m && count($uri) == 2 && $uri[0] === 'get-it') {
        //     return (new HomeController)->getIt($uri[1]);
        // }

        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'forma') {
            if (!self::auth()) {
                return self::redirect('login');
            }
            return (new HomeController)->form();
        }

        if ('POST' == $m && count($uri) == 1 && $uri[0] === 'forma') {
            return (new HomeController)->doForm();
        } else {
            echo 'kita';
        }
        if ('GET' == $m && count($uri) == 1 && $uri[0] === 'forma2') {
            return (new HomeController)->form2();
        }
    }
}
