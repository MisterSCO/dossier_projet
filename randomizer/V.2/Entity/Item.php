<?php

namespace Entity;

use Manager\DbManager;

class Item
{
    /** @var string */
    private const TABLE = 'items';

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $passif;

    /** @var string */
    protected $img;

    /** @var int */
    protected $type;


    /**
     * hydrate
     *
     * @param  mixed $aData
     * @return self
     */
    public function hydrate(array $aData = array())
    {
        $this->setId($aData['id_item']);
        $this->setName($aData['name']);
        $this->setPassif($aData['passif']);
        $this->setImg($aData['picture_item']);
        $this->setType($aData['id_type']);


        return $this;
    }


    /**
     * getRandom
     *
     * @return void
     */
    public static function getRandom(int $iId) : array
    {
        $pdo = DbManager::connect();

        //Requete SQL
        $query = $pdo->prepare('
            SELECT * 
            FROM `' . self::TABLE . '`
            WHERE `id_item` = :id_item
            ORDER by RAND()
            LIMIT 6
        ');
        $query->bindValue(':id_item', $iId, \PDO::PARAM_INT);
        $query->execute();

        $aList = array();

        while ($aItem = $query->fetch()) {
            $aList[] = (new Item())->hydrate($aItem);
        }

        return $aList;;
    }

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

    /*------------------------ Getter And Setter ------------------------*/

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of passif
     */ 
    public function getPassif()
    {
        return $this->passif;
    }

    /**
     * Set the value of passif
     *
     * @return  self
     */ 
    public function setPassif($passif)
    {
        $this->passif = $passif;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
