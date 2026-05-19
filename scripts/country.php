<?php
/* Bloqueia o acesso direto por que precisa passar pelo index */
defined('CONTROL') or die('Acesso inválido'); 
$api = new ApiConsumer();
$country = $_GET['country_name'] ?? null;

if(!$country) {
     header('Location: ?route=home');
     die();
}

/* Get busca os dados do pais */
$country_data = $api->get_country($country);
?>

<div class="container mt-5">
    <div class="d-flex">
        <div class="card p-2 shadows">
            <!-- Exibir a bandeira do país -->
            <!-- Pega os dados do primeiro array
            capturando a bandeira e exibindo no formato png -->
            <img src="<?= $country_data[0]['flags']['png'] ?>">
        </div>
        <div class="ms-5 align-self-center">
            <p><?= $country_data[0]['name']['common'] ?></p>
            <p>Capital:</p>
            <p><?php $country_data[0]['capital'] ?></p>
        </div>
    </div>
</div>
