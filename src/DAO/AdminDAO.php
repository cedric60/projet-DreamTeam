<?php

namespace App\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use App\Model\User;

class AdminDAO extends DAO // heritage la class herite de DAO(elle herite de la connexion a la base de donnee

{
    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     *
     * @return \App\Domain\User|throws an exception if no matching user is found
     */
    public function find($id)
    {
        $sql = 'SELECT admin_id, admin_name, admin_password, admin_salt, admin_role '
            . 'FROM admin '
            . 'WHERE admin_id = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new \Exception("No user matching id " . $id);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $sql = 'SELECT admin_id, admin_name, admin_password, admin_salt, admin_role '
            . 'FROM admin '
            . 'WHERE admin_name = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'App\Model\User' === $class;
    }

    /**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \App\Domain\User
     */
    protected function buildDomainObject(array $row)
    {
        $user = new Admin();
        $user->setId($row['admin_id']);
        $user->setUsername($row['admin_name']);
        $user->setPassword($row['admin_password']);
        $user->setSalt($row['admin_salt']);
        $user->setRole($row['admin_role']);
        return $user;
    }
}