<?php
namespace Entity;

use Manager\DbManager;

class God
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $title;

    /** @var string */
    protected $description;

    /** @var string */
    protected $mythologie;

    /** @var string */
    protected $img_god;

    /** @var string */
    protected $class;

    

    public static function getRandomGod()
    {
        $pdo = DbManager::connect();

        //Requete SQL
        $query = $pdo->prepare('
            SELECT 
                *
            FROM `gods` 
            INNER JOIN class ON gods.id_class = class.id_class
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

    public static function searchgod($search)
    {
        $pdo = connect();

        $query = $pdo->prepare('
            SELECT *
            FROM `gods`
            INNER JOIN class ON gods.id_class = class.id_class
            WHERE name LIKE  "%' . $search . '%" OR label LIKE "%' . $search .'%" OR title LIKE "%' . $search . '%"
            
    ');

        $query->execute();
        return $query;
    }

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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of mythologie
     */ 
    public function getMythologie()
    {
        return $this->mythologie;
    }

    /**
     * Set the value of mythologie
     *
     * @return  self
     */ 
    public function setMythologie($mythologie)
    {
        $this->mythologie = $mythologie;

        return $this;
    }

    /**
     * Get the value of img_god
     */ 
    public function getImg_god()
    {
        return $this->img_god;
    }

    /**
     * Set the value of img_god
     *
     * @return  self
     */ 
    public function setImg_god($img_god)
    {
        $this->img_god = $img_god;

        return $this;
    }

    /**
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */ 
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }
}