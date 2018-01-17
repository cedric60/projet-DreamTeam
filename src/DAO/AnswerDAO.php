<?php

namespace App\DAO;

class AnswerDAO extends DAO {

    public function find($id) {
        $sql = 'SELECT * FROM answer '
                . 'WHERE answer_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function findAll() {
        $sql = 'SELECT * FROM answer';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}