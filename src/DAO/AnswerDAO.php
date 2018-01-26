<?php

namespace App\DAO;

class AnswerDAO extends DAO
{

    /**
     * 
     * @param type $id
     * @return string
     */
    public function find($id)
    {
        $sql  = 'SELECT * FROM answer '
            . 'WHERE answer_id = ' . $id;
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
        $sql  = 'SELECT * FROM answer';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}
