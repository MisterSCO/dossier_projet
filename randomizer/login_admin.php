<?php

require_once 'config/config.php';
require_once('inc/sessions.php');

$theme_default = THEME_PATH . THEME_DEFAULT . '/';

$message = '';

if (
    array_key_exists('email', $_POST)
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false
) {
    require_once('inc/functions.php');


    $user = getAdminbyLogin(htmlspecialchars(trim($_POST['email'])));


    if (
        !empty($user)
        && password_verify(trim($_POST['pass']), $user['pass']) === true
    ) {
        require_once 'inc/sessions.php';

        init_session();

        //session_start();

        //Remplace l'identifiant de session courant par un nouveau
        //session_regenerate_id();

        $_SESSION['id_admin'] = intval($user['id_admin']);
        $_SESSION['pseudo'] = htmlspecialchars($user['pseudo']);


        header('Location: admin_god.php');
        exit;
    }

    $message = 'Email ou Mot de passe incorrecte';
}
$template = 'login_admin';
include_once $theme_default . 'layout.phtml';