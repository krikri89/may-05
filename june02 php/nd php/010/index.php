<?php

require __DIR__ . '/Tenisininkas.php';
echo '<pre>';
echo '<br>';

$t1 = new Tenisininkas('Diedas');
$t2 = new Tenisininkas('Teta');

Tenisininkas::zaidimoPradzia();

print_r($t1);
print_r($t2);

$t1->perduotiKamuoliuka();

print_r($t1);
print_r($t2);
