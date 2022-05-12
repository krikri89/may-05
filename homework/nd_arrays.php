<?php
const br ='<br>';
echo br.'----------------1----'.br;
// Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.
$randomArr= range(5, 25);
shuffle($randomArr);
$allRandomArr=array_slice($randomArr, 0, 30);
print_r($allRandomArr);

// $arr = [5, 12, 11, 23, 14, 23, 5, 8, 9, 11, 5, 12, 11, 23, 14, 23, 5, 8, 9, 11, 5, 12, 11, 23, 14, 23, 5, 8, 9, 11];
// print_r($arr);
echo br.'----------------2:a)----'.br;
// // Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;

// foreach($arr as $numbers){
//     $new = array_count_values($arr);
//     if ($new > 10){
//         print_r ($new);
//     }
// };

$vla = count($randomArr);
print_r($vla);
echo br.'----------------2:b)----'.br;
// Raskite didžiausią masyvo reikšmę ir jos indeksą arba indeksus jeigu yra keli;

echo br.'----------------2:c)----'.br;
// Suskaičiuokite visų porinių (lyginių) indeksų reikšmių sumą;


echo br.'----------------2:d)----'.br;
// Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;

echo br.'----------------2:e)----'.br;
// Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;

echo br.'----------------2:f)----'.br;
// Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;

echo br.'----------------2:g)----'.br;
// Pirminio masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;

echo br.'----------------2:h)----'.br;
// Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;

echo br.'----------------2:i)----'.br;
// Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;

echo br.'----------------3----'.br;
// $mas = range(A, D);
// print_r($mas);