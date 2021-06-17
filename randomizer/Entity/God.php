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
}