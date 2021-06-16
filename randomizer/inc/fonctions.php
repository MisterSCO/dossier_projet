<?php

function connect()
{

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

        header('Location: 404.php?er=404');
        exit;
    }
}

function getGod()
{
    $pdo = connect();

    $query = $pdo->prepare('
        SELECT 
            *
        FROM `gods` 
        ORDER by RAND()
        LIMIT 1
    ');
    $query->execute();

    return $query;
}

function getItemsById($id_item)
{
    $pdo = connect();

    $query = $pdo->prepare('
        SELECT * 
        FROM `items` 
        WHERE `id_type` = :id_item
        ORDER by RAND()
        LIMIT 6
    ');
    $query->bindValue(':id_item', $id_item, PDO::PARAM_INT);
    $query->execute();

    return $query;
}