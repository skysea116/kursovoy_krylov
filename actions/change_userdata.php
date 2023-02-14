<?php

     require('../actions/connection.php');

     $role_id = $_COOKIE['role_id'];

     if($role_id != 1) {
          $id = $_COOKIE['user_id'];
     } else {
          $id = $_GET['id'];
     }

     $name = $_POST['name'];
     $surname = $_POST['surname'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $login = $_POST['login'];
     $pass = $_POST['pass'];

     $result = $connection->query("SELECT * FROM `users` WHERE `user_email` = '$email' OR `user_login` = '$login' OR `user_phone` = '$phone'");
     $users = $result->fetch_all();
     //print_r($users);
     foreach($users as $item) {
          if($item[0] != $id) {

               $title = 'Ошибка!';
               require_once('../parts/header.php');

               ?>
               <main class="d-flex align-items-center">
                    <div class="container">
                         <div class="err-blck fs-3">
                              <p>Другой пользователь с таким email/логином/телефоном уже существует!</p>
                         </div>
                    </div>
               </main>
               <?php

               require_once('../parts/footer.php');

               break;
          } else {
               if($role_id != 1) {
                    setcookie('user_id', $id, time() + 3600, '/');
                    setcookie('role_id', $role_id, time() + 3600, '/');
                    if(!empty($name)) {
                         setcookie('user_name', $name, time() + 3600, '/');
                         $connection->query("UPDATE `users` SET `user_name`='$name' WHERE `user_id`= $id");
                    }
                    if(!empty($surname )) {
                         setcookie('user_surename', $surname, time() + 3600, '/');
                         $connection->query("UPDATE `users` SET `user_surename`='$surname' WHERE `user_id`= $id");
                    }
                    if(!empty($login)) {
                         setcookie('user_login', $login, time() + 3600, '/');
                         $connection->query("UPDATE `users` SET `user_login`='$login' WHERE `user_id`= $id");
                    }
                    if(!empty($email)) {
                         setcookie('user_email', $email, time() + 3600, '/');
                         $connection->query("UPDATE `users` SET `user_email`='$email' WHERE `user_id`= $id");
                    }
                    if(!empty($phone)) {
                         setcookie('user_phone', $phone, time() + 3600, '/');
                         $connection->query("UPDATE `users` SET `user_phone`='$phone' WHERE `user_id`= $id");
                    }
                    if(!empty($pass)) {
                         $pass = md5($pass);
                         $connection->query("UPDATE `users` SET `password`='$pass' WHERE `user_id`= $id");
                         require_once('../actions/exit.php');
                         header('Location: /');
                    } else {
                         header('Location: ../pages/lk_user.php');
                    }
               } else {
                    if(!empty($name)) {
                         $connection->query("UPDATE `users` SET `user_name`='$name' WHERE `user_id`= $id");
                    }
                    if(!empty($surname )) {
                         $connection->query("UPDATE `users` SET `user_surename`='$surname' WHERE `user_id`= $id");
                    }
                    if(!empty($login)) {
                         $connection->query("UPDATE `users` SET `user_login`='$login' WHERE `user_id`= $id");
                    }
                    if(!empty($email)) {
                         $connection->query("UPDATE `users` SET `user_email`='$email' WHERE `user_id`= $id");
                    }
                    if(!empty($phone)) {
                         $connection->query("UPDATE `users` SET `user_phone`='$phone' WHERE `user_id`= $id");
                    }
                    if(!empty($pass)) {
                         $pass = md5($pass.'bike');
                         $connection->query("UPDATE `users` SET `password`='$pass' WHERE `user_id`= $id");
                         require_once('../actions/exit.php');
                         header('Location: /');
                    } else {
                         header('Location: ../pages/admin_pannel.php');
                    }  
               }
          }
     }


     $connection->close();


