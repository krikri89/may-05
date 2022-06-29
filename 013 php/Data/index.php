<?php
echo '<pre>';
$cats = ['Pilkis', 'Murkis'];

if (!file_exists(__DIR__.'/cats.json')){
    file_put_contents(__DIR__.'/cats.json', json_encode([]));
}

$nowCats[]= 'Micius';

$nowCats[0]= 'Plikis';

file_put_contents(__DIR__.'/cats.json', json_encode($nowCats));

$nowCats = json_encode(file_get_contents(__DIR__.'/cats.json'));

print_r($nowCats);
