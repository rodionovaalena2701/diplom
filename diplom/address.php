<?php
session_start();
include('public/database/id.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Адрес</title>
  <link rel="stylesheet" type="text/css" href="public/css/main.css">
  <link rel="stylesheet" type="text/css" href="public/css/media.css">
</head>

<body>
  <form action="public/database/add_address.php" class="form" method="post">
    <h1 class="form-title">Адрес</h1>
    <input name="address" type="text" class="input form-input" placeholder="Введите адрес" required>
    <?php
    echo '<input name="user" type="hidden" value="' . $id . '">';
    ?>
    <input name="submit" type="submit" value="Добавить адрес" class="btn submit">
    <div class="form-links">
      <?php
      echo '<a href="' . "cabinet.php?id=$id" . '" class="form-link">Назад</a>';
      ?>
    </div>
  </form>
</body>

</html>