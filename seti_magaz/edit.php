<html>
    <head> <title> Редактирование данных  </title> </head>
    <body>
        <form action='save_edit.php' method='get'>
            <?php
                $mysqli = new mysqli("localhost", "f0474103_city", "city", "f0474103_city");
                if ($mysqli->connect_errno) {
                    echo "Не удалось подключиться к БД";
                }

                $id = $_GET['id'];

                $result = $mysqli->query("SELECT id, name, INN FROM seti_magaz WHERE id='$id'");

                if ($result && $st = $result->fetch_array()){
                    $name = $st['name'];
                    $INN = $st['INN'];
                }

                print "Название <input name='name' size='50' type='varchar' value='$name'>";
                print "<br>ИНН <input name='INN' size='50' type='integer' value='$INN'>";
                print "<input type='hidden' name='id' size='30' value='$id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='seti_magaz.php'">Вернуться к списку </button></td></p>
    </body>
</html>