<?php

namespace Entity;

use Manager\DbManager;

class Item
{

    public static function getRandomItemsById($id_item)
    {
        $pdo = DbManager::connect();

        //Requete SQL
        $query = $pdo->prepare('
            SELECT * 
            FROM `items` 
            WHERE `id_type` = :id_item
            ORDER by RAND()
            LIMIT 6
        ');
        $query->bindValue(':id_item', $id_item, \PDO::PARAM_INT);
        $query->execute();

        return $query;
    }
}
