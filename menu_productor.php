<?php include('header.php'); 

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
  }
  
  // Comprobar si el usuario es un administrador
  if ($_SESSION['tipo_usuario'] != 2) {
    // El usuario no es un administrador, redirigir a la página de inicio
    header('Location: index.php');
    exit;
  } 
?>

<div class="row center-xs around-xs grupocartas">

    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics"
                        width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <path d="M9 17v-5" />
                        <path d="M12 17v-1" />
                        <path d="M15 17v-3" />
                    </svg>
                    <h5 class="card-title">Editar informacion personal</h5>
                    <p class="card-text">Editar mi perfil de usuario</p>
                    <a href="editar_perfil.php" class="btn btn-primary">Ir a editar</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="100"
                        height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                    </svg>
                    <h5 class="card-title">Crear un producto</h5>
                    <p class="card-text">Ver mis productos y modificar</p>
                    <a href="crear.producto.php" class="btn btn-primary">Ir a mis productos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="100"
                        height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="10" y1="14" x2="21" y2="3" />
                        <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
                    </svg>
                    <h5 class="card-title">Administración de Pedidos</h5>
                    <p class="card-text">Pedidos y procesos de venta</p>
                    <a href="#" class="btn btn-primary">Ir a Pedidos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics"
                        width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <path d="M9 17v-5" />
                        <path d="M12 17v-1" />
                        <path d="M15 17v-3" />
                    </svg>
                    <h5 class="card-title">Informes de Venta</h5>
                    <p class="card-text">Administración de informes</p>
                    <a href="" class="btn btn-primary">Ir a Informes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-discount"
                        width="100" height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="6" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M20 6l-1 7h-13" />
                        <path d="M10 10l6 -6" />
                        <circle cx="10.5" cy="4.5" r=".5" />
                        <circle cx="15.5" cy="9.5" r=".5" />
                    </svg>
                    <h5 class="card-title">Ver Historial de compras</h5>
                    <p class="card-text">Ver compras realizadas</p>
                    <a href="historial.compra.php" class="btn btn-primary">Ir historial</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br>

<script>
    // Aquí puede agregar su código JavaScript si es necesario
</script>

<?php include('footer.php'); ?>