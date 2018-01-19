<?php

namespace App\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Cédric
 */
class User implements UserInterface
{

    private $idUser;
    private $salt;
    private $role;
    private $name;
    private $password;
    private $mail;
    private $phoneNumber;

    function getIduser()
    {//get permet de choisir de quelle maniere on souhaite récuperer l'information
        return $this->idUser;
    }

    function setIduser($idUser)
    {
        $this->salt = $idUser;

        return $this;
    }

    function getSalt()
    {//get permet de choisir de quelle maniere on souhaite récuperer l'information
        return $this->salt;
    }

    function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    function getRoles()
    {
        return array($this->getRole());
    }

    function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    function eraseCredentials()
    {
        //rien
    }

    function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {//set permet de faire des vérification sur l'element
        $this->name = $name;

        return $this;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    function getMail()
    {
        return $this->mail;
    }

    function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    function getPhoneNumber()
    {
        return $this->phonenumber;
    }

    function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getUsername()
    {
        return $this->name;
    }

    function getRole()
    {
        return $this->role;
    }

    function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
}
