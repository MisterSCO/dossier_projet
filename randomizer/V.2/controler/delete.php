<?php

use Entity\God;



require_once 'config/config.php';
require_once 'config/sessions.php';
require './vendor/autoload.php';

init_session();

if (is_logged() !== true) {
    header('Location: ./');
    exit;
}
/* Test des données de l'url
 * SI les données n'existe pas dans l'url
 * OU la donnée n'est pas un nombre
 * OU la donnée est inférieur ou égale à 0
 */
if (
    !array_key_exists('id', $_GET) // Verifier si $_GET ['index'] existe
    || !ctype_digit($_GET['id'])
    || $_GET['id'] <= 0
) {
    // SORTIE du script
    exit;
}

/* Récupération du dieu par rapport à son ID pour vérifier si il existe
    Si le dieu existe
        Suppression du dieu */

$aGod = God::get(intval($_GET['id']));


if (intval($_GET['id']) == $aGod->getId()) {
    $aGod->delete();
}



/* Rechargement de la page */
header('Location: /admin');