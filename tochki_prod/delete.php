<?php
    $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }
    $id = $_GET['id'];
    // Удаление 
    $result = $mysqli->query("DELETE FROM tochki_prod WHERE id='$id'");
    header("Location: tochki_prod.php");
    exit;
?>