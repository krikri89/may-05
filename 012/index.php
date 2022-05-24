<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, Kitty</h1>
    <a href="http://localhost/vienaragiai/may-05/012/?page=1">Page 1</a>
    <a href="http://localhost/vienaragiai/may-05/012/?page=2">Page 2</a>
    <a href="http://localhost/vienaragiai/may-05/012/?page=3">Page 3</a>

    <?php
    if ($_GET['page']== 1){

        ?>
    <h2>PIRMAS</h2>
    <?php
}
?>
    <?php
    if ($_GET['page']== 2){

        ?>
    <h2>ANTRAS</h2>
    <?php
}
?>
    <?php
    if ($_GET['page']== 3){

        ?>
    <h2>TRECIAS</h2>
    <?php
}
?>

</body>
</html>