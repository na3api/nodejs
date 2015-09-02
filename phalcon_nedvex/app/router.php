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
$routes->add("/registration",
    array(
        "controller" => "user",
        "action"     => "registration",
    )
);
$routes->add("/register",
    array(
        "controller" => "user",
        "action"     => "create",
    )
);
// DEV ONLY 
$routes->add("/flats",array("controller" => "items","action"=> "index",));

$routes->notFound(array(
    "controller" => "error",
    "action"     => "404"
));
$routes->handle();
