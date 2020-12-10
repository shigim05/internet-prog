<html>
    <head> <title> Сведения о точках продаж </title> </head>
    <h2> Список точек продаж  </h2>
    <table border="1">
        <tr>
            <th> Ид </th> <th> Название сети магазина </th> <th> Город </th>
            <th> Объем продаж </th> <th> Торговый баланс </th> 
            <th> ФИО Директора </th> <th> Адрес </th>
        </tr>
        <?php
            $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            // Запрос на выборку сведений 
            $result = $mysqli->query("SELECT tochki_prod.id,  
            seti_magaz.name as seti_magaz,  city1.name as city1, 
            tochki_prod.sales_volume, tochki_prod.trade_balance,
            tochki_prod.FIO_director, tochki_prod.adress FROM tochki_prod
            INNER JOIN seti_magaz ON tochki_prod.id = seti_magaz.id
            INNER JOIN city1 ON tochki_prod.id = city1.id " );


            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()) {
                    $id = $row['id'];
                    $seti_magaz = $row['seti_magaz'];
                    $city1 = $row['city1'];
                    $sales_volume = $row['sales_volume'];
                    $trade_balance = $row['trade_balance'];
                    $FIO_director = $row['FIO_director'];
                    $adress = $row['adress'];

                    echo "<tr>";
                    echo "<td>$id</td><td>$seti_magaz</td><td>$city1</td><td>$sales_volume</td><td>$trade_balance</td>
                    <td>$FIO_director</td><td>$adress</td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";

                    $counter++;
                }
            }
            print "</table>";
            print("<p>Всего:  $counter </p>");
        ?>
    <button style='color: blue' onclick="window.location.href='new.php'">Добавить </button></td>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>