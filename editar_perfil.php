<?php
include_once 'config/config.php';
include("header.php");

$usuario = $_SESSION['id_usuario'];
$query = "SELECT usuario.*, tipousuario.tus_nombre FROM usuario 
            INNER JOIN tipousuario ON usuario.id_tipousuario = tipousuario.id_tipousuario 
            WHERE usuario.id_usuario = '$usuario'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);


?>
<div class="row" style="margin:auto;height: auto">
    <div class="card card-body col-7 mb-5" style="margin-left:2%">
        <h3>
            <i class='fa fa-address-card-o' style="font-family:Poppins;font-size:30px;font-weight:bold"> Editar
                perfil</i>
        </h3>
        <hr>
        <div class="form-group" style="text-align:left;font-weight:bold">
            <form method="POST" id="perfil" action="actualizar_perfil.php">
                <div class="container mt-4" style="font-weight:bold">
                    <div class="row">
                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre"
                                value="<?php echo $row['usu_nombre'] ?>" placeholder="Nombre" required>
                        </div>
                        <div class="col">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido"
                                value="<?php echo $row['usu_apellido'] ?>" placeholder="Apellido" required>
                        </div>
                        <div class="col">
                            <label for="apellido">Usuario</label>
                            <input type="text" class="form-control" name="usuario"
                                value="<?php echo $row['usu_usuario'] ?>" placeholder="Usuario" required>
                        </div>
                    </div>
                </div>
                <div class="container" style="font-weight:bold">
                    <div class="row">
                        <div class="col">
                            <label>Correo electrónico:</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $row['usu_email'] ?>"
                                placeholder="email" required>
                        </div>
                        <div class="col">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="Telefono"
                                value="<?php echo $row['usu_telefono'] ?>" placeholder="Telefono" required>
                        </div>
                    </div>
                </div>

                <div class="container " style="font-weight:bold">
                    <div class="row">
                        <div class="col">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion"
                                value="<?php echo $row['usu_direccion'] ?>" placeholder="Direccion" required>
                        </div>
                    </div>
                </div>
                <div class="container " style="font-weight:bold">
                    <div class="row">
                        <div class="col">
                            <label>tipo usuario:</label>
                            <input disabled type="text" class="form-control" name="direccion"
                                value="<?php echo $row['tus_nombre'] ?>" placeholder="tipousuario" required>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <a href="index.php" class="btn btn-sm  " style="background-color:#F07155;border:none;"><i
                                    class="fa fa-arrow-left fa-2x" style="color:white;"> Volver </i></a>
                        </div>
                        <div class="col">
                            <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario'] ?>">
                            <button type="submit" class="btn btn-sm btn-primary" style="font-size:10px">
                                <i class="fa fa-floppy-o fa-2x" style="color:white;"> Actualizar datos</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-4 card card-body mb-5" style="margin-left:2%">
        <h3>
            <i class='fa fa-key' style="font-family:Poppins;font-size:30px;font-weight:bold"> Cambiar contraseña</i>
        </h3>
        <hr>
        <div class="row mt-2" style="margin:auto;height: auto">
            <form method="POST" id="newpass" action="actualizar_perfil.php">
                <div class="container " style="font-weight:bold">
                    <div class="row">
                        <div class="col">
                            <label for="contra">Contraseña actual</label>
                            <input type="password" class="form-control" name="contra_actual"
                                value="<?php echo $row['usu_pass'] ?>" placeholder="Contraseña" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="contra">Nueva contraseña</label>
                                <input type="password" class="form-control" name="nueva_contra" required>
                            </div>
                            <div class="col">
                                <label for="nueva_contra2">Repetir nueva contraseña</label>
                                <input type="password" class="form-control" name="nueva_contra2" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario'] ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col mt-5">
                                <button type="submit" class="btn btn-sm btn-primary" style="font-size:10px">
                                    <i class="fa fa-floppy-o fa-2x" style="color:white;"> Cambiar contraseña</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>