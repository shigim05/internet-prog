<?php
    $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    // Удаление seti_magaz
    $result = $mysqli->query("DELETE FROM seti_magaz WHERE id='$id'");

    header("Location: seti_magaz.php");
    exit;
?>