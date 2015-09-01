<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'test',
        'charset' => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir' => APP_PATH . '/app/models/',
        'migrationsDir' => APP_PATH . '/app/migrations/',
        'viewsDir' => APP_PATH . '/app/views/',
        'pluginsDir' => APP_PATH . '/app/plugins/',
        'libraryDir' => APP_PATH . '/app/library/',
        'cacheDir' => APP_PATH . '/app/cache/',
        'baseUri' => '/nedvex/',
    ),
    'settings' => array(
        'site_name' => 'Nedvex',
        'home_slider_size' => array(
            '680' => 1,
            '768' => 2,
            '992' => 4,
            '1200' => 6,
            '9000' => 12
        ),
        'favorites_slider_size' => 12,
        'watched_slider_size' => 4,
        'pagination_size' => 28,
        'max_top_size' => 100,
        'max_you_watched' => 4,
        'web_service_url' => 'http://webservices.nedvex.net',
        'get_ip_service' => 'http://getcitydetails.geobytes.com/GetCityDetails?fqcn={ip}',
        'header_phone' => '8 800 250 74 34',
    )
));
