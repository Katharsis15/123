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
<h3>Авторизация</h3>

<form method='post'>
    <p><input type="email" name="name" placeholder="Введите email"></p>
    <p><input type="password" name="password" placeholder="Введите Пароль"></p>
    <p><input type="submit" value="Вход"></p>

</form>

</body>
</html>
<?php
require 'database.php';

function authUser()
{
    global $db;


$email = htmlspecialchars(addslashes($_POST['email']));
$password = htmlspecialchars(addslashes($_POST['password']));

if (!empty($email) && !empty($password)) {
    $password = md5(md5($password));

    $user = mysqli_query($db, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($user) === 1) {
        $SESSION['email'] = $email;
        } else {
            echo '<p>Неправильный логин или пароль</p>';
        }
}
}
?>