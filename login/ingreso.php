<?php 
session_start();
include_once '../config/config.php';

$usuario = $_POST['usuario_1'] ?? '';
$passwd = $_POST['pass'] ?? '';




$consulta = "SELECT*FROM usuario where usu_usuario = '$usuario' and usu_pass = '$passwd'";
$resultado = mysqli_query($conexion,$consulta);

$filas = mysqli_fetch_assoc($resultado);

if($filas){
    $_SESSION['id_usuario'] = $filas['id_usuario'];
    $_SESSION['tipo_usuario'] = $filas['id_tipousuario'];

    if($filas['id_tipousuario'] == 1){ //administrador 
        header("location:../menu_admin.php");
    }else if($filas['id_tipousuario'] == 2){ // productor 
        header("location:../index.php");
    }else if($filas['id_tipousuario'] == 3){ // comerciante
        header("location:../index.php");
    }else if($filas['id_tipousuario'] == 4){ // productor 
        header("location:../index.php");
    }
}else{
    ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error de autenticación</h4>
            <p>Lo sentimos, la información de autenticación proporcionada es incorrecta. Por favor, verifique sus credenciales e inténtelo de nuevo.</p>
            <hr>
            <p class="mb-0">Si sigue teniendo problemas, póngase en contacto con el soporte.</p>
            <a href="../registrar.php"style="border-radius:5%;display: block;margin-right: auto;margin-left: auto; margin-top:5%" class="btn btn-secondary col-2" >
          <i class="fa fa-arrow-left" >Volver</i> 
      </a>
          </div>
        </div>
      </div>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
      <?php
  
  }


mysqli_close($conexion);








?>