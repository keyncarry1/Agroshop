<?php include('header.php'); 
// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: registrar.php');
    exit;
  }
  
?>
<script src="https://kit.fontawesome.com/332b6ce5a2.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br><br>


<div  class="col-md-10 card card-body mb-5"  style="margin:auto;padding:auto;">
<h2 class="text-center mb-4">Informe de Ventas</h2>
<div class="container mt-4 row">
    

    <!-- Tabla de Ventas -->
    <div class="col">
    <table class="table borderless table-striped ">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Producto 1</td>
            <td>10</td>
            <td>$20.00</td>
            <td>$200.00</td>
        </tr>
        <tr>
            <td>Producto 2</td>
            <td>5</td>
            <td>$15.00</td>
            <td>$75.00</td>
        </tr>
        <!-- Agrega más filas según sea necesario -->
        </tbody>
        <tfoot>
        <tr>
            <th colspan="3" class="text-right">Total:</th>
            <th>$275.00</th>
        </tr>
        </tfoot>
    </table>
    </div>
    <!--Grafico Simulado-->
    <div class="col">
    <canvas id="graficoVentas" width="400" height="200"></canvas>
    </div>
</div>


<!-- Script para el Gráfico (simulado) -->
<script>
    // Datos de ejemplo para el gráfico
    var datosVentas = {
        labels: ["Producto 1", "Producto 2"],
        datasets: [{
            label: 'Ventas por Producto',
            data: [10, 5],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Obtener el contexto del lienzo
    var contexto = document.getElementById('graficoVentas').getContext('2d');

    // Crear el gráfico de barras
    var graficoVentas = new Chart(contexto, {
        type: 'bar',
        data: datosVentas,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
    </div>
</div>
    
</div>



<?php
include('footer.php'); ?>