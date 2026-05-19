<?php
/* Bloqueia o acesso direto por que precisa passar pelo index */
defined('CONTROL') or die('Acesso inválido'); 

/* curl */

$curl = curl_init(); /* Inicia um conjunto de informações criando um objeto chamado curl */

/* Cria um array para esse objeto 
CURLOPT -> OPT é igual a option
*/
curl_setopt_array($curl, [
  CURLOPT_URL => "https://restcountries.com/v3.1/all?fields=name%2Cflags",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30, /* Se ouver um pedido e ele não for atendido em 30 segundos vai gerar um erro */
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "User-Agent: Thunder Client (https://www.thunderclient.com)",
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>

<!-- Criação do layout  -->
<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
             <h3>Consumindo API com PHP puro!</h3>
        </div>
    </div>
</div>