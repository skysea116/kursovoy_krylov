<?php
  session_start();
  $title = 'Избранное';
  require_once('../parts/header.php');
  require('../actions/connection.php');

?>

<main>
     <div class="container">
          <div class="row mt-4">
          <?php
          if(isset($_SESSION['final_fav']) && !empty($_SESSION['final_fav'])) {
               foreach($_SESSION['final_fav'] as $item) {
                    $id = $item['id']; //id товара

                    $result = $connection->query("SELECT * FROM `goods` WHERE `good_id` = $id");
                    $good = $result->fetch_assoc(); 
          ?>
                              <div class="col-lg-3 col-6"> <!--Товар-->
                                        
                                        <div class="card mb-3">
                                             <div class="good-cont">
                                                  <a href="../pages/productCard.php?id=<?=$good['good_id']?>">
                                                  <img src="../img/<?=$good['good_img']?>" class="card-img-top img-fluid" alt="Товар">
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
                                                       <h5 class="card-title good-title mt-2"><?=$good['good_name']?></h5>
                                                       <p class="card-text fs-2"><?=$good['good_price']?> ₽ <i class="fas fa-list fs-4 ms-1"></i>
                                                       </p>
                                                       </a>
                                                       <div class="buy-btn mt-3">
                                                            <a href="../actions/add_to_cart.php?prodId=<?=$good['good_id']?>" class="btn card-btn">Купить</a>
                                                       </div>
                                                       <div class="delete-from-cart d-flex align-items-center justify-content-center mt-3">
                                                            <a href="../actions/delete_from_favourite.php?id=<?=$good['good_id']?>"><i class="fa fa-trash fs-4" aria-hidden="true"></i></a>
                                                       </div>
                                                       <?php
                                                            if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) { //если пользователь - админ
                                                       ?>
                                                            <div class="admin-btn del mt-2">
                                                                 <a href="../actions/delete_good.php?id=<?=$good['good_id']?>">Удалить</a>
                                                            </div>
                                                            <div class="admin-btn change mt-2">
                                                            <a href="../pages/change_good_form.php?id=<?=$good['good_id']?>">Редактировать</a>
                                                            </div>
                                                       <?php }?>
                                                  </div>
                                             </div>
                                        </div>
                                   
                              </div>

          <?php 
               }
          } else {
          ?>
               <p class="fs-3 d-flex justify-content-center">В избранном пусто!</p>
          <?php
          }
          ?>
          </div>
     </div>
</main>

<?php
  require_once('../parts/footer.php');
?>