<?php

require 'src/DAO/Bdd.php';

class AdminDAO {

    public function find($id) {
        $sql = 'SELECT * FROM admin '
                . 'WHERE admin_id = ' . $id;
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function findAll() {
        $sql = 'SELECT * FROM admin';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}