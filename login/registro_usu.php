<?php
session_start();
include_once '../config/config.php';

if(isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $estado = 1;

    $query = "INSERT INTO usuario (usu_nombre, usu_apellido, usu_rut , usu_usuario, usu_email, usu_pass, usu_telefono, usu_direccion, id_tipousuario, usu_estado) VALUES ('$nombre', '$apellido', '$rut', '$usuario', '$email', '$pass', '$telefono', '$direccion', '$tipo_usuario', '$estado')";

    if(mysqli_query($conexion, $query)) {
        $_SESSION['message'] = "¡Te has registrado correctamente!";
        header("location:../registrar.php");

    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conexion);
    }
}
?>