<?php

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
class Admin {
    private $lastname;
    private $firstname;
    private $mail;
    private $phoneNumber;
    
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

    function setLastname($lastname) {
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
