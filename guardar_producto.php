<?php
include_once 'config/config.php';
session_start();
$id_usuario = $_SESSION['id_usuario'];



if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre_pro'];
    $descripcion = $_POST['descripcion_pro'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio_pro'];
    $stock = $_POST['stock_pro'];
    $unidad = $_POST['unidad'];
    $estado = 1;
    $id_usuario = $_SESSION['id_usuario'];

    $consulta = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario' ";
    $resultado = mysqli_query($conexion, $consulta);
    $usuario = mysqli_fetch_assoc($resultado);
    if ($usuario['id_tipousuario'] == 1 || $usuario['id_tipousuario'] == 2) {
        $pro_tipo = 1;
    } else {
        $pro_tipo = 2;
    }


    // Procesar la imagen
    $pro_imgen = $_FILES['pro_imgen']['name'];
    $ruta_temporal_imagen = $_FILES['pro_imgen']['tmp_name'];
    $ruta_destino_imagen = "imagenes/" . $pro_imgen;
    move_uploaded_file($ruta_temporal_imagen, $ruta_destino_imagen);

    // Insertar el producto en la base de datos
    $sql = "INSERT INTO producto (pro_nombre, pro_descripcion, id_tipoproducto, pro_precio, pro_stock, pro_imagen, pro_tipo, id_usuario, id_unit) VALUES ('$nombre', '$descripcion', '$categoria', '$precio', '$stock', '$ruta_destino_imagen','$pro_tipo' , '$id_usuario','$unidad')";

    if ($conexion->query($sql) === TRUE) {
        header('Location: crear.producto.php?guardado=true');
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>