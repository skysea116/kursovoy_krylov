<?php
  if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //Если пользователь - админ

  $title = 'Добавить товар';
  require_once('../parts/header.php');

  require('../actions/connection.php');
  
  $result = $connection->query("SELECT * FROM `categories`");
  $categories = $result->fetch_all();

?>

<main>
     <div class="container">

     <!--Форма добавления товара-->
     <form class="reg-form mt-4" action="../actions/add_good.php" method="POST" enctype="multipart/form-data">
          <div class="row mt-4">

               <div class="col-md-12 col-lg-6 add-good">
                    <h2>Основная информация</h2>
                  
                         <div class="mb-3 mt-3">
                              <label for="exampleInput1" class="form-label">Название</label>
                              <input type="text" class="form-control" id="exampleInput1" name="name">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInput2" class="form-label">Цена</label>
                              <input type="number" class="form-control" id="exampleInput2" name="price">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInput3" class="form-label">Описание</label>
                              <textarea class="form-control" id="exampleInput3" name="desc"></textarea>
                         </div>
                         <div class="mb-3 mt-4 d-flex justify-content-md-between justify-content-lg-start align-items-center">
                              <label for="exampleInputEmail1" class="form-label me-3">Категория:</label>
                              <select name="category" class="p-2">
                                   <?php 
                                        foreach($categories as $item) {
                                   ?>
                                        <option value="<?=$item[0]?>"><?=$item[1]?></option>
                                   <?php }?>
                              </select>
                         </div>
                         <div class="mb-3">
                              <label for="formFile" class="form-label">Изображение товара</label>
                              <input type="file" class="form-control h-100" id="formFile" name="pic" accept="image/png, image/gif, image/jpeg, image/jpg">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Количество товара на складе</label>
                              <input type="number" class="form-control" id="examplePassword1" name="quant">
                         </div>                    
               </div>

               <div class="col-md-12 col-lg-6 add-good">
                    <h2>Харкатеристики</h2>
                    <div class="mb-3 mt-3">
                              <label for="exampleInput1" class="form-label">Рама</label>
                              <input type="text" class="form-control" id="exampleInput1" name="frame">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInput2" class="form-label">Вилка</label>
                              <input type="text" class="form-control" id="exampleInput2" name="fork">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInput3" class="form-label">Вес</label>
                              <input class="form-control" id="exampleInput3" name="weight">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label me-3">Манетки</label>
                              <input class="form-control" id="exampleInput3" name="manettes">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInput4" class="form-label">Передний переключатель:</label>
                              <input type="text" class="form-control" id="exampleInput4" name="front_derail">
                         </div>
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Задний переключатель:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="back_derail">
                         </div>  
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Шатуны:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="conn_rods">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Каретка:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="carriage">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Кассета:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="cassette">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Количество скоростей:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="speeds">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Цепь:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="chain">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Педали:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="pedals">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Диаметр колеса:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="diametr">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Обода:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="rims">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Спицы:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="spokes">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Втулка:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="bushing">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Покрышки:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="tires">
                         </div> 
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Вынос:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="takeaway">
                         </div> 
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Передний тормоз:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="front_brake">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Задний тормоз:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="back_brake">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Руль:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="rudder">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Рулевая колонка:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="steering">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Подседельный штырь:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="seatpost">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Седло:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="seat">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Разработка:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="country_dev">
                         </div>   
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Производство:</label>
                              <input type="text" class="form-control" id="examplePassword1" name="manufacture">
                         </div>             
               </div>
               <button type="submit" class="btn btn-primary mt-5">Добавить</button>
          </div>
          </form>
     </div>
</main>


<?php
} else {
     header('Location: /');
   }
  require_once('../parts/footer.php');
?>