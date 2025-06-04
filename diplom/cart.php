<?php
session_start();
include('public/blocks/header.php');
include('public/database/id.php');
include('public/database/dbconnect.php');
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
  <main class="main-content">
    <p class="block-title">Корзина</p>
    <?php
    $result = $mysqli->query("SELECT * FROM cart, users, products WHERE cart.id_product_cart = products.id_product AND cart.id_client_cart = users.id_user AND users.login = '$log'");
    if ($result == NULL) {
      $div .= '<p class="block-text">В корзине ничего нет!</p>';
    } else {
      while ($myrow = $result->fetch_assoc()) {
        $div .= '<p class="block-text">Товар: ' . $myrow['name_product'] . '</p>';
        $div .= '<p class="block-text">Количество: 1</p>';
        $div .= '<a href="order.php?id=' . $myrow['id_product'] . '" style="text-decoration: none"><button class="btn submit">Оформить заказ</button></a>';
      }
    }
    echo $div;

    if (isset($_POST['clear_cart'])) {
      $clear = $mysqli->query("DELETE FROM cart WHERE id_client_cart	= '$id'");
      echo 'Корзина успешно очищена.';
    }

    ?>
    <form class="clear" action="cart.php" method="post">
      <input type="hidden" name="clear_cart" value="1">
      <input type="submit" class="submit btn" value="Очистить корзину">
    </form>
  </main>
  <?php
  include('public/blocks/footer.php');
  ?>
</body>

</html>