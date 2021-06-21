<?php
namespace Entity;

use Manager\DbManager;

class God
{
    /** @var int */
    protected $id_god;

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

    public static function createGod($newgod = array())
    {
        $pdo = connect();

        $query = $pdo->prepare('
            INSERT INTO users(
            `name`, `title`, `description`, `mythologie`, `picture_god`, `id_class`

        ) 
        VALUES (
            :name, 
            :title,
            :description,
            :mythologie,
            :picture_god,
            :id_class
        )
            
    ');

        $query->execute($newgod);
    }

    public static function updateGod($editgod = array())
    {
        $pdo = connect();

        $query = $pdo->prepare('
            UPDATE `gods`
            SET `name`=:name,`title`=:title,`description`=:description,`mythologie`=:mythologie,`picture_god`=:picture_god,`id_class`=:id_class
            WHERE gods.id_god = :id_god
            
    ');

        $query->execute($editgod);
        return $query;
    }

    public static function deleteGod($deletegod)
    {
        $pdo = connect();
        // préparationde la requete
        $query = $pdo->prepare('
            DELETE 
            FROM gods
            WHERE gods.id_god = :id_god
        ');
        $query->execute($deletegod);
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





    /*------------------------ Getter And Setter ------------------------*/


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

    /**
     * Get the value of id_god
     */ 
    public function getId_god()
    {
        return $this->id_god;
    }

    /**
     * Set the value of id_god
     *
     * @return  self
     */ 
    public function setId_god($id_god)
    {
        $this->id_god = $id_god;

        return $this;
    }
}