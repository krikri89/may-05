<?php
// Kintamojo kintamasis

$petras = 'birute';
$antanas = 'petras';
$birute = 'labas';

// echo $$$antanas;
var_dump([false]);
echo '<pre>';

// print_r(['kate', ['lape'], 'gaidys']);
var_dump(!!'karve');
var_dump(!!'');
var_dump((bool)'karve');
var_dump((int)'12a14');
$b = (6 > 5) ? 'kate': 'suo';
echo '-------';

$d = 0;
6>15 ? $d++ : (8>4 ? $d+=10 : $d--);

echo $d;

echo '----------------';

$k = 5;
unset($k);
var_dump(isset($k));

