<?php
namespace Entity;

use Manager\DbManager;

class Admin
{
    /** @var string */
    private const TABLE = 'admin';

    /** @var int */
    protected $id;

    /** @var string */
    protected $email;

    /** @var int */
    protected $pass;


    public function hydrate(array $aData = array()): self
    {
        $this->setId($aData['id_admin']);
        $this->setEmail($aData['email']);
        $this->setPass($aData['pass']);

        return $this;
    }

    public static function getAdminbyLogin($login)
    {
        $pdo = DbManager::connect();
        $query = $pdo->prepare('
        SELECT
            *
        FROM `' . self::TABLE . '`
        WHERE email = :login
    ');
        $query->bindValue(':login', $login, \PDO::PARAM_STR);

        // Exécution de la requête
        $query->execute();

        // Lecture de la réponse :
        //Stockage da la ligne dans le tableau $aGod
        $aAdmin = $query->fetch();

        //SI aucun dieu valide
        if (!$aAdmin) {
            // Condition de sortie 
            return null;
        }

        // Retour de l'objet
        return (new Admin())->hydrate($aAdmin);
    }

    /*------------------------ Getter And Setter ------------------------*/


    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
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
}