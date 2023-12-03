<?php
session_start();
include_once 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];

    // Verificar si se envió el formulario de actualización de datos
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $telefono = $_POST['Telefono'];
        $direccion = $_POST['direccion'];

        $query = "UPDATE usuario SET usu_nombre = '$nombre', usu_apellido = '$apellido', usu_usuario = '$usuario', usu_email = '$email', usu_telefono = '$telefono', usu_direccion = '$direccion'  WHERE id_usuario = '$id_usuario'";
        $result = mysqli_query($conexion, $query);

        if (!$result) {
            die("Query Failed.");
        }
    }

    // Verificar si se envió el formulario de cambio de contraseña
    if (!empty($_POST['nueva_contra']) && !empty($_POST['nueva_contra2'])) {
        if ($_POST['nueva_contra'] == $_POST['nueva_contra2']) {
            $nueva_contra = $_POST['nueva_contra'];
            $query = "UPDATE usuario SET usu_pass = '$nueva_contra' WHERE id_usuario = '$id_usuario'";
            mysqli_query($conexion, $query);
        } else {
            // Las contraseñas no coinciden
        }
    }

    header("Location: editar_perfil.php");
    exit;
}

?>