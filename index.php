<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/config.php';

use Slim\Factory\AppFactory;
$container = new \DI\Container();

$app = AppFactory::createFromContainer($container);

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);

require __DIR__.'/app/routes.php';

$app->setBasePath('');

$app->run();