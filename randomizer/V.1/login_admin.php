<?php

use Entity\User;

require_once 'config/config.php';
require_once('inc/sessions.php');
require_once '_bootstrap.php';

$theme_default = THEME_PATH . THEME_DEFAULT . '/';

$message = '';

if (
    array_key_exists('email', $_POST)
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false
) {
    


    $user = User::getAdminbyLogin(htmlspecialchars(trim($_POST['email'])));


    if (
        !empty($user)
        && password_verify($_POST['pass'], $user->getPass()) === true
    ) {
        require_once 'inc/sessions.php';

        init_session();

        //session_start();

        //Remplace l'identifiant de session courant par un nouveau
        //session_regenerate_id();

        $_SESSION['id_admin'] = intval($user->getId());


        header('Location: admin.php');
        exit;
    }

    $message = 'Email ou Mot de passe incorrecte';
}
$template = 'login_admin';
include_once $theme_default . 'layout.phtml';