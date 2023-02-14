<?php
    session_start();
    $id = $_GET['id'];
    $cart_data = $_SESSION['cart_inter'];

    foreach($_SESSION['cart_inter'] as $key => $item) {
        if($item['id'] == $id) {
            if($_SESSION['cart_inter'][$key]['count'] < 2) {
                header("Location: ../actions/delete_from_cart.php?id=$id");
            }  else {
            $_SESSION['cart_inter'][$key]['count']--;
            
                foreach($_SESSION['cart'] as $key2 => $item2) {
                    if($item2 == $id) {
                        unset($_SESSION['cart'][$key2]);
                        break;
                    }
                }
                header('Location: ../pages/cart.php');
            }
           }
        }

