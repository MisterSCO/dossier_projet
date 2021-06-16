<?php //***** Fichier de gestion des sessions *****\\

/**
 * init_session
 * Initialise les sessions et régénère l'id de session
 *
 * @return bool
 */
function init_session(): bool
{
    // Si les sessions ne sont pas encore initialisées
    if (!session_id()) {
        session_start();
        session_regenerate_id();
        return true;
    }

    return false;
}

/**
 * is_logged
 *
 * Vérifier si l'utilisateur est loggé
 * 
 * @return bool
 */
function is_logged(): bool
{
    if (array_key_exists('id_user', $_SESSION)) {
        return true;
    }
    return false;
}

/**
 * détruit la session
 *
 * @return void
 */
function clean_session(): void
{
    session_unset();
    session_destroy();
    $_SESSION = array();
}
