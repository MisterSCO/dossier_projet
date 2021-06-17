<?php

function connect()
{

    require_once('config/config.php');

    // Tenter de se connecter a la base de donnée blog du serveur MySQL local
    try {

        $pdo = new PDO(
            //Source des données : DSN (Data Source Name)
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8;port=' . DB_PORT,
            // Identification
            DB_USER,
            // Mot de passe
            DB_PASSWORD
        );

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // On préfèrera masquer l'existance de la constante en PROD : on test si elle existe
        if (defined('DB_SQL_DEBUG')) {
            // Afficher les erreurs de requêtes : UNIQUEMENT EN DEV
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $pdo;
    }
    // Si problème : on capture l'erreur et on affiche un message
    catch (PDOException $error) {
        error_log($error->getMessage(), 3, './log/errors.log');

        header('Location:404.php?er=404');
        exit;
    }
}

function getAdminbyLogin($login)
{
    $pdo = connect();
    $query = $pdo->prepare('

        SELECT
            id_admin,
            email,
            pass, 
            pseudo
        FROM admin
        WHERE email = :login
    ');

    $query->execute(array(':login' => $login));

    $user = $query->fetch();
    return $user;

}