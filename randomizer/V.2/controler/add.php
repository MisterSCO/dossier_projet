<?php

use Entity\God;
use Entity\Classe;


require_once 'config/config.php';
require_once 'config/sessions.php';
require './vendor/autoload.php';

$title = 'Ajouter un dieu |';
$descrip = 'Ajouter un dieu manquant';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';
init_session();



if (is_logged() !== true) {
    header('Location: ./');
    exit;
}

$message = '* Tout les champs sont obligatoire';

$aClasses = Classe::getAll();

// Si La variable $_POST n'est pas vide
if (!empty($_POST)) {

    // On prépare des variables correspondant à la vérification si les données sont déjà présent en BDD 
    $verifyNameGod = God::VerifyBdd(trim($_POST['name']));
    $verifyTitleGod = God::VerifyBdd(trim($_POST['title']));
    
    // Si les champs ne sont pas remplis
    if (empty($_POST['name']) || empty($_POST['title']) || empty($_POST['mythologie']) || empty($_POST['id_class'])|| empty($_POST['description'])) {
        $message = '* Certains champs ne sont pas remplis';
    } 

    // Si le nom existe déjà
    elseif($verifyNameGod) {
        $message = '* Ce nom de dieu existe déjà';
    } 

    // Si un titre existe déjà
    elseif($verifyTitleGod) {
        $message = '* Ce titre existe déjà pour '. $verifyTitleGod->getName();
    } 
    
    // Sinon on ajoute en base de données
    else {

        // Création d'un nouvel objet remplit avec les Setter
        $oGod = new God();
        $oGod->setName(htmlspecialchars($_POST['name']));
        $oGod->setTitle(htmlspecialchars($_POST['title']));
        $oGod->setMythologie(htmlspecialchars($_POST['mythologie']));
        $oGod->setClass(htmlspecialchars($_POST['id_class']));
        $oGod->setDescription(htmlspecialchars($_POST['description']));
        // Envoie de l'objet en BDD
        $oGod->create();

        // Redirection au tableau de bord
        header('Location: /admin');
    }
}


/* Partie inclusion de la vue */
$template = 'add';
include_once $theme_default . 'layout-admin.php';