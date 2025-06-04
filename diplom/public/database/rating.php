<?php
session_start();
include('dbconnect.php');
include('id.php');
$rating = 5;
$count = 1;
$review = 0;
$result = $mysqli->query("SELECT * FROM reviews, orders, products WHERE reviews.id_order = '$id' AND reviews.id_order = orders.id_order AND products.id_product = orders.id_product");
while ($myrow = $result->fetch_assoc()) {
  $rating = $rating + $myrow['stars'];
  if ($count != 1)
    $review++;
  $count++;
  $rating = $rating / $count;
}
if ($review > 9) {
  $ed = $review % 10;
}

if ($ed == 1 || $review == 1)
  $rev = "{$review} отзыв";
else if ($ed == 2 || $ed == 3 || $ed == 4 || $review == 2 || $review == 3 || $review == 4)
  $rev = "{$review} отзыва";
else if ($review == 11 || $review == 12 || $review == 13 || $review == 14)
  $rev = "{$review} отзывов";
else
  $rev = "{$review} отзывов";
?>