<?php

namespace inc\Entity;

use Manager\DbManager;

class Item
{

    public static function getItemsById($id_item)
    {
        $pdo = DbManager::connect();

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
