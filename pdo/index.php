<?php

$host = '127.0.0.1';
$db   = '1_ragis';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

//READ
// SELECT column1, column2, ...
// FROM table_name;

$sql = "
SELECT type, sum(height) AS height_sum, count(id) as trees_count, GROUP_CONCAT(title) as titles
FROM trees
GROUP BY type
";

$stmt = $pdo->query($sql);


$trees = $stmt->fetchAll();

echo '<ul>';
foreach ($trees as $tree) {
    echo '<li>' . $tree['height_sum'] . ' m ' . $tree['trees_count'] . ' is ju ' . $tree['titles'] . ['Lapuotis', 'Spygliuotis', 'Palme'][$tree['type'] - 1] . '</li> ';
}
echo '</ul>';
