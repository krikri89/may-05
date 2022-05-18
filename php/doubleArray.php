<?php
const BR = '<br>';
$animals=[
    ['name'=>'Pilkis', 'type'=> 'cat'],
    ['name'=>'Juodis', 'type'=> 'cat'],
    ['name'=>'Pukis', 'type'=> 'dog'],
    ['name'=>'Sarikas', 'type'=> 'dog'],
    ['name'=>'Bobikas', 'type'=> 'dog'],
    

];

foreach($animals as $animal){
    echo BR;
    if ('cat'== $animal['type']){
    print_r($animal['type']);
    }
};

// foreach($animals as $animal){
//     if ('Pukis' == $animal['name']){
//         $animal['type'] ='cat';
//     }
// }
echo ' arba----------';

foreach($animals as $key => $animal){
    
    if('pukis'== $animal['name']){

    $animals[$key]['type']='cat';
    }
}
print_r($animals);
echo BR.'---------------------'.BR;

$_6x6 = [];
for ($k=0; $k <6; $k++){
    $row =[];
    for ($i=0; $i <6; $i++){
    $row[] = rand(6, 36);
}
$_6x6[] = $row;
}
echo BR.'---------------------'.BR;

foreach($_6x6 as $row){
    foreach($row as $number){
        echo " $number ";
    }
    echo BR;
};
