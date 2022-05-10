<?php
// Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus (Jonas Jonaitis). Atspausdinti trumpesnį stringą.
$name = 'Pepe';
$surname = 'Longstocking';

if (strlen($name) > strlen($surname))
echo $surname;
else echo "$name <br>";

echo '-----2nd --------';
echo '<br>';
// Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus. Vardą atspausdinti tik didžiosiom raidėm, o pavardę tik mažosioms.

$name1 = 'Pepe';
$surname2 = 'Lonstocking';

echo strtolower($name1), '<br>'; 
echo strtoupper($surname2), '<br>';

echo '-----3rd--------';
echo '<br>';
// Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus. Sukurti trečią kintamąjį ir jam priskirti stringą, sudarytą iš pirmų vardo ir pavardės kintamųjų raidžių. Jį atspausdinti.

$name3 = 'John';
$surname4 = 'Johnson';

echo($name3[0]. $surname4[0]);

echo '-----4th--------';
echo '<br>';
// Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus. Sukurti trečią kintamąjį ir jam priskirti stringą, sudarytą iš trijų paskutinių vardo ir pavardės kintamųjų raidžių. Jį atspausdinti.

echo (substr($name3,-3));


echo '<br>';
echo '-----5th--------';
echo '<br>';
// Sukurti kintamąjį su stringu: “An American in Paris”. Jame visas “a” (didžiąsias ir mažąsias) pakeisti žvaigždutėm “*”.  Rezultatą atspausdinti.

echo str_ireplace('a', '*', 'An American in Paris');

echo '<br>';
echo '-----6th--------';
echo '<br>';
// Sukurti kintamąjį su stringu: “An American in Paris”. Suskaičiuoti visas “a” (didžiąsias ir mažąsias) raides. Rezultatą atspausdinti.

echo substr_count('An American in Paris','a');

echo '<br>';
echo '-----7th--------';
echo '<br>';
// Sukurti kintamąjį su stringu: “An American in Paris”. Jame ištrinti visas balses. Rezultatą atspausdinti. Kodą pakartoti su stringais: “Breakfast at Tiffany's”, “2001: A Space Odyssey” ir “It's a Wonderful Life”.

$arr=array('a','e','i','o','u','y');
$newArr=str_replace($arr,'', 'An American in Paris');
echo "$newArr, <br>";
$newArr2=str_replace($arr,'', 'Breakfast at Tiffany s');
echo "$newArr2, <br>";
$newArr3=str_replace($arr,'', '2001: A Space Odyssey');
echo "$newArr3, <br>";
$newArr4=str_replace($arr,'', 'It s a Wonderful Life');
echo "$newArr4, <br>";

echo '<br>';
echo '-----8th--------';
echo '<br>';
// Stringe, kurį generuoja toks kodas: 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope'; Surasti ir atspausdinti epizodo numerį.

echo $starWars = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
$number = '';
for ($i=0; $i < strlen($starWars);$i++) {
    if (is_numeric($starWars[$i])){
        $number.=$starWars[$i];
    }
}
echo "Epizodo numeris yra $number", '<br>'; 
echo '<br>';
echo '-----9th--------';
echo '<br>';
// Suskaičiuoti kiek stringe “Don't Be a Menace to South Central While Drinking Your Juice in the Hood” yra žodžių trumpesnių arba lygių nei 5 raidės. Pakartokite kodą su stringu “Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale”.

$countWords= 'Don\'t Be a Menace to South Central While Drinking Your Juice in the Hood';
$wordSplit= preg_split("/[\s,]+/m",$countWords);
print_r ($wordSplit);
for ($i=0; $i<count($wordSplit); $i++){
    if((strlen($wordSplit[$i]))<=5){
        echo ' '.$wordSplit[$i]. ' ';
    }
    
}    ;

// echo str_word_count($countWords);

echo '<br>';
echo '-----10th--------';
echo '<br>';
// Parašyti kodą, kuris generuotų atsitiktinį stringą iš lotyniškų mažųjų raidžių. Stringo ilgis 3 simboliai.
range('a', 'z');
echo substr(str_shuffle(str_repeat('abcdefgjklmnopqrstuvwxyz', 3)), 0, 3);

echo '<br>';
echo '-----11th--------';
echo '<br>';
// Parašykite kodą, kuris generuotų atsitiktinį stringą su 10 atsitiktine tvarka išdėliotų žodžių, o žodžius generavimui imtų iš 9-me uždavinyje pateiktų dviejų stringų. Žodžiai neturi kartotis. (reikės masyvo)

$first='Don\' t Be a Menace to South Central While Drinking Your Juice in the Hood';
$second='Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale';

$arr4 = explode(' ', $first.' '.$second);
shuffle($arr4);
array_splice($arr4,0, 10);
$masyvas =(array_splice($arr4,0, 10));

$ats = implode('', $masyvas);
print_r($ats);
