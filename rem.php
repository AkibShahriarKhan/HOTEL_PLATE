<?php
  session_start();

  $ar = $_SESSION['arr'];

  $key = $_POST['r'];

  unset($ar[$key]);

  $_SESSION['arr'] = $ar;

  header("Location: room_view.php?hotelName=".$_SESSION['hn']);
  exit;
 ?>
