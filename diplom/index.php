<?php
session_start();
include('public/blocks/header.php');
include('public/database/id.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monkie Store — интернет магазин по мульфильму "LEGO Monkie Kid"!</title>
  <link rel="stylesheet" type="text/css" href="public\css\main.css">
  <link rel="stylesheet" type="text/css" href="public\css\media.css">
</head>

<body>
  <main>
    <div class="cat-slider">
      <div class="categories">
        <a href="#prod" class="category" name="default">
          <img src="public\img\категории\процент.svg" alt="" class="categ-icon">
          <p class="categ-text">Хит продаж</p>
        </a>
        <a href="#prod" class="category">
          <img src="public\img\категории\огонь.svg" alt="" class="categ-icon">
          <p class="categ-text">Горящие скидки</p>
        </a>
        <a href="#" class="category">
          <img src="public\img\категории\ракета.svg" alt="" class="categ-icon">
          <p class="categ-text">Экспресс доставка</p>
        </a>
        <a href="#" class="category">
          <img src="public\img\категории\планета.svg" alt="" class="categ-icon">
          <p class="categ-text">Из-за рубежа</p>
        </a>
        <a href="#" class="category">
          <img src="public\img\категории\брелок.svg" alt="" class="categ-icon">
          <p class="categ-text">Брелки и значки</p>
        </a>
        <a href="#" class="category">
          <img src="public\img\категории\игрушка.svg" alt="" class="categ-icon">
          <p class="categ-text">Плюшевые игрушки</p>
        </a>
        <a href="#" class="category">
          <img src="public\img\категории\посох.svg" alt="" class="categ-icon">
          <p class="categ-text">Аксессуары</p>
        </a>
        <a href="#" class="category">
          <img src="public\img\категории\лего.svg" alt="" class="categ-icon">
          <p class="categ-text">Наборы LEGO</p>
        </a>
      </div>
      <img src="public\img\баннер.png" alt="" class="slider">
    </div>
    <div class="main-content">
      <p class="main-h">Рекомендуемые вам</p>
      <div id="default" class="def">
        <div class="products">
          <?php
          include('public/database/dbconnect.php');
          include("public/database/rating.php");
          $result = $mysqli->query("SELECT DISTINCT * FROM products WHERE quantity != 0 LIMIT 0,5");
          while ($myrow = $result->fetch_assoc()) {
            $idprod = $myrow['id_product'];
            $div .= '<a href="' . "product.php?id=$idprod" . '" class="product">';
            $div .= '<img src="' . $myrow['picture'] . '" alt="" class="product-img">';
            $div .= '<div class="product-info">';
            $div .= '<p class="cost">' . $myrow['cost'] . ' ₽</p>';
            $div .= '<p class="product-name">' . $myrow['name_product'] . '</p>';
            $div .= '<div class="star-review"><div class="s-r-block">';
            $div .= '<img src="public\img\звезда.svg" alt="" class="s-r-icon"><p class="s-r-num">' . $rating . '</p></div>';
            $div .= '<div class="s-r-block">';
            $div .= '<img src="public\img\отзыв.svg" alt="" class="s-r-icon"><p class="s-r-num">' . $rev . ' </p></div>';
            $div .= '</div></div></a>';
          }
          echo $div;
          ?>
        </div>
        <button value="default" class="btn main-button" id="button" onclick="showDefault()">Показать еще</button>
      </div>

      <div class="hidden" value="prod" id="prod_def">
        <?php
        include('public\database\products_default.php');
        ?>
      </div>

    </div>
  </main>
  <?php
  include('public/blocks/footer.php');
  ?>
</body>
<script>
  //document.getElementById('button').onclick = showDefault();
  function showDefault() {
    const def = document.getElementById('default');
    const prod = document.getElementById('prod_def');
    def.classList = "hidden";
    def.remove();
    prod.classList = "products";
    def.value = '';
    prod.value = '';
  }

</script>

</html>