<?php

use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\App;
// Game

$app->group('/teste', function (\Slim\Routing\RouteCollectorProxy $group){

    $group->get('/', \App\Controller\Teste::class.':teste');

});

$app->group('/puzzle', function (\Slim\Routing\RouteCollectorProxy $group){
   $group->post('/', \App\Controller\PuzzleController::class.':gera_8_puzzle');
   $group->post('/embaralhar', \App\Controller\PuzzleController::class.':embaralha');
});

$app->group('/game-setup-webservice/paletas', function (\Slim\Routing\RouteCollectorProxy $group) {

    $group->get('/', \App\Controller\PaletaCoresController::class.':buscar_paletas');

    $group->get('/{id}', \App\Controller\PaletaCoresController::class.':buscar_paletas_por_id');

    $group->post('/edit', \App\Controller\PaletaCoresController::class.':editar_paleta');

    $group->post('/', \App\Controller\PaletaCoresController::class.':inserir_paleta');

});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});