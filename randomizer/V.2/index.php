<?php

require './vendor/autoload.php';
require './config/sessions.php';



$router = new AltoRouter();

$router->map('GET', '/', 'homepage');
$router->map('GET|POST', '/login', 'login_admin');
$router->map('GET', '/admin', 'admin');
$router->map('GET', '/logout', 'logout');
$router->map('GET|POST', '/edit', 'edit');
$router->map('GET', '/delete', 'delete');
$router->map('GET|POST', '/add', 'add');

$match = $router->match();

if (is_array($match)) {
    require "./templates/{$match['target']}.php";
} else {
    require 'templates/404.php';
}
