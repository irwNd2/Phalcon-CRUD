<?php

use Phalcon\Config;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql;

$di = new FactoryDefault();

// Set up the database connection
$di->set('db', function () {
    return new Mysql([
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'mariadb',
        'dbname' => 'chatgpt',
    ]);
});

// Set up the application config
$di->set('config', function () {
    return new Config([
        'debug' => true,
    ]);
});

return $di;

?>
