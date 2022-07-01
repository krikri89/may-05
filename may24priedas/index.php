<?php

$cats = [
    'Murkis',
    'Pilkis',
    'Princas',
    'Rainius'
];
$out = json_encode($cats);


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
header("Access-Control-Allow-Headers: X-Requested-With");



echo $out; // echo body tik apacioj header
