<?php

namespace App\DAO;

class SessionDAO extends DAO
{

    /**
     * 
     * @param type int
     * @return array
     */
    public function find($id)
    {
        $sql  = 'SELECT * FROM session '
            . 'WHERE session_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    /**
     * 
     * @return array
     */
    public function findAll()
    {
        $sql  = 'SELECT * FROM session';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}
