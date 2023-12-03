<?php
session_start();
$lifetime = 86400;
setcookie(session_name(), session_id(), time() + $lifetime);

if (isset($_SESSION['carrito'])) {
  // Acceder a $_SESSION['carrito']
  $carrito = $_SESSION['carrito'];
  // ...
} else {
  // Definir $_SESSION['carrito'] si no existe
  $_SESSION['carrito'] = array();
}
$totalCantidad = 0;
$totalPrecio = 0.00;

foreach ($_SESSION['carrito'] as $producto) {
  $totalCantidad += $producto['cantidad']; // Asume que la cantidad de cada producto es 1
  $totalPrecio += $producto['pro_precio'];
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Agroshop</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="Public/fonts.googleapis.com/css?family=Poppins:300,400,500">
  <link rel="stylesheet" href="Public/css/bootstrap.css">
  <link rel="stylesheet" href="Public/css/fonts.css">
  <link rel="stylesheet" href="Public/css/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<div class="preloader">
  <div class="preloader-body">
    <div class="cssload-container"><span></span><span></span><span></span><span></span>
    </div>
  </div>
</div>
<div class="page">
  <!-- Page Header-->
  <header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap rd-navbar-modern-wrap">
      <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
        data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
        data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
        data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
        data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
        data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand"><a class="brand" href="index.php"><img
                    src="Public/images/logo-default-196x47.png" alt="" width="196" height="47" /></a></div>
            </div>
            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <!-- RD Navbar Basket-->
                <div class="rd-navbar-basket-wrap">
                  <button class="rd-navbar-basket fl-bigmug-line-shopping198"
                    data-rd-navbar-toggle=".cart-inline"><span>
                      <?php echo $totalCantidad; ?>
                    </span></button>
                  <div class="cart-inline">
                    <div class="cart-inline-header">
                      <h5 class="cart-inline-title">En carro:<span>
                          <?php echo $totalCantidad; ?>
                        </span> Productos</h5>
                      <h6 class="cart-inline-title">Total: <span> $
                          <?php echo number_format($totalPrecio, 2); ?>
                        </span></h6>
                    </div>
                    <div class="cart-inline-body">
                      <?php foreach ($_SESSION['carrito'] as $producto): ?>
                        <div class="cart-inline-item">
                          <div class="unit align-items-center">
                            <div class="unit-left">
                              <a class="cart-inline-figure" href="#">
                                <img style="width: 108px; height: 100px;" src="<?php echo $producto['pro_imagen']; ?>"
                                  alt="" />
                              </a>
                            </div>
                            <div class="unit-body">
                              <h6 class="cart-inline-name">
                                <a href="#">
                                  <?php echo $producto['pro_nombre']; ?>
                                </a>
                              </h6>
                              <div>
                                <div class="group-xs group-inline-middle">
                                  <h6 class="cart-inline-title">$
                                    <?php echo $producto['pro_precio']; ?>
                                  </h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="cart-inline-footer">
                      <div class="group-sm">
                        <form action="vaciar_carrito.php" method="post">
                          <button type="submit" name="vaciar_carrito"
                            class="button button-md button-default-outline-2 button-wapasha">Vaciar carrito</button>
                        </form><a class="button button-md button-primary button-pipaluk" href="carrito.php">Carrito</a>
                      </div>
                    </div>
                  </div>
                </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198"
                  href="carrito.php"><span>
                    <?php echo $totalCantidad; ?>
                  </span></a>
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Inicio</a>
                  </li>
                  <li class="rd-nav-item">
                    <?php
                    if (isset($_SESSION['tipo_usuario'])) {
                      if ($_SESSION['tipo_usuario'] == 1 || $_SESSION['tipo_usuario'] == 2 || $_SESSION['tipo_usuario'] == 3 || $_SESSION['tipo_usuario'] == 4) {
                        echo '<a class="rd-nav-link" href="venta2.php">Productos</a>';
                      }
                    } else {
                      echo '<a class="rd-nav-link" href="venta.php">Productos</a>'; // Enlace por defecto para usuarios no logeados
                    }
                    ?>
                  </li>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="sobre_nosotros.php">Sobre Nosotros</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contacto.php">Contáctanos</a>
                  </li>
                </ul>
              </div>
              <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main"
                data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span
                    class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span>
                </div>
                <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span
                    class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                </div>
                <div class="project-close"><span></span><span></span></div>
              </div>
            </div>

            <div class="rd-navbar-project rd-navbar-modern-project">
              <div class="rd-navbar-project-modern-header">
                <h4 class="rd-navbar-project-modern-title"> </h4>
                <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main"
                  data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                  <div class="project-close"><span></span><span></span></div>
                </div>
              </div>
              <div class="rd-navbar-project-content rd-navbar-modern-project-content">
                <div class="container">
                  <div class="left box-primary">
                    <h3 class="username text-center"> </h3>
                    <?php
                    if (isset($_SESSION['tipo_usuario'])) {
                      if ($_SESSION['tipo_usuario'] == 1) { // administrador
                        echo '<h3 class="username text-center">Menú de Administrador</h3>';
                        echo '<a href="menu_admin.php" class="btn btn-primary btn-block"><b>Menu administrador</b></a>';
                        echo '<a href="datos.usuarios.php" class="btn btn-primary btn-block"><b>Administrar usuarios</b></a>';
                        echo '<a href="datos.productos.php" class="btn btn-primary btn-block"><b>Administrar productos</b></a>';
                      } else if ($_SESSION['tipo_usuario'] == 2) { // productor
                        echo '<h3 class="username text-center">Menú de productor</h3>';
                        echo '<a href="editar_perfil.php" class="btn btn-primary btn-block"><b>Editar perfil</b></a>';

                        echo '<a href="crear.producto.php" class="btn btn-primary btn-block"><b>Mis productos</b></a>';

                        echo '<a href="pedidos.php" class="btn btn-primary btn-block"><b>Solicitudes de pedidos</b></a>';

                        echo '<a href="informes_venta.php" class="btn btn-primary btn-block"><b>Informes de ventas</b></a>';

                        //echo '<a href="" class="btn btn-primary btn-block"><b>Ventas Realizadas</b></a>';
                    
                      } else if ($_SESSION['tipo_usuario'] == 3) { // comerciante
                        echo '<h3 class="username text-center">Menú de comerciante</h3>';
                        echo '<a href="editar_perfil.php" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>';

                        echo '<a href="historial.compra.php" class="btn btn-primary btn-block"><b>Historial de Compra</b></a>';

                        //echo '<a href="historial.compra.php" class="btn btn-primary btn-block"><b>Estado de sus compras</b></a>';
                    
                        echo '<a href="crear.producto.php" class="btn btn-primary btn-block"><b>Mis productos</b></a>';

                        echo '<a href="pedidos.php" class="btn btn-primary btn-block"><b>Solicitudes de pedidos</b></a>';

                        echo '<a href="informes_venta.php" class="btn btn-primary btn-block"><b>Informes de ventas</b></a>';
                        //echo '<a href="" class="btn btn-primary btn-block"><b>Ventas Realizadas</b></a>';
                      } else if ($_SESSION['tipo_usuario'] == 4) { // usuario
                        echo '<h3 class="username text-center">Menú de cliente</h3>';

                        echo '<a href="editar_perfil.php" class="btn btn-primary btn-block"><b>Editar perfil</b></a>';

                        echo '<a href="historial.compra.php" class="btn btn-primary btn-block"><b>Historial de compra</b></a>';

                        //echo '<a href="" class="btn btn-primary btn-block"><b>Estado de sus compras</b></a>';
                      }
                    } else {
                      echo '<a href="registrar.php" class="btn btn-primary btn-block"><b>Iniciar sesion</b></a>';
                    }
                    ?>
                    <?php if (isset($_SESSION['id_usuario'])): ?>
                      <a class="btn btn-primary btn-block" href="login/cerrar.session.php"><b>Cerrar Sesion</b></a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>