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

$message = '';

$aClasses = Classe::getAll();

if (!empty($_POST)) {

    if (empty($_POST['name']) || empty($_POST['title']) || empty($_POST['mythologie']) || empty($_POST['id_class'])|| empty($_POST['picture_god']) || empty($_POST['description'])) {
        $message = '* Veuillez remplir tout les champs';
    } else {

        $god = array();

        //trim() - Supprime les espaces (ou autre caractères) en début et fin de chaîne
        $god['name'] = htmlspecialchars($_POST['name']);
        $god['title'] = htmlspecialchars($_POST['title']);
        $god['mythologie'] = htmlspecialchars(trim($_POST['mythologie']));
        $god['id_class'] = intval($_POST['id_class']);
        $god['picture_god'] = htmlspecialchars(trim($_POST['picture_god']));
        $god['description'] = htmlspecialchars($_POST['description']);


        God::create($god);

        header('Location: admin_god.php');
    }
}


/* Partie inclusion de la vue */
$template = 'add_god';
include_once $theme_default . 'layout.phtml';