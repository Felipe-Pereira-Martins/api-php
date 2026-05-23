<?php
/* Bloqueia o acesso direto por que precisa passar pelo index */
defined('CONTROL') or die('Acesso inválido');
$api = new ApiConsumer();
$country = $_GET['country_name'] ?? null;

if (!$country) {
    header('Location: ?route=home');
    die();
}

/* Get busca os dados do pais */
$country_data = $api->get_country($country);
?>

<div class="back-link">
    <a href="?route=home">Voltar</a>
</div>

<div class="container country-box">

    <div class="flag-box">
        <img
            src="<?= $country_data[0]['flags']['png'] ?>"
            class="flag-img"
            alt="Bandeira de <?= htmlspecialchars($country_data[0]['name']['common'] ?? '') ?>">
    </div>

    <div class="info-box">

        <h1>
            <?= $country_data[0]['name']['common'] ?? 'País não encontrado' ?>
        </h1>

        <div class="info-item">
            <strong>Capital</strong>
            <span><?= $country_data[0]['capital'][0] ?? 'Não informado' ?></span>
        </div>

        <div class="info-item">
            <strong>População</strong>
            <span>
                <?= isset($country_data[0]['population'])
                    ? number_format($country_data[0]['population'], 0, ',', '.')
                    : 'Não informado' ?>
            </span>
        </div>

        <span class="source-badge">Fonte: REST Countries API</span>

    </div>

</div>