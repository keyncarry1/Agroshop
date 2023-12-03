<?php include('header.php');
include_once 'config/config.php';
ini_set('memory_limit', '-1');

$consulta = "SELECT * FROM producto a 
  inner join usuario b on a.id_usuario = b.id_usuario
  inner join tipousuario c on b.id_tipousuario = c.id_tipousuario
  INNER JOIN unidad_medida d ON a.id_unit = d.id_unit
  WHERE a.pro_tipo = 1 and b.id_tipousuario = 2 and a.pro_estado = 1";
$resultado = mysqli_query($conexion, $consulta);

$consulta2 = "SELECT * FROM producto a 
  INNER JOIN usuario b ON a.id_usuario = b.id_usuario
  INNER JOIN tipousuario c ON b.id_tipousuario = c.id_tipousuario
  INNER JOIN unidad_medida d ON a.id_unit = d.id_unit
  WHERE pro_tipo = 2 AND a.pro_estado = 1";
$resultado2 = mysqli_query($conexion, $consulta2);

$consulta3 = "SELECT * FROM producto a 
  inner join usuario b on a.id_usuario = b.id_usuario
  inner join tipousuario c on b.id_tipousuario = c.id_tipousuario
  INNER JOIN unidad_medida d ON a.id_unit = d.id_unit
  WHERE a.pro_estado = 1";
$resultado3 = mysqli_query($conexion, $consulta3);

$id_usuario = $_SESSION["id_usuario"];
$consulta4 = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario' ";
$resultado4 = mysqli_query($conexion, $consulta4);
$usuario = mysqli_fetch_assoc($resultado4);

$productos1 = array(); // Array para almacenar los resultados de la primera consulta
$productos2 = array(); // Array para almacenar los resultados de la segunda consulta
$productos3 = array(); // Array para almacenar los resultados de la tercera consulta

// Agregar todos los resultados a las matrices de productos correspondientes
while ($productoadmin = mysqli_fetch_assoc($resultado)) {
    $productos1[] = $productoadmin;
}
while ($productoadmin2 = mysqli_fetch_assoc($resultado2)) {
    $productos2[] = $productoadmin2;
}
while ($productoadmin3 = mysqli_fetch_assoc($resultado3)) {
    $productos3[] = $productoadmin3;
}
?>

<?php
if ($usuario['id_tipousuario'] == 2 || $usuario['id_tipousuario'] == 3) { ?>
    <h3>Productos de Productor</h3>
    <div class="container">
        <div class="row">
            <?php
            foreach ($productos1 as $producto) {
                ?>
                <div class="col-sm-3">
                    <div class="card">
                        <form id="formulario" name="formulario" method="POST" action="agregar_al_carrito.php">
                            <img src="<?php echo $producto['pro_imagen']; ?>" alt="fruits"
                                style="max-width: 100%; height: 250px;">
                            <h4>
                                <?php echo $producto['pro_nombre']; ?>
                            </h4>
                            <p class="price">$
                                <?php echo number_format($producto['pro_precio'], 0, ',', '.'); ?> x
                                <?php echo $producto['unit_tipo']; ?>
                            </p>
                            <p>
                                <?php echo $producto['pro_descripcion']; ?>
                            </p>
                            <p>
                                <?php echo isset($producto['tus_nombre']) ? $producto['tus_nombre'] : ''; ?>:
                                <?php echo $producto['usu_nombre'] . ' ' . $producto['usu_apellido']; ?>
                            </p>
                            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'];?>">
                            <input type="hidden" name="pro_nombre" value="<?php echo $producto['pro_nombre']; ?>">
                            <input type="hidden" name="pro_imagen" value="<?php echo $producto['pro_imagen']; ?>">
                            <input type="hidden" name="pro_precio" value="<?php echo $producto['pro_precio']; ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <p><button class="agregar-carrito" type="submit"
                                    data-id="<?php echo $producto['id_producto']; ?>">Agregar
                                    al
                                    carrito</button></p>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php
if ($usuario['id_tipousuario'] == 4) { ?>
    <h3>Productos de comerciante</h3>
    <div class="container">
        <div class="row">
            <?php
            foreach ($productos2 as $producto) {
                ?>
                <div class="col-sm-3">
                    <div class="card">
                        <form id="formulario" name="formulario" method="POST" action="agregar_al_carrito.php">
                            <img src="<?php echo $producto['pro_imagen']; ?>" alt="fruits"
                                style="max-width: 100%; height: 250px;">
                            <h4>
                                <?php echo $producto['pro_nombre']; ?>
                            </h4>
                            <p class="price">$
                                <?php echo number_format($producto['pro_precio'], 0, ',', '.');?> x
                                <?php echo $producto['unit_tipo']; ?>
                            </p>
                            <p>
                                <?php echo $producto['pro_descripcion']; ?>
                            </p>
                            <p>
                                <?php echo isset($producto['tus_nombre']) ? $producto['tus_nombre'] : ''; ?>:
                                <?php echo $producto['usu_nombre'] . ' ' . $producto['usu_apellido']; ?>
                            </p>
                            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'];?>">
                            <input type="hidden" name="pro_nombre" value="<?php echo $producto['pro_nombre']; ?>">
                            <input type="hidden" name="pro_imagen" value="<?php echo $producto['pro_imagen']; ?>">
                            <input type="hidden" name="pro_precio" value="<?php echo $producto['pro_precio']; ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <p><button class="agregar-carrito" type="submit"
                                    data-id="<?php echo $producto['id_producto']; ?>">Agregar
                                    al
                                    carrito</button></p>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php if ($usuario['id_tipousuario'] == 1) { ?>
    <h3>listado de productos</h3>
    <div class="container">
        <div class="row">
            <?php
            foreach ($productos3 as $producto) {
                ?>
                <div class="col-sm-3">
                    <div class="card">
                        <form id="formulario" name="formulario" method="POST" action="agregar_al_carrito.php">
                            <img src="<?php echo $producto['pro_imagen']; ?>" alt="fruits"
                                style="max-width: 100%; height: 250px;">
                            <h4>
                                <?php echo $producto['pro_nombre']; ?>
                            </h4>
                            <p class="price">$
                                <?php echo number_format($producto['pro_precio'], 0, ',', '.'); ?> x
                                <?php echo $producto['unit_tipo']; ?>
                            </p>
                            <p>
                                <?php echo $producto['pro_descripcion']; ?>
                            </p>
                            <p>
                                <?php echo isset($producto['tus_nombre']) ? $producto['tus_nombre'] : ''; ?>:
                                <?php echo $producto['usu_nombre'] . ' ' . $producto['usu_apellido']; ?>
                            </p>
                            <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'];?>">
                            <input type="hidden" name="pro_nombre" value="<?php echo $producto['pro_nombre']; ?>">
                            <input type="hidden" name="pro_imagen" value="<?php echo $producto['pro_imagen']; ?>">
                            <input type="hidden" name="pro_precio" value="<?php echo $producto['pro_precio']; ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <p><button class="agregar-carrito" type="submit"
                                    data-id="<?php echo $producto['id_producto']; ?>">Agregar
                                    al
                                    carrito</button></p>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;

    }

    .card p {
        max-height: 100px;
        /* Ajusta este valor según tus necesidades */
        overflow: hidden;
        text-overflow: ellipsis;
    }


    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .card button:hover {
        opacity: 0.7;
    }

    .container {
        overflow: hidden;
    }
</style>
<br><br><br><br><br>
<?php include('footer.php'); ?>