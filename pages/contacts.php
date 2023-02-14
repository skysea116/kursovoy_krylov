<?php
  $title = 'Контакты';
  require_once('../parts/header.php');
?>

<main>
     <div class="container">
        <div class="map mt-lg-5"> <!--Блок карты-->
          <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7cce1760f14308007e922961f52ead0b229983265d7f34acc44aa44a778c5ddd&amp;width=100%25&amp;height=472&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <div class="contacts-h">
            <h2 class="fs-2 mt-4">Наши контакты:</h2>
        </div>
        <div class="row contacts mt-3 fs-5">
          <div class="col-lg-3 col-md-4 col-sm-6 mb-md-0 mb-3">
            <h3 class="mb-2">Офис компании:</h3>
            <p>г. Москва, ул. Снежная, д. 28</p>
            <p>Email: bikeworld@yandex.ru</p>
            <p>Телефон: 8(800)344-05-05</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-md-0 mb-3">
            <h3 class="mb-2">Магазин Bike World #1</h3>
            <p>г. Москва, ул. Староватутинский проезд, д. 6</p>
            <p>Телефон: 8(495)033-21-17</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-md-0 mb-3">
            <h3 class="mb-2">Магазин Bike World #2</h3>
            <p>г. Москва, ул. Кутузовский проспект, д. 32к1</p>
            <p>Телефон: 8(495)274-37-99</p>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6">
          <h3 class="mb-2">Магазин Bike World #3</h3>
            <p>г. Москва, ул. Ломоносовский проспект, д. 23</p>
            <p>Телефон: 8(495)217-37-51</p>
          </div>
        </div>
     </div>
</main>

<?php
  require_once('../parts/footer.php');
?>