<?php

if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
     $id = $_GET['id'];

     $prev_page = $_SERVER['HTTP_REFERER'];

     require('../actions/connection.php');

     $result = $connection->query("SELECT `good_img` FROM `goods` WHERE `good_id` = $id");
     $good_img = $result->fetch_assoc();

     $img = $good_img['good_img'];

     $filepath = dirname(__FILE__)."/../img/$img";

     $connection->query("DELETE FROM `goods` WHERE`good_id` = $id");
     $connection->query("DELETE FROM `chars` WHERE`good_id` = $id");

     $unlink = unlink($filepath);
     if($unlink == true) {
          $connection->query("DELETE FROM `goods` WHERE`good_id` = $id");
          $connection->query("DELETE FROM `chars` WHERE`good_id` = $id");
     } 


     header("Location: $prev_page");
} else {
     header('Location: /');
}