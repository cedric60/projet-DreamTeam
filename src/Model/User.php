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
class User  implements  UserInterface {
    private $salt;
    private $role;
    private $lastname;
    private $firstname;
    private $mail;
    private $phoneNumber;

    function getSalt() {//get permet de choisir de quelle maniere on souhaite récuperer l'information
        return $this->salt;
    }

    function getRoles() {
        return array($this->getRole());
    }
    
    public function eraseCredentials()
    {
        //rien
    } 
    function getLastname() {
        return $this->lastname;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getMail() {
        return $this->mail;
    }

    function getPhoneNumber() {
        return $this->phoneNumber;
    }

    function setLastname($lastname) {//set permet de faire des vérification sur l'element
        $this->lastname = $lastname;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }


}
