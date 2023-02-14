<?php
  @session_start();
  $title = 'Главная';
  require_once('parts/header.php');

  require('actions/connection.php');

  $result = $connection->query("SELECT * FROM `goods` ORDER BY `good_id` DESC LIMIT 4");
  $goods = $result->fetch_all();
?>

          <main>
                    <!-- слайдер -->
                    <div id="carouselExampleIndicators" class="carousel slide mb-4">
                         <div class="carousel-indicators">
                           <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                           <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                           <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                         </div>
                         <div class="carousel-inner">
                         <div class="carousel-item active">
                             <img src="img/slider_alt2.png" class="d-block w-100 img-fluid" alt="Слайд">
                           </div>
                           <div class="carousel-item">
                             <img src="img/slider_alt.png" class="d-block w-100 img-fluid" alt="Слайд">
                           </div>
                           <div class="carousel-item">
                             <img src="img/slider_alt3.png" class="d-block w-100 img-fluid" alt="Слайд">
                           </div>
                         </div>
                         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                         </button>
                    </div>

                    <div class="container d-flex  flex-column">


                      <div class="brands-partners w-100 my-5"> <!-- Блок брендов-партнёров -->
                        <div class="headline d-flex justify-content-center">
                            <h2 class="fs-1">Бренды-партнёры</h2>
                            <div class="partner_line"></div>
                        </div>
                        <div class="brands_logos d-flex justify-content-between align-items-center">
                            <img src="img/Stinger.png" alt="Stinger" class="img-fluid me-4">
                            <img src="img/Cube.png" alt="Cube" class="img-fluid me-4">
                            <img src="img/RockShox.png" alt="RockShox" class="img-fluid me-4">
                            <img src="img/Shimano.png" alt="Shimano" class="img-fluid me-4">
                            <img src="img/Merida.png" alt="Merida" class="img-fluid">
                        </div>
                      </div>

                      </div>


                      <div class="last-goods container"> <!-- Блок последних добавленных товаров -->
                      <div class="headline d-flex justify-content-center">
                            <h2 class="fs-1">Новинки каталога</h2>
                            <div class="partner_line"></div>
                        </div>
                        <div class="goods-main  d-flex flex-row justify-content-between">
                      <?php
                                        foreach($goods as $item) {
                                   ?>

                                        <div class="mt-3"> <!--Товар-->
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
                                                                      <a href="actions/add_to_cart.php?prodId=<?=$item[0]?>" class="btn card-btn">Купить</a>
                                                                 </div>
                                                                 <?php
                                                                      if(isset($_COOKIE['role_id']) && $_COOKIE['role_id'] == 1) {
                                                                 ?>
                                                                      <div class="admin-btn del mt-2">
                                                                           <a href="actions/delete_good.php?id=<?=$item[0]?>">Удалить</a>
                                                                      </div>
                                                                      <div class="admin-btn change mt-2">
                                                                        <a href="pages/change_good_form.php?id=<?=$item[0]?>">Редактировать</a>
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


                      <div class="reasons d-flex flex-column align-items-center my-5 fs-5"> <!-- Блок причин -->
                        <div class="headline mt-5">
                          <h2 class="fs-1">5 причин купить велосипед в Bike World</h2> 
                          <div class="reasons_line"></div>
                        </div>
                        <div class="container">
                         
                            <div class="all_reasons mb-5">
                              <div class="row d-flex justify-content-center">
                                <div class="col-lg-4">
                                  <img src="img/reason1.png" alt="Причина 1">
                                  <p>Мы предлагаем только готовые решения! Товар доставляется в собранном, проверенном и «подтянутом» виде. Забирайте, садитесь и сразу же отправляйтесь на велопрогулку!</p>
                                </div>
                                <div class="col-lg-4">
                                  <img src="img/reason2.png" alt="Причина 2">
                                  <p>Мы гарантируем своим покупателям повышенное внимание, заинтересованность, безупречный уровень консультаций и обслуживания.</p>
                                </div>
                                <div class="col-lg-4">
                                  <img src="img/reason3.png" alt="Причина 3">
                                <p>Многолетний опыт работы с людьми и велосипедами позволяет нам безошибочно определять потребности наших клиентов и подбирать для них наилучшие варианты.</p>
                                </div>
                                <div class="col-lg-4 mt-5">
                                  <img src="img/reason4.png" alt="Причина 4">
                                  <p>Мы являемся производителем ряда велосипедных брендов, что дает нам глубокое понимание тенденций рынка и возможность совершенствовать свои велосипеды в соответствии с предпочтениями покупателей.</p>
                                </div>
                                <div class="col-lg-4 mt-5">
                                  <img src="img/reason5.png" alt="Причина 5">
                                    <p>Если что-то пошло не так, смело обращайтесь в наш авторизованный сервисный центр за помощью. Мы окажем всестороннюю поддержку с гарантийным и сервисным ремонтом.</p>
                                </div>
                              </div>
                          </div>
                      </div>


                      </div>
                      <div class="container">

                      <div class="news d-flex flex-column align-items-center fs-5"> <!-- Блок новостей -->
                        <div class="headline">
                          <h2 class="fs-1">Новости</h2> 
                          <div class="reasons_line"></div>
                        </div>

                        <div class="row news-list d-flex justify-content-center justify-content-lg-between  ">
                          <div class="col-lg-3 col-sm-12">
                            <img src="img/news_pic1.png" alt="Новость 1">
                            <p class="mt-2">Стоимость ремонта в нашем сервисном центре снижается на 20% для негарантийных случаев.</p>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                            <img src="img/news_pic2.png" alt="Новость 2">
                            <p class="mt-2">Новое поступление двухподвесных велосипедов уже в январе!</p>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                            <img src="img/news_pic3.png" alt="Новость 3">
                            <p class="mt-2">Скидка для наших постоянных покупателей увеличилась с 5 до 10 процентов.</p>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                            <img src="img/news_pic4.png" alt="Новость 4">
                            <p class="mt-2">Теперь в нашем магазине можно застраховать приобретённый велосипед.</p>
                          </div>
                        </div>

                      </div>


                    </div>
                  </div>
               
          </main>
<?php
  require_once('parts/footer.php');
?>