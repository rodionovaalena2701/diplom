<?php
session_start();
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  if ($name == '') {
    unset($name);
  }
}
if (isset($_POST['desc'])) {
  $mdesc = $_POST['desc'];
  if ($desc == '') {
    unset($desc);
  }
}
if (isset($_POST['country'])) {
  $country = $_POST['country'];
  if ($country == '') {
    unset($country);
  }
}
if (isset($_POST['year'])) {
  $year = $_POST['year'];
  if ($year == '') {
    unset($year);
  }
}
if (isset($_POST['quantity'])) {
  $quantity = $_POST['quantity'];
  if ($quantity == '') {
    unset($quantity);
  }
}
if (isset($_POST['cost'])) {
  $cost = $_POST['cost'];
  if ($cost == '') {
    unset($cost);
  }
}
if (isset($_POST['picture'])) {
  $picture = $_POST['picture'];
  if ($picture == '') {
    unset($picture);
  }
}
include('id.php');
include('dbconnect.php');
$result = $mysqli->query("SELECT * FROM products WHERE name_product = '$name' ");
$myrow = $result->fetch_assoc();
if (!empty($myrow['name_product'])) {
  exit("Введеный вами товар уже есть.");
}
$products = $mysqli->query("INSERT INTO products (name_product, description, country, year, quantity, cost, picture) VALUES ('$name', '$desc', '$country', '$year', '$quantity', '$cost', '$picture')");
header("Location: ../../cabinet.php?id=$id");
?>