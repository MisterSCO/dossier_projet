<?php

use Entity\God;
use Entity\Classe;

require_once 'config/config.php';
require_once 'config/sessions.php';
require 'vendor/autoload.php';

$title = 'Editer un dieu |';
$descrip = 'Editer un dieu déjà existant';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';
init_session();



if (is_logged() !== true) {
    header('Location: ./');
    exit;
}

$aClasses = Classe::getAll();

$message = '* Tout les champs sont obligatoire';

if (!empty($_GET['id'])) {
    $oGod = God::get(intval($_GET['id']));
    // Tableau de données
    $aFormDatas = array(
        'id_god' => $oGod->getId(),
        'name' => $oGod->getName(),
        'title' => $oGod->getTitle(),
        'mythologie' => $oGod->getMythologie(),
        'id_class' => $oGod->getClass(),
        'description' => $oGod->getDescription()
    );
}

//Si un formulaire est posté
if (!empty($_POST)) {

    $verifyNameGod = God::VerifyBdd(trim($_POST['name']));
    $verifyTitleGod = God::VerifyBdd(trim($_POST['title']));
    

    $aFormDatas = array(
        'id_god' => htmlspecialchars($_POST['id_god']),
        'name' => htmlspecialchars($_POST['name']),
        'title' => htmlspecialchars($_POST['title']),
        'mythologie' => htmlspecialchars($_POST['mythologie']),
        'id_class' => htmlspecialchars($_POST['id_class']),
        'description' => htmlspecialchars($_POST['description'])
    );

    if (empty($_POST['name']) || empty($_POST['title']) || empty($_POST['mythologie']) || empty($_POST['id_class'])  || empty($_POST['description'])) {
        $message = '* Certains champs ne sont pas remplis';
    } elseif ($verifyNameGod && $verifyNameGod->getId() != $aFormDatas['id_god']) {
        $message = '* Ce nom de dieu existe déjà';
    } elseif ($verifyTitleGod && $verifyTitleGod->getId() != $aFormDatas['id_god']) {
        $message = '* Ce titre existe déjà pour ' . $verifyTitleGod->getName();
    }

    else{

        $oGod = new God();

        $oGod->setId(htmlspecialchars($_POST['id_god']));
        $oGod->setName(htmlspecialchars($_POST['name']));
        $oGod->setTitle(htmlspecialchars($_POST['title']));
        $oGod->setMythologie(htmlspecialchars($_POST['mythologie']));
        $oGod->setClass(htmlspecialchars($_POST['id_class']));
        $oGod->setDescription(htmlspecialchars($_POST['description']));

        
        $oGod->save();
        header('Location: /admin');
        
    }
}

/* Partie inclusion de la vue */
$template = 'edit';
include_once $theme_default . 'layout-admin.php';