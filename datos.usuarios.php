
<?php include_once 'config/config.php'; ?>

<?php include('header.php'); ?>
 


<link rel="stylesheet" type="text/css" href="Public/fonts.googleapis.com/css?family=Poppins:300,400,500">
<link rel="stylesheet" href="Public/css/bootstrap.css">
<link rel="stylesheet" href="Public/css/fonts.css">
<link rel="stylesheet" href="Public/css/style.css">
<div class="row" style="margin:auto;height: auto;margin-bottom:10%">
    <div class="col-md-3" >
        <!-- MESSAGES -->

        <!-- add usuarios form-->
        <div class="card card-body">
            <form action="crud/save.usu.php" method="POST">
                <div class="form-group" style="text-align:left;font-weight:bold">
                    <label>Nombre</label>
                    <input  type="text" name="nombre_2" class="form-control form-control-sm" placeholder="Ingrese su nombre" required>
                    <label style="margin-top:3%">Apellido</label>
                    <input type="text" name="apellido_2" class="form-control form-control-sm" placeholder="Ingrese su apellido" required>
                    <label style="margin-top:3%">E-mail</label>
                    <input type="text" name="email_2" class="form-control form-control-sm" placeholder="Ej. correo@correo.cl" required>
                    <label style="margin-top:3%">Nombre de usuario</label>
                    <input type="text" name="usuario_2" class="form-control form-control-sm" placeholder="Ingrese un nombre de usuario" required>
                    <label style="margin-top:3%">Número telefónico</label>
                    <input type="text" name="telefono_2" class="form-control form-control-sm" placeholder="Ej. 1234 5678" required>
                    <label style="margin-top:3%">Dirección</label>
                    <input type="text" name="direccion_2" class="form-control form-control-sm" placeholder="Ingrese su dirección postal" required>
                    
                    <label style="margin-top:3%">Tipo de usuario</label>
                    <select name="tipo_usuario_2" class="form-control form-control-sm">
                        <option value="0" name="default" disabled selected> Sin selección</option>
                        <option value="1" name="1">Administrador</option>
                        <option value="2" name="2">Productor</option>
                        <option value="3" name="3">Comerciante</option>
                        <option value="4" name="4">Cliente</option>
                    </select>
                </div>
                <button class="btn btn-success btn-block" style="color:white;" type="submit" value="Guardar" name="Guardar">Guardar</button>
            </form>
        </div>
    </div>
    <div class="col-md-8 card card-body" style="margin-left:10px">
        <table class="table borderless table-striped ">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Tipo de usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $query = "SELECT * FROM usuario WHERE usu_estado = 1";
                $result_usuarios = mysqli_query($conexion, $query);

                while ($row = mysqli_fetch_assoc($result_usuarios)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['usu_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_usuario']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_apellido']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_email']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['usu_telefono']; ?>
                        </td>
                        <td>
                            <?php echo $row['usu_direccion']; ?>
                        </td>
                        <td>
                            <?php echo $row['id_tipousuario']; ?>
                        </td>

                        <td>
                        <a title="Editar usuario" href="editar.php?id=<?php echo $row['id_usuario'] ?>"  class="btn  col-4" >
                            <i class="fa fa-pencil-square-o fa-2x"  ></i> 
                        </a>
                        <a title="Eliminar usuario de la existencia" href="crud/borrar.usuario.php?id=<?php echo $row['id_usuario'] ?>"  style="color:#F07155" class="btn  col-4" >
                            <i class="fa fa-trash fa-2x" ></i> 
                        </a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<?php include('footer.php'); ?>
