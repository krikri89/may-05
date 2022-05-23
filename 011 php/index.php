<?php

$cats = [
    'Pukis', 
    'Murkis',
    'Pilkis',
    'Rainius',
];
header('Content-Type: application/json');
$out = json_encode($cats);
echo $out; 