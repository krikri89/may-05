<?php

use Bankas\App;

require __DIR__ . '/top.php';
?>


<h1>Alamaba Form</h1>

<legend>Ganykla</legend>
<form method="post">
    <input type="text" name="svoris">
    <select name="animal" id="animal">
        <option value="">----Choose animal----</option>
        <option value="avis">Avis</option>
        <option value="antis">Antis</option>
        <option value="antilope">Antilope</option>
    </select>
    <button type="submit">GO</button>
    <input type="hidden" name="csrf" value="<?= App::csrf() ?>">
</form>


<?php
require __DIR__ . '/bottom.php';
