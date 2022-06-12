<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php

use App\DB\JsonDb;

require __DIR__ . '/../vendor/autoload.php';
define('URL', 'http://localhost/vienaragiai/may-05/june10/src/');
// gaunam duonbaze
$db = new JsonDb('us');
// $db->create(['name' => 'bebras', 'psw' => md5('123'), 'full_name' => 'Bebras Upinis']);
// $db->create(['name' => 'lina', 'psw' => md5('123'), 'full_name' => 'Lina Linovaite']);
// $db->create(['name' => 'petras', 'psw' => md5('123'), 'full_name' => 'Peter Johnson']);

// echo $_SERVER['REQUEST_URI'];

$uri = explode('/', str_replace('vienaragiai/may-05/june10/src/', '', $_SERVER['REQUEST_URI']));
array_shift($uri);

$m = $_SERVER['REQUEST_METHOD'];

// print_r($uri);

if ('GET' == $m && count($uri) == 1 && $uri[0] === 'all') {
?>
    <a href="<?= URL . 'create/' ?>">Create new</a>
    <?php
    echo '<h1>List </h1>'; //duomenu atvaizdavimas, taip nedaryti
    foreach ($db->showAll() as $pet) {
    ?>
        <!-- <a href="<?= URL . 'create/' ?>">New</a> -->
        <div class="list">
            <?= $pet['id'] ?>
            Zveris: <?= $pet['animal'] ?>
            Svoris:<?= $pet['svoris'] ?> kg
            <a href="<?= URL . 'edit/' . $pet['id'] ?>">[EDIT]</a>
            <form action="<?= URL . 'delete/' . $pet['id'] ?>" method="post">
                <button type="submit">Delete</button>
            </form>
        </div>
    <?php
    }
}
if ('GET' == $m && count($uri) == 2 && $uri[0] === 'pet') {
    echo '<h1>Kas</h1>';
    $pet = $db->show($uri[1]);
    ?>
    <div>
        <?= $pet['id'] ?>
        Zveris: <?= $pet['animal'] ?>
        Svoris:<?= $pet['svoris'] ?>

    </div>
<?php
}
if ('POST' == $m && count($uri) == 2 && $uri[0] === 'delete') {
    $db->delete($uri[1]); //is duomenu bazes pasikvieciam delete method
    header('Location:' . URL . 'all'); // redirectinam kur gris po delete
    die;
}
if ('GET' == $m && count($uri) == 2 && $uri[0] === 'edit') {
    echo '<h1>Edit</h1>';
    $pet = $db->show($uri[1]); // pet pasirinkimas 

?>
    <div>
        <?= $pet['id'] ?>
        <form action="<?= URL . 'edit/' . $pet['id'] ?>" method="post">
            Svoris <input type="text" name="svoris" value="<?= $pet['svoris'] ?>">
            Zveris <input type="text" name="animal" value="<?= $pet['animal'] ?>" readonly>
            animal <select name="animal" id="animal">
                <option value="">----Choose animal----</option>
                <option value="Avis">Avis</option>
                <option value="Antis">Antis</option>
                <option value="Antilope">Antilope</option>
            </select>
            <button type="submit">Save</button>
        </form>
    </div>
<?php
}
if ('POST' == $m && count($uri) == 2 && $uri[0] === 'edit') {
    $pet = $db->show($uri[1]); //paimam pet senus duomenis
    $pet['svoris'] = $_POST['svoris']; // sena pet pakeiciam tuo ka gaunam is post
    $pet['animal'] = $_POST['animal'];
    $db->update($uri[1], $pet);
    header('Location:' . URL . 'all'); // redirectinam kur gris po edit
    die;
}
if ('GET' == $m && count($uri) == 1 && $uri[0] === 'create') {
    echo '<h1>Add new</h1>';

?>
    <form action="<?= URL . 'create' ?>" method="post">

        Svoris <input type="text" name="svoris">
        animal <select name="animal" id="animal">
            <option value="">----Choose animal----</option>
            <option value="Avis">Avis</option>
            <option value="Antis">Antis</option>
            <option value="Antilope">Antilope</option>
        </select>
        <button type="submit">Create</button>
    </form>
<?php
}
if ('POST' == $m && count($uri) == 1 && $uri[0] === 'create') {
    $pet['svoris'] = $_POST['svoris'];
    $pet['animal'] = $_POST['animal'];
    $db->create($pet);
    header('Location:' . URL . 'all'); // redirectinam kur gris po create
    die;
}
