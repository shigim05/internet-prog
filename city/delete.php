<?php
    $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    // Удаление города
    $result = $mysqli->query("DELETE FROM city1 WHERE id='$id'");

    header("Location: city.php");
    exit;
?>