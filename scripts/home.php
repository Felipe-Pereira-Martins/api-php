<?php
/* Bloqueia o acesso direto por que precisa passar pelo index */
defined('CONTROL') or die('Acesso inválido');

/* Data de todos os paises disponivel na API */
$api = new ApiConsumer();
$countries = $api->get_all_countries();
?>

<div class="home-wrap">

    <div class="home-header">
        <p class="home-eyebrow">REST Countries API</p>
        <h1 class="home-title">Países do Mundo</h1>
        <p class="home-subtitle">Selecione um país para ver capital, população e bandeira.</p>
    </div>

    <div class="search-box">
        <label for="select_country" class="search-label">País</label>
        <div class="select-wrap">
            <select id="select_country" class="country-select">
                <option value="">Escolha um país...</option>
                <?php foreach($countries as $country) : ?>
                <option value="<?= $country ?>"><?= $country ?></option>
                <?php endforeach; ?>
            </select>
            <span class="select-arrow" aria-hidden="true">&#8964;</span>
        </div>
        <p class="search-hint"><?= count($countries) ?> países disponíveis</p>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const select_country = document.querySelector('#select_country');
        select_country.addEventListener('change', () => {
            const country = select_country.value;
            if (country) window.location.href = `?route=country&country_name=${country}`;
        });
    });
</script>