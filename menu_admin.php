<?php include('header.php'); 

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
  }
  
  // Comprobar si el usuario es un administrador
  if ($_SESSION['tipo_usuario'] != 1) {
    // El usuario no es un administrador, redirigir a la página de inicio
    header('Location: index.php');
    exit;
  } else if ($_SESSION['tipo_usuario'] == 2) {
    header('Location: index.php');
  
  } else if ($_SESSION['tipo_usuario'] == 3) {
    header('Location: index.php');
  
  } else if ($_SESSION['tipo_usuario'] == 4) {
    header('Location: index.php');
    exit;
  }





?>
<br><br>

<div class="admin-menu">
    <h2>Menu de Administrador</h2>
</div>

<div class="row center-xs around-xs grupocartas">

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
                    <a href="pedidos.php" class="btn btn-primary">Ir a Pedidos</a>
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
                    <a href="paginas/iconos.html" class="btn btn-primary">Ir a Informes</a>
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
                    <h5 class="card-title">Pagos</h5>
                    <p class="card-text">Todo lo relacionado con los pagos</p>
                    <a href="#" class="btn btn-primary">Ir a Pagos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-3 cartas">
        <div class="row center-xs">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="100"
                        height="100" viewBox="0 0 24 24" stroke-width="0.5" stroke="#2c3e50" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                        <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                        <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                    </svg>
                    <h5 class="card-title">Ver Datos</h5>
                    <p class="card-text">Ver datos de clientes y productores</p>
                    <a href="datos.usuarios.php" class="btn btn-primary">Ir a Solicitudes</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            margin: 30px;
            width: 200px;
            height: 290px;
            background-color: #ECE5E4;
        }

        .card:hover {
            background-color: #CDC5C3;
        }

        .divicon {
            padding-left: 10px;
        }

        .grupocartas {
            padding-top: 25px;
        }

        .card-body {
            padding-bottom: 10px;
            border-radius: 40px;
        }

        .btn-primary:hover {
            background-color: transparent;
            font-size: 20px;
        }
    </style>


</div>
<br><br><br><br><br>

<br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php'); ?>