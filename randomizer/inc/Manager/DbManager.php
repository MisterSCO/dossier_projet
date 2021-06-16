<?php

namespace inc\Manager;

class DbManager
{
    /** @var \Pdo */
    private static $pdo = null;

    /** 
     * @return \Pdo
     */
    public static function connect()
    {
        require_once('config/config.php');

        if (is_null(static::$pdo)) {
            try {
                static::$pdo = new
                \PDO(
                    //Source des données : DSN (Data Source Name)
                    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8;port=' . DB_PORT,
                    // Identification
                    DB_USER,
                    // Mot de passe
                    DB_PASSWORD
                );

                // Affichage des erreurs PDO (à ne pas faire en production)
                static::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\Exception $e) {
                echo $e->getMessage() . PHP_EOL;
                die;
            }
        }

        return static::$pdo;
    }

}
