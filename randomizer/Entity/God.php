<?php
namespace Entity;

use Manager\DbManager;

class God
{
    
        public static function getRandomGod()
        {
            $pdo = DbManager::connect();

            //Requete SQL
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

        public static function getAllGod()
        {
            $pdo = DbManager::connect();

            //Requete SQL
            $query = $pdo->prepare('
                    SELECT 
                        *
                    FROM `gods` 
                    INNER JOIN class ON gods.id_class = class.id_class
                ');
            $query->execute();


            return $query;
        }
}