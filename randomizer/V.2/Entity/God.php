<?php
namespace Entity;

use Manager\DbManager;

class God
{
    /** @var string */
    private const TABLE = 'gods';

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
    protected $img;

    /** @var int */
    protected $class;
    
    /** @var int */
    protected $class_label;

    
    
    /**
     * hydrate
     *
     * @param  mixed $aData
     * @return self
     */
    public function hydrate(array $aData = array()): self
    {
        $this->setId($aData['id_god']);
        $this->setName($aData['name']);
        $this->setTitle($aData['title']);
        $this->setDescription($aData['description']);
        $this->setMythologie($aData['mythologie']);
        $this->setImg($aData['picture_god']);
        $this->setClass($aData['id_class']);
        $this->setClass_label($aData['label']);
        

        return $this;
    }
    
    /**
     * getRandom
     *
     * @return void
     */
    public static function getRandom() : self
    {
        $pdo = DbManager::connect();

        //Requete SQL
        $query = $pdo->prepare('
            SELECT 
                *
            FROM `' . self::TABLE .'` 
            INNER JOIN class ON `' . self::TABLE . '`.id_class = class.id_class
            ORDER by RAND()
            LIMIT 1
        ');
        $query->execute();

        $aGod = $query->fetch();

        return (new God())->hydrate($aGod) ;
    }


    /**
     * get
     * Charger un dieu d'après son 'id'
     * 
     * @param int $iId
     * Correspond a l'id d'un dieu présent dans la Database
     * 
     * @return Object|null
     */
    public static function get(int $iId): object
    {
        // Connexion à la Database
        $pdo = DbManager::connect();

        // Transmission de la requête
        $query = $pdo->prepare('
            SELECT
                *
            FROM `' . self::TABLE .'`
            INNER JOIN class ON `' . self::TABLE . '`.id_class = class.id_class
            WHERE id_god = :id_god
        ');
        $query->bindValue(':id_god', $iId, \PDO::PARAM_INT);

        // Exécution de la requête
        $query->execute();

        // Lecture de la réponse :
        //Stockage da la ligne dans le tableau $aGod
        $aGod = $query->fetch();

        //SI aucun dieu valide
        if (!$aGod) {
            // Condition de sortie 
            return null;
        }
        
        // Retour de l'objet
        return (new God())->hydrate($aGod);
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
                SELECT 
                    *
                FROM `' . self::TABLE . '` 
                INNER JOIN class ON `' . self::TABLE . '`.id_class = class.id_class
                ORDER BY `id_god` ASC
            ');
        $query->execute();


        $aList = array();
        
        while ($aGod = $query->fetch()) {
            $aList[] = (new God()) -> hydrate($aGod);
        }

        return $aList;
    }

    public function create()
    {
        $pdo = DbManager::connect();

        $query = $pdo->prepare('
            INSERT INTO `' . self::TABLE . '`(
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

        $query->bindValue(':name', $this->name, \PDO::PARAM_STR);
        $query->bindValue(':title', $this->title, \PDO::PARAM_STR);
        $query->bindValue(':description', $this->description, \PDO::PARAM_STR);
        $query->bindValue(':mythologie', $this->mythologie, \PDO::PARAM_STR);
        $query->bindValue(':picture_god', $this->img, \PDO::PARAM_STR);
        $query->bindValue(':id_class', $this->class, \PDO::PARAM_INT);
        
        $query->execute();

        
    }

    public function save()
    {
        $pdo = DbManager::connect();

        $query = $pdo->prepare('
            UPDATE `' . self::TABLE . '`
            SET `name`=:name,`title`=:title,`description`=:description,`mythologie`=:mythologie,`picture_god`=:picture_god,`id_class`=:id_class
            WHERE id_god = :id_god
        ');
        
        $query->bindValue(':id_god', $this->id, \PDO::PARAM_INT);
        $query->bindValue(':name', $this->name, \PDO::PARAM_STR);
        $query->bindValue(':title', $this->title, \PDO::PARAM_STR);
        $query->bindValue(':description', $this->description, \PDO::PARAM_STR);
        $query->bindValue(':mythologie', $this->mythologie, \PDO::PARAM_STR);
        $query->bindValue(':picture_god', $this->img, \PDO::PARAM_STR);
        $query->bindValue(':id_class', $this->class, \PDO::PARAM_INT);

        $query->execute();
        
    }

    public function delete() : void
    {
        // Connexion à la BDD
        $pdo = DbManager::connect();
        // préparationde la requete
        $query = $pdo->prepare('
            DELETE 
            FROM `' . self::TABLE .'`
            WHERE id_god = :id_god
        ');
        $query->bindValue(':id_god', $this->id ,\PDO::PARAM_INT);

        // Exécution de la requête
        $query->execute();

        return;
    }

    public static function search($search)
    {
        $pdo = DbManager::connect();

        $query = $pdo->prepare('
            SELECT 
                *
            FROM `' . self::TABLE . '` 
            INNER JOIN class ON `' . self::TABLE . '`.id_class = class.id_class
            WHERE name LIKE :name OR label LIKE :label OR mythologie LIKE :mythologie
            ORDER BY `id_god` ASC
        ');

        $query->bindValue(':name', '%' . $search . '%', \PDO::PARAM_STR);
        $query->bindValue(':label', '%' . $search . '%', \PDO::PARAM_STR);
        $query->bindValue(':mythologie', '%' . $search . '%', \PDO::PARAM_STR);
        

        $query->execute();

        $aList = array();

        while ($aGod = $query->fetch()) {
            $aList[] = (new God())->hydrate($aGod);
        }

        return $aList;
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
        $this->name = trim($name);

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
        $this->title = trim($title);

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
        $this->description = trim($description);

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
        $this->mythologie = trim($mythologie);

        return $this;
    }

    /**
     * Get the value of img_god
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img_god
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = trim($img);

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
        $this->class = intval($class);

        return $this;
    }

    /**
     * Get the value of id_god
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id_god
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = intval($id);

        return $this;
    }


    /**
     * Get the value of class_label
     */ 
    public function getClass_label()
    {
        return $this->class_label;
    }

    /**
     * Set the value of class_label
     *
     * @return  self
     */ 
    public function setClass_label($class_label)
    {
        $this->class_label = $class_label;

        return $this;
    }
}