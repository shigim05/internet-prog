<html>
    <head> <title> Сведения о сети магазинов </title> </head>

    <h2>Список магазинов:</h2>
    <table border="1">
        <tr>
        <th> ИД </th><th> Название </th> <th> ИНН </th>
        </tr>
        <?php
            $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            // Запрос на выборку сведений 
            $result = $mysqli->query("SELECT id, name, INN FROM seti_magaz");
            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $INN = $row['INN'];
                    $counter++;
                    echo "<tr>";
                    echo "<td>$id</td><td>$name</td><td>$INN</td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего сетей магазинов: $counter </p>");
        ?>
    <button style='color: black' onclick="window.location.href='new.php'">Добавить магазин</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>