<?php
return new \Phalcon\Config(array(
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
));

