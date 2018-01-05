<?php

require 'src/DAO/Bdd.php';

class LearnerDAO {

    public function find($id) {
        $sql = 'SELECT * FROM learner '
                . 'WHERE learner_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function findAll() {
        $sql = 'SELECT * FROM learner';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}



