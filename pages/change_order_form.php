<?php
  $title = 'Изменение данных заказа';
  require_once('../parts/header.php');

  if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
     require('../actions/connection.php');

     $id = $_GET['id']; //id заказа

     $result = $connection->query("SELECT * FROM `status`");
     $statuses = $result->fetch_all();

     $result2 = $connection->query("SELECT `status_id`, `address_id` FROM `orders` WHERE `order_id` = $id");
     $order = $result2->fetch_assoc();

     $status_id = $order['status_id'];
     $address_id = $order['address_id'];

     $result3 = $connection->query("SELECT * FROM `status` WHERE `status_id` = $status_id");
     $status_info = $result3->fetch_assoc();

     $result4 = $connection->query("SELECT * FROM `delivery_addresses` WHERE `address_id` = $address_id");
     $address = $result4->fetch_assoc();
     ?>

     <main>
          <div class="container">
               <!--Форма изменения заказа-->
               <form class="reg-form mt-4 row  change_order_form"  action="../actions/change_order.php?orderId=<?=$id?>" method="POST">
                    <h3 class="mt-4 change_order_h">Статус заказа:</h3>
                    <div class="mb-3 mt-4 d-flex justify-content-md-between justify-content-lg-start align-items-center">
                                   <label for="exampleInputEmail1" class="form-label me-3">Статус:</label>
                                   <select name="status" class="p-2">
                                   <option value="<?=$status_info['status_id']?>" selected><?=$status_info['status_name']?></option>
                                        <?php 
                                             foreach($statuses as $item) {
                                        
                                                  if($item[0] != $order['status_id']) { 
                                        ?>
                                             
                                                       <option value="<?=$item[0]?>"><?=$item[1]?></option>
                                        <?php 
                                                  }
                                        }?>
                                   </select>
                              </div>
                    <h3 class="change_order_h">Адрес доставки:</h3>
                    <div class="mb-3 col-md-6 col-sm-12">
                         <label for="exampleInput1" class="form-label">Город</label>
                         <input type="text" class="form-control" id="exampleInput1" name="city" value="<?=$address['city']?>" required>
                    </div>
                    <div class="mb-3 col-md-6 col-sm-12">
                         <label for="exampleInput2" class="form-label">Улица</label>
                         <input type="text" class="form-control" id="exampleInput2" name="street" value="<?=$address['street']?>" required>
                    </div>
                    <div class="mb-3 col-md-3 col-sm-12">
                         <label for="exampleInput3" class="form-label">Дом</label>
                         <input type="text" class="form-control" id="exampleInput3" name="house" value="<?=$address['house']?>" required>
                    </div>
                    <div class="mb-3 col-md-3 col-sm-12">
                         <label for="exampleInputEmail1" class="form-label">Корпус</label>
                         <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$address['corpus']?>" name="corpus">
                    </div>
                    <div class="mb-3 col-md-3 col-sm-12">
                         <label for="exampleInput4" class="form-label">Строение</label>
                         <input type="tel" class="form-control" id="exampleInput4" value="<?=$address['building']?>" name="building">
                    </div>
                    <div class="mb-3 col-md-3 col-sm-12">
                         <label for="example" class="form-label">Подъезд</label>
                         <input type="text" class="form-control" id="example" value="<?=$address['entrance']?>" name="entrance" required>
                    </div>
                    <div class="mb-3 col-md-3 col-sm-12">
                         <label for="example1" class="form-label">Этаж</label>
                         <input type="number" class="form-control" id="example1" value="<?=$address['floor']?>" name="floor" required>
                    </div>
                    <div class="mb-3 col-md-3 col-sm-12">
                         <label for="example2" class="form-label">Квартира</label>
                         <input type="text" class="form-control" id="example2" value="<?=$address['apartment']?>" name="apartment" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Изменить</button>
               </form>
          </div>
     </main>
     <?php
     } else {

          header('Location: ../index.php');

     ?>


<?php

     }
     require_once('../parts/footer.php');
?>