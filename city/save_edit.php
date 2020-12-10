<?php
    $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к БД";
    }

    $id = $_GET['id'];

    $name = $_GET['name'];
    $type = $_GET['type'];
    $square = $_GET['square'];
    $population = $_GET['population'];
    $region = $_GET['region'];

    $result = $mysqli->query("UPDATE city1
        SET name='$name', type='$type', square='$square',
        population='$population', region='$region' WHERE id='$id'"
    );

    header("Location: city.php");
    exit;
?>