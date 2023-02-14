<?php
     session_start();
     $id = $_GET['id'];

     foreach($_SESSION['cart_inter'] as $key => $item) {
          if($item['id'] == $id) {
               unset($_SESSION['cart_inter'][$key]);
               print_r($_SESSION['cart']);
               foreach($_SESSION['cart'] as $key2 => $item2) {
                    if($item2 == $id) {
                         unset($_SESSION['cart'][$key2]);
                    }
               }
          } 
     }
    header('Location: ../pages/cart.php');