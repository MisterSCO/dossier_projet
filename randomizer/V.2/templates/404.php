<?php
require_once 'config/config.php';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';
// Pour bien faire, il faudrait tester le type d'erreur avec un switch par exemple

$http_response = http_response_code();
$error = array_key_exists('er', $_GET) ? intval($_GET['er']) : $http_response;

switch ($error) {
    case 401:
        header('HTTP/1.1 401 Not Found');
        $description = 'Accès non autorisé';
        break;

    case 503:
        header('HTTP/1.1 503 Not Found');
        $description = 'Service temporairement indisponible ou en maintenance.';
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        $description = 'Ressource non trouvée';
}
/* Partie inclusion de la vue */
$template = '404';
include_once $theme_default . 'layout.php';