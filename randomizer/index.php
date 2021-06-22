<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

use Entity\God;
use Entity\Item;

require_once 'config/config.php';
require_once('_bootstrap.php');

$img = MEDIAS_DEFAULT;
$img_path = PATH_MEDIAS . MEDIAS_DEFAULT . '/';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';

// Appele de la fonction pour choisir un dieu aléatoirement dans la base de données
$aGods = God::getRandom();


/* var_dump($aGods); */

foreach ($aGods as $god) {
    if ($god->getID() == 1 || $god->getId() == 3) {
        $id_item = 2;
    } else {
        $id_item = 1;
    }
}


$query_items = Item::getRandomItemsById($id_item);

// Affichage
$template = 'index';
include_once $theme_default . 'layout.phtml';
