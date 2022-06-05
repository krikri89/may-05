<?php

use Meska\Vaikas;

// spl_autoload_register(function ($class) {
//     require __DIR__ . '/' . $class . '.php';
// });

// require __DIR__ . '/Stikline.php';
// require __DIR__ . '/Cart.php';
// require __DIR__ . '/Senelis.php';
// require __DIR__ . '/Tevas.php';
// require __DIR__ . '/Vaikas.php';

require __DIR__ . '/vendor/autoload.php';

$v = new Vaikas;
$v->betvarke();
// $v->tvarka();
// $v->pasaka();

// $v->posakis;

// $c1 = new Cart;
// $c2 = new Cart;

// print_r($c1);
// print_r($c2);

// $s1 = new Stikline;
// $s2 = new Stikline;
// $s3 = new Stikline;

// echo '<pre>';

// print_r($s1);
// print_r($s2);
// print_r($s3);
// die;
// echo Stikline::$gerimas = 'Fanta';

// Stikline::$valio();

// $s2->kas();
// $s3->kas();
// //--------------

// $c1 = Cart::create();
// $c2 = Cart::create();

// $c2 = clone ($c1);
// echo '<pre>';

// $c3 = unserialize(serialize($c1));
// echo '<br>';
// echo json_encode($c1);
