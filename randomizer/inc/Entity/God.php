<?php
namespace inc\Entity;

use Manager\DbManager;

class God
{

        public static function getGod()
        {
            $pdo = DbManager::connect();

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