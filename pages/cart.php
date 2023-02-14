<?php
  session_start();
  $title = 'Корзина';
  require_once('../parts/header.php');
  require('../actions/connection.php');

?>
  <main>
    <div class="container cart-cont">
        <?php
            if(!empty($_SESSION['cart_inter'])) { //Если корзина не пустая

                $final_price_arr = []; //итоговые цены товаров
                $final_count_arr = []; //итоговые количества товаров
                
        ?>
        <div class="row mt-4">
            <div class="col-lg-9 col-md-12 goods-cart" >
                <?php
                    foreach($_SESSION['cart_inter'] as $key => $item) {
                        $id = $item['id'];
                        $result = $connection->query("SELECT * FROM `goods` WHERE `good_id` = $id");
                        $good = $result->fetch_assoc(); 
                        
                        $sum = $good['good_price'] * $item['count'];
                        $count = $item['count'];

                ?>
                    <div class="good-cart row"> <!--Товар-->
                        <div class="col-12 mt-4 mb-3 good-name">
                            <a href="../pages/productCard.php?id=<?=$id?>"><h4><?=$good['good_name']?></h3></a>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-3 good-cart-img">
                                <a href="../pages/productCard.php?id=<?=$id?>">
                                    <img src="../img/<?=$good['good_img']?>" alt="Товар" class="img-fluid">
                                </a>
                            </div>
                            
                            <div class="col-9 good-cart-desc d-flex justify-content-around">
                                <h3 class="d-flex align-items-center"><?=$sum?> ₽</h3>
                                <div class="d-flex align-items-center">
                                    <a href="../actions/cart_minus.php?id=<?=$id?>" class="fs-3">
                                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                    </a>
                                  
                                    
                                    <?php
                                        if($count < $good['good_quant']) { //Показывает "+", если количество добавленного товара не превышает его количества в базе данных
                                    ?>
                                        <span class="mx-3 fs-5"><?=$count?> шт.</span> 
                                        <a href="../actions/cart_plus.php?id=<?=$id?>" class="fs-3">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                    <?php
                                    
                                        } else {
                                    ?>
                                            <span class="mx-3 fs-5"><?=$good['good_quant']?> шт.</span> 
                                    <?php
                                            $count = $good['good_quant'];
                                        }
                                        
                                        array_push($final_price_arr, $sum);
                                        array_push($final_count_arr, $count)
                                    ?>
                                </div>
                                
                                <div class="delete-from-cart d-flex align-items-center">
                                    <a href="../actions/delete_from_cart.php?id=<?=$id?>"><i class="fa fa-trash fs-4" aria-hidden="true"></i></a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                <?php 
                    }
                    $final_price = array_sum($final_price_arr); //сумма заказа
                    $final_count = array_sum($final_count_arr); //суммарное количество

                    $_SESSION['final_price'] = $final_price;
                    $_SESSION['final_count'] = $final_count;

                    $connection->close();
                ?>
            </div>
            <div class="col-lg-3 col-md-12 d-flex flex-column justify-content-start final-cart-blck mt-3">
                <div>
                    <p class="fs-5">Товаров в заказе: <?=$final_count?> шт.</p>
                    <div class="final-price mt-3 mb-4">
                        <h4>Итого:</h4>
                        <h2 class="fs-1"><?=$final_price?> ₽</h2>
                    </div>
                    <div class="admin-btn change mt-2 fs-5">
                        <a href="../pages/order_data_form.php">К оформлению</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } else {?>
            <div class="empty-cart d-flex justify-content-center mt-5">
                <h4 class="fs-2">Корзина пуста!</h4>
            </div>
        <?php }?>
    </div>
  </main>
<?php
  require_once('../parts/footer.php');
?>