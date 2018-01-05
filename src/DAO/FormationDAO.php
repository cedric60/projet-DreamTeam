<?php

require 'src/DAO/Bdd.php';

class FormationDAO {

    public function find($id) {
        $sql = 'SELECT * FROM formation '
                . 'WHERE formation_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function findAll() {
        $sql = 'SELECT * FROM formation';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}

