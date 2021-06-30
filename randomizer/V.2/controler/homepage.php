<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

use Entity\God;
use Entity\Item;
use Entity\Classe;

$title = '';
$descrip = 'Support de sélection aléatoirement votre personnage et vos objets pour le jeu SMITE';

require_once 'config/config.php';
require_once('_bootstrap.php');

$img = MEDIAS_DEFAULT;
$img_path = PATH_MEDIAS . MEDIAS_DEFAULT . '/';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';

// Appele de la fonction pour choisir un dieu aléatoirement dans la base de données
$oGod = God::getRandom();

$oClasse = Classe::get($oGod->getClass());
/* var_dump($aGods); */


$query_items = Item::getRandomItemsById($oClasse->getType());

// Affichage
$template = 'homepage';
include_once $theme_default . 'layout.php';
