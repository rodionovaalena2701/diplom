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
  <link rel="stylesheet" type="text/css" href="css\style.css">
</head>

<body>
  <main class="main-content">

    <p class="block-title">Оформление заказа</p>

    <?php
    include('public/database/dbconnect.php');

    $result = $mysqli->query("SELECT * FROM products WHERE id_product = '$id'");
    $myrow = $result->fetch_assoc();
    $id = $myrow['id_product'];
    if ($k == NULL) {
      $div .= '<form action="' . "public/database/add_order.php?id=$id" . '" method="post" oninput="out.value=(number.value*' . $myrow['cost'] . ')">';
      $div .= '<p>Продукт: ' . $myrow['name_product'] . '</p>';
      $div .= '<input name="number" type="number" min="1" max="' . $myrow['quantity'] . '" class="input form-input" placeholder="Количество желаемого товара" required>';
      $div .= '<p>Сумма: <output name="out">0</output>  ₽</p>';
      $div .= '<input type="submit" class="submit btn" value="Оформить заказ">';
    }

    echo $div;
    ?>
    </form>

  </main>
  <?php
  include('public/blocks/footer.php');
  ?>
</body>

</html>