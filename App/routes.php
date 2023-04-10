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
   $group->post('/manhattan', \App\Controller\PuzzleController::class.':distanciaManhattan');
   $group->post('/dfs', \App\Controller\PuzzleController::class.':dfs');
});

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});