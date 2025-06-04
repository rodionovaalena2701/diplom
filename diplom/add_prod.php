<?php
session_start();
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
  <form action="public/database/new_prod.php" class="form" method="post">
    <h1 class="form-title">Добавить товар</h1>
    <input name="name" type="text" class="input form-input" placeholder="Название продукта" required>
    <input name="desc" type="text" class="input form-input" placeholder="Описание товара" required>
    <input name="country" type="text" size="15" maxlength="15" class="input form-input"
      placeholder="Страна-производитель" required>
    <input name="year" type="number" minlength="4" maxlength="4" class="input form-input" placeholder="Год производства"
      required>
    <input name="quantity" type="number" class="input form-input" placeholder="Количество на складе" required>
    <input name="cost" type="number" class="input form-input" placeholder="Цена товара" required>
    <input name="picture" type="text" class="input form-input" placeholder="Картинка" required>
    <input name="submit" type="submit" value="Подтвердить" class="btn submit">
    <div class="form-links">
      <?php
      echo '<a href="' . "cabinet.php?id=$id" . '" class="form-link">Назад</a>';
      ?>
    </div>
  </form>
</body>

</html>