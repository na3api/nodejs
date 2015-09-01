<?php
$routes->add("/favorites",
    array(
        "controller" => "favorites",
        "action"     => "index",
    )
);
$routes->add("/",
    array(
        "controller" => "home",
        "action"     => "index",
    )
);
// DEV ONLY 

$routes->notFound(array(
    "controller" => "error",
    "action"     => "notFound"
));
$routes->handle();