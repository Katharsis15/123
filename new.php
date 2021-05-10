<?php
require 'database.php';

$n = htmlspecialchars(addslashes($_POST['name']));

$query = "SELECT books.* FROM books
INNER JOIN author WHERE author.name LIKE '$n'";

$result = mysqli_query($db, $query);
for ($i=0; $i<mysqli_num_rows($result);$i++) {
    $r  = mysqli_fetch_assoc($result);

    echo $r;
}

$query = "SELECT author.name, COUNT(books.id) FROM books
INNER JOIN author ON author.id = books.author_id
Group By author.id
";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Поиск по авторам</title>
</head>
<body>
<h3>Поиск по авторам</h3>

<form method='post'>
    <p><input type="name" name="name" placeholder="Введите имя автора"></p>
    <p><input type="submit" value="Отправить"></p>

</form>
</body>
</html>