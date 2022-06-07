<?php

$title = 'ADD';

require __DIR__ . '/top.php';
?>


<h1>Home Sweet Home </h1>

<fieldset>
    <legend>Enter</legend>
    <form method="post">
        <input type="text" name="alabama">
        <button type="submit">GO</button>
    </form>
</fieldset>

<!-- 
<ul>
    <?php foreach ($list as $value) : ?>
        <li><?= $value ?></li>
    <?php endforeach ?>

</ul> -->


<?php
require __DIR__ . '/bottom.php';
