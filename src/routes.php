<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});

$app->get(
    '/form',
    'App\Controller\FormController:showAction'
);

$app->get(
    '/status',
    'App\Controller\StatusController:showAction'
);

$app->get(
    '/consulta',
    'App\Controller\CpfBlacklistController:consultAction'
);

$app->group('/api/v1', function () {
    $this->get(
        '/status',
        'App\Controller\StatusController:showAction'
    );
    $this->group('/cpf/blacklist', function () {
        $this->get(
            '/events',
            'App\Controller\CpfBlacklistEventController:listAction'
        );
        $this->get(
            '/consulta',
            'App\Controller\CpfBlacklistController:consultAction'
        );
        $this->get(
            '',
            'App\Controller\CpfBlacklistController:listAction'
        );
        $this->post(
            '',
            'App\Controller\CpfBlacklistController:postAction'
        );
        $this->get(
            '/{id}',
            'App\Controller\CpfBlacklistController:getAction'
        );
        $this->delete(
            '/{id}',
            'App\Controller\CpfBlacklistController:deleteAction'
        );
    });
});
