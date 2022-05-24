<?php
session_start();

// scenarijus POST
if($_SERVER['REQUEST_METHOD']=='POST'){
  $_SESSION['bla'] = $_POST['tek'];

    header('Location:http://localhost/vienaragiai/may-05/012/form.php');
die;
};

// scenarijus GET

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $_SESSION;
    ?>
<form action="" method="post">
Tavo textas : <input type="text" name="tek">
<button type="submit">GO</button>

</form>

</body>
</html>