<?php

use Entity\God;
use Entity\Classe;

require_once 'config/config.php';
require_once 'model/functions.php';
require_once 'model/sessions.php';
require_once '_bootstrap.php';



$theme_default = THEME_PATH . THEME_DEFAULT . '/';
init_session();



if (is_logged() !== true) {
    header('Location: index.php');
    exit;
}

$message = '';

$aClasses = Classe::getAll();

if (!empty($_POST)) {

    if (empty($_POST['name']) || empty($_POST['title']) || empty($_POST['mythologie']) || empty($_POST['id_class'])|| empty($_POST['picture_god']) || empty($_POST['description'])) {
        $message = '* Veuillez remplir tout les champs';
    } else {

        /* Création d'un nouvel objet */
        $oGod = new God();
        $oGod->setName(htmlspecialchars($_POST['name']));
        $oGod->setTitle(htmlspecialchars($_POST['title']));
        $oGod->setMythologie(htmlspecialchars($_POST['mythologie']));
        $oGod->setClass(htmlspecialchars($_POST['id_class']));
        $oGod->setImg(htmlspecialchars($_POST['picture_god']));
        $oGod->setDescription(htmlspecialchars($_POST['description']));
        $oGod->create();

        header('Location: admin_god.php');
    }
}


/* Partie inclusion de la vue */
$template = 'add';
include_once $theme_default . 'layout.phtml';