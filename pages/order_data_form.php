<?php
  $title = 'Детали заказа';
  require_once('../parts/header.php');

  require('../actions/connection.php');

  if(isset($_COOKIE['user_name'])) { //если пользователь авторизован

      $user_id = $_COOKIE['user_id'];

      $result = $connection->query("SELECT * FROM `delivery_addresses`   WHERE `user_id` = $user_id ORDER BY `address_id` DESC LIMIT 1");
      $address = $result->fetch_assoc();
?>

  <main>
      <div class="container order-data-cont">
        <h2 class="mt-4">Адрес доставки:</h2>
        <!--Форма оформления заказа-->
        <form class="reg-form mt-4 row"  action="../actions/to_create_order.php" method="POST">
                  <div class="mb-3 col-md-6 col-sm-12">
                        <label for="exampleInput1" class="form-label">Город</label>
                        <select class="form-control" id="exampleInput1" name="city" required>
                              <option value="Москва">Москва</option>
                              <option value="Санкт-Петербург">Санкт-Петербург</option>
                              <option value="Нижний Новгород">Нижний Новгород</option>
                              <option value="Казань">Казань</option>
                        </select>
                  </div>
                  <div class="mb-3 col-md-6 col-sm-12">
                        <label for="exampleInput2" class="form-label">Улица</label>
                        <?php
                        if(isset($address['street'])) {
                        ?>
                              <input class="form-control" id="exampleInput2" name="street" value="<?=$address['street']?>" required>
                        <?php
                        } else {
                        ?>
                              <input class="form-control" id="exampleInput2" name="street" required>
                        <?php
                              }
                        ?>
                  </div>
                  <div class="mb-3 col-md-3 col-sm-12">
                        <label for="exampleInput3" class="form-label">Дом</label>
                        <?php
                        if(isset($address['house'])) {
                        ?>
                              <input type="text" class="form-control" id="exampleInput3" name="house" value="<?=$address['house']?>" required>
                        <?php
                        } else {
                        ?>
                              <input type="text" class="form-control" id="exampleInput3" name="house" required>
                        <?php
                              }
                        ?>
                  </div>
                  <div class="mb-3 col-md-3 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">Корпус</label>
                        <?php
                        if(isset($address['corpus'])) {
                        ?>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="corpus" value="<?=$address['corpus']?>">
                        <?php
                        } else {
                        ?>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="corpus">
                        <?php
                              }
                        ?>
                  </div>
                  <div class="mb-3 col-md-3 col-sm-12">
                        <label for="exampleInput4" class="form-label">Строение</label>
                        <?php
                        if(isset($address['building'])) {
                        ?>
                              <input type="text" class="form-control" id="exampleInput4" name="building" value="<?=$address['building']?>">
                        <?php
                        } else {
                        ?>
                               <input type="text" class="form-control" id="exampleInput4" name="building">
                        <?php
                              }
                        ?>
                  </div>
                  <div class="mb-3 col-md-3 col-sm-12">
                        <label for="example" class="form-label">Подъезд</label>
                        <?php
                        if(isset($address['entrance'])) {
                        ?>
                              <input type="text" class="form-control" id="example" name="entrance" value="<?=$address['entrance']?>" required>
                        <?php
                        } else {
                        ?>
                                <input type="text" class="form-control" id="example" name="entrance" required>
                        <?php
                              }
                        ?>
                  </div>
                  <div class="mb-3 col-md-3 col-sm-12">
                        <label for="example1" class="form-label">Этаж</label>
                        <?php
                        if(isset($address['floor'])) {
                        ?>
                              <input type="number" class="form-control" id="example1" name="floor" value="<?=$address['floor']?>" required>
                        <?php
                        } else {
                        ?>
                              <input type="number" class="form-control" id="example1" name="floor" required>
                        <?php
                              }
                        ?>
                  </div>
                  <div class="mb-3 col-md-3 col-sm-12">
                        <label for="example2" class="form-label">Квартира</label>
                        <?php
                        if(isset($address['apartment'])) {
                        ?>
                              <input type="text" class="form-control" id="example2" name="apartment" value="<?=$address['apartment']?>" required>
                        <?php
                        } else {
                        ?>
                              <input type="text" class="form-control" id="example2" name="apartment" required>
                        <?php
                              }
                        ?>
                  </div>
                  <button type="submit" class="btn btn-primary mt-4">Оформить заказ</button>
              </form>
      </div>
  </main>
  <?php
    } else {
  ?>
    <main>
      <div class="container auth-warn d-flex justify-content-center mt-5">
        <h2>Авторизуйтесь, чтобы оформить заказ!</h2>
      </div>
    </main>
    <?php }?>
<?php
    
  require_once('../parts/footer.php');
?>