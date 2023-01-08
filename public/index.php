<?php

use Phalcon\Mvc\Application;

// Load the environment variables
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
// $dotenv->load();

// Load the dependencies
// require __DIR__ . '/../vendor/autoload.php';

// Load the services
$services = require __DIR__ . '/../app/config/services.php';

// Load the application
$app = new Application($services);

// Load the routes
$app->router->mount(require __DIR__ . '/../app/routes.php');

// Handle the request
$app->handle();

?>
