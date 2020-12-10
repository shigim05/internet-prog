<html>
<head> <title> Добавление нового населенного пункта </title> </head>
<body>
<H2>Вводите данные</H2>
<form action="save_new.php" metod="get">
    ИД <input name="id" size="11" type="integer">
    <br>Название <input name="name" size="50" type="varchar">
    <br>Тип <input name="type" size="30" type="varchar">
    <br>Площадь <input name="square" size="11" type="integer">
    <br>Население <input name="population" size="11" type="integer">
    <br>Регион <input name="region" size="50" type="varchar">
<p>
    <input name="add" type="submit" value="Добавить">
    <input name="b2" type="reset" value="Очистить">
</p>
</form>
<p><a href="city.php"> Вернуться к списку населенных пунктов </a> </p>
</body>
</html>