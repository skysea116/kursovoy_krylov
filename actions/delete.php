<?php

if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) {
     $id = $_GET['id'];

     require('../actions/connection.php');

     $connection->query("DELETE FROM `users` WHERE`user_id` = $id");

     header('Location: ../pages/admin_pannel.php');
} else {
     header('Location: /');
}