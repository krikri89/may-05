<?php
const BR = '<br/>';

echo '---------1st------------';
echo BR;

// Sukurkite 4 kintamuosius, kurie saugotų jūsų vardą, pavardę, gimimo metus ir šiuos metus (nebūtinai tikrus). Parašykite kodą, kuris pagal gimimo metus paskaičiuotų jūsų amžių ir naudodamas vardo ir pavardės kintamuosius atspausdintų tokį sakinį :
// "Aš esu Vardenis Pavardenis. Man yra XX metai(ų)".

$name = 'Vardenis';
$surname = 'Pavardenis';
$dob = 1888;
$newDate = 2022;
$age = $newDate - $dob;
echo "As esu $name $surname ir man yra $age metai";
echo BR;

echo '--------2nd-------------';
echo BR;

// Naudokite funkcija rand(). Sukurkite du kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 4. Didesnę reikšmę padalinkite iš mažesnės. Atspausdinkite rezultatą jį suapvalinę iki 2 skaičių po kablelio.

$random1 = rand(0, 4);
echo $random1;
echo BR;
$random2 = rand(0, 4);
echo $random2;
echo BR;

if ($random1 >= $random2 && $random2 > 0){
    echo (round($random1/$random2));
} else {
    echo (round($random2/$random1));
};
echo BR;
echo '----------3rd-----------';
echo BR;
// Naudokite funkcija rand(). Sukurkite tris kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 25. Raskite ir atspausdinkite kintąmąjį turintį vidurinę reikšmę.

$randomNb1 = rand(0, 25);
echo $randomNb1;
echo BR;

$randomNb2 = rand(0, 25);
echo $randomNb2;
echo BR;

$randomNb3 = rand(0, 25);
echo $randomNb3;
echo BR;

echo '---------------------';
echo BR;
if (($randomNb1 > $randomNb2 && $randomNb1 < $randomNb3) || ($randomNb1 > $randomNb3 && $randomNb1 <$randomNb2))
    echo "Middle number is $randomNb1";
elseif (($randomNb2 > $randomNb1 && $randomNb2 < $randomNb3) || ($randomNb2 > $randomNb3 && $randomNb2 < $randomNb1))
    echo "Middle number is $randomNb2";
else echo "Middle number is $randomNb3";

echo BR;
echo'---------4th----------';
echo BR;

// Įvedami skaičiai -a, b, c –kraštinių ilgiai, trys kintamieji (naudokite ​rand()​ funkcija nuo 1 iki 10). Parašykite PHP programą, kuri nustatytų, ar galima sudaryti trikampį ir atsakymą atspausdintų. 

$a = rand(1, 10);
$b = rand(1, 10);
$c = rand(1, 10);
echo "$a, $b, $c";
echo BR;
echo '-------------';
echo BR;
if ($a == $b && $b == $c && $a == $c)
echo "Triangle is Equilateral";
elseif ($a+$b>$c)
echo 'Trikampis galimas';
elseif (hypot($a, $b)==($c*$C))
echo 'Statusis trikampis';
else echo 'trikampis negalimas';
echo BR;
// elseif ($c*$c)==(($a*$a)+($b*$b))
// echo 'Statusis trikampis';
// plotas bet kurio trikampio
// $s =($a+$b+$c)/2;
// $s1 =sqrt($s*(($s-$a)*($s-$b)*($s-$c)));
// echo "$s1";

echo BR;
echo '-----------5th-------';
echo BR;
// Sukurkite keturis kintamuosius ir ​rand()​ funkcija sugeneruokite jiems reikšmes nuo 0 iki 2. Suskaičiuokite kiek yra nulių, vienetų ir dvejetų. (sprendimui masyvo nenaudoti).
$random_Number1 = rand(0, 2);
$random_Number2 = rand(0, 2);
$random_Number3 = rand(0, 2);
$random_Number4 = rand(0, 2);
echo "$random_Number1 $random_Number2 $random_Number3 $random_Number4";
echo BR;
echo '------';
// echo (preg_match_all("$random_Number1 $random_Number2 $random_Number3 $random_Number4",0));
$str = "$random_Number1 $random_Number2 $random_Number3 $random_Number4";
$pattern = "/0/i"; echo BR;
$pattern2 = "/1/i";
$pattern3 = "/2/i";
echo preg_match_all($pattern, $str); echo BR;
echo preg_match_all($pattern2, $str); echo BR;
echo preg_match_all($pattern3,$str); 
echo BR;
echo '-----------6th-------';
echo BR;
// Naudokite funkcija rand(). Sugeneruokite atsitiktinį skaičių nuo 1 iki 6 ir jį atspausdinkite atitinkame h tage. Pvz skaičius 3- rezultatas: <h3>3</h3>
$d = rand(1, 6);
echo "<h$d>$d</h$d>";

echo BR;
echo '-----------7th-------';
echo BR;
// Naudokite funkcija rand(). Atspausdinkite 3 skaičius nuo -10 iki 10. Skaičiai mažesni už 0 turi būti žali, 0 - raudonas, didesni už 0 mėlyni.

$colorNb = rand(-10, 10);
if ($colorNb < 0)
echo "<font color= 'green'>$colorNb";
elseif ($colorNb==0)
echo "<font color='red'>$colorNb";
else echo "<font color='blue'>$colorNb";

echo BR;
echo "<font color='black'>-----------8th-------";
echo BR;

// Įmonė parduoda žvakes po 1 EUR. Perkant daugiau kaip už 1000 EUR taikoma 3 % nuolaida, daugiau kaip už 2000 EUR - 4 % nuolaida. Parašykite programą, kuri skaičiuos žvakių kainą ir atspausdintų atsakymą kiek žvakių ir kokia kaina perkama. Žvakių kiekį generuokite ​rand()​ funkcija nuo 5 iki 3000.
