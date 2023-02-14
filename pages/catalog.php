<?php
  @session_start();
  $title = 'Каталог';
  require_once('../parts/header.php');
  
  require('../actions/connection.php');


  $result = $connection->query("SELECT * FROM `goods` WHERE `good_quant` > 0");
  $goods = $result->fetch_all();

?>

<main>
     <div class="container">
          <div class="row d-flex flex-row justify-content-lg-between justify-content-center">
               <!--Блок фильтрации-->
               <div class="col-lg-3 catalog-nav mt-4 d-none d-lg-flex">
                         <div class="nav flex-column nav-pills nav-fill me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <button class="nav-link active mt-3 mb-3" id="v-pills-first-tab" data-bs-toggle="pill" data-bs-target="#v-pills-first" type="button" role="tab" aria-controls="v-pills-first" aria-selected="true">Все товары</button>
                              <h2>По категориям:</h2>
                              <div class="catalog-line"></div>
                              <button class="nav-link" id="v-pills-second-tab" data-bs-toggle="pill" data-bs-target="#v-pills-second" type="button" role="tab" aria-controls="v-pills-second" aria-selected="false">Горные велосипеды</button>
                              <button class="nav-link mt-3" id="v-pills-third-tab" data-bs-toggle="pill" data-bs-target="#v-pills-third" type="button" role="tab" aria-controls="v-pills-third" aria-selected="false">Шоссейные велосипеды</button>
                              <button class="nav-link mt-3" id="v-pills-fourth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fourth" type="button" role="tab" aria-controls="v-pills-fourth" aria-selected="false">Детские велосипеды</button>
                              <button class="nav-link mt-3 mb-3" id="v-pills-fifth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fifth" type="button" role="tab" aria-controls="v-pills-fifth" aria-selected="false">Трюковые велосипеды</button>
                              <h2>По диаметру колёс:</h2>
                              <div class="catalog-line-2"></div>
                              <button class="nav-link" id="v-pills-sixth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sixth" type="button" role="tab" aria-controls="v-pills-sixth" aria-selected="false">29"</button>
                              <button class="nav-link mt-3" id="v-pills-seventh-tab" data-bs-toggle="pill" data-bs-target="#v-pills-seventh" type="button" role="tab" aria-controls="v-pills-seventh" aria-selected="false">28"</button>
                              <button class="nav-link mt-3" id="v-pills-eighth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-eighth" type="button" role="tab" aria-controls="v-pills-eighth" aria-selected="false">27,5"</button>
                              <button class="nav-link mt-3" id="v-pills-ninth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ninth" type="button" role="tab" aria-controls="v-pills-ninth" aria-selected="false">26"</button>
                              <button class="nav-link mt-3 mb-4" id="v-pills-tenth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tenth" type="button" role="tab" aria-controls="v-pills-tenth" aria-selected="false">Меньше 26"</button>
                         </div>
               </div>
               <div class="col-lg-12 catalog-nav mt-4 d-block d-lg-none">
               <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                         <h3 class="accordion-header" id="flush-headingOne">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                              Фильтровать по:
                              </button>
                         </h3>
                         <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            
                              <div class="nav flex-column nav-pills nav-fill me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                   <button class="nav-link active mt-3 mb-3" id="v-pills-first-tab" data-bs-toggle="pill" data-bs-target="#v-pills-first" type="button" role="tab" aria-controls="v-pills-first" aria-selected="true">Все товары</button>
                                   <h2>По категориям:</h2>
                                   <div class="catalog-line"></div>
                                   <button class="nav-link" id="v-pills-second-tab" data-bs-toggle="pill" data-bs-target="#v-pills-second" type="button" role="tab" aria-controls="v-pills-second" aria-selected="false">Горные велосипеды</button>
                                   <button class="nav-link mt-3" id="v-pills-third-tab" data-bs-toggle="pill" data-bs-target="#v-pills-third" type="button" role="tab" aria-controls="v-pills-third" aria-selected="false">Шоссейные велосипеды</button>
                                   <button class="nav-link mt-3" id="v-pills-fourth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fourth" type="button" role="tab" aria-controls="v-pills-fourth" aria-selected="false">Детские велосипеды</button>
                                   <button class="nav-link mt-3 mb-3" id="v-pills-fifth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fifth" type="button" role="tab" aria-controls="v-pills-fifth" aria-selected="false">Трюковые велосипеды</button>
                                   <h2>По диаметру колёс:</h2>
                                   <div class="catalog-line-2"></div>
                                   <button class="nav-link" id="v-pills-sixth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sixth" type="button" role="tab" aria-controls="v-pills-sixth" aria-selected="false">29"</button>
                                   <button class="nav-link mt-3" id="v-pills-seventh-tab" data-bs-toggle="pill" data-bs-target="#v-pills-seventh" type="button" role="tab" aria-controls="v-pills-seventh" aria-selected="false">28"</button>
                                   <button class="nav-link mt-3" id="v-pills-eighth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-eighth" type="button" role="tab" aria-controls="v-pills-eighth" aria-selected="false">27,5"</button>
                                   <button class="nav-link mt-3" id="v-pills-ninth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ninth" type="button" role="tab" aria-controls="v-pills-ninth" aria-selected="false">26"</button>
                                   <button class="nav-link mt-3 mb-4" id="v-pills-tenth-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tenth" type="button" role="tab" aria-controls="v-pills-tenth" aria-selected="false">Меньше 26"</button>
                              </div>

                         </div>
                    </div>
               </div>
                         
               </div>
               <!--Список товаров-->
               <div class="col-lg-9 col-md-12 ">
                    
                    <?php
                         if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
                    ?>
                         <div class="admin-btn add-good mt-4">
                              <a href="../pages/add_good_form.php">Добавить товар</a>
                         </div>
                    <?php }?>

                   
                    <div class="tab-content" id="v-pills-tabContent">
                         
                         <div class="tab-pane fade show active" id="v-pills-first" role="tabpanel" aria-labelledby="v-pills-first-tab" tabindex="0">


                              <div class="row goods mt-4">
                              <!--Все товары-->
                              <?php
                                   foreach($goods as $item) {
     
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title good-title mt-2"><?=$item[1]?></h5></a>
                                                            <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                            <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>
                                                            
                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                 if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                        
                                   </div>

                              <?php
                                   }
                              ?>
                              
                         </div>


                         </div>
                                   <div class="tab-pane fade show" id="v-pills-second" role="tabpanel" aria-labelledby="v-pills-second-tab" tabindex="0">


                              <div class="row goods mt-4">
                                   <!--Горные велосипеды-->
                                   <?php
                                        foreach($goods as $item) {
                                             if($item[4] == 1) {
                                   ?>

                                        <div class="col-lg-4 col-6"> <!--Товар-->
                                             
                                                  <div class="card mb-3">
                                                       <div class="good-cont">
                                                            <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                                            <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                            <div class="card-body ">
                                                                 <div class="row benefits ">
                                                                      <div class="profitable col-6">
                                                                      <p>выгодно</p>
                                                                      </div>
                                                                      <div class="trade-in col-6">
                                                                      <p>трейд-ин</p>
                                                                      </div>
                                                                      <div class="installments col-6">
                                                                      <p>рассрочка</p>
                                                                      </div>
                                                                 </div>
                                                                 <h5 class="card-title mt-2"><?=$item[1]?></h5></a>

                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                                 <div class="buy-btn mt-3">
                                                                      <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                                 </div>
                                                                 <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                             
                                        </div>

                                   <?php
                                        }
                                   }?>
                                   
                              </div>


                         </div>
                         <div class="tab-pane fade" id="v-pills-third" role="tabpanel" aria-labelledby="v-pills-third-tab" tabindex="0">

                              <div class="row goods mt-4">
                                   <!--Шоссейные велосипеды-->
                                   <?php
                                        foreach($goods as $item) {
                                             if($item[4] == 2) {
                                   ?>

                                        <div class="col-lg-4 col-6"> <!--Товар-->
                                             <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                                  <div class="card mb-3">
                                                       <div class="good-cont">
                                                            <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                            <div class="card-body ">
                                                                 <div class="row benefits ">
                                                                      <div class="profitable col-6">
                                                                      <p>выгодно</p>
                                                                      </div>
                                                                      <div class="trade-in col-6">
                                                                      <p>трейд-ин</p>
                                                                      </div>
                                                                      <div class="installments col-6">
                                                                      <p>рассрочка</p>
                                                                      </div>
                                                                 </div>
                                                                 <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                                 <div class="buy-btn mt-3">
                                                                      <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                                 </div>
                                                                 <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                        </div>

                                   <?php
                                        }
                                   }?>

                                   </div>

                         </div>
                         <div class="tab-pane fade" id="v-pills-fourth" role="tabpanel" aria-labelledby="v-pills-fourth-tab" tabindex="0">

                         <div class="row goods mt-4">
                              <!--Детские велосипеды-->
                              <?php
                                   foreach($goods as $item) {
                                        if($item[4] == 4) {
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                   
                                   </div>

                              <?php
                                   }
                              }?>

                              </div>

                         </div>
                         <div class="tab-pane fade" id="v-pills-fifth" role="tabpanel" aria-labelledby="v-pills-fifth-tab" tabindex="0">

                         <div class="row goods mt-4">
                              <!--Трюковые велосипеды-->
                              <?php
                                   foreach($goods as $item) {
                                        if($item[4] == 3) {
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                      
                                   </div>

                              <?php
                                   }
                              }?>

                              </div>

                         </div>
                         <div class="tab-pane fade" id="v-pills-sixth" role="tabpanel" aria-labelledby="v-pills-sixth-tab" tabindex="0">

                         <div class="row goods mt-4">
                              <!--Вилосипеды 29"-->
                              <?php
                                   foreach($goods as $item) {
                                        $good_id = $item[0];
                                        $result2 = $connection->query("SELECT `diametr` FROM `chars` WHERE `good_id` = $good_id");
                                        $diametr_fetch = $result2->fetch_assoc();

                                        $diametr = $diametr_fetch['diametr'];

                                        if($diametr == 29) {
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                              }?>

                              </div>

                         </div>

                         <div class="tab-pane fade" id="v-pills-seventh" role="tabpanel" aria-labelledby="v-pills-sixth-seventh" tabindex="0">

                         <div class="row goods mt-4">
                              <!--Вилосипеды 28"-->
                              <?php
                                   foreach($goods as $item) {
                                        $good_id = $item[0];
                                        $result2 = $connection->query("SELECT `diametr` FROM `chars` WHERE `good_id` = $good_id");
                                        $diametr_fetch = $result2->fetch_assoc();

                                        $diametr = $diametr_fetch['diametr'];
                                        
                                        if($diametr == 28) {
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                        
                                   </div>

                              <?php
                                   }
                              }?>

                              </div>

                         </div>

                         <div class="tab-pane fade" id="v-pills-eighth" role="tabpanel" aria-labelledby="v-pills-eighth-tab" tabindex="0">

                         <div class="row goods mt-4">
                              <!--Вилосипеды 27,5"-->
                              <?php
                                   foreach($goods as $item) {
                                        $good_id = $item[0];
                                        $result2 = $connection->query("SELECT `diametr` FROM `chars` WHERE `good_id` = $good_id");
                                        $diametr_fetch = $result2->fetch_assoc();

                                        $diametr = $diametr_fetch['diametr'];
                                        
                                        if($diametr == 27.5) {
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                        
                                   </div>

                              <?php
                                   }
                              }?>

                              </div>

                         </div>

                         <div class="tab-pane fade" id="v-pills-ninth" role="tabpanel" aria-labelledby="v-pills-ninth-tab" tabindex="0">

                         <div class="row goods mt-4">
                              <!--Вилосипеды 26"-->
                              <?php
                                   foreach($goods as $item) {
                                        $good_id = $item[0];
                                        $result2 = $connection->query("SELECT `diametr` FROM `chars` WHERE `good_id` = $good_id");
                                        $diametr_fetch = $result2->fetch_assoc();

                                        $diametr = $diametr_fetch['diametr'];
                                        
                                        if($diametr == 26) {
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                        
                                   </div>

                              <?php
                                   }
                              }?>

                              </div>

                         </div>


                         <div class="tab-pane fade" id="v-pills-tenth" role="tabpanel" aria-labelledby="v-pills-tenth-tab" tabindex="0">

                         <div class="row goods mt-4">
                              <!--Вилосипеды меньше 26"-->
                              <?php
                                   foreach($goods as $item) {
                                        $good_id = $item[0];
                                        $result2 = $connection->query("SELECT `diametr` FROM `chars` WHERE `good_id` = $good_id");
                                        $diametr_fetch = $result2->fetch_assoc();

                                        $diametr = $diametr_fetch['diametr'];
                                        
                                        if($diametr < 26) {
                              ?>

                                   <div class="col-lg-4 col-6"> <!--Товар-->
                                        <a href="../pages/productCard.php?id=<?=$item[0]?>">
                                             <div class="card mb-3">
                                                  <div class="good-cont">
                                                       <img src="../img/<?=$item[5]?>" class="card-img-top img-fluid" alt="Товар">
                                                       <div class="card-body ">
                                                            <div class="row benefits ">
                                                                 <div class="profitable col-6">
                                                                 <p>выгодно</p>
                                                                 </div>
                                                                 <div class="trade-in col-6">
                                                                 <p>трейд-ин</p>
                                                                 </div>
                                                                 <div class="installments col-6">
                                                                 <p>рассрочка</p>
                                                                 </div>
                                                            </div>
                                                            <h5 class="card-title mt-2"><?=$item[1]?></h5></a>
                                                                 
                                                                 <p class="card-text fs-2 d-flex justify-content-between"><?=$item[2]?> ₽
                                                                 <a href="../actions/add_to_favourite.php?prodId=<?=$item[0]?>"><i class="fas fa-heart fs-3"></i></a></p>

                                                            <div class="buy-btn mt-3">
                                                                 <a href="../actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                            </div>
                                                            <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
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
                                        
                                   </div>

                              <?php
                                   }
                              }?>

                              </div>

                         </div>





                    </div>
                  

               </div>
          </div>
     </div>
</main>

<?php
  $connection->close();
  require_once('../parts/footer.php');
?>