<html>
<body>
<?php
$mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
if ($mysqli->connect_errno) {
echo "Не удалось подключиться к БД";
}
$id = $_GET['id'];
$id_seti_magaz = $_GET['id_seti_magaz'];
$id_city1 = $_GET['id_city1'];
$sales_volume = $_GET['sales_volume'];
$trade_balance = $_GET['trade_balance'];
$FIO_director = $_GET['FIO_director'];
$adress = $_GET['adress'];
$request ="UPDATE tochki_prod SET id_seti_magaz='$id_seti_magaz',id_city1='$id_city1', 
sales_volume='$sales_volume', trade_balance='$trade_balance', 
FIO_director='$FIO_director', adress='$adress'
WHERE id='$id'";
$result = $mysqli->query($request);
if ($result) {
echo 'Все сохранено. <a href="tochki_prod.php"> Вернуться к списку  </a>';
}
else {
echo 'Ошибка сохранения. <a href="tochki_prod.php"> Вернуться к списку</a> ';
}
?>
</body>
</html>