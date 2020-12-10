<html> 
<body>
<form action='save_edit.php' method='get'>
<?php 
$mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
    if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
    }
$id_1 = $_GET['id'];
$result = $mysqli->query("SELECT tochki_prod.id, 
        seti_magaz.id as id_seti_magaz, seti_magaz.name as name_seti_magaz,
        city1.id as id_city1, city1.name as name_city1,
        sales_volume, trade_balance, FIO_director, adress
        FROM tochki_prod
        LEFT JOIN seti_magaz ON tochki_prod.id_seti_magaz=seti_magaz.id
        LEFT JOIN city1 ON tochki_prod.id_city1=city1.id
        WHERE tochki_prod.id=$id_1");
    if ($result && $st = $result->fetch_array()) {
            $id = $st['id'];
            $id_seti_magaz = $st['id_seti_magaz'];
            $name_seti_magaz = $st['name_seti_magaz'];
            $id_city1 = $st['id_city1'];
            $name_city1 = $st['name_city1'];
            $sales_volume = $st['sales_volume'];
            $trade_balance = $st['trade_balance'];
            $FIO_director = $st['FIO_director'];
            $adress = $st['adress'];
        }

 
                //id os
        $result = $mysqli->query("SELECT id, name FROM seti_magaz 
                                    WHERE id <> $id_seti_magaz ");
        echo "<br>СЕТЬ: <select name='id_seti_magaz'>";
        echo "<option selected value=' $id_seti_magaz'>$name_seti_magaz</option>";
        
        if ($result){
        while ($row = $result->fetch_array()){
        $id = $row['id'];
        $name = $row['name'];
        echo "<option value='$id'>$name</option>";
        }
        }
        echo "</select>";
                
        //id DS
        $result = $mysqli->query("SELECT id, name FROM city1 
                                WHERE id <> '$id_city1'");
        echo "<br>ГОРОД: <select name='id_city1'>";
        echo "<option selected value='$id_city1'>$name_city1</option>";
        
        if ($result){
        while ($row = $result->fetch_array()){
        $id = $row['id'];
        $name = $row['name'];
        echo "<option value='$id'>$name</option>";
        }
        }
        echo "</select>";
print "<br>Объем продаж: <input name='sales_volume' size='11' type='int'  value='$sales_volume'>";
print "<br>Торговый баланс: <input name='trade_balance' size='11' type='int'  value='$trade_balance'>";
print "<br>ФИО директора: <input name='FIO_director' size='50' type='varchar' value='$FIO_director'>";
print "<br>Адрес: <input type='varchar' name='adress' size='50' value='$adress'>";
print "<input type='hidden' name='id' size='11' value='$id_1'>";
print "<input type='submit' name='save' value='Сохранить'>";

print "<p><a href='tochki_prod.php'> Вернуться к списку  </a>";
?>
</form>
</body>
</html>