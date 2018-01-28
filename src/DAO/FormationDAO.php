<?php

namespace App\DAO;

class FormationDAO extends DAO
{

    /**
     * 
     * @param type $id
     * @return srting
     */
    public function find($id)
    {
        $sql  = 'SELECT * FROM formation '
            . 'WHERE formation_id = ?';
        $stmt = $this->getDb()->fetchAssoc($sql, array($id));

        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function findAll()
    {
        $sql  = 'SELECT formation.idformation, formation.name FROM formation';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function findFormationAndSession()
    {
        $sql  = 'SELECT
                    formation.idformation,
                    formation.name,
                    s.idsession,
                    s.start_date,
                    s.end_date
                FROM
                    formation
                LEFT JOIN session AS s
                ON
                    formation.idformation = s.formation_idformation'
        ;
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function sessionStartDate()
    {
        $sql  = 'SELECT  DISTINCT session.start_date FROM `session` ORDER BY session.start_date DESC';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function sessionEndDate()
    {
        $sql  = 'SELECT  DISTINCT session.end_date FROM `session` ORDER BY session.end_date DESC';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    /**
     * 
     * @param type $id
     * @return array
     */
    public function findSessions($id)
    {
        $sql = 'SELECT
                    formation.idformation,
                    formation.name,
                    SESSION.idsession,
                    SESSION.start_date,
                    SESSION.end_date
                FROM
                    formation
                LEFT JOIN SESSION ON formation.idformation = SESSION.formation_idformation
                WHERE
                    formation.idformation = ?';

        $stmt = $this->getDb()->fetchAll($sql, array($id));

        return $stmt;
    }

    /**
     * 
     * @param type $id
     * @return array
     */
    public function findSessionStartDate($id)
    {
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

    /**
     * 
     * @param type $id
     * @return string
     */
    public function findSessionEndDate($id)
    {
        $sql  = 'SELECT 
                    s.end_date
                FROM
                    formation
                LEFT JOIN session as s ON formation.idformation = s.formation_idformation
                WHERE
                    formation.idformation = ?';
        $stmt = $this->getDb()->fetchAll($sql, array($id));
        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function findActiveSessions()
    {
        $sql = 'SELECT 
                   formation.name, session.start_date, session.end_date
                FROM 
                    `formation` 
                LEFT JOIN session ON session.formation_idformation = formation.idformation 
                WHERE now() BETWEEN session.start_date AND session.end_date';

        $stmt = $this->getDb()->fetchAll($sql);
        return $stmt;
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function findActiveSession($id)
    {
        $sql = 'SELECT 
                   formation.name, session.start_date, session.end_date
                FROM 
                    formation 
                LEFT JOIN session ON session.formation_idformation = formation.idformation 
                WHERE now() BETWEEN session.start_date AND session.end_date
                AND formation.idformation = ?';

        $stmt = $this->getDb()->fetchAll($sql, array($id));
        return $stmt;
    }

    /**
     * 
     * @return type
     */
    public function findLastId()
    {
        $sql  = 'SELECT MAX( idformation ) FROM formation';
        $stmt = $this->getDb()->fetchAssoc($sql, array());

        return $stmt;
    }

    /**
     * 
     * @param array $row
     */
    function buildDomainObject(array $row)
    {
        
    }
}
