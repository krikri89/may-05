<?php


require __DIR__ . '/top.php';
?>


<h1>Login </h1>

<fieldset>
    <legend>Enter</legend>
    <form method="post">
        <input type="text" name="name">
        <input type="password" name="psw">
        <button type="submit">Submit</button>
    </form>
</fieldset>



<?php
require __DIR__ . '/bottom.php';
