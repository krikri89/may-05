<?php

echo 'durys <pre><br>';
define('DIR', __DIR__ . '/app/');

define('INSTALL', '/vienaragiai/june01/in/');
$uri = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
$uri = explode('/', $uri);
// print_r($uri);

// echo $_SERVER['REQUEST_URI'];

// print_r(($_SERVER));

//Router

if (count($uri) == 2) {
    if ($uri[0] == 'kambarys') {
        if ($uri[1] == '1') {
            require DIR . '/app/k1.php';
        } elseif ($uri[1] == 2) {
            require __DIR__ . '/app/k2.php';
        } else {
            require __DIR__ . '/app/404.php';
        }
    } else {
        require __DIR__ . '/app/404.php';
    }
} else {
    require __DIR__ . '/app/404.php';
}
