<?php

namespace App\DAO;

class LearnerDAO extends DAO {

    public function find($id) {
        $sql = 'SELECT * FROM learner '
                . 'WHERE learner_id = ' . $id;
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }

    public function findAll() {
        $sql = ' SELECT learner.lastname, learner.firstname, learner.mail, formation.name, session.start_date, session.end_date FROM learner
        LEFT JOIN session_has_learner ON learner.idlearner = session_has_learner.learner_idlearner
        LEFT JOIN session ON session_has_learner.session_idsession = session.idsession
        LEFT JOIN formation ON session.formation_idformation = formation.idformation';
        $stmt = $this->getDb()->fetchAll($sql);

        return $stmt;
    }
    public function LearnerList($id) {
        $sql = "  SELECT learner.lastname, learner.firstname, learner.mail, formation.name, session.start_date, session.end_date FROM learner
                        LEFT JOIN session_has_learner ON learner.idlearner = session_has_learner.learner_idlearner
                        LEFT JOIN session ON session_has_learner.session_idsession = session.idsession
                        LEFT JOIN formation ON session.formation_idformation = formation.idformation
                        WHERE learner.idlearner = $id";
        $stmt = $this->getDb()->fetchAll($sql);
        
        return $stmt;
    }

    function buildDomainObject(array $row){

    }
}



