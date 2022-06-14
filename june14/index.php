<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    unset($_SESSION['dist'], $_SESSION['img1']);
?>
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
