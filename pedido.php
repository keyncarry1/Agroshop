<?php include('header.php');
include_once 'config/config.php';

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
for ($i = 0; $i < 5; $i++) {
    $password .= substr($str, rand(0, 64), 1);
}
$ref = $password;

if (isset($_SESSION['transaction_data'])) {
    $transaction_data = $_SESSION['transaction_data'];

}
foreach ($_SESSION['carrito'] as $producto) {
    $id_producto = $producto['id_producto'];
    $pro_nombre = $producto['pro_nombre'];
    $pro_precio = $producto['pro_precio'];
    $cantidad = $producto['cantidad'];
    $total = $producto['pro_precio'] * $producto['cantidad'];
    $estado = 1;
    $sql = "INSERT INTO pedidodatos (pdd_ref, id_producto, pdd_nombre, pdd_precio, pdd_cantidad, pdd_total, pdd_estado) VALUES ('$ref', '$id_producto', '$pro_nombre', '$pro_precio', '$cantidad',  '$total', '$estado')";
    $result = mysqli_query($conexion, $sql);

}
// Después de ejecutar la primera consulta de inserción
if ($result) {
    $id_usuario = $_SESSION['id_usuario'];
    $pedestado = 1;
    $totalf = $_SESSION['totalf'];
    $fecha = date('Y-m-d H:i:s');
    $token = $_SESSION['transaction_data']->token;
    $estado = 1;
    // Ahora puedes usar $id_pedidodatos en tu segunda consulta de inserción
    $sql2 = "INSERT INTO pedido (ped_ref, id_usuario, ped_estadop ,ped_totalf, ped_fecha, ped_token, ped_estado) VALUES ('$ref', '$id_usuario', '$pedestado', '$totalf', '$fecha', '$token', '$estado')";
    $result2 = mysqli_query($conexion, $sql2);
}

$_SESSION['carrito'] = array();

echo '<script type="text/javascript">
           window.onload = function () { 
               setTimeout(function(){
                   window.location = "finish.php";
               }, 1000);
           }
      </script>'

?>
<br><br><br>
<?php include('footer.php'); ?>