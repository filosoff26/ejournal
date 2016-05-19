<?php
/*
 * Как заходить на сайт
 * 1. проверить логин/пароль по базе
 * 2. Допустим они верные
 * 3. Сгенерировать ключ для пользователя
 * 4. Сохранить этот ключ в базе, при этом связав его с пользователем
 * 5. Отдать ключ в куки
 * 
 * Проверка ключа при повторном входе
 * 1. Проверить куку с названием KEY
 * 2. Если кука есть, то ищем содержимое в бд
 * 3. Если кука нашлась, то запускаем пользователя с найденными логином.
 */
include 'mysql.php';
include 'header.php';
?>
<form action="index.php" method="post">
    <div class="text-center">
	<pre>
    Логин: <input name="login"><br>
    Пароль: <input name="password" type="password"> <?php echo $error; ?><br>
          <input type="submit" value="Войти">
	</pre>
    </div>
</form>
<?php include 'footer.php';
