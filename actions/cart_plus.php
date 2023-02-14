<?php
    session_start();
    $id = $_GET['id'];
    $cart_data = $_SESSION['cart_inter'];

    foreach($_SESSION['cart_inter'] as $key => $item) {
        if($item['id'] == $id) {
            $_SESSION['cart_inter'][$key]['count']++;
            $_SESSION['cart'][] = $item['id'];
           }
        }

    header('Location: ../pages/cart.php');