<?php

use Phalcon\Mvc\Dispatcher\Exception as DispatchException;

$di->set('router', function() use ($config) {
    $routes = new \Phalcon\Mvc\Router(false);
    $routes->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);
    
    include APP_PATH . "/app/router.php";
    return $routes;
});
