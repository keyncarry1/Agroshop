<?php
session_start();
include_once 'config/config.php';

if (isset($_POST['id_producto'], $_POST['pro_nombre'], $_POST['pro_imagen'], $_POST['pro_precio'], $_POST['cantidad'])) {
  $id_producto = $_POST['id_producto'];
  $nombre = $_POST['pro_nombre'];
  $imagen = $_POST['pro_imagen'];
  $precio = $_POST['pro_precio'];
  $cantidad = $_POST['cantidad'];

  // Agregar el producto al carrito en la sesión
  if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
  }
  $_SESSION['carrito'][] = array("id_producto" => $id_producto,"pro_nombre" => $nombre, "pro_imagen" => $imagen, "pro_precio" => $precio, "cantidad" => $cantidad);
}
//actualiza los productos con cantidad
if (isset($_POST['id'], $_POST['cantidad'])) {
  $id = $_POST['id'];
  $cantidad = $_POST['cantidad'];
  if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
  }
}
//borrar 
if (isset($_POST['id2'])) {
  $id = $_POST['id2'];
  unset($_SESSION['carrito'][$id]);
}
header("location: " . $_SERVER['HTTP_REFERER'] . "");
?>