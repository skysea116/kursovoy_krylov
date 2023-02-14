<?php
  $title = 'Спасибо за заказ';
  require_once('../parts/header.php');
?>

<main>
     <div class="container thanks-cont mt-5">
        <div class="thanks-blck">
            <?php
            if(isset($_COOKIE['user_name'])) { //если пользователь авторизован
            ?>
                <h2 class="fs-2"><?=$_COOKIE['user_name']?>, спасибо за заказ!</h2>
            <?php } else {?>
                <h2 class="fs-2">Спасибо за заказ!</h2>
            <?php }?>
            <p class="fs-4">В ближайшее время с вами свяжется менеджер для уточнения деталей.</p>
        </div>
     </div>
</main>

<?php
  require_once('../parts/footer.php');
?>