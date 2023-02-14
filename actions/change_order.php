<?php
if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
    $order_id = $_GET['orderId'];

    $status = $_POST['status'];

    $city = $_POST['city'];
    $street = $_POST['street'];
    $house = $_POST['house'];
    $corpus = $_POST['corpus'];
    $building = $_POST['building'];
    $entrance = $_POST['entrance'];
    $floor = $_POST['floor'];
    $apartment = $_POST['apartment'];

    require('../actions/connection.php');

    if($status == 4) { //при отмене заказа
        $connection->query("UPDATE `orders` SET `status_id`= 4 WHERE `order_id` = $order_id");
     
        $result = $connection->query("SELECT * FROM `goods_in_orders` WHERE `order_id` = $order_id");
        $quant_of_goods = $result->fetch_all();

        foreach($quant_of_goods as $item) {
          $good_id = $item[2];

          $result2 = $connection->query("SELECT `good_quant` FROM `goods` WHERE `good_id` = $good_id");
          $good_quant_fetch = $result2->fetch_assoc();

          $good_quant = $good_quant_fetch['good_quant'];

          $final_good_quant = $good_quant + $item[3];

          $connection->query("UPDATE `goods` SET `good_quant`='$final_good_quant' WHERE `good_id` = $good_id");
     }
    } else {
        $connection->query("UPDATE `orders` SET `status_id`= $status WHERE `order_id` = $order_id");
    }

    $result = $connection->query("SELECT `address_id` FROM `orders` WHERE `order_id` = $order_id");
    $address = $result->fetch_assoc();

    $address_id = $address['address_id'];

    $connection->query("UPDATE `delivery_addresses` SET `city`='$city',`street`='$street',`house`='$house',`corpus`='$corpus',`building`='$building',`entrance`='$entrance',`floor`='$floor',`apartment`='$apartment' WHERE `address_id` = $address_id");

    header('Location: ../pages/admin_pannel.php');
} else {
    header('Location: /');
}

    $connection->close();