<?php
session_start();
include('id.php');
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
if (isset($_POST['email'])) {
  $mail = $_POST['email'];
  if ($mail == '') {
    unset($mail);
  }
}
if (isset($_POST['address'])) {
  $address = $_POST['address'];
  if ($address == '') {
    unset($address);
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
if (isset($_POST['nickname'])) {
  $nickname = $_POST['nickname'];
  if ($nickname == '') {
    unset($nickname);
  }
}
if (isset($_POST['avatar'])) {
  $avatar = $_POST['avatar'];
  if ($avatar == '') {
    unset($avatar);
  }
}
if (empty($surname) or empty($name) or empty($phone) or empty($login) or empty($password)) {
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
include('dbconnect.php');
$result = $mysqli->query("UPDATE users SET surname = '$surname', name = '$name', patronymic = '$midname', phone = '$phone', email = '$mail', adress = '$address', login = '$login', password = '$password', nickname = '$nickname', avatar = '$avatar' WHERE id_user = '$id'");
$log = $login;
header("Location: ../../cabinet.php?id=$id");
?>