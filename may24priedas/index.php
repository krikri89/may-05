<?php

$cats = [
    'Murkis',
    'Pilkis',
    'Princas',
    'Rainius'
];
$out = json_encode($cats);


header('Content-Type: application/json'); // svarbiausia kad header butu auksciau negu body



echo $out; // echo body tik apacioj header
