<?php
// Cate bega aplink nama ir sugauna peliu rand(3,5). Kiek kartu reiks apibegti aplink nama, kad sugauti 20 peliu. Ispausdinti kiek kartu apibegs ir kiek peliu sugaus.
$cat = 20;
$rounds=1;
$totalMouse=0;
do {
    $mouse = rand(3, 5);
$totalMouse+=$mouse;
    $rounds++;
}while ($totalMouse<20);
echo $rounds;
echo '---------';
echo $totalMouse;

