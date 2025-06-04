<?php
session_start();
include('dbconnect.php');
include("rating.php");
$result = $mysqli->query("SELECT DISTINCT * FROM products WHERE quantity != 0");
while ($myrow = $result->fetch_assoc()) {
  $idprod = $myrow['id_product'];
  $div .= '<a href="' . "product.php?id=$idprod" . '" class="product">';
  $div .= '<img src="' . $myrow['picture'] . '" alt="" class="product-img">';
  $div .= '<div class="product-info">';
  $div .= '<p class="cost">' . $myrow['cost'] . ' ₽</p>';
  $div .= '<p class="product-name">' . $myrow['name_product'] . '</p>';
  $div .= '<div class="star-review"><div class="s-r-block">';
  $div .= '<img src="public\img\звезда.svg" alt="" class="s-r-icon"><p class="s-r-num">' . $rating . '</p></div>';
  $div .= '<div class="s-r-block">';
  $div .= '<img src="public\img\отзыв.svg" alt="" class="s-r-icon"><p class="s-r-num">' . $rev . ' </p></div>';
  $div .= '</div></div></a>';
}
echo $div;
?>