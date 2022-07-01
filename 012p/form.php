<?php
session_start();

// scenarijus POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jeigu rqst method yra post, tada ka daryti. 
    $_SESSION['bla'] = $_POST['tek']; // kas butu uzrasoma i forma ir issiusta post methodu isssisaugos session = servery 

    header('Location:http://localhost/vienaragiai/may-05/012p/form.php'); // po post nusiunciam kazkur kitur. Siuo atveju kreipiam i ta pati file, bet su kitu method. 
    die; // reikalingas, kad po to narsykle nebesuktu is naujo. 
};

// scenarijus GET - tiesiog pateikiam info kokia ji yra. 

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
    echo $_SESSION['bla'];
    ?>
    <form action="" method="post">
        Tavo textas : <input type="text" name="tek">
        <button type="submit">GO</button>

    </form>

</body>

</html>