<?php
  
  if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //Если пользователь - админ

    $title = 'Админ-панель';
    require_once('../parts/header.php');

    require('../actions/connection.php');

    $result = $connection->query("SELECT * FROM `users`");
    $users = $result->fetch_all();

    $result2 = $connection->query("SELECT * FROM `goods`");
    $goods = $result2->fetch_all();

    $result3 = $connection->query("SELECT * FROM `orders`");
    $orders = $result3->fetch_all();
?>

<main>
     <div class="container">
        <div class="row mt-4">
          <!--Список всех пользователей-->
          <div class="col-lg-6 col-md-12 all-users">
            <h2>Пользователи:</h2>
            <div class="accordion" id="accordionExample">

            <?php
              foreach($users as $item) {
            ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$item[0]?>1" aria-expanded="true" aria-controls="collapseOne">
                    <?= $item[1]?> <?= $item[2]?>
                  </button>
                </h2>
                <div id="collapse<?=$item[0]?>1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    
                  <p>Имя: <?= $item[1]?></p>
                  <p>Фамилия: <?= $item[2]?></p>
                  <p>Логин: <?= $item[3]?></p>
                  <p>Email: <?= $item[4]?></p>
                  <p>Телефон: <?= $item[7]?></p>
                  <p>Роль: 
                    <?php
                      $result5 = $connection->query("SELECT * FROM `roles`");
                      $roles = $result5->fetch_all();  
                      foreach($roles as $item2) {
                        if($item2[0] == $item[5]) {
                          echo $item2[1];
                        }
                       }
                    ?>

                    <?php
                    ?>
                  </p>

                  <?php 
                    if($item[5] != 1) {
                  ?>
                  <div class="admin-btn change">
                    <a href="../pages/change_userdata_form.php?id=<?=$item[0]?>">Редактировать</a>
                  </div>
 
                  <?php }?>
                  </div>
                </div>
              </div>
              <?php }?>
     
            </div>


          </div>

          <!--Все заказы-->  
          <div class="col-lg-6 col-md-12 all-users">
  
            <h2>Заказы:</h2>
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
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$item[0]?>2" aria-expanded="true" aria-controls="collapseOne">
                      Заказ #<?=$item[0]?>
                    </button>
                  </h2>
                  <div id="collapse<?=$item[0]?>2" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body orders-list">
                      <p>Дата заказа: <?=$item[5]?></p>
                      <p>Пользователь: 
                      <?php
                        $user_id = $item[1];
                        $result4 = $connection->query("SELECT `user_name`, `user_surename` FROM `users` WHERE `user_id` = $user_id");
                        $user = $result4->fetch_assoc();  
                        echo  $user['user_name'].' '.$user['user_surename']                  
                        ?>
                      </p>
                      <p>ID пользователя: <?=$user_id?></p>
                      <p>Количество товаров: <?=$item[2]?></p>
                      <p >Сумма заказа: <span class="fs-4"><?=$item[3]?> ₽</span></p>
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
                          <?php } else {?>
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
                      <div class="admin-btn change mt-3">
                        <a href="../pages/change_order_form.php?id=<?=$item[0]?>">Редактировать</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            
            </div>
          </div>

          <!--Все товары-->                  
          <div class="col-lg-12 all-users mt-3">
              <h2>Все товары:</h2>
              <div class="admin-btn add-good mt-2 mb-3">
                  <a href="../pages/add_good_form.php">Добавить товар</a>
              </div>
              <div class="row goods">
              <?php
                                        foreach($goods as $item) {
                                   ?>

                                        <div class="col-lg-6 col-12"> <!--Товар-->
                                             <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                                  <div class="card mb-3 w-100">
                                                       <div class="good-cont d-flex flex-row">
                                                            <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                            <div class="card-body ">
                                                                 
                                                                 <h5 class="card-title mt-2"><?=$item[1]?></h5>
                                                                 <p class="card-text fs-2"><?=$item[2]?> ₽ </p>
                                                                 <div class="buy-btn mt-3 d-none">
                                                                      <a href="#" class="btn card-btn">Купить</a>
                                                                 </div>
                                                                 <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) {
                                                                 ?>
                                                                      <div class="admin-btn del mt-2">
                                                                           <a href="../actions/delete_good.php?id=<?=$item[0]?>">Удалить</a>
                                                                      </div>
                                                                      <div class="admin-btn change mt-2">
                                                                        <a href="../pages/change_good_form.php?id=<?=$item[0]?>">Редактировать</a>
                                                                      </div>
                                                                 <?php }?>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </a>
                                        </div>

                                   <?php
                                        }
                                   ?>
              </div>
          </div>


        </div>


     </div>
</main>

<?php
  } else {
    header('Location: /');
  }
  require_once('../parts/footer.php');
?>