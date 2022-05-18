<?php

for ($i = 0; $i<3; $i++){
    echo ($i +1). 'Didelis ciklas <br>';
    for ($k=0; $k<3; $k++){
        if ($k ==1){
            continue;
        }
        echo ($k+1) .  'Mini ciklas <br>';
        }
    }

echo '-------------';

$saugiklis=100;
do {
    if(!(--$saugiklis)) {
    echo 'saugiklis';
    break;
}
$moneta = rand(0, 1) ? 'H' : 'S';
echo "$moneta <br>";
}while($moneta!='H');