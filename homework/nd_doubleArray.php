<?php
const br ='<br>';
// Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.
echo br.'--------------------1--'.br;
$arr = [
    [5, 25, 12, 10, 11],
    [2, 24, 19, 6, 12],
    [4, 23, 20, 7, 13],
    [3, 22, 18, 8, 14],
    [1, 21, 17, 9, 15],
    [5, 25, 12, 10, 11],
    [2, 24, 19, 6, 12],
    [4, 23, 20, 7, 13],
    [3, 22, 18, 8, 14],
    [1, 21, 17, 9, 15],
];
print_r($arr);
echo sizeof($arr);
echo count($arr);

echo br.'--------------------2-a)--'.br;
// Suskaičiuokite kiek masyve yra elementų didesnių už 10;
foreach ($arr as $key=>$value){
    if ($value>10) {
        echo count($value), br;
    }
};


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