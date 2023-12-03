<?php

session_start();
include_once '../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];   
    $query = "UPDATE usuario set usu_estado = 0  where id_usuario = '$id'";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        echo ("La consulta falló: " . mysqli_error($conexion));
    }

    $_SESSION['message'] = 'Usuario eliminado correctamente';
    $_SESSION['message_type'] = 'danger';

    header('Location: ../datos.usuarios.php');

}


?>