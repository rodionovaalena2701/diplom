<?php
session_start();
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  if ($name == '') {
    unset($name);
  }
}
if (empty($name)) {
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
include('dbconnect.php');
include('id.php');

$result = $mysqli->query("SELECT * FROM users WHERE login = '$log'");
$myrow = $result->fetch_assoc();
$user = $myrow['id_user'];
$cart = $mysqli->query("INSERT INTO cart (id_client_cart, id_product_cart, cart_quantity) VALUES ('$user', '$id', 1)");
header("Location: ../../cart.php?id=$user");
?>