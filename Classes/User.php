<?php

namespace Classes;

class User
{
    public $id,$login,$password,$role;

    /**
     * @param $id
     * @param $login
     * @param $password
     * @param $rola
     */
    public function __construct($id, $login, $password, $rola)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->role = $rola;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param $id
     * @param $login
     * @param $password
     */


    /**
     * @return mixed
     */



}