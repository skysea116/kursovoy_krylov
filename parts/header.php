<!DOCTYPE html>
<html lang="ru">
     <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="icon" href="../img/favicon.png" type="image/x-icon">
          <link rel="stylesheet" href="../css/bootstrap.min.css">
          <link rel="stylesheet" href="../css/style.css">
          <script src="https://kit.fontawesome.com/291133e8f2.js" crossorigin="anonymous"></script>
          <title><?=$title?></title>
     </head>
     <body>
          <header>
               <!-- модальные окна регистрации и авторизации -->

               <div class="modal fade" id="reg" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                        <div class="modal-head-btns mt-3">
                            <h1 class="modal-title fs-3 me-md-3" id="exampleModalToggleLabel2">Регистрация</h1>
                            <button class="modal-btn-head fs-3 " data-bs-target="#ent" data-bs-toggle="modal">Авторизация</button>
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          

                        <form class="row g-3 needs-validation reg-form" action="../actions/reg.php" method="POST" novalidate>
                          <div class="col-sm-12 col-lg-6 d-sm-flex align-items-center">
                            <label for="validationCustom01" class="form-label">Имя:</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" required>
                            
                          </div>
                          <div class="col-sm-12 col-lg-6 d-sm-flex align-items-center">
                            <label for="validationCustom02" class="form-label">Фамилия:</label>
                            <input type="text" class="form-control" id="validationCustom02" name="surname" required>
                           
                          </div>
                          <div class="col-md-12 d-sm-flex align-items-center">
                            <label for="validationCustomUsername" class="form-label">Телефон:</label>
                            <div class="input-group has-validation">
                              <input type="tel" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="phone" maxlength="12" required>
                              
                            </div>
                          </div>
                          <div class="col-md-12 d-sm-flex align-items-center">
                            <label for="validationCustom03" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="validationCustom03" name="email" required>
                            
                          </div>
                          <div class="col-md-12 d-sm-flex align-items-center">
                            <label for="validationCustom03" class="form-label">Логин:</label>
                            <input type="text" class="form-control" id="validationCustom04" name="login" required>
                            
                          </div>
                          <div class="col-sm-12 col-lg-6 d-sm-flex align-items-center">
                            <label for="validationCustom03" class="form-label">Пароль:</label>
                            <input type="password" class="form-control" id="validationCustom05" name="password" required>
                            
                          </div>
                          <div class="col-sm-12 col-lg-6 d-sm-flex align-items-center">
                            <label for="validationCustom03" class="form-label">Повторите пароль:</label>
                            <input type="password" class="form-control" id="validationCustom06" name="repeat_pass" required>
                            
                          </div>
                          <div class="col-12">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                              <label class="form-check-label" for="invalidCheck">
                                Соглащаюсь на обработку персональных данных
                              </label>
                
                            </div>
                          </div>
                          <div class="col-12 d-flex justify-content-center mt-3">
                            <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
                          </div>
                        </form>





                        </div>
                        <div class="modal-footer mb-2">
                          <img src="../img/logo.png" alt="Логотип">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="ent" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                      <div class="modal-content">
                        <div class="modal-header cent">

                          <div class="modal-head-btns mt-3">
                          <button class="modal-btn-head fs-3 me-md-3" data-bs-target="#reg" data-bs-toggle="modal">Регистрация</button>
                            <h1 class="modal-title fs-3" id="exampleModalToggleLabel2">Авторизация</h1>

                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                        </div>
                        <div class="modal-body">
                          

                        <form class="row g-3 needs-validation reg-form" action="../actions/ent.php" method="POST" novalidate>
                          
                          <div class="col-md-12 d-sm-flex align-items-center">
                            <label for="validationCustom03" class="form-label">Логин:</label>
                            <input type="text" class="form-control" id="validationCustom04" name="login" required>
                            
                          </div>
                          <div class="col-md-12 d-sm-flex align-items-center">
                            <label for="validationCustom03" class="form-label">Пароль:</label>
                            <input type="password" class="form-control" id="validationCustom05" name="password" required>
                            
                          </div>
                          <div class="col-12 d-flex justify-content-center mt-5">
                            <button class="btn btn-primary" type="submit">Войти</button>
                          </div>
                        </form>


                        </div>
                        <div class="modal-footer mb-3">
                            <img src="../img/logo.png" alt="Логотип">
                        </div>
                      </div>
                    </div>
                  </div>
                  

               <!-- навигационная панель -->
               <nav class="navbar navbar-expand-lg fs-4 navbar-light"> 
                    <div class="container py-4">

                      <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" alt="logo"></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse w" id="navbarSupportedContent">
                         
                        <div class="d-md-none d-lg-block"></div>

                         <ul class="navbar-nav header-nav">
                          <li class="nav-item">
                            <?php if($title == 'Главная') {?>
                              <a class="nav-link active" aria-current="page" href="../index.php">Главная</a>
                            <?php } else {?>
                              <a class="nav-link" aria-current="page" href="../index.php">Главная</a>
                              <?php }?>
                          </li>
                          <li class="nav-item">
                          <?php if($title == 'Каталог') {?>
                              <a class="nav-link active" aria-current="page" href="../pages/catalog.php">Каталог</a>
                            <?php } else {?>
                              <a class="nav-link" aria-current="page" href="../pages/catalog.php">Каталог</a>
                              <?php }?>
                          </li>
                          <li class="nav-item">
                            <?php if($title == 'Доставка и оплата') {?>
                              <a class="nav-link active" aria-current="page" href="../pages/delivery.php">Доставка и оплата</a>
                            <?php } else {?>
                              <a class="nav-link" aria-current="page" href="../pages/delivery.php">Доставка и оплата</a>
                              <?php }?>
                           
                          </li>
                          <li class="nav-item">
                            <?php if($title == 'Контакты') {?>
                              <a class="nav-link active" aria-current="page" href="../pages/contacts.php">Контакты</a>
                            <?php } else {?>
                              <a class="nav-link" aria-current="page" href="../pages/contacts.php">Контакты</a>
                              <?php }?>
                          </li>
                        </ul>
                        
                        <div class="entRegPhone"> <!-- Блок входа/авторизации и номера телефона -->
                             
                             <div class="entReg d-flex flex-row fs-5 justify-content-lg-end">
                              <?php
                                if(!isset($_COOKIE['user_name'])) {
                              ?>
                                <a data-bs-target="#ent" data-bs-toggle="modal">Вход</a><p class="mx-2">/</p><a data-bs-target="#reg" data-bs-toggle="modal">Регистрация</a>
                              <?php } else {?>
                                <div class="auth-msg">
                                  <p>Здравствуйте, <?=$_COOKIE['user_name']?></p>
                                  <div class="dropdown">
                                    <button class="user_dropdown dropdown-toggle ms-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <?php
                                        if($_COOKIE['role_id'] == 1) {
                                      ?>
                                        <li><a class="dropdown-item" href="../pages/admin_pannel.php">Админ-панель</a></li>
                                      <?php } else {?>
                                        <li><a class="dropdown-item" href="../pages/lk_user.php">Личный кабинет</a></li>
                                      <?php }?>
                                      <li><a class="dropdown-item exit-btn mt-2" href="../actions/exit.php">Выйти</a></li>
                                    </ul>
                                  </div>
                                </div>
                              <?php }?>
                            </div>
                             <div class="phone d-flex flex-row align-items-center mt-2">
                                 <p class="fs-6 mb-0 me-2"><i class="fas fa-phone-alt"></i></p><a href="tel:8(800)344-05-05">8(800)344-05-05</a>
                             </div>
                         </div>

                         <div class="headerBottomBG d-lg-none d-flex flex-column  ">
                             
               
                                 <div class="location d-flex flex-row ">
                                     <p class="mb-0 d-flex align-items-center"><i class="fas fa-map-marker me-2 fs-6 "></i></p><p class="mb-0">Москва</p>
                                 </div>
                                 
                                 <div class="cartBlock d-flex flex-row fs-2 mt-3">
                                     <p class="mb-0 me-4"><a href="../pages/favourite.php"><i class="fas fa-heart"></i></a></p>
                                     <p class="mb-0"><a href="../pages/cart.php"><i class="fas fa-shopping-cart" title="корзина"></i></a></p>
                                 </div>
                              
                          </div>


                      </div>
                     
                    </div>
                    
                    <div class="headerBottomBG d-none d-lg-block">
                         <div class="container">
                             <div class="headerBottom"> <!-- Нижняя часть хедера -->
                                 <div class="location d-flex flex-row text-white">
                                     <p class="mb-0 d-flex align-items-center"><i class="fas fa-map-marker me-2 fs-6 "></i></p><p class="mb-0"><select class="select-header" aria-label="Default select example">
                                        <option selected>Москва</option>
                                        <option value="1">Санкт-Петербург</option>
                                        <option value="2">Нижний Новгород</option>
                                        <option value="3">Казань</option>
                                      </select></p>
                                 </div>
                                 
                                 
                                 <div class="cartBlock d-flex flex-row fs-2 text-white">
                                     <p class="mb-0 me-4"><a href="../pages/favourite.php"><i class="fas fa-heart"></i></a></p>
                                     <p class="mb-0"><a href="../pages/cart.php"><i class="fas fa-shopping-cart position-relative" title="корзина"></i>
                                   
                                    </a></p>
                                 </div>
                             </div>
                         </div>
                     </div>
                  </nav>

          </header>