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

echo atrchr($name3, $surname4);