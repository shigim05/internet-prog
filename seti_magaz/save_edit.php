<?php
    $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];
    $name = $_GET['name'];
    $INN = $_GET['INN'];
    $result = $mysqli->query("UPDATE seti_magaz SET name='$name', INN='$INN' WHERE id='$id'" );
    header("Location: seti_magaz.php");
    exit;
?>