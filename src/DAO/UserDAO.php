<?php

namespace App\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use App\Model\User;

class UserDAO extends DAO implements UserProviderInterface// heritage la class herite de DAO(elle herite de la connexion a la base de donnee

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
        $sql = 'SELECT iduser,name, password, salt, role, mail, phonenumber '
            . 'FROM user '
            . 'WHERE iduser = ?';
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

    public function loadUserByUsername($usermail)
    {
        $sql = 'SELECT iduser,name, password, salt, role, mail, phonenumber '
            . 'FROM user '
            . 'WHERE mail = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($usermail));

        if ($row) {
            return $this->buildDomainObject($row);
        } else {

            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $usermail));

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
        return $this->loadUserByUsername($user->getMail());
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
        /*
        $user = new User();
        $user->setId($row['user_id']);
        $user->setUsername($row['user_name']);
        $user->setPassword($row['user_password']);
        $user->setSalt($row['user_salt']);
        $user->setRole($row['user_role']);
        return $user;
        */
    }
    public function RegisterAdmin(Request $request) {
       

    //vérification de l'existence de l'email dans la base de donée
    // requete pour demander si l'addresse mail entrer existe deja en BDD
    $sql = 'SELECT mail'
    .'FROM user' 
    .'WHERE mail = ?';
    $row = $this->getDb()->fetchAssoc($sql, array($request));// resultat obtenu par la requete ici sous forme de tableau


    if($row==true){// Si le resultat demander est true donc l'addresse email existe en BDD on affiche un message erreur
        echo "Cet addresse email existe deja";
    }
    else{ // Sinon si resultat est false l'email saisie n'existe pas en BDD on execute l'insertion
    
        // Préparer la requête
    $q = $app['db']->prepare('INSERT INTO user VALUES (\'' .$_POST['name']. '\', md5(\'' .$_POST['password']. '\'),\'' .$_POST['mail']. '\',\'' .$_POST['phonenumber']. '\')');
    try {
    // Envoyer la requête
    $rows = $q->execute(array());
    } catch (Doctrine\DBAL\DBALException $e) {
    // En cas d'erreur, afficher les informations dans le browser
    // et terminer (Beurk ! Pour debug uniquement)
    print_r( $q->errorInfo() );
    print_r( $q->errorCode() );
    return;
}



   
            }}}