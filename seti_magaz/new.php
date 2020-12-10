<html>
<head> <title> Добавление новой сети</title> </head>
<body>
<H2>Вводите данные</H2>
<form action="save_new.php" metod="get">
    ИД <input name="id" size="11" type="integer">
    <br>Название <input name="name" size="50" type="varchar">
    <br>ИНН <input name="INN" size="50" type="integer">
<p>
    <input name="add" type="submit" value="Добавить">
    <input name="b2" type="reset" value="Очистить">
</p>
</form>
<p><a href="seti_magaz.php"> Вернуться к списку сетей магазинов </a> </p>
</body>
</html>