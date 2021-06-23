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
    
    /** @var int */
    protected $type;
    



    public function hydrate(array $aData = array()): self
    {
        $this->setId($aData['id_class']);
        $this->setLabel($aData['label']);
        $this->setType($aData['id_type']);


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
                SELECT *
                FROM `' . self::TABLE . '` 
            ');
        $query->execute();


        $aList = array();

        while ($aGod = $query->fetch()) {
            $aList[] = (new Classe())->hydrate($aGod);
        }

        return $aList;
    }

    
    /**
     * get
     *
     * @param  mixed $iId
     * @return object
     */
    public static function get(int $iId): object
    {
        // Connexion à la Database
        $pdo = DbManager::connect();

        // Transmission de la requête
        $query = $pdo->prepare('
            SELECT
                *
            FROM `' . self::TABLE . '`
            WHERE id_class = :id_class
            
        ');
        $query->bindValue(':id_class', $iId, \PDO::PARAM_INT);

        // Exécution de la requête
        $query->execute();

        // Lecture de la réponse :
        //Stockage da la ligne dans le tableau $aGod
        $aClass = $query->fetch();

        //SI aucun dieu valide
        if (!$aClass) {
            // Condition de sortie 
            return null;
        }

        // Retour de l'objet
        return (new Classe())->hydrate($aClass);
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