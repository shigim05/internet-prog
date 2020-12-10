<html>
    <head> <title> Сведения о населенных пунктах </title> </head>

    <h2>Список населенных пунктов:</h2>
    <table border="1">
        <tr>
            <th> ИД </th><th> Название </th> <th> Тип </th>
            <th> Площадь </th> <th> Население </th> <th> Регион </th> 
        </tr>
        <?php
            $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений о пользователях
            $result = $mysqli->query("SELECT id, name, type, square, population, region FROM city1");

            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $type = $row['type'];
                    $square = $row['square'];
                    $population = $row['population'];
                    $region = $row['region'];
                    $counter++;

                    echo "<tr>";
                    echo "<td>$id</td><td>$name</td><td>$type</td><td>$square</td><td>$population</td><td>$region</td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего: $counter </p>");
        ?>
    <button style='color: black' onclick="window.location.href='new.php'">Добавить город</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>