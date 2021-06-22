<?php

namespace Entity;

use Manager\DbManager;

class Classe
{
    /** @var string */
    private const TABLE = 'class';

    /** @var int */
    protected $id;

    /** @var string */
    protected $label;
    



    public function hydrate(array $aData = array()): self
    {
        $this->setId($aData['id_class']);
        $this->setLabel($aData['label']);

        return $this;
    }



    
    /**
     * getAll
     *
     * @return void
     */
    public static function getAll()
    {
        $pdo = DbManager::connect();

        //Requete SQL
        $query = $pdo->prepare('
                SELECT id_class, label
                FROM `' . self::TABLE . '` 
            ');
        $query->execute();


        $aList = array();

        while ($aGod = $query->fetch()) {
            $aList[] = (new Classe())->hydrate($aGod);
        }

        return $aList;
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
     * Get the value of label
     */ 
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */ 
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}