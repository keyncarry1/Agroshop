<?php include('header.php');
include_once 'config/config.php';
// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
}
$id_usuario = $_SESSION['id_usuario'];
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>
<br><br>
<h2>Mis compras</h2>
<br><br>
<div class="col-md-10 card card-body mb-5" style="margin:auto;padding:auto;">

    <br>
    <table class="table borderless table-striped col-md-12">
        <tr WIDTH="auto" HEIGHT="auto">
            <th>ID pedido</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Factura/ Detalle</th>
        </tr>
        <?php $query = "SELECT * FROM pedido WHERE id_usuario = $id_usuario";

        $resultado_pedido = mysqli_query($conexion, $query);

        while ($pedido = mysqli_fetch_assoc($resultado_pedido)) { ?>
            <tr>
                <td>
                    <?php echo $pedido['id_pedido']; ?>
                </td>
                <td>
                    <?php echo $pedido['ped_fecha']; ?>
                </td>
                <td>$
                    <?php echo number_format($pedido['ped_totalf'], 0, ',', '.'); ?>
                </td>
                <td>
                    <?php if ($pedido['ped_estadop'] == 1) {
                        echo "En proceso";
                    } elseif ($pedido['ped_estadop'] == 2) {
                        echo "Enviado";

                    } elseif ($pedido['ped_estadop'] == 3) {
                        echo "Entregado";
                    } else {
                        echo "Cancelado";
                    }
                    ; ?>
                </td>
                <td onclick="location.href='factura/invoice.php?dat=<?php echo $pedido['ped_ref']; ?>'"> <a class="btn btn-small "><i class="fa-solid fa-download"></i></a> </td>
            <?php } ?>
    </table>
</div>
<br><br>

<?php include('footer.php'); ?>