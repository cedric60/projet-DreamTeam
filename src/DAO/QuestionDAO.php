<?php

namespace App\DAO;

class QuestionDAO extends DAO
{

    /**
     * 
     * @param type $id
     * @return string
     */
    public function find($id)
    {
        $sql  = 'SELECT * FROM question '
            . 'WHERE question_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function findAll()
    {
        $sql  = 'SELECT * FROM question';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}
