<?php

// Connexion a la base de donnee qui sera en heritage sur toutes les pages DAO

namespace App\DAO;

use Doctrine\DBAL\Connection;

abstract class DAO
{

    private $db;

    /**
     * 
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    protected function getDb()
    {
        return $this->db;
    }

    abstract protected function buildDomainObject(array $row);
}
