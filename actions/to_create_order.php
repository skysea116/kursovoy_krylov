<?php
    session_start();

    if(isset($_COOKIE['user_id'])) {
        $city = $_POST['city'];
        $street = $_POST['street'];
        $house = $_POST['house'];
        $corpus = $_POST['corpus'];
        $building = $_POST['building'];
        $entrance = $_POST['entrance'];
        $floor = $_POST['floor'];
        $apartment = $_POST['apartment'];

        $user_id = $_COOKIE['user_id'];

        $order_price = $_SESSION['final_price'];
        $good_count = $_SESSION['final_count'];

        $date = date('Y-m-d H:i:s');

        require('../actions/connection.php');

        $result = $connection->query("SELECT * FROM `delivery_addresses` WHERE `user_id` = $user_id AND `city` = '$city' AND `street` = '$street' AND `house` = '$house' AND `corpus` = '$corpus' AND `building` = '$building' AND `entrance` = '$entrance' AND `floor` = $floor AND `apartment` = '$apartment' ");
        $full_address = $result->fetch_assoc();

        if(empty($full_address)) {
            $connection->query("INSERT INTO `delivery_addresses`(`address_id`, `user_id`, `city`, `street`, `house`, `corpus`, `building`, `entrance`, `floor`, `apartment`) 
            VALUES (NULL, $user_id,'$city','$street','$house','$corpus','$building','$entrance', $floor,'$apartment')");

            $result2 = $connection->query("SELECT * FROM `delivery_addresses` WHERE `user_id` = '$user_id' AND `city` = '$city' AND `street` = '$street' AND `house` = '$house' AND `corpus` = '$corpus' AND `building` = '$building' AND `entrance` = '$entrance' AND `floor` = $floor AND `apartment` = '$apartment' ");
            $full_address2 = $result2->fetch_assoc();

            $address_id = $full_address2['address_id'];

        } else {
            $address_id = $full_address['address_id'];
        }      

        $connection->query("INSERT INTO `orders`(`order_id`, `user_id`, `goods_count`, `order_price`, `status_id`, `order_date`, `address_id`) VALUES (NULL, $user_id, $good_count, $order_price, 1, '$date', $address_id)");
        
        $result3 = $connection->query("SELECT * FROM `orders` WHERE `user_id` = $user_id ORDER BY `order_id` DESC");
        $order = $result3->fetch_assoc();

        $order_id = $order['order_id'];

        foreach($_SESSION['cart_inter'] as $item) {
            $good_id = $item['id'];
            $good_quant_cart = $item['count'];
            $connection->query("INSERT INTO `goods_in_orders`(`order_id`, `good_id`, `quant`) VALUES ($order_id, $good_id, $good_quant_cart)");
            
            $result4 = $connection->query("SELECT `good_quant` FROM `goods` WHERE `good_id` = $good_id");
            $good_quant_fetch = $result4->fetch_assoc();
            $good_quant = $good_quant_fetch['good_quant'];

            $good_quant_final = $good_quant - $good_quant_cart;

            //Обновление количества товара
            if($good_quant_final >= 0) {
                $connection->query("UPDATE `goods` SET `good_quant`= $good_quant_final WHERE `good_id` = $good_id");
            } else {
                $connection->query("DELETE FROM `goods_in_orders` WHERE `order_id` = $order_id");
                $connection->query("DELETE FROM `orders` WHERE `order_id` = $order_id");

                $title = 'Ошибка!';
                require_once('../parts/header.php');

                ?>
                <main class="d-flex align-items-center">
                    <div class="container">
                        <div class="err-blck fs-3">
                            <p>Товар, в данном количестве, отсутсвует!<br>
                            Уменьшите количество товара.
                            </p>
                        </div>
                    </div>
                </main>
                <?php

                require_once('../parts/footer.php');
                exit();
            }
        }

        //очистка корзины
        unset($_SESSION['cart']);
        unset($_SESSION['cart_inter']);

        header('Location: ../pages/thanks_for_order.php');
    }