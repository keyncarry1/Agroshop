<?php include('header.php'); ?>

<?php

include_once 'config/config.php';

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
        $usuario_2 = $row['usu_usuario'];
        $email_2 = $row['usu_email'];
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
    $_SESSION['message'] = 'Usuario actualizado correctamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: ../datos.usuarios.php');
}
?>


<div class="container mb-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-body">
                <h3>Editar usuario: <?php echo $nombre_2; ?></h3>
                <br><hr><br>
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="container " style="font-weight:bold">
                        <div class="row">
                            <div class="col">
                                <label for="nombre_2" >Nombre</label>
                                <input type="text" class="form-control"name="nombre_2" value="<?php echo $nombre_2; ?>" placeholder="Nombre" required>
                            </div>
                            <div class="col">
                                <label for="apellido_2" >Apellido</label>
                                <input type="text" class="form-control " name="apellido_2" value="<?php echo $apellido_2; ?>" placeholder="Apellido" required>
                            </div>
                            <div class="col">
                                <label for="usuario_2" >Usuario</label>
                                <input disabled type="text" class="form-control " name="usuario_2" value="<?php echo $usuario_2; ?>" placeholder="Nombre de Usuario" required>
                            </div>
                        </div>
                    </div>

                    <div class="container" style="font-weight:bold">
                    <div class="row">
                        <div class="col">
                            <label>Correo electrónico:</label>
                            <input type="email" class="form-control" name="email_2"value="<?php echo $email_2; ?>">
                        </div>
                        <div class="col">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" required name="telefono_2" value="<?php echo $telefono_2; ?>">
                        </div>
                        <div class="col">
                            <label>Tipo de usuario:</label>
                            <input disabled type="text" class="form-control " name="tipo_usuario_2" value="<?php echo $tipo_usuario_2; ?>" required>
                        </div>
                    </div>
                    </div>  

                    <div class="container " style="font-weight:bold">
                        <div class="row">
                            <div class="col">
                            <label>Direccion:</label>
                            <input type="text" class="form-control " name="direccion" value="<?php echo $direccion_2; ?>" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success mt-2" style="font-size:15px"><i class="fa fa-floppy-o fa-2x "  style="color:white;">  Actualizar datos</i></button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include('footer.php'); ?>
