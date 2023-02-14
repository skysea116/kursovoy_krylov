<?php
if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
    $id = $_GET['id'];
    
    $prev_page = $_GET['prev'];

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $category= $_POST['category'];
    $quant = $_POST['quant'];

    $frame = $_POST['frame'];
    $fork = $_POST['fork'];
    $weight = $_POST['weight'];
    $manettes = $_POST['manettes'];
    $front_derail = $_POST['front_derail'];
    $back_derail = $_POST['back_derail'];
    $conn_rods = $_POST['conn_rods'];
    $carriage = $_POST['carriage'];
    $cassette = $_POST['cassette'];
    $chain = $_POST['chain'];
    $pedals = $_POST['pedals'];
    $diametr = $_POST['diametr'];
    $rims = $_POST['rims'];
    $spokes = $_POST['spokes'];
    $bushing = $_POST['bushing'];
    $tires = $_POST['tires'];
    $front_brake = $_POST['front_brake'];
    $back_brake = $_POST['back_brake'];
    $rudder = $_POST['rudder'];
    $steering = $_POST['steering'];
    $seatpost = $_POST['seatpost'];
    $seat = $_POST['seat'];
    $country_dev = $_POST['country_dev'];
    $manufacture = $_POST['manufacture'];
    $speeds = $_POST['speeds'];
    $takeaway = $_POST['takeaway'];

    $img = $_FILES['pic']['name'];

    if(empty($img)) {
        $img = $_GET['img'];
    }
    require('../actions/connection.php');

    $uploaddir = '../img/';
    $uploadfile = $uploaddir . basename($_FILES['pic']['name']);
    
    echo '<pre>';
    if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
    
    echo 'Некоторая отладочная информация:';
    print_r($_FILES);

    $connection->query("UPDATE `goods` SET `good_name`='$name',`good_price`='$price',`good_desc`='$desc',`category_id`='$category',`good_img`='$img',`good_quant`= $quant WHERE `good_id` = $id");
    
   $connection->query("UPDATE `chars` SET `frame`='$frame',`fork`='$fork',`weight`='$weight',`manettes`='$manettes',`front_derail`='$front_derail',`back_derail`='$back_derail',`conn_rods`='$conn_rods',`carriage`='$carriage',`cassette`='$cassette',`speeds`='$speeds',`chain`='$chain',`pedals`='$pedals',`diametr`='$diametr',`rims`='$rims',`spokes`='$spokes',`bushing`='$bushing',`tires`='$tires',`front_brake`='$front_brake',`back_brake`='$back_brake',`rudder`='$rudder',`takeaway`='$takeaway',`steering`='$steering',`seat`='$seat',`seatpost`='$seatpost',`country_dev`='$country_dev',`manufacture`='$manufacture' WHERE `good_id` = $id");

   header("Location: $prev_page");

} else {
    header('Location: /');
}