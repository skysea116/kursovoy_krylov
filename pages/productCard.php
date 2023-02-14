<?php
  $title = 'Каталог';
  require_once('../parts/header.php');

  require('../actions/connection.php');

  $id = $_GET['id']; //id товара

  $result = $connection->query("SELECT * FROM `goods` WHERE `good_id` = $id");
  $good = $result->fetch_assoc();


  $result2 = $connection->query("SELECT * FROM `chars` WHERE `good_id` = $id");
  $chars = $result2->fetch_assoc();
?>

<main>
     <div class="container">
          <!--Информация о товаре-->
          <h2 class="fs-1 mb-4 mt-4"><?=$good['good_name']?></h2>
          <div class="row">
               <div class="col-lg-8 col-sm-12 prodCard-img">
                    <img src="../img/<?=$good['good_img']?>" alt="Товар" class="img-fluid">
               </div>
               <div class="col-lg-4 col-sm-12 d-flex flex-column justify-content-center">
                    <div class="row">
                         <?php 
                              if($good['good_quant'] > 0) {
                         ?>
                              <div class="col-lg-12">
                                   <p class="instock fs-3">В наличии</p>
                              </div>
                         <?php } else {?>
                              <div class="col-lg-12">
                                   <p class="outstock fs-3">Нет в наличии</p>
                              </div>
                         <?php }?>
                         <div class="col-lg-12 col-sm-7">
                              <p class="card-price"><?=$good['good_price']?> ₽</p>
                         </div>
                        
                         <div class=" mt-lg-3 mt-sm-2 prodCard-btn col-lg-12 col-sm-5">
                              <a href="../actions/add_to_cart.php?prodId=<?=$id?>" class="btn card-btn">Купить</a>
                         </div>
                         <div class="card-delivery d-flex align-items-center mt-4 col-lg-12">
                              <i class="fas fa-truck fs-3 me-3"></i>
                              <p class="fs-4">Доставим завтра бесплатно</p>
                         </div>
                         <div class="card-guarantee d-flex align-items-center mt-3 col-lg-12">
                              <i class="fas fa-check fs-3 me-3"></i>
                              <p class="fs-4">Гарантия 12 месяцев</p>
                         </div>
                         <?php
                              if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
                         ?>
                              <div class="admin-btn del mt-2 fs-3 mt-3">
                                   <a href="../actions/delete_good.php?id=<?=$id?>">Удалить</a>
                              </div>
                              <div class="admin-btn change mt-2 fs-3 mt-2">
                                   <a href="../pages/change_good_form.php?id=<?=$id?>">Редактировать</a>
                              </div>
                         <?php }?>        
                    </div>
               </div>
          </div>

          <!--Описание товара-->
          <div class="prodDesk mt-4 fs-5">
               <p> <?=$good['good_desc']?></p>
          </div>

          <!--Характеристики-->
          <div class="char-head mt-4">
               <h3>Характеристики</h3>
          </div>
          
          <div class="char-chapter ch1 my-3">
               <h4>Рама и амортизаторы</h4>
          </div>
          
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2">Рама:</div>
               <?php if(!empty($chars['frame'])) {?>
                    <div class="col-lg-10"><?=$chars['frame']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2">Вилка:</div>
               <?php if(!empty($chars['fork'])) {?>
                    <div class="col-lg-10"><?=$chars['fork']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2">Вес:</div>
               <?php if(!empty($chars['weight'])) {?>
                    <div class="col-lg-10"><?=$chars['weight']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>

          <div class="char-chapter ch2 my-3 ">
               <h4>Цепная передача</h4>
          </div>

          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Манетки:</div>
               <?php if(!empty($chars['manettes'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['manettes']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Передний переключатель:</div>
               <?php if(!empty($chars['front_derail'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['front_derail']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Задний переключатель:</div>
               <?php if(!empty($chars['back_derail'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['back_derail']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Шатуны:</div>
               <?php if(!empty($chars['conn_rods'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['conn_rods']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Каретка:</div>
               <?php if(!empty($chars['carriage'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['carriage']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Кассета:</div>
               <?php if(!empty($chars['cassette'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['cassette']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Количество скоростей:</div>
               <?php if(!empty($chars['speeds'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['speeds']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Цепь:</div>
               <?php if(!empty($chars['chain'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['chain']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Педали:</div>
               <?php if(!empty($chars['pedals'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['pedals']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>

          <div class="char-chapter ch3 my-3">
               <h4>Колёса</h4>
          </div>

          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Диаметр колеса:</div>
               <?php if(!empty($chars['diametr'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['diametr']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Обода:</div>
               <?php if(!empty($chars['rims'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['rims']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Спицы:</div>
               <?php if(!empty($chars['spokes'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['spokes']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Втулка:</div>
               <?php if(!empty($chars['bushing'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['bushing']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Покрышки:</div>
               <?php if(!empty($chars['tires'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['tires']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>

          <div class="char-chapter ch4 my-3">
               <h4>Компоненты</h4>
          </div>

          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Передний тормоз:</div>
               <?php if(!empty($chars['front_brake'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['front_brake']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Задний тормоз:</div>
               <?php if(!empty($chars['back_brake'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['back_brake']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Руль:</div>
               <?php if(!empty($chars['rudder'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['rudder']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Вынос:</div>
               <?php if(!empty($chars['takeaway'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['takeaway']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Рулевая колонка:</div>
               <?php if(!empty($chars['steering'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['steering']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Подседельный штырь:</div>
               <?php if(!empty($chars['seatpost'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['seatpost']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Седло:</div>
               <?php if(!empty($chars['seat'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['seat']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Разработка:</div>
               <?php if(!empty($chars['country_dev'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['country_dev']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          <div class="row chars fs-4 mt-3 ms-4">
               <div class="col-lg-2 col-md-3">Производство:</div>
               <?php if(!empty($chars['manufacture'])) {?>
                    <div class="col-lg-10 col-md-9"><?=$chars['manufacture']?></div>
               <?php } else {?>
                    <div class="col-lg-10 col-md-9">-</div>
               <?php }?>
          </div>
          
     </div>
</main>

<?php
  require_once('../parts/footer.php');
?>