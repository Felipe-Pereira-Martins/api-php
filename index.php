<?php

/*  Defnir constasnte para controlar o fluxo da aplicação */
define('CONTROL', true);

/* Incluir arquivos */
$routes = require_once('inc/routes.php');
require_once('inc/api_consumer.php');

/* Definir rota */
$route = $_GET['route'] ?? 'home'; /* Se a rota for nula, irá retornar para a página home */

/* Se não existir uma rota dentro do array, o endereço da rota será 404 (Página com erro) */
if(!in_array($route, $routes)) {
    $route= '404';
}
/* Fluxo de rotas 
O que irá vir na minha rota
*/
switch($route) {
    /* Caso Home */
    case 'home':
    require_once 'inc/header.php';
    require_once 'scripts/home.php';
    require_once 'inc/footer.php';
    break;

    /* Caso Country */
    case 'country':
    require_once 'inc/header.php';
    require_once 'scripts/country.php';
    require_once 'inc/footer.php';
    break;

    /* Caso 404 */
    case '404':
    require_once 'inc/header.php';
    require_once 'scripts/404.php';
    require_once 'inc/footer.php';
    break;
}

/* Anotações de segurança
* Se quiser acesssar na url, na parte do script irá dar erro
 */

