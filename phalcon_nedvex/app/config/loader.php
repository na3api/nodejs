<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir
    )
)->register();

// $loader->registerNamespaces(array(
//     'Nedvex\Models' => $config->application->modelsDir,
//     'Nedvex\Controllers' => $config->application->controllersDir,
//     'Nedvex' => $config->application->libraryDir
// ))->register();