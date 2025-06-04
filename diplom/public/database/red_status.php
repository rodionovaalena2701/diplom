<?php
session_start();
include('id.php');
if (isset($_POST['status'])) {
    $status = $_POST['status'];
    if ($status == '') {
        unset($status);
    }
}
if (isset($_POST['order'])) {
    $order = $_POST['order'];
    if ($order == '') {
        unset($order);
    }
}
if (empty($status)) {
    exit("Вы не выбрали статус. Вернитесь назад и попробуйте еще раз.");
}
include('dbconnect.php');

$result = $mysqli->query("UPDATE orders SET id_status_order = '$status' WHERE id_order = '$order'");

header("Location: ../../admin_panel.php?id=$id");
?>