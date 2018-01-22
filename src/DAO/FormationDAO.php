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
        $sql = 'SELECT formation.idformation, formation.name FROM formation';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    public function sessionStartDate() {
        $sql = 'SELECT  DISTINCT session.start_date FROM `session` ORDER BY session.start_date DESC';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }
    public function sessionEndDate() {
        $sql = 'SELECT  DISTINCT session.end_date FROM `session` ORDER BY session.end_date DESC';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }
    public function findSessionStartDate($id) {
        $sql = 'SELECT 
                    s.start_date
                FROM
                    formation
                LEFT JOIN session as s ON formation.idformation = s.formation_idformation
                WHERE
                    formation.idformation = ?';

                $stmt = $this->getDb()->fetchAll($sql, array($id));

                return $stmt;
    }
    public function findSessionEndDate($id) {
        $sql = 'SELECT 
                    s.end_date
                FROM
                    formation
                LEFT JOIN session as s ON formation.idformation = s.formation_idformation
                WHERE
                    formation.idformation = ?';
        $stmt = $this->getDb()->fetchAll($sql, array($id));
        return $stmt;
    }
    function buildDomainObject(array $row){

    }
}


