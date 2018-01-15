<?php

namespace App\DAO;

class QuestionDAO extends DAO{

    public function find($id) {
        $sql = 'SELECT * FROM question '
                . 'WHERE question_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function findAll() {
        $sql = 'SELECT * FROM question';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}





