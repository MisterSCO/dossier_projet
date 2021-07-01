<?php

use Entity\Admin;

require_once 'config/config.php';
require_once('config/sessions.php');
require_once '_bootstrap.php';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';

$message = '';
$title = 'Connexion |';
$descrip = 'Outil qui choisis aléatoirement votre personnage et vos objets';

if (is_logged() == true) {
    header('Location: /admin');
    exit;
}

if (
    array_key_exists('email', $_POST)
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false
) {
    


    $user = Admin::getAdminbyLogin(htmlspecialchars(trim($_POST['email'])));


    if (
        !empty($user)
        && password_verify($_POST['pass'], $user->getPass()) == true
    ) {
        require_once 'config/sessions.php';
        

        init_session();


        //session_start();

        //Remplace l'identifiant de session courant par un nouveau
        //session_regenerate_id();

        $_SESSION['id_admin'] = intval($user->getId());


        header('Location: /admin');
        exit;
    } 

    $message = 'Email ou Mot de passe incorrecte';
}
$template = 'login_admin';
include_once $theme_default . 'layout-admin.php';