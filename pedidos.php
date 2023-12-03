<?php include('header.php');
include_once 'config/config.php';
// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}
$id_usuario = $_SESSION['id_usuario'];
$tipousu = $_SESSION['tipo_usuario'];
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>
<br><br>
<div class="col-md-10 card card-body " style="margin:auto;padding:auto;margin-bottom:15%">
    <h2>Historial de pedidos</h2>
    <br>
    <table class="table borderless table-striped col-md-12">
        <tr WIDTH="auto" HEIGHT="auto">
            <th>ID pedido</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Comprador</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php
        $query = $query = "SELECT b.id_pedido, b.ped_fecha, b.ped_totalf, b.id_usuario, a.id_producto, c.usu_nombre, c.usu_apellido
        FROM pedidodatos a
        INNER JOIN pedido b ON a.pdd_ref = b.ped_ref 
        INNER JOIN usuario c ON b.id_usuario = c.id_usuario
        INNER JOIN producto d ON a.id_producto = d.id_producto
        INNER JOIN usuario e ON d.id_usuario = e.id_usuario
        WHERE c.id_tipousuario = $tipousu AND a.id_producto = d.id_producto
        GROUP BY b.ped_ref";

        $resultado_pedido = mysqli_query($conexion, $query);
        while ($pedido = mysqli_fetch_assoc($resultado_pedido)) { ?>
            <tr>
                <td>
                    <?php echo $pedido['id_pedido']; ?>
                </td>
                <td>
                    <?php echo $pedido['ped_fecha']; ?>
                </td>
                <td>
                    <?php echo number_format($pedido['ped_totalf'], 0, ',', '.'); ?>
                </td>
                <td>
                    <?php echo $pedido['usu_nombre'] . ' ' . $pedido['usu_apellido']; ?>
                </td>
                <td>
                    <select name="estado" class="form-control form-control-sm ">
                        <option value="1" name="default" selected>En proceso</option>
                        <option value="2" name="2">Enviado</option>
                        <option value="3" name="3">Entregado</option>
                        <option value="4" name="4">Cancelado</option>
                    </select>
                </td>
                <td>
                    <a title="Guardar estado" href="" class="btn "><i style="color:#629A31;"
                            class="fa fa-floppy-o fa-2x"></i> </a>
                    <a href="" class="btn btn-small "><i class="fa-solid fa-download fa-2x" style="color:#9B9391;"></i></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php include('footer.php'); ?>