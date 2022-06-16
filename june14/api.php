<?php

require __DIR__ . '/Cache.php';

session_start();
$cache = new Cache;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['visual'] = 'CACHE';
    $output = $cache->get();
    if (null === $output) {
        $_SESSION['visual'] = 'LIVE';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.distance24.org/route.json?stops=' . $_POST['from'] . '|' . $_POST['to']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch); // siunciam, laukiam, gaunam
        curl_close($ch); // uzdarom duris 
        $output = json_decode($output);
        $cache->set($output);
    }


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://www.distance24.org/route.json?stops=' . $_POST['from'] . '|' . $_POST['to']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch); // siunciam, laukiam, gaunam
    curl_close($ch); // uzdarom duris 
    $output = json_decode($output);

    $_SESSION['dist'] = $output->distance;
    header('Location: http://localhost/vienaragiai/may-05/june14/');
    $_SESSION['img1'] = $output->stops[0]->wikipedia->image;
    die;
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dist = $_SESSION['dist'] ?? '';
    $img1 = $_SESSION['img1'] ?? '';
    $visual = $_SESSION['visual'] ?? 'dar nera visual';

    unset($_SESSION['dist'], $_SESSION['img1'], $_SESSION['visual']);
?> <h1 style="color: red;"><?= $visual ?></h1>
    <form action="" method="post">
        from: <input type="text" name="from">
        to: <input type="text" name="to">
        <button type="submit">Calculate</button>
    </form>
    <h2>Distance: <?= $dist ?></h2>
    <?php if ($img1) : ?>
        <img src="<?= $img1 ?>">

    <?php endif ?>
<?php
}
