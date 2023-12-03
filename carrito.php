<?php include('header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
  // Si el usuario no ha iniciado sesión, redirigir a la página de registro
  header('Location: registrar.php');
  exit();
}
$amount = 0;
foreach ($_SESSION['carrito'] as $producto) {
  $amount += $producto['pro_precio'] * $producto['cantidad'];
}
?>

<div class="container">
  <h2>Carrito de compras</h2>
  <br><br><br><br>
  <table class="table">
    <thead>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Borrar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['carrito'] as $index => $producto): ?>
        <tr>
          <td><img style="width: 108px; height: 100px;" src="<?php echo $producto['pro_imagen']; ?>" alt="" /></td>
          <td>
            <?php echo $producto['pro_nombre']; ?>
          </td>
          <td>$
            <?php echo $producto['pro_precio']; ?>
          </td>
          <td>
            <form id="form1_<?php echo $index; ?>" name="form2" method="POST" action="agregar_al_carrito.php">
              <input name="id" type="hidden" id="id" value="<?php echo $index; ?>">
              <input type="text" name="cantidad" id="cantidad" value="<?php echo $producto['cantidad']; ?>"
                style="width:50px;" size="1" maxlength="4">
              <a href="#" title="actualizar" onclick="document.getElementById('form1_<?php echo $index; ?>').submit();"><i
                  class="fa fa-refresh" aria-hidden="true"></i></a>
            </form>

          </td>
          <td>$
            <?php echo $producto['pro_precio'] * $producto['cantidad']; ?>
          </td>
          <td>
            <form id="form3_<?php echo $index; ?>" name="form4" method="POST" action="agregar_al_carrito.php">
              <input type="hidden" name="id2" id="id2" value="<?php echo $index; ?>">
              <a href="" onclick="document.getElementById('form3_<?php echo $index; ?>').submit();" style="color:#F07155;"
                class="btn col-2" title="Eliminar">
                <i class="fa fa-trash fa-lg"></i>
              </a>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="text-right">
    <h4>Transporte: $
      <?php $transporte = 7000;
      echo number_format($transporte, 0); ?>
    </h4>
    <h4>IVA: $
      <?php $iva = $amount * 0.19;
      echo number_format($iva, 0); ?>
    </h4>
    <h4>Total: $
      <?php $totalf = intval($amount + $iva + $transporte);
      echo number_format($totalf, 0); ?>
    </h4>
    <br>
    <?php
    
    function get_ws($data, $method, $type, $endpoint)
    {
      $curl = curl_init();
      if ($type == 'live') {
        $TbkApiKeyId = '597055555532';
        $TbkApiKeySecret = '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C';
        $url = "https://webpay3g.transbank.cl" . $endpoint; //Live
      } else {
        $TbkApiKeyId = '597055555532';
        $TbkApiKeySecret = '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C';
        $url = "https://webpay3gint.transbank.cl" . $endpoint; //Testing
      }
      curl_setopt_array(
        $curl,
        array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => $method,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => $data,
          CURLOPT_HTTPHEADER => array(
            'Tbk-Api-Key-Id: ' . $TbkApiKeyId . '',
            'Tbk-Api-Key-Secret: ' . $TbkApiKeySecret . '',
            'Content-Type: application/json'
          ),
        )
      );
      $response = curl_exec($curl);
      curl_close($curl);
      //echo $response;
      return json_decode($response);
    }
    $baseurl = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $url = "https://webpay3g.transbank.cl/"; //Live
    $url = "https://webpay3gint.transbank.cl/"; //Testing
    $url3 = "http://localhost/agroshop/pedido.php";
    $action = isset($_GET["action"]) ? $_GET["action"] : 'init';
    $message = null;
    $post_array = false;

    $message .= 'init';
    $buy_order = rand();
    $session_id = $_SESSION['id_usuario'];
    $return_url = $url3 . "?action=getResult";
    $type = "sandbox";
    $data = '{
                            "buy_order": "' . $buy_order . '",
                            "session_id": "' . $session_id . '",
                            "amount": ' . $totalf . ',
                            "return_url": "' . $return_url . '"
                            }';
    $method = 'POST';
    $endpoint = '/rswebpaytransaction/api/webpay/v1.0/transactions';

    $response = get_ws($data, $method, $type, $endpoint);
    $message .= print_r($response, TRUE);
    $url_tbk = $response->url;
    $token = $response->token;
    $submit = 'Pagar';
    $_SESSION['transaction_data'] = $response; 
    $_SESSION['totalf'] = $totalf;
    ?>

    <?php if (strlen($url_tbk)) { ?>
      <form name="brouterForm" id="brouterForm" method="POST" action="<?= $url_tbk ?>" style="display:block;">
        <input type="hidden" name="token_ws" value="<?= $token ?>" />
        <input type="submit" value="<?= (($submit) ? $submit : 'Cargando...') ?>" style="border: 1px solid #6b196b;
          border-radius: 4px;
          background-color: #6b196b;
          color: #fff;
          font-family: Roboto,Arial,Helvetica,sans-serif;
          font-size: 1.14rem;
          font-weight: 500;
          margin: auto 0 0;
          padding: 12px;
          position: relative;
          text-align: center;
          -webkit-transition: .2s ease-in-out;
          transition: .2s ease-in-out;
          max-width: 200px;" />
      </form>
    <?php } ?>
  </div>
</div>
<br><br><br><br><br><br><br>


<?php include('footer.php'); session_write_close() ?>