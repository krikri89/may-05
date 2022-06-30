<?php

$g1='bebras';
$g2='Jonas';
$g3='Simona';

// $namas=['bebras','jonas','simona'];
// print_r($namas);
// echo '<br>-----------<br>';
// $namas[1]='barsukas';
// echo $namas[1];
// echo '<br>-----------<br>';
// print_r ($namas);
// echo '<br>-----------<br>';
// array_push($namas, 'kazys');
// $namas[]='laima';
// array_unshift($namas, 'pele');
// array_pop($namas);
// echo '<br>-----------<br>';
// array_pop($namas);
// print_r($namas);
// echo '<br>-----------<br>';
// array_shift($namas);
// print_r($namas);
// echo '<br>-----------<br>';
// array_splice($namas, 1, 1);
// print_r($namas);
echo '<br>-----------<br>';
$namas1['stogas']='karlsonas';
print_r ($namas1);
echo '<br>-----------<br>';
$namas=['pirmas'=>'bebras','brolis'=>'jonas','simona'];
print_r($namas);
echo '<br>-----------<br>';
foreach($namas as $key =>$value){
    echo '<br>';
    echo "$key => $value";
}
echo '<br>-----------<br>';
$a=5;
$c=&$a;
echo $c;

$a=8;
echo '<br>-----------<br>';
unset($c);
$c=15;

echo $c, $a;
echo '<br>-----------<br>';
$colors=['blue', 'red', 'green', 'yellow'];
foreach ($colors as &$value) {
$colors[$key] = $colors[$key] . '***';
}
foreach ($colors as &$value){
    $value = $value. '+++';
    echo $value;

};
echo '<br>-----------<br>';
print_r($colors);

echo '<br>-----------<br>';

foreach(range(1, 5) as $v){
    echo $v;
}
echo '<br>-----------<br>';