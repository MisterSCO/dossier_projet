<?php

use Entity\God;
use Entity\Classe;

require_once 'config/config.php';
require_once 'config/sessions.php';
require_once '_bootstrap.php';

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
    $verifyImgGod = God::VerifyBdd(trim($_POST['picture_god']));
    
    //
    if (empty($_POST['name']) || empty($_POST['title']) || empty($_POST['mythologie']) || empty($_POST['id_class'])|| empty($_POST['picture_god']) || empty($_POST['description'])) {
        $message = '* Certains champs ne sont pas remplis';
    } 
    elseif($verifyNameGod) {
        $message = '* Ce nom de dieu existe déjà';
    } 
    elseif($verifyTitleGod) {
        $message = '* Ce titre existe déjà pour '. $verifyTitleGod->getName();
    } 
    elseif($verifyImgGod) {
        $message = '* Cette image existe déjà pour '. $verifyImgGod->getName();
    }
    else {

        // Création d'un nouvel objet remplit avec les Setter
        $oGod = new God();
        $oGod->setName(htmlspecialchars($_POST['name']));
        $oGod->setTitle(htmlspecialchars($_POST['title']));
        $oGod->setMythologie(htmlspecialchars($_POST['mythologie']));
        $oGod->setClass(htmlspecialchars($_POST['id_class']));
        $oGod->setImg(htmlspecialchars($_POST['picture_god']));
        $oGod->setDescription(htmlspecialchars($_POST['description']));
        // Envoie de l'objet en BDD
        $oGod->create();

        // Redirection au tableau de bord
        header('Location: /admin');
    }
}


/* Partie inclusion de la vue */
$template = 'add';
include_once $theme_default . 'layout.php';