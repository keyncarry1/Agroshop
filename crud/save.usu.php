<?php

include_once '../config/config.php';

if(isset($_POST['Guardar'])) {
    $nombre_2 = $_POST['nombre_2'];
    $apellido_2 = $_POST['apellido_2'];
    $usuario_2 = $_POST['usuario_2'];
    $email_2 = $_POST['email_2'];
    $pass_2 = $_POST['pass_2'];
    $telefono_2 = $_POST['telefono_2'];
    $direccion_2 = $_POST['direccion_2'];
    $tipo_usuario_2 = $_POST['tipo_usuario_2'];
    $estado_2 = 1;

    $query = "INSERT INTO usuario (usu_nombre, usu_apellido, usu_usuario, usu_email, usu_pass, usu_telefono, usu_direccion, id_tipousuario, usu_estado) VALUES ('$nombre_2', '$apellido_2', '$usuario_2', '$email_2', '$pass_2', '$telefono_2', '$direccion_2', '$tipo_usuario_2', '$estado_2')";

    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Usuario guardado';
    $_SESSION['message_type'] = 'success';
    header('Location: ../datos.usuarios.php');

}

?>