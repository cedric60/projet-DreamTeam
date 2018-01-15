<?php

namespace App\DAO;

class FormationDAO extends DAO{

    public function find($id) {
        $sql = 'SELECT * FROM formation '
                . 'WHERE formation_id = ?';
        $stmt = $this->getDb()->fetchAssoc($sql, array($id));

        return $stmt;
    }

    public function findAll() {
        $sql = 'SELECT * FROM formation';
        $stmt = bdd::getConn()->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}

