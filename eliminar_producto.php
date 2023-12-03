<?php 
session_start();
include_once 'config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];   
    $query = "UPDATE producto set pro_estado = 0  where id_producto = '$id'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        echo ("La consulta falló: " . mysqli_error($conexion));
    }

    $_SESSION['message'] = 'Producto eliminado correctamente';
    $_SESSION['message_type'] = 'danger';

    header("Location: crear.producto.php?eliminado=true");

}
?>
