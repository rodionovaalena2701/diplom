<?php
session_start();
include('public/database/id.php');
include('public/blocks/header.php');
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
  <main class="cabinet">
    <div class="main-cab">
      <p class="main-h">Личный кабинет</p>
      <?php
      echo $ind = '<a href="' . "index.php?id=$id" . '" class="form-link">Вернуться в меню</a>';
      ?>
    </div>

    <div class="cab-info">
      <div class="acc-info">
        <?php
        $result = $mysqli->query("SELECT * FROM users WHERE login = '$log'");
        $myrow = $result->fetch_assoc();
        $client .= '<img src="' . $myrow['avatar'] . '" alt="" class="cab-img">';
        $client .= '<div class="nick-red">';
        if ($myrow['nickname'] != NULL) {
          $client .= '<p class="cab-name">' . $myrow['nickname'] . '</p>';
        } else {
          $client .= '<p class="cab-name">' . $myrow['surname'] . ' ' . $myrow['name'] . ' ' . $myrow['patronymic'] . '</p>';
        }
        $client .= '<a href="user.php?id=' . $id . '"><img src="public\img\карандаш.svg" alt="" class="red-icon"></a></div>';
        echo $client; ?>
        <div class="cab-menu">
          <input type="radio" value="main" name="menu-input" id="radio1" checked onclick="showBlock('main')">
          <label for="radio1" class="cab-text">Главная</label>
          <input type="radio" value="info" name="menu-input" id="radio2" onclick="showBlock('info')">
          <label for="radio2" class="cab-text">Личная информация</label>
          <?php
          echo $menu = '<a href="' . "cart.php?id=$id" . '" class="cab-text">Моя корзина</a>'; ?>
          <input type="radio" value="orders" name="menu-input" id="radio3" onclick="showBlock('orders')">
          <label for="radio3" class="cab-text">Мои заказы</label>
          <input type="radio" value="reviews" name="menu-input" id="radio4" onclick="showBlock('reviews')">
          <label for="radio4" class="cab-text">Мои отзывы</label>
          <?php
          if ($myrow['role'] == 'администратор') {
            $admin .= '<a href="' . "add_prod.php?id=$id" . '" class="cab-text">Добавить новый товар</a>';
            $admin .= '<a href="' . "admin_panel.php?id=$id" . '" class="cab-text">Панель заказов</a>';
            echo $admin;
          } ?>
        </div>
      </div>
      <div class="other-info">

        <div id="block1">
          <p class="block-title">Действующие заказы</p>
          <div class="now-orders">
            <?php
            $result2 = $mysqli->query("SELECT * FROM orders, products, `status`, users WHERE orders.id_product = products.id_product AND orders.id_client  = users.id_user AND orders.id_status_order = status.id_status AND users.login = '$log'");
            $myrow2 = $result2->fetch_assoc();
            while ($myrow2 = $result2->fetch_assoc()) {
              $order .= '<div class="now-order">';
              $order .= '<img src="' . $myrow2['picture'] . '" alt="" class="order-img">';
              $order .= '<div class="n-o-info">';
              $order .= '<p class="block-title">' . $myrow2['status'] . '</p>';
              $order .= '<p class="ord-prod-name">' . $myrow2['name_product'] . '</p>
              </div>
            </div>';
            }
            echo $order; ?>
          </div>
          <button class="btn cab-button" onclick="showBlock('orders')">Показать другие заказы</button>
        </div>

        <div id="block2">
          <p class="block-title">Основная информация</p>
          <?php
          $info .= '<p class="block-text">ФИО: ' . $myrow['surname'] . ' ' . $myrow['name'] . ' ' . $myrow['patronymic'] . '</p>';
          if ($myrow['nickname'] != NULL) {
            $info .= '<p class="block-text">Псевдоним: ' . $myrow['nickname'] . '</p>';
          } else {
            $info .= '<p class="block-text">Псевдоним: нет</p>';
          }
          $info .= '<p class="block-text">Телефон: ' . $myrow['phone'] . '</p>';
          if ($myrow['email'] != NULL) {
            $info .= '<p class="block-text">Почта: ' . $myrow['email'] . '</p>';
          } else {
            $info .= '<p class="block-text">Почта: нет</p>';
          }
          if ($myrow['adress'] != '') {
            $info .= '<p class="block-text">Адрес для доставки: ' . $myrow['adress'] . '</p>';
          } else {
            $info .= '<p class="block-text">Адрес для доставки: <a href="' . "address.php?id=$id" . '" class="form-link">внести адрес</a></p>';
          }
          $info .= '<a href="user.php?id=' . $id . '"><button class="btn cab-button">Редактировать</button></a>';
          echo $info;
          ?>

        </div>

        <div id="block3">
          <p class="block-title">Активные заказы</p>
          <div class="archive">
            <?php
            $result2 = $mysqli->query("SELECT * FROM orders, products, `status`, users WHERE orders.id_product = products.id_product AND orders.id_client  = users.id_user AND orders.id_status_order = status.id_status AND users.login = '$log'");
            $myrow2 = $result2->fetch_assoc();
            while ($myrow2 = $result2->fetch_assoc()) {
              $active .= '<div class="arch-order"><div class="arch-info">';
              $active .= '<p class="block-title">' . $myrow2['name_product'] . '</p>';
              $active .= '<p class="arch-text">Количество: ' . $myrow2['quantity_product'] . ' шт.</p>';
              $active .= '<p class="arch-text">Оплачено: ' . $myrow2['order_cost'] . ' ₽</p>';
              $active .= '<div class="status active">' . $myrow2['status'] . '</div></div>';
              $active .= '<img src="' . $myrow2['picture'] . '" alt="" class="arch-img"></div>';
            }
            echo $active;
            ?>
          </div>
          <p class="block-title">Выполненные заказы</p>
          <div class="archive">
            <?php
            $result3 = $mysqli->query("SELECT * FROM orders, products, `status`, users WHERE orders.id_product = products.id_product AND orders.id_client  = users.id_user AND orders.id_status_order = status.id_status AND users.login = '$log' AND orders.id_status_order = 5");
            $myrow3 = $result3->fetch_assoc();
            while ($myrow3 = $result3->fetch_assoc()) {
              $done .= '<div class="arch-order"><div class="arch-info">';
              $done .= '<p class="block-title">' . $myrow3['name_product'] . '</p>';
              $done .= '<p class="arch-text">Количество: ' . $myrow3['quantity_product'] . ' шт.</p>';
              $done .= '<p class="arch-text">Оплачено: ' . $myrow3['order_cost'] . ' ₽</p>';
              $done .= '<div class="status done">' . $myrow3['status'] . '</div></div>';
              $done .= '<img src="' . $myrow3['picture'] . '" alt="" class="arch-img"></div>';
            }
            echo $done;
            ?>
          </div>
        </div>

        <div id="block4">
          <p class="block-title">Отзывы</p>
          <?php
          $result3 = $mysqli->query("SELECT * FROM reviews, orders, users, products WHERE reviews.id_order = orders.id_order AND orders.id_product = products.id_product AND orders.id_client  = users.id_user AND users.login = '$log'");
          $reviews .= '';
          while ($myrow3 = $result3->fetch_assoc()) {
            $reviews .= '<div class="review">';
            $reviews .= '<img src="' . $myrow3['avatar'] . '" alt="" class="review-ava">';
            $reviews .= '<div class="review-info">
            <div class="review-head">';
            if ($myrow3['nickname'] != NULL) {
              $reviews .= '<p class="review-text">' . $myrow3['nickname'] . '</p>';
            } else {
              $reviews .= '<p class="review-text">' . $myrow3['name'] . '</p>';
            }
            $reviews .= '<div class="stars">
            <p class="star-r-text">' . $myrow3['stars'] . '</p>';
            $reviews .= '<img src="public\img\звезда.svg" alt="" class="star"></div>';
            $reviews .= '<p class="theme">' . $myrow3['theme'] . '</p></div>';
            $reviews .= '<p class="rev-text">' . $myrow3['desc'] . '</p>
          </div></div>';
          }
          echo $reviews;
          ?>
        </div>

      </div>
    </div>
  </main>
  <?php
  include('public/blocks/footer.php');
  ?>
</body>
<script>
  function showBlock(type) {
    const main = document.getElementById('block1');
    const info = document.getElementById('block2');
    const order = document.getElementById('block3');
    const review = document.getElementById('block4');
    if (type === 'main') {
      main.classList = " ";
      info.classList = "hidden";
      order.classList = "hidden";
      review.classList = "hidden";
      main.value = '';
      info.value = '';
      order.value = '';
      review.value = '';
    } else if (type === 'info') {
      main.classList = "hidden";
      info.classList = " ";
      order.classList = "hidden";
      review.classList = "hidden";
      main.value = '';
      info.value = '';
      order.value = '';
      review.value = '';
    }
    else if (type === 'orders') {
      main.classList = "hidden";
      info.classList = "hidden";
      order.classList = "";
      review.classList = "hidden";
      main.value = '';
      info.value = '';
      order.value = '';
      review.value = '';
    }
    else if (type === 'reviews') {
      main.classList = "hidden";
      info.classList = "hidden";
      order.classList = "hidden";
      review.classList = " ";
      main.value = '';
      info.value = '';
      order.value = '';
      review.value = '';
    }
  }
  document.addEventListener('DOMContentLoaded', () => {
    showBlock('main');
  });
</script>

</html>