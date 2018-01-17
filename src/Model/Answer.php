<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Answer
 *
 * @author Cédric
 */
class Answer {
    
    private $name;
    private $description;
    private $smiley;
    
    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getSmiley() {
        return $this->smiley;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setSmiley($smiley) {
        $this->smiley = $smiley;
    }


}
