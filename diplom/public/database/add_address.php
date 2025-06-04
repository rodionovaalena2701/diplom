<?php
session_start();
include('id.php');
if (isset($_POST['address'])) {
  $address = $_POST['address'];
  if ($address == '') {
    unset($address);
  }
}
if (isset($_POST['user'])) {
  $user = $_POST['user'];
  if ($user == '') {
    unset($user);
  }
}

if (empty($address)) {
  exit("Вы ввели не всю информацию. Вернитесь назад и попробуйте еще раз.");
}
include('dbconnect.php');

$result = $mysqli->query("UPDATE users SET adress = '$address' WHERE id_user = '$user'");
header("Location: ../../cabinet.php?id=$id");