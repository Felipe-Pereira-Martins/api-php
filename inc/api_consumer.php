<?php
class ApiConsumer
{   /* Post fieldw => Imagine se queremos fazer um pédido a uma API no qual ao invés do método usado seja o GET mais sim o POST */
    private function api($endpoint, $method = 'GET', $post_fields = [])
    {
        /* curl */
        $curl = curl_init(); /* Inicia um conjunto de informações criando um objeto chamado curl */
        /* Cria um array para esse objeto CURLOPT -> OPT é igual a option */
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://restcountries.com/v3.1/$endpoint?fields=name,flags,population,region,capital",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30, /* Se ouver um pedido e ele não for atendido em 30 segundos vai gerar um erro */
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "$method", /* Métoda   o de request */
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            die(0);
        } else {
            return json_decode($response, true);
        }
    }

    public function get_all_countries()
    {
        /* get all countries data */
        $results = $this->api('all');
        $countries = [];
        foreach ($results as $result){
            $countries[] = $result['name']['common']; /* name e common são estruturas utilizadas na api, nem sewmpre vai ser assim */
        }
        sort($countries); /* Os paises são exibidos em ordem alfabética */
        return $countries;
    }

    public function get_country($country_name)
    {
        // Get de uma pais em especifico
    return $this->api("name/$country_name");
    }
}