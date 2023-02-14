<?php
     session_start();
     $id = $_GET['id'];

     foreach($_SESSION['final_fav'] as $key => $item) {
          if($item['id'] == $id) {
               unset($_SESSION['final_fav'][$key]);
               print_r($_SESSION['fav']);
               foreach($_SESSION['fav'] as $key2 => $item2) {
                    if($item2 == $id) {
                         unset($_SESSION['fav'][$key2]);
                    }
               }
          } 
     }
    header('Location: ../pages/favourite.php');