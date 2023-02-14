<?php
  $title = 'Изменение данных пользователя';
  require_once('../parts/header.php');

  $role_id = $_COOKIE['role_id'];

  if($role_id == 1) { //если пользователь - админ
     $id = $_GET['id'];
  } else { //иначе
     $id = $_COOKIE['user_id'];
  }


  require('../actions/connection.php');

     $result = $connection->query("SELECT * FROM `users` WHERE `user_id` = $id");
    $user = $result->fetch_assoc();
?>

<main>
     <div class="container">
          <!--Форма изменения пользовательских данных-->
          <form class="reg-form mt-4"  action="../actions/change_userdata.php?id=<?=$id?>" method="POST">
               <div class="mb-3">
                    <label for="exampleInput1" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="exampleInput1" name="name" value="<?=$user['user_name']?>">
               </div>
               <div class="mb-3">
                    <label for="exampleInput2" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="exampleInput2" name="surname" value="<?=$user['user_surename']?>">
               </div>
               <div class="mb-3">
                    <label for="exampleInput3" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="exampleInput3" name="login" value="<?=$user['user_login']?>">
               </div>
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?=$user['user_email']?>">
               </div>
               <div class="mb-3">
                    <label for="exampleInput4" class="form-label">Телефон</label>
                    <input type="tel" class="form-control" id="exampleInput4" name="phone" value="<?=$user['user_phone']?>">
               </div>
               <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="examplePassword1" name="pass">
               </div>
               <button type="submit" class="btn btn-primary">Изменить</button>
          </form>
     </div>
</main>

<?php
  require_once('../parts/footer.php');
?>