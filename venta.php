<?php include('header.php');
include_once 'config/config.php';
ini_set('memory_limit', '-1');

$consulta = "SELECT * FROM producto a 
  INNER JOIN usuario b ON a.id_usuario = b.id_usuario
  INNER JOIN tipousuario c ON b.id_tipousuario = c.id_tipousuario
  INNER JOIN unidad_medida d ON a.id_unit = d.id_unit
  WHERE pro_tipo = 2 AND a.pro_estado = 1";
$resultado = mysqli_query($conexion, $consulta);

$productos = array(); // Array para almacenar los resultados de la consulta

// Agregar todos los resultados a la matriz de productos
while ($producto = mysqli_fetch_assoc($resultado)) {
  $productos[] = $producto;
}
?>

<h3>listado de productos</h3>
<div class="container">
  <div class="row">
    <?php
    foreach ($productos as $producto) {
      ?>
      <div class="col-sm-3">
        <div class="card">

          <form id="formulario" name="formulario" method="POST" action="agregar_al_carrito.php">
            <img src="<?php echo $producto['pro_imagen']; ?>" alt="fruits" style="max-width: 100%; height: 250px;">
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
              <?php echo isset($producto['usu_nombre']) ? $producto['usu_nombre'] : ''; ?>
              <?php echo isset($producto['usu_apellido']) ? $producto['usu_apellido'] : ''; ?>
            </p>
            <input type="hidden" name="pro_nombre" value="<?php echo $producto['pro_nombre']; ?>">
            <input type="hidden" name="pro_imagen" value="<?php echo $producto['pro_imagen']; ?>">
            <input type="hidden" name="pro_precio" value="<?php echo $producto['pro_precio']; ?>">
            <input type="hidden" name="cantidad" value="1">
            <p><button class="agregar-carrito" type="submit" data-id="<?php echo $producto['id_producto']; ?>">Agregar
                al
                carrito</button></p>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

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