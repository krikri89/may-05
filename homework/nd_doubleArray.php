<?php
const br ='<br>';
// Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.
echo br.'--------------------1--'.br;
$arr = [];
foreach (range(1,10) as $element){
    $row = [];
    foreach (range(1,5) as $column){
        $row[] = rand(5,25);
    }
    $arr[]=$row;
}


echo br.'--------------------2-a)--'.br;
// Suskaičiuokite kiek masyve yra elementų didesnių už 10;
$count = 0;
$max = 0;
$var = [];

foreach ($arr as $num){
    foreach ($num as $key =>$n){
        if (10 < $n){
            $count++;
        }
        if ($max < $n){
            $max =$n;
        }
    }
}


echo br.'--------------------2-b)--'.br;
// Raskite didžiausio elemento reikšmę;
// foreach ($arr as $value){
//     if ($value )
// }
echo br.'--------------------2-c)--'.br;
// Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)

echo br.'--------------------2-d)--'.br;
// Visus masyvus “pailginkite” iki 7 elementų

echo br.'--------------------2-e)--'.br;
// Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai 