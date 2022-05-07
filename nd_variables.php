<?php
const BR = '<br/>';

echo multiply(5, 6);

function multiply($one, $two) {
    return $one * $two;
}
echo BR;

multiply_print(5, 10);

function multiply_print($one, $two){
    echo $one * $two;
}
echo BR;

echo '---------------------';
echo BR;

// Sukurkite 4 kintamuosius, kurie saugotų jūsų vardą, pavardę, gimimo metus ir šiuos metus (nebūtinai tikrus). Parašykite kodą, kuris pagal gimimo metus paskaičiuotų jūsų amžių ir naudodamas vardo ir pavardės kintamuosius atspausdintų tokį sakinį :
// "Aš esu Vardenis Pavardenis. Man yra XX metai(ų)".

$vardas = 'Vardenis';
$pavarde = 'Pavardenis';
$dob = 1888;
$newDate = 2022;
$age = $newDate - $dob;
echo "As esu $vardas $pavarde ir man yra $age metai ";
echo BR;

echo '---------------------';
echo BR;

// Naudokite funkcija rand(). Sukurkite du kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 4. Didesnę reikšmę padalinkite iš mažesnės. Atspausdinkite rezultatą jį suapvalinę iki 2 skaičių po kablelio.

$random1 = rand(0, 4);
$random2 = rand(0, 4);

if ($random1 >= $random2){
    echo (round($random1/$random2));
} else {
    echo (round($random2/$random1));
};
echo BR;
echo '---------------------';
echo BR;
// Naudokite funkcija rand(). Sukurkite tris kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 25. Raskite ir atspausdinkite kintąmąjį turintį vidurinę reikšmę.

$random3 = rand(0, 25);
echo $random3;
echo BR;
$random4 = rand(0, 25);
echo $random4;
echo BR;
$random5 = rand(0, 25);
echo $random5;
echo BR;
echo '---------------------';
echo BR;
if ($random3 > $random4 && $random3 < $random5 )
    echo $random3;
elseif ($random4 > $random3 && $random4 < $random5 )
    echo $random4;
else echo $random5;
