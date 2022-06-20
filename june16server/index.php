<?php
//settings
define('INSTALL', '/vienaragiai/may-05/june16server/');
define('DIR', __DIR__ . '/app/');
define('URL', 'http://localhost/vienaragiai/may-05/june16server/');
require __DIR__ . '/JsonDb.php';

$db = new JsonDb('farm');


$uri = str_replace(INSTALL, '', $_SERVER['REQUEST_URI']);
$uri = explode('/', $uri);


// ROUTER


$m = $_SERVER['REQUEST_METHOD'];

if ($m == 'GET' && count($uri) == 1 && $uri[0] == 'animals') {
    $out = $db->showAll();
}
if ($m == 'POST' && count($uri) == 1 && $uri[0] == 'animals') {
    $rawData = file_get_contents("php://input");

    $data = json_decode($rawData, 1);
    $db->create($data);
    $out = ['msg' => 'OK, donkey'];
}
if ($m == 'DELETE' && count($uri) == 2 && $uri[0] == 'animals') {

    $db->delete($uri[1]);
    $out = ['msg' => 'OK, donkey'];
}


$out = json_encode($out);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE');
header("Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With");


echo $out;
