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
  <form action="public/database/red_user.php" class="form" method="post">
    <h1 class="form-title">Редактировать данные</h1>
    <?php
    $result = $mysqli->query("SELECT * FROM users WHERE login = '$log'");
    $myrow = $result->fetch_assoc();
    $user .= '<input name="surname" type="text" size="15" maxlength="15" class="input form-input" placeholder="Фамилия" value="' . $myrow['surname'] . '" required>';
    $user .= '<input name="name" type="text" size="15" maxlength="15" class="input form-input" placeholder="Имя" value="' . $myrow['name'] . '" required>';
    $user .= '<input name="patronymic" type="text" size="15" maxlength="15" class="input form-input" placeholder="Отчество" value="' . $myrow['patronymic'] . '">';
    $user .= '<input name="phone" type="tel" pattern="[\+]\d{1}\s[\(]\d{3}[\)]\s\d{3}[\-]\d{2}[\-]\d{2}" minlength="18" maxlength="18" class="input form-input" placeholder="Телефон" value="' . $myrow['phone'] . '" required>';
    $user .= '<input name="email" type="email" class="input form-input" placeholder="Почта" value="' . $myrow['email'] . '">';
    $user .= '<input name="address" type="text" class="input form-input" placeholder="Введите адрес" value="' . $myrow['adress'] . '" required>';
    $user .= '<input name="login" type="text" size="15" maxlength="15" class="input form-input" placeholder="Логин" value="' . $myrow['login'] . '" required>';
    $user .= '<input name="pass" type="password" class="input form-input" size="15" maxlength="15" placeholder="Пароль" value="' . $myrow['password'] . '" required>';
    $user .= '<input name="nickname" type="text" class="input form-input" placeholder="Псевдоним" value="' . $myrow['nickname'] . '">';
    $user .= '<input name="avatar" type="text" class="input form-input" value="' . $myrow['avatar'] . '">';
    echo $user;
    ?>
    <input name="submit" type="submit" value="Подтвердить" class="btn submit">
    <div class="form-links">
      <?php
      echo '<a href="' . "cabinet.php?id=$id" . '" class="form-link">Назад</a>';
      ?>
    </div>
  </form>
</body>

</html>