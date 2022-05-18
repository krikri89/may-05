<?php
echo '<pre>';

echo preg_replace_callback('/\d\/', // ieskoti tiek skaiciu kiek eina
'ieskok',
'lkjlijiu'. rand(1000, 9999). 'kjpoipa3098434di');
echo '<br>';

function ieskok($m){
    print_r($m);
    return '-'. $m[0].'-';
}
echo '<br>-------------<br>';
$m = [3,4,6,2,7,2,4,5]; // rasti paskutinius 3 el.
$m3=array_slice($m, -3, 3);
print_r($m3); 
echo '<br>-------------<br>';

// rand nuo 100 iki 999. Parašyti 3 funkcijas, sudėti jas į masyvą, tą masyvą praforyčinti ir kaip argumentą panaudoti sugeneruota rand. Funk daugina ir spausdina gautą argumentą 3, 5, 7 atitinkamai

$nb = rand(100, 999);
$masyvas=[];
array_push($masyvas,
fn($a)=>$a*3,
fn($a)=>$a*5,
fn($a)=>$a*7
);

foreach($masyvas as &$value){
    $value= $value($nb).'<br>';
}
print_r($masyvas);
echo '<br>-------------<br>';

function gen_one(){
    for ($i=0; $i<20; $i++){
        yield $i=> rand(1000, 9999);
    }
}
foreach(gen_one()as $key => $value){
    echo "$key => $value <br>";
}
echo '<br>-------------<br>';
$transport = ['foot', 'bike', 'car', 'plane'];
var_dump (current($transport)); echo '<br>'; // foot
var_dump( next($transport)); echo '<br>'; // bike
var_dump( prev($transport)); echo '<br>';
echo reset($transport); //reset 
var_dump( current($transport)); echo '<br>'; // next perstumia pointer. 
