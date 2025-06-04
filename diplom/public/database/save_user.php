<?php
session_start();
if (isset($_POST['surname'])) {
  $surname = $_POST['surname'];
  if ($surname == '') {
    unset($surname);
  }
}
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  if ($name == '') {
    unset($name);
  }
}
if (isset($_POST['patronymic'])) {
  $midname = $_POST['patronymic'];
  if ($midname == '') {
    unset($midname);
  }
}
if (isset($_POST['phone'])) {
  $phone = $_POST['phone'];
  if ($phone == '') {
    unset($phone);
  }
}
if (isset($_POST['login'])) {
  $login = $_POST['login'];
  if ($login == '') {
    unset($login);
  }
}
if (isset($_POST['pass'])) {
  $password = $_POST['pass'];
  if ($password == '') {
    unset($password);
  }
}
if (isset($_POST['pass2'])) {
  $password2 = $_POST['pass2'];
  if ($password2 == '') {
    unset($password2);
  }
}
if (empty($login) or empty($password)) {
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
include('dbconnect.php');
$result = $mysqli->query("SELECT id_user FROM users WHERE login = '$login' ");
$myrow = $result->fetch_assoc();
if (!empty($myrow['id_user'])) {
  exit("Введеный вами логин уже зарегистрирован. Введите другой логин.");
}
if ($password == $password2) {
  $users = $mysqli->query("INSERT INTO users (surname, name, patronymic, phone, email, adress, login, password, nickname, avatar, role) VALUES ('$surname','$name', '$midname', '$phone', '', '', '$login', '$password', '', 'public\img\аватарки\base.svg', 'клиент')");
  $result2 = $mysqli->query("SELECT * FROM users WHERE login = '$login' ");
  $myrow2 = $result2->fetch_assoc();
  $_SESSION['login'] = $myrow2['login'];
  $_SESSION['id'] = $myrow2['id_user'];
  $id = $myrow2['id_user'];
  include('id.php');
  header("Location: ../../cabinet.php?id=$id");
} else
  print ("Пароли не совпадают. Попробуйте еще раз");

?>