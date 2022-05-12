<?php
const br = '<br>';
echo br.'----------------------'.br;

$valio = 'Valio!';
$kitas = 'Kitas';

function fun ($hhh, $kkk) {
    echo ' FUN!!!!';
    echo '$kkk';
    echo br;
    echo '$hhh';
    // global $valio, $kitas; // not to use
    $atgal =123;
    return $atgal;
    
}
// funkcijos iskvietimas
$atgal = fun($valio, $kitas);
echo br;
echo $atgal;
echo br.'----------------------'.br;

function daugiklis(...$m) {
    $rez =$m[0] *$m[1] *$m[2];
    return $rez;
}

$mas = [5, 5, 10];
echo daugiklis(6, 6, 10);

echo br.'----------------------'.br;

function kelintas (){
   static $k =0;
    $k++;
    return $k;
}

echo kelintas();
echo kelintas();
echo kelintas();
echo br.'----------------------'.br;

$bevardo =function(){
    echo 'as neturiu vardo';
};

$bevardo();