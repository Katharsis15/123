<?php

if (count($_POST) > 0) {
    authUser();
}

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
