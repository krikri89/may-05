<?php

$host = '127.0.0.1';
$db   = '1_ragis';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

?>

<fieldset>
    <legend>Create</legend>
    <form method="POST">
        Title <input type="text" name="title">
        Height <input type="text" name="height">
        Type <select name="type">
            <option value="1">Lapas</option>
            <option value="2">Spyglys</option>
            <option value="3">Palme</option>
        </select>
        <input type="hidden" name="_method" value="post">
        <button type="submit">Create</button>
    </form>

</fieldset>

<!-- DELETE  -->

<fieldset>
    <legend>Delete</legend>
    <form method="POST">
        ID <input type="text" name="id">
        <input type="hidden" name="_method" value="delete">
        <button type="submit">Delete</button>
    </form>

</fieldset>

<!-- EDIT -->

<fieldset>
    <legend>Update</legend>
    <form method="POST">
        ID <input type="text" name="id">
        Title <input type="text" name="title">
        <input type="hidden" name="_method" value="put">
        <button type="submit">Update</button>
    </form>

</fieldset>

<?php

// CREATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Create
    // INSERT INTO table_name (column1, column2, column3, ...)
    // VALUES (value1, value2, value3, ...);
    if ($_POST['_method'] == 'POST') {
        $sql = "
    INSERT INTO trees
    (title, height, type)
    VALUES (:a, :z, :type )
    ";

        $stmt = $pdo->prepare($sql);
        // $stmt->execute([$_POST['title'], $_POST['height'], $_POST['type']]);
        $stmt->execute([
            'z' => $_POST['height'],
            'type' => $_POST['type'],
            'a' => $_POST['title']
        ]);
        header('Location:http://localhost/vienaragiai/may-05/pdo/');
        die;
    }


    if ($_POST['_method'] == 'delete') {
        //delete
        //DELETE  FROM table _name WHERE condition

        $sql = "
        DELETE FROM trees
        WHERE id = ?
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);

        header('Location: http://localhost/vienaragiai/may-05/pdo/');
        die;
    }

    if ($_POST['_method'] == 'put') {
        //update
        //UPDATE table _name 
        // SET column1= value1, column2=value2,...
        // WHERE condition

        $sql = "
        UPDATE trees
        SET title = ?
        WHERE id = ?
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['title'], $_POST['id']]);

        header('Location: http://localhost/vienaragiai/may-05/pdo/');
        die;
    }
}



//READ
// SELECT column1, column2, ...
// FROM table_name;

$sql = "
SELECT type, sum(height) AS height_sum, count(id) as trees_count, GROUP_CONCAT(title) as titles
FROM trees
GROUP BY type
";

$stmt = $pdo->query($sql);


$trees = $stmt->fetchAll();

echo '<ul>';
foreach ($trees as $tree) {
    echo '<li>' . $tree['height_sum'] . ' m ' . $tree['trees_count'] . ' is ju ' . $tree['titles'] . ['Lapuotis', 'Spygliuotis', 'Palme'][$tree['type'] - 1] . '</li> ';
}
echo '</ul>';
