<?php
$mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
    if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
    }
$id = $_GET['id'];    
$name = $_GET['name'];
$INN = $_GET['INN'];

// Выполнение запроса
$result = $mysqli->query("INSERT INTO seti_magaz SET id='$id', name='$name', INN='$INN'");
// если нет ошибок при выполнении запроса
    if ($result){
    print "<p>Внесение данных прошло успешно!";
    header("Location: seti_magaz.php");
    exit;
}
else{
    print "Ошибка сохранения <a href='seti_magaz.php'> Вернуться к списку </a>";
    }
?>