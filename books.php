<?php

require 'database.php';

$per_page = 3;
$page = htmlspecialchars(addslashes($_GET['page'] ?? 1));
$from = $page * $per_page - $per_page;

$result = mysqli_query($db, "SELECT * FROM books LIMIT $from, $per_page");
$num = mysqli_num_rows($result);

for ($i = 0; $i < $num; $i++) {
    $row = mysqli_fetch_assoc($result);

    $author_id = $row['author_id'];
    $author = mysqli_query($db, "SELECT * FROM author WHERE id = " . $author_id);
    $author_arr = mysqli_fetch_assoc($author);

    echo '<li>' . $row['name'] . ' ' . $author_arr['surname'] . '</li>';
}

$all_books = mysqli_num_rows(mysqli_query($db, 'select * from books'));
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пользователи</title>
</head>
<body>
<?php for ($i = 1; $i <= ceil($all_books / $per_page); $i++) { ?>
    <div>
        <a href="http://localhost/library/library/books.php?page=<?= $i; ?>"><?= $i; ?></a>
    </div>
<?php } ?>
</body>
</html>