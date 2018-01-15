<?php

namespace App\DAO;

class GivenAnswerDAO extends DAO {

    function findNumberSmiley(){
        $sql = 'SELECT smiley.name, COUNT(given_answer.chosen_smiley) as count
                FROM `given_answer`
                LEFT JOIN smiley 
                ON given_answer.chosen_smiley = smiley.idsmiley
                GROUP BY smiley.name';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    function buildDomainObject(array $row){

    }
}