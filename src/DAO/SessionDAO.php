<?php

require 'src/DAO/Bdd.php';

class SessionDAO {

    public function find($id) {
        $sql = 'SELECT * FROM session '
                . 'WHERE session_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function findAll() {
        $sql = 'SELECT * FROM session';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}








