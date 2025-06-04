<?php
session_start();
if (isset($_POST['login'])) {
  $login = $_POST['login'];
  if ($login == '') {
    unset($login);
  }
}
if (isset($_POST['pass'])) {
  $pass = $_POST['pass'];
  if ($pass == '') {
    unset($pass);
  }
}
if (empty($login) or empty($pass)) {
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
include('dbconnect.php');
$result = $mysqli->query("SELECT * FROM users WHERE login = '$login' ");
$myrow = $result->fetch_assoc();
if (empty($myrow['login'])) {
  exit("Введеный вами логин или пароль неверный.");
} else {
  if ($myrow['password'] == $pass) {
    $_SESSION['login'] = $myrow['login'];
    $_SESSION['id'] = $myrow['id_user'];
    $id = $myrow['id_user'];
    header("Location: ../../cabinet.php?id=$id");
    include('id.php');
  } else {
    exit("Введенный вами логин или пароль неверный.");
  }
}
?>