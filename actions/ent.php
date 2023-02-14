<?php
    $login = $_POST['login'];
    $pass = $_POST['password'];

    $prev_page = $_SERVER['HTTP_REFERER'];

    require('../actions/connection.php');

    $pass = md5($pass.'bike');

    $result = $connection->query("SELECT * FROM `users` WHERE `user_login` = '$login' AND `password` = '$pass'");
    $user = $result->fetch_assoc();

    if(!isset($user)) {
        $title = 'Ошибка!';
        require_once('../parts/header.php');

        ?>
        <main class="d-flex align-items-center">
             <div class="container">
                  <div class="err-blck fs-3">
                       <p>Неправильно введён логин/пароль</p>
                  </div>
             </div>
        </main>
        <?php

        require_once('../parts/footer.php');
    } else {
        setcookie('user_id', $user['user_id'], time() + 3600, '/');
        setcookie('user_name', $user['user_name'], time() + 3600, '/');
        setcookie('user_surename', $user['user_surename'], time() + 3600, '/');
        setcookie('user_login', $user['user_login'], time() + 3600, '/');
        setcookie('user_email', $user['user_email'], time() + 3600, '/');
        setcookie('role_id', $user['role_id'], time() + 3600, '/');
        setcookie('user_phone', $user['user_phone'], time() + 3600, '/');

        header("Location: $prev_page");
    }

