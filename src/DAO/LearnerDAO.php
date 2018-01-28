<?php

namespace App\DAO;

class LearnerDAO extends DAO
{

    /**
     * 
     * @param type $id
     * @return array
     */
    public function find($id)
    {
        $sql  = 'SELECT learner.idlearner, learner.lastname, learner.firstname, learner.mail, learner.phonenumber, formation.name, session.start_date, session.end_date, formation.idformation            
                FROM learner
                LEFT JOIN session_has_learner ON learner.idlearner = session_has_learner.learner_idlearner
                LEFT JOIN session ON session_has_learner.session_idsession = session.idsession
                LEFT JOIN formation ON session.formation_idformation = formation.idformation
                WHERE learner.idlearner = ?';
        $stmt = $this->getDb()->fetchAssoc($sql, array($id));

        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function findAll()
    {
        $sql  = ' SELECT learner.idlearner, learner.lastname, learner.firstname, learner.mail, formation.name, session.start_date, session.end_date, formation.idformation 
        FROM learner
        LEFT JOIN session_has_learner ON learner.idlearner = session_has_learner.learner_idlearner
        LEFT JOIN session ON session_has_learner.session_idsession = session.idsession
        LEFT JOIN formation ON session.formation_idformation = formation.idformation';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    /**
     * 
     * @param type $id
     * @return string
     */
    public function LearnerList($id)
    {
        $sql  = "    SELECT learner.lastname, learner.firstname, learner.mail, formation.name, session.start_date, session.end_date 
                    FROM learner
                    LEFT JOIN session_has_learner ON learner.idlearner = session_has_learner.learner_idlearner
                    LEFT JOIN session ON session_has_learner.session_idsession = session.idsession
                    LEFT JOIN formation ON session.formation_idformation = formation.idformation
                    WHERE learner.idlearner = $id";
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    /**
     * 
     * @return string
     */
    public function LearnerListConcat()
    {
        $sql  = "SELECT learner.lastname, learner.firstname, learner.mail, GROUP_CONCAT(DISTINCT formation.name) 
        FROM learner
        LEFT JOIN session_has_learner ON learner.idlearner = session_has_learner.learner_idlearner
        LEFT JOIN session ON session_has_learner.session_idsession = session.idsession
        LEFT JOIN formation ON session.formation_idformation = formation.idformation
        GROUP BY learner.lastname, learner.firstname, learner.mail";
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    /**
     * 
     * @param type $id
     * @param type $fid
     * @return array
     */
    public function findFormationById($id, $fid)
    {
        $sql  = 'SELECT learner.idlearner, learner.lastname, learner.firstname, learner.mail, learner.phonenumber, formation.name, session.start_date, session.end_date, formation.idformation            
                FROM learner
                LEFT JOIN session_has_learner ON learner.idlearner = session_has_learner.learner_idlearner
                LEFT JOIN session ON session_has_learner.session_idsession = session.idsession
                LEFT JOIN formation ON session.formation_idformation = formation.idformation
                WHERE learner.idlearner = ?
                AND formation.idformation = ?';
        $stmt = $this->getDb()->fetchAssoc($sql, array($id, $fid));

        return $stmt;
    }

    /**
     * 
     * @return array
     */
    public function findLastId()
    {
        $sql  = 'SELECT MAX( idlearner ) FROM learner';
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
