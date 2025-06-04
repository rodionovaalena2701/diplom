<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Monkie Store — интернет магазин по мульфильму "LEGO Monkie Kid"!</title>
  <link rel="stylesheet" type="text/css" href="public\css\main.css">
</head>

<body>
  <header>
    <a href="index.php" class="icons">
      <img src="public\img\icon.png" alt="icon" class="header-icon">
      <img src="public\img\logo.png" alt="logo" class="header-logo">
    </a>
    <input type="text" class="searching input" placeholder="Поиск товара...">
    <?php
    if (empty($_SESSION['login'])) {
      ?>
      <div class="navigation">
        <a href="registr.html" class="menu-link"><img src="public\img\регистрация.svg" alt=""
            class="menu-button">Регистрация</a>
        <a href="author.html" class="menu-link"><img src="public\img\войти.svg" alt="" class="menu-button">Войти</a>
      </div>
      <?php
    } else {
      $head .= '<div class="navi">
        <a href="' . "cabinet.php?id=$id" . '" class="menu-link"><img src="public\img\кабинет.svg" alt="" class="menu-button">Кабинет</a>';
      $head .= '<a href="' . "cart.php?id=$id" . '" class="menu-link"><img src="public\img\корзина.svg" alt="" class="menu-button">Корзина</a>';
      $head .= '<a href="public/database/exit.php" class="menu-link"><img src="public\img\выйти.svg" alt=""
            class="menu-button">Выйти</a>
      </div>';
      echo $head;
    }
    ?>
  </header>
</body>

</html>