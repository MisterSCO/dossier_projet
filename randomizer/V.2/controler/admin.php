<?php

use Entity\God;

require_once 'config/config.php';
require_once 'config/sessions.php';
require_once '_bootstrap.php';

$title = 'Tableau de bord |';
$descrip = 'Gestion des dieux';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';


if (is_logged() !== true) {
    header('Location: ./');
    exit;
}


$aGods = God::getAll();


/* var_dump($oGod); */

if (isset($_GET['search']) && !empty($_GET['search'])) {
    
    $search = htmlspecialchars($_GET['search']);
    $aGods = God::search($search);

}


/* Partie inclusion de la vue */
$template = 'admin';
include_once $theme_default . 'layout-admin.php';