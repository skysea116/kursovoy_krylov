<?php
     $id = $_GET['id']; //id товара

     require('../actions/connection.php');

     //Добавление количества товаров

     $connection->query("UPDATE `orders` SET `status_id`= 4 WHERE `order_id` = $id");
     
     $result = $connection->query("SELECT * FROM `goods_in_orders` WHERE `order_id` = $id");
     $quant_of_goods = $result->fetch_all();

     foreach($quant_of_goods as $item) {
          $good_id = $item[2];

          $result2 = $connection->query("SELECT `good_quant` FROM `goods` WHERE `good_id` = $good_id");
          $good_quant_fetch = $result2->fetch_assoc();

          $good_quant = $good_quant_fetch['good_quant'];

          $final_good_quant = $good_quant + $item[3];

          $connection->query("UPDATE `goods` SET `good_quant`='$final_good_quant' WHERE `good_id` = $good_id");
     }

     header('Location: ../pages/lk_user.php');