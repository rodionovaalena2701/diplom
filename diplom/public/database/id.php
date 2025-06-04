<?php
if (isset($_GET['id'])) {
  global $varid;
  $id = $_GET['id'];
  $log = $_SESSION['login'];
}
$GLOBALS['id'] = $id;
$GLOBALS['login'] = $log;
?>