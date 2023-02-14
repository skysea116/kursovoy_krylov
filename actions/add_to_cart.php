<?php
@session_start();
 
$prev_page = $_SERVER['HTTP_REFERER'];

if ( !@is_array($_SESSION['cart']) ) { 
    $_SESSION['cart'] = array(); 
}
 
$prodId = @$_GET['prodId'];
if ( $prodId ) {
    $_SESSION['cart'][] = $prodId;
    Header("Location: $prev_page");

    $count_arr = array_count_values($_SESSION['cart']);
    $_SESSION['cart_inter'] = [];
    $counter = 0;
    foreach($count_arr as $key => $item) {
        $counter++;
        array_push($_SESSION['cart_inter'], [
            'id' => $key,
            'count' => $item,
        ]);
    }

}
