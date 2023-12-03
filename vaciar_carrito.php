<?php
session_start();

if (isset($_POST['vaciar_carrito'])) {
  $_SESSION['carrito'] = array();
}

// Redirige al usuario de vuelta a la página del carrito
header("location: ".$_SERVER['HTTP_REFERER']."");
?>