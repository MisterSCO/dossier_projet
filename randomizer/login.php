<?php

require_once 'config/config.php';
require_once('inc/fonctions.php');

$theme_default = THEME_PATH . THEME_DEFAULT . '/';

$message = '';

if (
    array_key_exists('email', $_POST)
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false
) {
    require_once('model/functions.php');

    
    $user = getUserbyLogin(trim($_POST['email']));

    if (
        !empty($user)
        && password_verify(trim($_POST['pass']), $user['pass']) === true
    ) {
        require_once 'model/utils.php';

        init_session();

        //session_start();

        //Remplace l'identifiant de session courant par un nouveau
        //session_regenerate_id();

        $_SESSION['id_user'] = intval($user['id_user']);
        $_SESSION['pseudo'] = htmlspecialchars($user['pseudo']);
        header('Location: admin.php');
        exit;
    }

    $message = 'Email ou Mot de passe incorrecte';
}

$template = 'login';
include_once $theme_default . 'layout.phtml';