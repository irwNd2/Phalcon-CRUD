<?php

use Phalcon\Mvc\Router;

$router = new Router();

// Set the base URI
$router->setBaseUri('/phalcon-crud/');

// Define the routes
$router->add('/api/users', [
    'controller' => 'user',
    'action' => 'list',
])->via('GET');

$router->add('/api/users', [
    'controller' => 'user',
    'action' => 'create',
])->via('POST');

$router->add('/api/users/{id}', [
    'controller' => 'user',
    'action' => 'read',
])->via('GET');

$router->add('/api/users/{id}', [
    'controller' => 'user',
    'action' => 'update',
])->via('PUT');

$router->add('/api/users/{id}', [
    'controller' => 'user',
    'action' => 'delete',
])->via('DELETE');

return $router;

?>
