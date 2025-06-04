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
    <?php
    $user .= '<div class="main-cab">';
    $user .= '<a href="' . "index.php?id=$id" . '" class="form-link">На главную страницу</a>';
    $user .= '<a href="' . "cabinet.php?id=$id" . '" class="form-link">Обратно в кабинет</a>
    </div>';
    $adm = $mysqli->query("SELECT * FROM users WHERE id_user = '$id'");
    $admrow = $adm->fetch_assoc();
    $user .= '<p class="main-h">Администратор: ' . $admrow['nickname'] . '</p>';
    echo $user;
    ?>
    <div class="adm-orders">
      <?php
      $result = $mysqli->query("SELECT * FROM orders, products, `status`, users WHERE orders.id_product = products.id_product AND orders.id_client  = users.id_user AND orders.id_status_order = status.id_status");
      while ($myrow = $result->fetch_assoc()) {
        $order .= '<div class="adm-order"><p class="main-h">Заказ №' . $myrow['id_order'] . '</p>';
        $order .= '<div class="order-blocks"><div class="order-user"><p class="block-title">' . $myrow['surname'] . ' ' . $myrow['name'] . ' ' . $myrow['patronymic'] . '</p>';
        $order .= '<p class="block-text">' . $myrow['adress'] . '</p></div>';
        $order .= '<div class="order-dan"><p class="block-title">Контактные данные:</p><p class="block-text">' . $myrow['phone'] . '</p>';
        $order .= '<p class="block-text">' . $myrow['email'] . '</p></div>';
        $order .= '<div class="ord-info"><div><p class="block-title">' . $myrow['name_product'] . '</p>';
        $order .= '<p class="block-text">' . $myrow['quantity_product'] . ' шт. </p></div>';
        $order .= '<img src="' . $myrow['picture'] . '" alt="" class="ord-img"></div>';
        if ($myrow['id_status_order'] == 5 or $myrow['id_status_order'] == 6) {
          $order .= '<div class="adm-status">' . $myrow['status'] . '</div></div></div>';
        } else if ($myrow['id_status_order'] == 1 or $myrow['id_status_order'] == 2 or $myrow['id_status_order'] == 3 or $myrow['id_status_order'] == 4) {
          $order .= '<form action="public\database\red_status.php" method="post" class="adm-form">';
          $order .= '<div class="adm-status">' . $myrow['status'] . '</div>';
          $order .= '<select name="status" id="status" class="adm-select">';
          $order .= '<option disabled selected>Новый статус...</option>
        <option value="1">Собирается</option>
        <option value="2">Отдан в доставку</option>
        <option value="3">В стране назначения</option>
        <option value="4">В пункте выдачи</option>
        <option value="5">Выдан</option>
        <option value="6">Отменён</option></select>';
          $order .= '<input type="hidden" name="order" value="' . $myrow['id_order'] . '">';
          $order .= '<input type="submit" class="btn cab-button" value="Изменить статус" style=" width: 230px;"></form></div></div>';
        }

      }
      echo $order;
      ?>
    </div>
  </main>

  <?php
  include('public/blocks/footer.php');
  ?>
</body>

</html>