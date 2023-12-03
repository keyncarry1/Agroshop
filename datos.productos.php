<?php include_once 'config/config.php'; ?>

<?php include('header.php'); ?>
 
<div class="tabla-productos card card-body mb-5" style="margin:2%">
        <h3>Administrar de productos</h3>
        <hr>
        <br>
        <div>
            
            <table class="table borderless table-striped">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Propietario</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                <?php $query = "SELECT * FROM producto WHERE pro_estado = 1 ";
                $resultado_productos = mysqli_query($conexion, $query);

                while ($producto = mysqli_fetch_assoc($resultado_productos)) { ?>
                    <tr>
                        <td><img src="<?php echo $producto['pro_imagen']; ?>" width="50" height="50"></td>
                        <td>
                            <?php echo $producto['pro_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $producto['pro_descripcion']; ?>
                        </td>
                        <td>
                            <?php echo $producto['id_usuario']; ?>
                        </td>
                        
                        </td>
                        <td>
                            <?php echo $producto['pro_estado']; ?>
                        </td>
                        <td class="btn">
                            <a href="editar.producto.php"  style="color:green" class="btn col-2 " title="Editar producto">
                            <i class="fa fa-pencil-square-o fa-lg"></i></a>
                            <a href="" style="color:#F07155;"class="btn col-2" title="Eliminar producto de la existencia">
                            <i class="fa fa-trash fa-lg"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>