<?php
// <!-- Naršyklėje nupieškite linija iš 400 “*”. 
// 1)Naudodami css stilių “suskaldykite” liniją taip, kad visos žvaigždutės matytųsi ekrane;
// 2)Programiškai “suskaldykite” žvaigždutes taip, kad vienoje eilutėje nebūtų daugiau nei 50 “*”;  -->
echo '<br>----------------1------<br>';
?>
<html> 
    <head>
        <style type="text/css">
            p {
                color: green;
                overflow-wrap: break-word;
            }
        </style>
        </head>
        <body>
            <p>
            <?php
$line ='*';
for ($i=0; $i<400; $i++){
    echo $line;
}
?></p>
</body>
</html>
<?php
echo '<br>';
echo'-------------';
echo '<br>';


for ($b=0; $b<8; $b++){
    for ($j=0; $j <50; $j++){
        echo '*';
    } echo '<br>';
}

echo '<br>';
// <!-- Sugeneruokit 300 atsitiktinių skaičių nuo 0 iki 300, atspausdinkite juos atskirtus tarpais ir suskaičiuokite kiek tarp jų yra didesnių už 150.  Skaičiai didesni nei 275 turi būti raudonos spalvos. -->
echo '<br>----------------2------<br>';

$num = '';
for($i=0; $i<300; $i++){
    $numbers = rand(0, 300). ' ';
    // echo $numbers[$i];
    if($numbers > 275){
    $num .= "<span style='color:red;'>$numbers</span>";
} else {
    $num .="<span>$numbers</span>";}
}echo $num, '<br>--<br>';


// if ($numbers > 150){
// echo 'Total numbers : ', count($numbers);
// }
// echo'<br>--<br>';

echo '<br>';


// <!-- Vienoje eilutėje atspausdinkite visus skaičius nuo 1 iki atsitiktinio skaičiaus tarp 3000 - 4000 pvz(aibė nuo 1 iki 3476), kurie dalijasi iš 77 be liekanos. Skaičius atskirkite kableliais. Po paskutinio skaičiaus kablelio neturi būti. Jeigu reikia, panaudokite css, kad visi rezultatai matytųsi ekrane. -->
echo '<br>----------------3------<br>';
for ($a=0; $a<4000; $a++){
    $randomNb = rand(1, 4000);
    if($randomNb%77 ==0)
    echo ', '.$randomNb;
}

echo '<br>';

// <!-- Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis.
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * * -->
echo '<br>----------------4------<br>';
$kvadratas = '*';
for ($i=0; $i < 25; $i++) { 
    for ($j=0; $j < 25; $j++) { 
        echo "<p style= 'display: inline;letter-spacing: 12px;'>$kvadratas</p>";
    }echo '<br>';
}
echo '<br>';

// <!-- Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines. -->
echo '<br>----------------5------<br>';
$line = 25;
for ($i=1; $i<=$line; $i++){
    for ($l=1; $l<=$line; $l++){
    if ($i==$l || $l == ($line-$i+1)){
        echo "<p style= 'color:yellow; display: inline; letter-spacing:12px;'>*</p>";
    }else{
        echo "<p style= 'display: inline; letter-spacing:12px;'>*</p>";}
    }echo '<br>';
}
echo '<br>';

// <!-- Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite tris skirtingus scenarijus kai monetos metimą stabdome:
// Iškritus herbui;
// Tris kartus iškritus herbui;
// Tris kartus iš eilės iškritus herbui; -->
echo '<br>----------------6------<br>';
// $saugiklis=100;
// do {
//     if(!(--$saugiklis)) {
//     echo 'saugiklis';
//     break;
// }
// $moneta = rand(0, 1) ? 'H' : 'S';
// echo "$moneta <br>";
// }while($moneta!='H');

do{
    $coin = rand(0, 1) ? 'S' : 'H';
    echo $coin.'<br>';
} while ($coin != 'H');
echo '<br>-----------------b-----<br>';

$count = 0;
do {
    $coin2 = rand(0,1) ? 'S' : 'H';
    if ($coin2 ==='H'){
        $count++;
    }
    echo $coin2.'<br>';
}while($count <3);
echo '<br>-----------------c-----<br>';

$count2 = 0;
do {
    $coin3 = rand(0, 1) ? 'S' : 'H';
    if ($coin3 == 'H'){
        $count2++;
    } echo $coin3. '<br>';
} while ($count2 < 3);

echo '<br>';

// <!-- Kazys ir Petras žaidžiai Bingo. Petras surenka taškų kiekį nuo 10 iki 20, Kazys surenka taškų kiekį nuo 5 iki 25. Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. Taškų kiekį generuokite funkcija ​rand()​. Žaidimą laimi tas, kas greičiau surenka 222 taškus. Partijas kartoti tol, kol kažkuris žaidėjas pirmas surenka 222 arba daugiau taškų. Nenaudoti cikle break. -->
echo '<br>----------------7------<br>';
// $win =0;
// $times=0;
// do {
//     $kazys = rand(5, 25);
//     $petras = rand(10, 20);
//     // $win++;
//     $win+=$kazys;
//     $win+=$petras;
    
// }while($win<222);
// echo $kazys;
// echo '-----';
// echo $petras;
// echo $win;

$totalKazys = 0;
$totalPetras = 0;
do{
    $countKazys = rand(10, 20);
    $totalKazys+=$countKazys;
    if($totalKazys > 222){
        continue;
    }
    $countPetras = rand(5, 25);
    $totalPetras += $countPetras;
    if($totalPetras > 222){
        continue;
    }
}while($totalKazys < 222 && $totalPetras < 222);
if ($totalKazys > $totalPetras){
    $winner = 'Kazys';
}else if($totalKazys < $totalPetras){
    $winner = 'Petras';
}else {
    $winner = 'Lygu';
}
echo "Kazys surinko: $totalKazys ", "Petras surinko: $totalPetras ", "Partija laimejo: $winner.";


echo '<br>';

// <!-- Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą (https://lt.wikipedia.org/wiki/Rombas), kurio aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos (perkrovus puslapį spalvos turi keistis). -->
echo '<br>----------------8------<br>';
$n = 7;
for ($i=1; $i<=$n; $i++){
    for ($j=1; $j<=(2*$n)-1; $j++){
        if ($j>=$n-($i-1) && $j<=$n +($i-1)){
        echo ' *';
    } else {
        echo "&nbsp; &nbsp;";
    }
} echo '</br>';
}
    for ($i=$n-1;$i>=1; $i--){
        for($j=1; $j<=(2*$n)-1; $j++){
            if($j>=$n-($i-1) && $j<=$n+($i-1)){
                echo' *';
            }else{
                echo "&nbsp; &nbsp;";
            }
        }
    echo '<br>';
}
echo '<br>';

// <!-- Sumodeliuokite vinies kalimą. Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. Vinies ilgis 8.5cm (pilnai sulenda į lentą).
// “Įkalkite” 5 vinis mažais smūgiais. Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.
// “Įkalkite” 5 vinis dideliais smūgiais. Vienas smūgis vinį įkala 20-30 mm, bet yra 50% tikimybė (pasinaudokite rand() funkcija tikimybei sumodeliuoti), kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių. -->
echo '<br>----------------10------<br>';

$smallHit = 0;
$totalHit=0;
for ($i=0; $i<5; $i++){
    $work = 0; 
    do {
        $oneHit = rand(5, 20);
        $work+=$oneHit;
        $smallHit++;
    }while($work <85 );
}echo "will need $smallHit. small hits";
echo '<br>----------------b------<br>';

$bigHit = 0;
$totalHit2 = 0;
for ($i=0; $i<5; $i++){
    $work2 = 0;
    do {
        if(rand(0, 1)){
        $oneHit2 = rand(20, 30);
        $work2+=$oneHit2;
        $bigHit++;
        }
    }while($work2 <85);
}echo "will need $bigHit. big hits";


echo '<br>';

// Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. Skaičiai turi būti unikalūs (t.y. nesikartoti). Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.
echo '<br>----------------11------<br>';
$string =[];

do {
    $nb = rand (0, 200);
    if (in_array($nb, $string)){
        continue;
    }
    array_push($string, $nb);
} while (count($string) <50);
$arrays = $string;
print_r(implode(' ', $arrays,));
echo '<br> ----<br>';
// $string2=[];
// for ($i=0; $i< count($string); $i++){
//     $some = 0;
//     for ($k=1; $K<200; $k++){
//         if ($string[$i]%$k === 0){
//             $some++;
//         }
//         if ($some == 2){
//             array_push($string2, $string[$i]);
//         }
//     }
// } print_r($string2);
