<?php

namespace App\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\usernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupporteduserException;
use App\Model\user;

class UserDAO extends DAO implements UserProviderInterface // heritage la class herite de DAO(elle herite de la connexion a la base de donnee

{
    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     *
     * @return \App\Domain\user|throws an exception if no matching user is found
     */
    public function find($id)
    {
        $sql = 'SELECT user_id, user_name, user_password, user_salt, user_role '
            . 'FROM user '
            . 'WHERE user_id = ?';
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
    public function loaduserByusername($username)
    {
        $sql = 'SELECT user_id, user_name, user_password, user_salt, user_role '
            . 'FROM user '
            . 'WHERE user_name = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row) {
            return $this->buildDomainObject($row);
        } else {
            throw new usernameNotFoundException(sprintf('user "%s" not found.', $username));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function refreshuser(userInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupporteduserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loaduserByusername($user->getusername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'App\Model\user' === $class;
    }

    /**
     * Creates a user object based on a DB row.
     *
     * @param array $row The DB row containing user data.
     * @return \App\Domain\user
     */
    protected function buildDomainObject(array $row)
    {
        $user = new User();
        $user->setId($row['user_id']);
        $user->setusername($row['user_name']);
        $user->setPassword($row['user_password']);
        $user->setSalt($row['user_salt']);
        $user->setRole($row['user_role']);
        return $user;
    }
}