<?php

namespace inc\Entity;

use Manager\DbManager;

class Admin
{
    protected const TABLE = 'admin';

    protected const SELECT = 'id_admin, 
                            pseudo, 
                            email, 
                            pass';

    /** @var string */
    private string $pseudo;

    /** @var string|null */
    private string $email;

    /** @var string|null */
    private string $password;


    //** Functions **\\

    /**
     * __construct
     *
     * @param  mixed $sPseudo
     * 
     * @return void
     */
    public function __construct(string $sPseudo)
    {
        $this->pseudo = $sPseudo;
    }

    /**
     * __toString
     *
     * @return void
     */
    public function __toString()
    {
        return $this->pseudo;
    }






    //** Getter and Setter **\\
    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

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
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}