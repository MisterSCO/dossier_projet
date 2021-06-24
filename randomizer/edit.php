<?php

use Entity\God;
use Entity\Classe;

require_once 'config/config.php';
require_once 'inc/functions.php';
require_once 'inc/sessions.php';
require_once '_bootstrap.php';



$theme_default = THEME_PATH . THEME_DEFAULT . '/';
init_session();



if (is_logged() !== true) {
    header('Location:index.php');
    exit;
}

$aClasses = Classe::getAll();

$message = '';

if (!empty($_GET['id'])) {
    $oGod = God::get(intval($_GET['id']));
    // Tableau de données
    $aFormDatas = array(
        'id_god' => $oGod->getId(),
        'name' => $oGod->getName(),
        'title' => $oGod->getTitle(),
        'mythologie' => $oGod->getMythologie(),
        'id_class' => $oGod->getClass(),
        'picture_god' => $oGod->getImg(),
        'description' => $oGod->getDescription()
    );
}

//Si un formulaire est posté
if (!empty($_POST)) {

    $aFormDatas = array(
        'id_god' => htmlspecialchars($_POST['id_god']),
        'name' => htmlspecialchars($_POST['name']),
        'title' => htmlspecialchars($_POST['title']),
        'mythologie' => htmlspecialchars($_POST['mythologie']),
        'id_class' => htmlspecialchars($_POST['id_class']),
        'picture_god' => htmlspecialchars($_POST['picture_god']),
        'description' => htmlspecialchars($_POST['description'])
    );

    if (empty($_POST['name']) || empty($_POST['title']) || empty($_POST['mythologie']) || empty($_POST['id_class']) || empty($_POST['picture_god']) || empty($_POST['description'])) {
        $message = '* Veuillez remplir tout les champs';
    }
    else{

        $oGod = new God();

        $oGod->setId(htmlspecialchars($_POST['id_god']));
        $oGod->setName(htmlspecialchars($_POST['name']));
        $oGod->setTitle(htmlspecialchars($_POST['title']));
        $oGod->setMythologie(htmlspecialchars($_POST['mythologie']));
        $oGod->setImg(htmlspecialchars($_POST['picture_god']));
        $oGod->setClass(htmlspecialchars($_POST['id_class']));
        $oGod->setDescription(htmlspecialchars($_POST['description']));

        
        $oGod->save();
        header('Location: admin_god.php');
        
    }
}

/* Partie inclusion de la vue */
$template = 'edit';
include_once $theme_default . 'layout.phtml';