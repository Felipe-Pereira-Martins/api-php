<?php
/* Bloqueia o acesso direto por que precisa passar pelo index */
defined('CONTROL') or die('Acesso inválido'); 

/* Data de todos os paises disponivel na API */
$api = new ApiConsumer();
$countries = $api->get_all_countries();
?>

<!-- Criação do layout com bootstrap 5  -->
 <div class="container mt-5">
    <div class="row">
        <div class="col text-center">
             <h3>Paises do Mundo</h3>
             <hr>            
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <p>Lista de países</p>
            <select id="select_country" class="form select">
                <option value="">Escolha um país</option>
                <?php foreach($countries as $country) : ?>
                <option value="<?= $country?>"><?= $country ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

</div> 

<script>
    /* JS para exibir as informações dos paises */
    document.addEventListener('DOMContentLoaded', () => {

        const select_country = document.querySelector ("#select_country");
        select_country.addEventListener('change', () => {
           const country = select_country.value;
           window.Location.href = `?route=country&country_name=${country}`
        })

    })
</script>