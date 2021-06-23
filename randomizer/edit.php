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
    header('Location:index.php');
    exit;
}

$aClasses = Classe::getAll();



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

    $oGod = new God();

    if (array_key_exists('name', $_POST)) {
        $oGod->setName(htmlspecialchars($_POST['name']));
    }
    if (array_key_exists('title', $_POST)) {
        $oGod->setTitle(htmlspecialchars($_POST['title']));
    }
    if (array_key_exists('mythologie', $_POST)) {
        $oGod->setMythologie(htmlspecialchars($_POST['mythologie']));
    }
    if (array_key_exists('picture_god', $_POST)) {
        $oGod->setImg(htmlspecialchars($_POST['picture_god']));
    }
    if (array_key_exists('id_class', $_POST)) {
        $oGod->setClass(htmlspecialchars($_POST['id_class']));
    }
    if (array_key_exists('description', $_POST)) {
        $oGod->setDescription(htmlspecialchars($_POST['description']));
    }
    
    if (!isset($error)) {
        $oGod->save();
        header('Location: admin_god.php');
    }
}

/* Partie inclusion de la vue */
$template = 'edit';
include_once $theme_default . 'layout.phtml';