<?php
if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
    require('../actions/connection.php');

    print_r($img);

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
    
    $connection->query("INSERT INTO `goods`(`good_id`, `good_name`, `good_price`, `good_desc`, `category_id`, `good_img`, `good_quant`) VALUES (NULL,'$name','$price','$desc', $category,'$img', $quant)");

    $result = $connection->query("SELECT `good_id` FROM `goods` ORDER BY `good_id` DESC LIMIT 1");
    $good = $result->fetch_assoc();

    $id = $good['good_id'];
    $connection->query("INSERT INTO `chars`(`char_id`, `good_id`, `frame`, `fork`, `weight`, `manettes`, `front_derail`, `back_derail`, `conn_rods`, `carriage`, `cassette`, `speeds`, `chain`, `pedals`, `diametr`, `rims`, `spokes`, `bushing`, `tires`, `front_brake`, `back_brake`, `rudder`, `takeaway`, `steering`, `seat`, `seatpost`, `country_dev`, `manufacture`) VALUES 
    (NULL,$id,'$frame','$fork','$weight','$manettes','$front_derail','$back_derail','$conn_rods','$carriage','$cassette','$speeds','$chain','$pedals','$diametr','$rims','$spokes','$bushing','$tires','$front_brake','$back_brake','$rudder','$takeaway','$steering','$seat','$seatpost','$country_dev','$manufacture')");
    header('Location: ../pages/catalog.php');
} else {
    header('Location: /');
}