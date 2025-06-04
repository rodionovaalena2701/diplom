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
</head>

<body>
  <main class="cabinet">
    <div class="prod">
      <?php
      include('public/database/dbconnect.php');
      include("public/database/rating.php");
      $result = $mysqli->query("SELECT * FROM products WHERE id_product = '$id'");
      $myrow = $result->fetch_assoc();
      $id = $myrow['id_product'];
      $div .= '<img src="' . $myrow['picture'] . '" alt="" class="prod-img">';
      $div .= '<div class="prod-info">
            <p class="prod-title">' . $myrow['name_product'] . '</p>';
      $div .= '<div class="stars">
                <img src="public\img\звезда.svg" alt="" class="star">
                <img src="public\img\звезда.svg" alt="" class="star">
                <img src="public\img\звезда.svg" alt="" class="star">
                <img src="public\img\звезда.svg" alt="" class="star">
                <img src="public\img\звезда.svg" alt="" class="star">
                <p class="star-text">' . $rating . '</p>
              </div>';
      $div .= '<div class="description">
          <p class="char">Описание</p>
          <p class="block-text">' . $myrow['description'] . '</p></div>';
      $div .= '<table class="table-prod"><tr>';
      $div .= '<td>Год создания:</td>
            <td>' . $myrow['year'] . '</td></tr>';
      $div .= '<tr><td>Страна-производитель:</td>
            <td>' . $myrow['country'] . '</td></tr></table></div>';
      $div .= '<div class="prod-action">
        <div class="prod-cost">' . $myrow['cost'] . ' ₽</div>';
      $div .= '<p class="one-text">Цена за 1 шт.</p>
        <div class="description dop">
          <p class="here-text">В наличии: ' . $myrow['quantity'] . '</p></div>';
      $div .= '<div class="btns">';
      $div .= '<form action="' . "public\database\add_cart.php?id=$id" . '" method="post">';
      $div .= '<input type="hidden" name="name" value="' . $myrow['name_product'] . '">';
      $div .= '<input type="submit" class="sub btn" value="В корзину"></form>';
      $div .= '<a href="' . "order.php?id=$id" . '"><button class="sub btn">Купить сейчас</button></a>';
      $div .= '</div></div>';
      echo $div;
      ?>
    </div>
    <div class="review-block">
      <p class="block-title">Отзывы</p>
      <?php
      $result2 = $mysqli->query("SELECT * FROM reviews, orders, users, products WHERE reviews.id_order = '$id' AND reviews.id_order = orders.id_order AND orders.id_product = products.id_product AND orders.id_client  = users.id_user");
      $reviews .= '';
      while ($myrow2 = $result2->fetch_assoc()) {
        $reviews .= '<div class="review">';
        $reviews .= '<img src="' . $myrow2['avatar'] . '" alt="" class="review-ava">';
        $reviews .= '<div class="review-info">
            <div class="review-head">';
        if ($myrow2['nickname'] != NULL) {
          $reviews .= '<p class="review-text">' . $myrow2['nickname'] . '</p>';
        } else {
          $reviews .= '<p class="review-text">' . $myrow2['name'] . '</p>';
        }
        $reviews .= '<div class="stars">
            <p class="star-r-text">' . $myrow2['stars'] . '</p>';
        $reviews .= '<img src="public\img\звезда.svg" alt="" class="star"></div>';
        $reviews .= '<p class="theme">' . $myrow2['theme'] . '</p></div>';
        $reviews .= '<p class="rev-text">' . $myrow2['desc'] . '</p>
          </div></div>';
      }
      echo $reviews;
      ?>
    </div>

  </main>

  <?php
  include('public/blocks/footer.php');
  ?>
</body>

</html>