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
    echo '<h1>All users</h1>'; //duomenu atvaizdavimas, taip nedaryti
    foreach ($db->showAll() as $user) {
?>
        <div>
            ID:<?= $user['id'] ?>
            <a href="<?= URL . 'user/' . $user['id'] ?>"> NAME: <?= $user['full_name'] ?></a>
            <form action="<?= URL . 'delete/' . $user['id'] ?>" method="post"></form>
            <button type="submit">Delete</button>
        </div>
    <?php
    }
}
if ('GET' == $m && count($uri) == 2 && $uri[0] === 'user') {
    echo '<h1>One user</h1>';
    $user = $db->show($uri[1]);
    ?>
    <div>
        ID:<?= $user['id'] ?>
        NAME: <?= $user['full_name'] ?>
    </div>
<?php
}
