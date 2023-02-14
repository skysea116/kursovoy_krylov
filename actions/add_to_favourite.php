<?php
@session_start();
 
$prev_page = $_SERVER['HTTP_REFERER'];

if ( !@is_array($_SESSION['fav']) ) { 
    $_SESSION['fav'] = array(); 
}
 
$prodId = @$_GET['prodId'];
if ( $prodId ) {
    $_SESSION['fav'][] = $prodId;
    

    $count_arr = array_count_values($_SESSION['fav']);
    
    $_SESSION['final_fav'] = [];
    $counter = 0;
    foreach($count_arr as $key => $item) {
        $counter++;
        array_push($_SESSION['final_fav'], [
            'id' => $key,
        ]);
    }
    Header("Location: $prev_page");
}
