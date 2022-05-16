<?php
const br ='<br>';
echo br.'----------------1----'.br;
// Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.

for ($i=0; $i<30; $i++){
    $mas[]=rand(5, 25);
}print_r ($mas);



echo br.'----------------2:a)----'.br;
// // Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;

$someover10=0;

foreach($mas as $key => $values){
    if ($values > 10){
        $someover10++;
    }
}  echo $someover10;

echo br.'----------------2:b)----'.br;
// Raskite didžiausią masyvo reikšmę ir jos indeksą arba indeksus jeigu yra keli;

foreach ($mas as $key => $values){
    if (max($mas)=== $values){
        echo "index: $key", '<br>';
        echo "Values: $values", '<br>';
    }
}

echo br.'----------------2:c)----'.br;
// Suskaičiuokite visų porinių (lyginių) indeksų reikšmių sumą;
$total =0;
foreach ($mas as $key => $values){
    if ($key%2==0){
        $total+=$values;
    }
}print_r($total);


echo br.'----------------2:d)----'.br;
// Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;

foreach ($mas as $key =>$values){
    $newArray[]=($values-$key);
}
print_r($newArray);

echo br.'----------------2:e)----'.br;
// Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;
// $mas2[]=rand(5, 29);
// $newArray2=

// print_r($newArray);
echo br.'----------------2:f)----'.br;
// Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;

foreach ($mas as $key =>$values){
    if ($key%2==0){
        $porinis[]=$values;
    }else {$neporinis[]=$values;
}
}
echo 'Porinis masyvas <br>';
print_r($porinis);
echo '<br>';
echo 'NEporinis masyvas <br>';
print_r($neporinis);

echo br.'----------------2:g)----'.br;
// Pirminio masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;
foreach($porinis as $values){
    if ($values >15){
        $value=0;
    }
}
unset($value);
print_r($porinis);

echo br.'----------------2:h)----'.br;
// Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;


echo br.'----------------2:i)----'.br;
// Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;
foreach ($porinis as $key => $value){
    if ($key%2 ==0){
        unset($porinis[$key]);
    }
}
print_r($porinis);

echo br.'----------------3----'.br;
// Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. Suskaičiuokite kiek yra kiekvienos raidės.
$letters = ('ABCD');
$lettersArray = [];
for ($i=0; $i <200; $i++){
    $randLetter=rand(0, strlen($letters)-1);
    $lettersArray[]=$letters[$randLetter];
}
$A=0;
$B=0;
$C=0;

foreach ($lettersArray as $key => $value){
    if ($value == 'A'){
        $A++;
    }
    if ($value == 'B'){
        $B++;
    }
    if ($value == 'C'){
        $C++;
    }$D= 200 - $A - $B - $C;
}echo "A: $A, B: $B, C: $C, D: $D";

echo br.'----------------4----'.br;
// Išrūšiuokite 3 uždavinio masyvą pagal abecėlę.
$lettArray=(sort($lettersArray, SORT_STRING));
print_r($lettArray);

echo br.'----------------5----'.br;
// Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. Sudėkite masyvus, sudėdami atitinkamas reikšmes. Paskaičiuokite kiek unikalių (po vieną, nesikartojančių) reikšmių ir kiek unikalių kombinacijų gavote.
// $firstArray =[];
// $secondtArray =[];
// $thirdArray =[];

echo br.'----------------6----'.br;
// Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999. Masyvų ilgiai 100. Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis).

$firstArray =[];
$secondArray =[];
do{
    $number = rand(100, 999);
    if (in_array($number, $firstArray)){
        continue;
    }$firstArray[]=$number;
}while(count($firstArray)< 100);
print_r($firstArray);
echo br.'------------'.br;

do{
    $number = rand(100, 999);
    if (in_array($number, $secondArray)){
        continue;
    }$secondArray[]=$number;
}while(count($secondArray)< 100);
print_r($secondArray);


echo br.'----------------7----'.br;
// Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, bet nėra antrame 6 uždavinio masyve.
$arr=[];
for ($i=0; $i< count($firstArray); $i++){
    if (!in_array($firstArray[$i], $secondArray)){
        $arr[]=$firstArray[$i];
    }
}
print_r($arr);

echo br.'----------------8----'.br;
// Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose.
$repeatArr=[];
for ($i=0; $i < count ($firstArray); $i++){
    if (in_array($firstArray[$i], $firstArray)){
        $repeatArr[]=$firstArray[$i];
    }
}
print_r($repeatArr);
echo br.'----------------9----'.br;
// Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės iš būtų antrojo masyvo.
$repeatArr2=array_flip($firstArray);
print_r($repeatArr2);
$total3=0;
foreach($repeatArr2 as $value){
    $value = $secondArray[$total3];
    $total3++;
}
unset($value);
print_r($repeatArr2);


echo br.'----------------10----'.br;
// Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma. Penktas trečio ir ketvirto suma ir t.t.
echo br.'----------------11----'.br;
// Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios. Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų. Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite. (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)






