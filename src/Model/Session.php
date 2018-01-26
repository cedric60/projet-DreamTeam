<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author Cédric
 */
class Session
{

    private $startDate;
    private $endDate;

    function getStartDate()
    {
        return $this->startDate;
    }

    function getEndDate()
    {
        return $this->endDate;
    }

    function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
}
