<?php include('header.php'); ?>

<?php

include_once '../config/config.php';

$nombre_2 = '';
$apellido_2 = '';
$usuario_2 = '';
$email_2 = '';
$telefono_2 = '';
$direccion_2 = '';
$tipo_usuario_2 = '';
$estado_2 = 1;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuario WHERE id_usuario=$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre_2 = $row['usu_nombre'];
        $apellido_2 = $row['usu_apellido'];
        $usuario_2 = $row['usu_email'];
        $email_2 = $row['usu_usuario'];
        $telefono_2 = $row['usu_telefono'];
        $direccion_2 = $row['usu_direccion'];
        $tipo_usuario_2 = $row['id_tipousuario'];
    }
}

if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $nombre_2 = isset($_POST['nombre_2']) ? $_POST['nombre_2'] : '';
    $apellido_2 = isset($_POST['apellido_2']) ? $_POST['apellido_2'] : '';
    $usuario_2 = isset($_POST['usuario_2']) ? $_POST['usuario_2'] : '';
    $email_2 = isset($_POST['email_2']) ? $_POST['email_2'] : '';
    $telefono_2 = isset($_POST['telefono_2']) ? $_POST['telefono_2'] : '';
    $direccion_2 = isset($_POST['direccion_2']) ? $_POST['direccion_2'] : '';
    $tipo_usuario_2 = isset($_POST['tipo_usuario_2']) ? $_POST['tipo_usuario_2'] : '';

    $query = "UPDATE usuario set usu_nombre = '$nombre_2', usu_apellido = '$apellido_2',usu_email = '$usuario_2',usu_usuario = '$email_2',usu_telefono = '$telefono_2',usu_direccion = '$direccion_2',id_tipousuario = '$tipo_usuario_2' WHERE id_usuario=$id";
    mysqli_query($conexion, $query);
    $_SESSION['message'] = 'usuario actualizado correctamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: ../datos.usuarios.php');
}
?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="nombre_2" type="text" class="form-control" value="<?php echo $nombre_2; ?>"
                            placeholder="Actualizar nombre">
                    </div>
                    <div class="form-group">
                        <input name="apellido_2" type="text" class="form-control" value="<?php echo $apellido_2; ?>"
                            placeholder="Actualizar apellido">
                    </div>
                    <div class="form-group">
                        <input name="usuario_2" type="text" class="form-control" value="<?php echo $usuario_2; ?>"
                            placeholder="Actualizar usuario">
                    </div>
                    <div class="form-group">
                        <input name="email_2" type="text" class="form-control" value="<?php echo $email_2; ?>"
                            placeholder="Actualizar correo">
                    </div>
                    <div class="form-group">
                        <input name="telefono_2" type="text" class="form-control" value="<?php echo $telefono_2; ?>"
                            placeholder="Actualizar telefono">
                    </div>
                    <div class="form-group">
                        <input name="direccion_2" type="text" class="form-control" value="<?php echo $direccion_2; ?>"
                            placeholder="Actualizar direccion">
                    </div>
                    <div class="form-group">
                        <input name="tipo_usuario_2" type="text" class="form-control"
                            value="<?php echo $tipo_usuario_2; ?>" placeholder="Actualizar tipo de usuario">
                    </div>
                    <button class="btn-success" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../footer.php'); ?>