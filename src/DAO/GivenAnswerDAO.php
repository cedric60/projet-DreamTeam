<?php

namespace App\DAO;

class GivenAnswerDAO extends DAO
{

    /**
     * 
     * @return type
     */
    function findNumberSmiley()
    {
        $sql  = 'SELECT smiley.name, COUNT(given_answer.chosen_smiley) as count
                FROM `given_answer`
                LEFT JOIN smiley 
                ON given_answer.chosen_smiley = smiley.idsmiley
                GROUP BY smiley.name';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }
    function findNumberSmileyById($id, $start, $end)
    {
        $sql  = 'SELECT
                    smiley.name,
                    COUNT(g.chosen_smiley) AS count
                FROM
                    `given_answer` AS g
                LEFT JOIN smiley ON g.chosen_smiley = smiley.idsmiley
                WHERE
                    g.formation_idformation = ? AND g.date BETWEEN ? AND ?
                GROUP BY
                    smiley.name';
        $stmt = $this->getDb()->fetchAll($sql, array($id, $start, $end));

        return $stmt;
    }

    function findComments()
    {
        $sql = " SELECT
                    formation.idformation,
                    formation.name as formationname,
                    smiley.name,
                    given_answer.why,
                    given_answer.date
                FROM
                    given_answer
                LEFT JOIN formation ON given_answer.formation_idformation = formation.idformation
                LEFT JOIN smiley ON given_answer.chosen_smiley = smiley.idsmiley
                ORDER BY
                    given_answer.date
                DESC";
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    function findCommentsById($id, $start, $end)
    {
        $sql = "SELECT
                    formation.idformation,
                    formation.name as formationname,
                    smiley.name,
                    given_answer.why,
                    given_answer.date
                FROM
                    given_answer
                LEFT JOIN formation ON given_answer.formation_idformation = formation.idformation
                LEFT JOIN smiley ON given_answer.chosen_smiley = smiley.idsmiley
                WHERE formation.idformation = ? AND given_answer.date BETWEEN ? AND ?
                ORDER BY
                    given_answer.date
                DESC";
        $stmt = $this->getDb()->fetchAll($sql, array($id, $start, $end));

        return $stmt;
    }



    function buildDomainObject(array $row)
    {
        
    }
}
