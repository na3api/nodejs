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
$routes->add("/flats",array("controller" => "items","action"=> "index",));

$routes->notFound(array(
    "controller" => "error",
    "action"     => "404"
));
$routes->handle();