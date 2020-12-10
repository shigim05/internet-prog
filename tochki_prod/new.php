<html>
    <head> <title> Добавление новой  </title> </head>
    <body>
        <H2>Добавление новой </H2>
        <form action="save_new.php" method="get">
            <br>Ид: <input name="id" size="11" type="integer">
                        <?php
                $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                // Получение данных seti
                $result = $mysqli->query("SELECT id, name FROM seti_magaz");
                echo "<br>Seti <select name='id_seti_magaz'>";

                if ($result){
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";

                // Получение данных о city
                $result = $mysqli->query("SELECT id, name FROM city1");
                echo "<br>City <select name='id_city1'>";

                if ($result){
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";
            ?>
            <br>Объем продаж: <input name="sales_volume" size="11" type="integer">
            <br>Торговый баланс <input name="trade_balance" size="11" type="integer">
            <br>ФИО Директора <input name="FIO_director" size="50" type="varchar">
            <br>Адрес: <input name="adress" size="50" type="varchar">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='tochki_prod.php'">Вернуться к списку </button></td></p>
    </body>
</html>