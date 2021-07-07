<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


use Entity\God;
use Entity\Item;
use Entity\Classe;

init_session();

// Partie HEAD
$title = '';
$descrip = 'Support de sélection aléatoire de votre personnage et vos objets pour le jeu SMITE';

require_once 'config/config.php';
require './vendor/autoload.php';



$theme_default = THEME_PATH . THEME_DEFAULT . '/';


$template = 'homepage';

$uri = $_SERVER['REQUEST_URI'];


if(strstr($uri, '/random'))
{
    // Appele de la fonction pour choisir un dieu aléatoirement dans la base de données
    $oGod = God::getRandom();

    $oClasse = Classe::get($oGod->getClass());
    /* var_dump($aGods); */


    // Appele de la fonction pour choisir les objets aléatoirement
    $aItems = Item::getRandom($oClasse->getType());


    // Affichage
    $template = 'random';
}


include_once $theme_default . 'layout.php';
