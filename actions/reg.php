<?php

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $pass2 = $_POST['repeat_pass'];

    require('../actions/connection.php');

    $result = $connection->query("SELECT * FROM `users` WHERE `user_login` = '$login' OR `user_email` = '$email' OR `user_phone` = '$phone'");
    $users = $result->fetch_all();

    if($pass == $pass2) {
        $pass = md5($pass.'bike');
    } else {
        $title = 'Ошибка!';
        require_once('../parts/header.php');

        ?>
        <main class="d-flex align-items-center">
             <div class="container">
                  <div class="err-blck fs-3">
                       <p>Пароли не совпадают!</p>
                  </div>
             </div>
        </main>
        <?php

        require_once('../parts/footer.php');
        exit();
    }

    if(empty($users)) {
        $connection->query("INSERT INTO `users`(`user_id`, `user_name`, `user_surename`, `user_login`, `user_email`, `role_id`, `password`, `user_phone`) VALUES (NULL,'$name','$surname','$login','$email', 3,'$pass','$phone')");
        header('Location: /');
    } else {
        $title = 'Ошибка!';
        require_once('../parts/header.php');

        ?>
        <main class="d-flex align-items-center">
             <div class="container">
                  <div class="err-blck fs-3">
                       <p>Пользователь с таким email/логином/телефоном уже существует!</p>
                  </div>
             </div>
        </main>
        <?php

        require_once('../parts/footer.php');
    }