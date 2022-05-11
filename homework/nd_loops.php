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
                color: blue;
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

$line2 ='';
$stars2 = 0;
for ($b=0; $b<400; $b++){
    $stars2++;
    if($stars2 <50){
         $line2 .= '*';
}else {
    $line2 .= '<br>';
    $stars2 = 0;
}
}
print_r ($line2);

echo '<br>';
// <!-- Sugeneruokit 300 atsitiktinių skaičių nuo 0 iki 300, atspausdinkite juos atskirtus tarpais ir suskaičiuokite kiek tarp jų yra didesnių už 150.  Skaičiai didesni nei 275 turi būti raudonos spalvos. -->
echo '<br>----------------2------<br>';

for($i=0; $i<300; $i++){
$numbers[] = rand(0, 300);
echo ' ' . $numbers[$i]. ' ';
}   
echo'<br>--<br>';

// if($i>150){
//     echo count($numbers);
// }
// echo'<br>--<br>';

//     if ($i>275){
//         echo '<span style="color:red">'. $i. '</span>';
//     }

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
$stars = '15';
for ($i=1; $i<$stars; $i++){
    for($j=1; $j<(2*$stars)-1; $j++){
        echo "*";
    }
    echo '<br>';
    // echo '<span style=" color:green">'. $stars. '</span>';
}
echo '<br>';

// <!-- Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines. -->
echo '<br>----------------5------<br>';
echo '<br>';

// <!-- Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite tris skirtingus scenarijus kai monetos metimą stabdome:
// Iškritus herbui;
// Tris kartus iškritus herbui;
// Tris kartus iš eilės iškritus herbui; -->
echo '<br>----------------6------<br>';
$saugiklis=100;
do {
    if(!(--$saugiklis)) {
    echo 'saugiklis';
    break;
}
$moneta = rand(0, 1) ? 'H' : 'S';
echo "$moneta <br>";
}while($moneta!='H');


echo '<br>';

// <!-- Kazys ir Petras žaidžiai Bingo. Petras surenka taškų kiekį nuo 10 iki 20, Kazys surenka taškų kiekį nuo 5 iki 25. Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. Taškų kiekį generuokite funkcija ​rand()​. Žaidimą laimi tas, kas greičiau surenka 222 taškus. Partijas kartoti tol, kol kažkuris žaidėjas pirmas surenka 222 arba daugiau taškų. Nenaudoti cikle break. -->
echo '<br>----------------7------<br>';
$win =0;
$times=0;
do {
    $kazys = rand(5, 25);
    $petras = rand(10, 20);
// $win++;
$win+=$kazys;
$win+=$petras;

}while($win<222);
echo $kazys;
echo '-----';
echo $petras;
// echo $win;

echo '<br>';

// <!-- Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą (https://lt.wikipedia.org/wiki/Rombas), kurio aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos (perkrovus puslapį spalvos turi keistis). -->
echo '<br>----------------8------<br>';
$n = 7;
for ($i=1; $i<=$n; $i++){
    for ($j=1; $j<=(2*$n)-1; $j++){
        if ($j>=$n-($i-1) && $j<=$n +($i-1)){
        echo '*';
    } else {
        echo "&nbsp; &nbsp;";
    }
} echo '</br>';
}
    for ($i=$n-1;$i>=1; $i--){
        for($j=1; $j<=(2*$n)-1; $j++){
            if($j>=$n-($i-1) && $j<=$n+($i-1)){
                echo '*';
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
echo '<br>';

// Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. Skaičiai turi būti unikalūs (t.y. nesikartoti). Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.
echo '<br>----------------11------<br>';
echo '<br>';
