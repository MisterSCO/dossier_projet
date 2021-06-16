<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

use inc\Entity\God;
use inc\Entity\Item;

require_once 'config/config.php';
require_once('_bootstrap.php');

$img = MEDIAS_DEFAULT;
$img_path = PATH_MEDIAS . MEDIAS_DEFAULT . '/';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';

// Appele de la fonction pour choisir un dieu aléatoirement dans la base de donnée
$query_god = God::getGod();
$god = $query_god->fetch();

if ($god['id_class'] == 1 || $god['id_class'] == 3)
{
    $id_item = 2;
}
else {
    $id_item = 1;
}

$query_items = Item::getItemsById($id_item);


// Affichage
$template = 'index';
include_once $theme_default . 'layout.phtml';
