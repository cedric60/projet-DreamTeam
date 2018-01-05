<?php

require 'src/DAO/Bdd.php';

class QuestionDAO {

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





