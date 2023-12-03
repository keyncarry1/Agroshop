<?php
include_once '../config/config.php';
session_start();

$subtotal = 0;
$iva = 0.19;
$transporte = 7000;
$totalf= 0;
$usuario = $_SESSION['id_usuario'];
$query = "SELECT * FROM usuario WHERE id_usuario = '$usuario'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);

$factura = rand();
$codec = rand();
# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('./img/logo.png', 165, 16, 45, 35, 'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("Agroshop")), 0, 0, 'L');

$pdf->Ln(9);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "RUT: 43.453.453-2"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Direccion: 4730 Maipo, Region metropolitana, Santiago 8450000"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Teléfono: +569 57462146"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Email: agroshop@correo.com"), 0, 0, 'L');

$pdf->Ln(10);


$query1 = "SELECT * FROM pedido WHERE ped_ref = '".$_REQUEST["dat"]."' ";

$resultado_pedidos = mysqli_query($conexion, $query1);

while ($pedidos = mysqli_fetch_assoc($resultado_pedidos)) {

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(116, 7, iconv("UTF-8", "ISO-8859-1", $pedidos['ped_fecha']), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("Factura Nro. ".$pedidos['id_pedido'])), 0, 0, 'C');
}
$pdf->Ln(7);

$pdf->Ln(10);
# datos cliente#
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "Cliente: "), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $row['usu_nombre']. ' ' .$row['usu_apellido']), 0, 0, 'L');
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(8, 7, iconv("UTF-8", "ISO-8859-1", "RUT: "), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $row['usu_rut']), 0, 0, 'L');
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(7, 7, iconv("UTF-8", "ISO-8859-1", "Tel: "), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", $row['usu_telefono']), 0, 0);
$pdf->SetTextColor(39, 39, 51);

$pdf->Ln(7);

$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(6, 7, iconv("UTF-8", "ISO-8859-1", "Dir: "), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(109, 7, iconv("UTF-8", "ISO-8859-1", $row['usu_direccion']), 0, 0);

$pdf->Ln(9);

# Tabla de productos #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetDrawColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(90, 8, iconv("UTF-8", "ISO-8859-1", "Descripción"), 1, 0, 'C', true);
$pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", "Cant."), 1, 0, 'C', true);
$pdf->Cell(25, 8, iconv("UTF-8", "ISO-8859-1", "Precio"), 1, 0, 'C', true);
$pdf->Cell(19, 8, iconv("UTF-8", "ISO-8859-1", "Desc."), 1, 0, 'C', true);
$pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);

$pdf->Ln(8);


$pdf->SetTextColor(39, 39, 51);

$query = "SELECT a.pdd_nombre, a.pdd_cantidad, a.pdd_precio
FROM pedidodatos a
WHERE a.pdd_ref = '".$_REQUEST["dat"]."' ";

$resultado_pedido = mysqli_query($conexion, $query);

while ($pedido = mysqli_fetch_assoc($resultado_pedido)) {
    
$cantidadp = $pedido['pdd_cantidad'] * $pedido['pdd_precio'];
/*----------  Detalles de la tabla  ----------*/
$pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", $pedido['pdd_nombre']), 'L', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", $pedido['pdd_cantidad']), 'L', 0, 'C');
$pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", "$ " .number_format($pedido['pdd_precio'], 0, ',', '.')." CLP"), 'L', 0, 'C');
$pdf->Cell(19, 7, iconv("UTF-8", "ISO-8859-1", "$ 0.00 CLP"), 'L', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$ ". number_format($cantidadp, 0, ',', '.'). " CLP"), 'LR', 0, 'C');
$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/
$subtotal += $pedido['pdd_precio'] * $pedido['pdd_cantidad'];
}


$pdf->SetFont('Arial', 'B', 9);

# Impuestos & totales #
$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 'T', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ $ ".number_format($subtotal, 0, ',', '.'). "CLP"), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TRANSPORTE"), '', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+$ ". number_format($transporte, 0, ',', '.')." CLP"), '', 0, 'C');

$pdf->Ln(7);
$ivaf = $subtotal * $iva;
$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "IVA (19%)"), '', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ $ $ivaf  CLP"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');

$totalf = $subtotal + $transporte + $ivaf;
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 'T', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", number_format($totalf, 0, ',', '.')."CLP"), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL PAGADO"), '', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", number_format($totalf, 0, ',', '.')."CLP"), '', 0, 'C');

$pdf->Ln(7);
$pdf->Ln(12);

$pdf->SetFont('Arial', '', 9);

$pdf->SetTextColor(39, 39, 51);
$pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"), 0, 'C', false);

$pdf->Ln(9);

# Codigo de barras #
$pdf->SetFillColor(39, 39, 51);
$pdf->SetDrawColor(23, 83, 201);
$pdf->Code128(72, $pdf->GetY(), "$codec", 70, 20);
$pdf->SetXY(12, $pdf->GetY() + 21);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "$codec"), 0, 'C', false);

# Nombre del archivo PDF #
$pdf->Output("I", "Factura_Nro_$factura.pdf", true);