<?php
  if(isset($_COOKIE['user_id'])) { //Если пользователь авторизован
    $user_id = $_COOKIE['user_id'];

    $title = 'Личный Кабинет';
    require_once('../parts/header.php');  

    require('../actions/connection.php');

    $result = $connection->query("SELECT * FROM `orders` WHERE `user_id` = $user_id  ORDER BY `order_id`");
    $orders = $result->fetch_all();
?>

<main>
     <div class="container lk_user-cont">

      <div class="row mt-4">
        <!--Данные клиента-->
        <div class="col-lg-5 col-md-12 fs-3 user-data d-flex justify-content-md-center justify-content-lg-start">
          <div class="mb-4">
          <h2 class="mb-3">Мои данные:</h2>
            <p>Имя: <?=$_COOKIE['user_name']?></p>
            <p>Фамилия: <?=$_COOKIE['user_surename']?></p>
            <p>Логин: <?=$_COOKIE['user_login']?></p>
            <p>Email: <?=$_COOKIE['user_email']?></p>
            <p class="mb-4">Телефон: <?=$_COOKIE['user_phone']?></p>

          <a href="../pages/change_userdata_form.php">Редактировать</a>
          </div>
        </div>

        <!--Заказы клиента-->
        <div class="col-lg-7 col-md-12 user-orders">
          <h2 class="mb-3">Мои заказы:</h2>
          
          <div class="accordion" id="accordionExample">
            <?php
            foreach($orders as $item) {
              $order_id = $item[0];
              $address_id = $item[6];

              $result2 = $connection->query("SELECT * FROM `delivery_addresses` WHERE `address_id` = $address_id LIMIT 1");
              $address = $result2->fetch_assoc();

              $result4 = $connection->query("SELECT * FROM `goods_in_orders` WHERE `order_id` = $order_id");
              $goods_in_order = $result4->fetch_all();
            ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$item[0]?>" aria-expanded="true" aria-controls="collapseOne">
                    Заказ #<?=$item[0]?>
                    <?php
                      $result3 = $connection->query("SELECT * FROM `status`");
                      $statuses = $result3->fetch_all();

                      //отображение статусов в заголовке заказа
                      foreach($statuses as $item2) {
                       if($item2[0] == $item[4] ) {
                        if($item[4] == 4) {
                         ?>
                          <div class="order-status-head cancel ms-3">
                            <p><?=$item2[1] ?></p>
                          </div>

                        <?php
                          } else if ($item[4] == 1) {
                        ?>
                          <div class="order-status-head processing ms-3">
                            <p><?=$item2[1] ?></p>
                          </div>
                        <?php
                          } else if ($item[4] == 3) {
                        ?>
                           <div class="order-status-head recieved ms-3">
                            <p><?=$item2[1] ?></p>
                          </div>
                        <?php
                          } else {
                        ?>
                           <div class="order-status-head status-else ms-3">
                            <p><?=$item2[1] ?></p>
                          </div>
                         <?php
                          }
                        }
                       }
                      
                    ?>
                      
                  </button>
                </h2>
                <!--Информация о заказе-->
                <div id="collapse<?=$item[0]?>" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body orders-list">
                    <p>Дата заказа: <?=$item[5]?></p>
                    <p>Количество товаров: <?=$item[2]?></p>
                    <p>Сумма заказа: <span class="fs-4"><?=$item[3]?> ₽</span></p>
                    <p>Статус заказа:
                       <?php
                       $result3 = $connection->query("SELECT * FROM `status`");
                       $statuses = $result3->fetch_all();
                       foreach($statuses as $item2) {
                        if($item2[0] == $item[4]) {
                          echo $item2[1];
                        }
                       }
                       
                       ?>
                      </p>
                    <h4>Адрес доставки:</h4>
                    <div class="row">
                      <p class="col-lg-3 col-md-6 col-sm-12">Город: <?=$address['city']?></p>
                      <p class="col-lg-4 col-md-6 col-sm-12">Улица: <?=$address['street']?></p>
                      <p class="col-lg-3 col-md-6 col-sm-12">Дом: <?=$address['house']?></p>
                      <p class="col-lg-3 col-md-6 col-sm-12">
                        <?php if(!empty($address['corpus'])) {?>
                          Корпус: <?=$address['corpus']?>
                        <?php } else {?>
                          Корпус: -
                        <?php }?>
                      </p>
                      <p class="col-lg-3 col-md-6 col-sm-12">
                        <?php if(!empty($address['building'])) {?>
                          Строение: <?=$address['building']?>
                        <?php } else { ?> 
                          Строение: -
                        <?php }?>
                      </p>
                      <p class="col-lg-3 col-md-6 col-sm-12">Подъезд: <?=$address['entrance']?></p>
                      <p class="col-lg-3 col-md-6 col-sm-12">Этаж: <?=$address['floor']?></p>
                      <p class="col-lg-3 col-md-6 col-sm-12">Квартира: <?=$address['apartment']?></p>
                      <div class="order-goods-title">
                            <h3>Товары:</h3>
                      </div>
                      
                      <!--Товары в заказе-->
                      <div class="order-goods">
                        <?php
                          foreach($goods_in_order as $good_ids) {
                            $good_id = $good_ids[2];
                            $result5 = $connection->query("SELECT * FROM `goods` WHERE `good_id` = $good_id");
                            $order_good = $result5->fetch_assoc();
                        ?>
                          
                          <div class="col-12 row d-flex align-items-center mt-3">
                            
                            <a href="../pages/productCard.php?id=<?=$good_ids[2]?>"><h5 class="col-12 fs-4"><?=$order_good['good_name']?></h5></a>
                            <a href="../pages/productCard.php?id=<?=$good_ids[2]?>" class="col-4"><img src="../img/<?=$order_good['good_img']?>" alt="Товар" class="img-fluid"></a>
                            <p class="col-4 d-flex justify-content-center"><?=$good_ids[3]?> шт.</p>
                            <p class="col-4 d-flex justify-content-center fs-4"><?=$order_good['good_price'] * $good_ids[3]?> ₽</p>
                          </div>
                        <?php
                          }
                        ?>
                      </div>
                      
                    </div>
                    <?php
                      if($item[4] != 4 && $item[4] != 3) { //Если статус заказа - отменён
                    ?>
                          <div class="cancel-order mt-4 fs-4">
                            <a href="../actions/order_cancel.php?id=<?=$item[0]?>"><i class="fa fa-times me-1 " aria-hidden="true"></i> Отменить заказ</a>
                          </div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            <?php } ?>
           
          </div>

        </div>

      </div>

     </div>
</main>
<?php
  } else {
    header('Location: /');
  }
?>

<?php
  require_once('../parts/footer.php');
?>