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

echo br.'----------------------'.br;
function zuikis(){
    return fn()=>123;
}
echo '<br>';
echo zuikis()();
echo br.'----------------------'.br;
function recursive ($num){
    echo 'IN'. $num, '<br>';
    if($num <3){
        //kvieciame save. Padidiname numeri vientu.
        return recursive($num+1);
    }
    echo 'OUT' . $num, '<br>'; 
}
$startNum =1;
recursive($startNum);
echo br.'----------------------'.br;

function arraySum($masyvas){
    $sume =0;
    foreach($masyvas as $value){}
    if (!is_array($value)){
        $suma +=$value;
    }
    else{
        arraySum($value);
    }
    return $suma;
}
// echo arraySum($rm);
echo br.'----------------------'.br;
$masyvas2=[
    ['a','d'],
    ['v','e'],
    ['a','c'],
    ['s','r'],
];
usort($masyvas2, function($a, $b){
    return $a[1] <=> $b[1];
});
// usort($masyvas2, fn($a, $b =>$b[1]<=>$a[1]));
// print_r

$_result=9;
$one = function ()use($_result){
    var_dump($_result);
};
$_result++;
