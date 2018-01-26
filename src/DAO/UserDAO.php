<?php

namespace App\DAO;

use Silex\Application;
use App\Model\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserDAO extends DAO implements UserProviderInterface
{ // heritage la class herite de DAO(elle herite de la connexion a la base de donnee  {

    /**
     * Returns a user matching the supplied id.
     *
     * @param integer id The user id.
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
    public function loadUserByUsername($username)
    {
        $sql = 'SELECT iduser,name, password, salt, role, mail, phonenumber '
            . 'FROM user '
            . 'WHERE name = ?';

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

        $user = new User();
        $user->setIdUser($row['iduser'])
            ->setName($row['name'])
            ->setPassword($row['password'])
            ->setSalt($row['salt'])
            ->setRole($row['role'])
            ->setMail($row['mail'])
            ->setPhoneNumber($row['phonenumber']);
        return $user;
    }

    /**
     * 
     * @param Request $request
     * @param Application $app
     * @return string
     */
    public function registerAdmin(Request $request, Application $app)
    {

        //Initialisation des variables 
        $nom       = $request->get('nom');
        $telephone = $request->get('telephone');
        $email     = $request->get("email");
        $password  = $request->get('_password');

        //Récuperation des email existant en BDD
        $sql = 'SELECT mail '
            . 'FROM user '
            . 'WHERE mail = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($email));

        //Condition pour verifier que l'email n'existe pas en base de donnée
        if ($row['mail'] !== $email) {

            // fonction strlen() compte le nombre de caracteres et trim() pour supprimer les espaces
            //stripslashes() pour supprimer les antislash, strip_tags() permet de supprimer tous code html se qui securisent les données
            // CONDITIONS NOM
            if ((isset($nom)) && (strlen(trim($nom)) > 0)) {
                $nom = stripslashes(strip_tags($nom));
            }

            // CONDITIONS telephone
            if ((isset($telephone)) && (strlen(trim($telephone)) > 10)) {
                $telephone = stripslashes(strip_tags($telephone));
            }

            // CONDITIONS EMAIL
            if ((isset($email) && strlen(trim($email)) > 0) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = stripslashes(strip_tags($email));
            }

            // CONDITIONS password
            if ((isset($password)) && (strlen(trim($password)) > 0)) {
                $password = stripslashes(strip_tags($password));
            }
            //Encodage du mot de passe
            // Initialisation du Salt
            // 
            //Préparer la requête
            $ql = $app['db']->prepare("INSERT INTO user (name, password, mail, phonenumber) VALUES ('$nom', '$password', '$email', '$telephone')");
            // Envoyer la requête
            $ql->execute();

            return "1";
        } else {
            return "0";
        }
    }

    /**
     * 
     * @param Request $request
     * @param Application $app
     * @return string
     */
    public function forgotPassword(Request $request, Application $app)
    {
        //Initialisation des variables 

        $email = $request->get("email");

        //Récuperation des email existant en BDD
        $sql = 'SELECT mail '
            . 'FROM user '
            . 'WHERE mail = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($email));

        //Condition pour verifier que l'email n'existe pas en base de donnée
        if ($row['mail'] == $email) {

            // CONDITIONS EMAIL
            if ((isset($email) && strlen(trim($email)) > 0) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = stripslashes(strip_tags($email));
            }

            // fonction php pour envoie d'un email avec lien de modification du mot de passe

            return "1";
        } else {
            return "0";
        }
    }

    /**
     * 
     * @param Request $request
     * @param Application $app
     * @return string
     */
    public function resetPassword(Request $request, Application $app)
    {
        //Initialisation des variables 

        $email    = $request->get("email");
        $password = $request->get('_password');

        //Récuperation des email existant en BDD
        $sql = 'SELECT mail '
            . 'FROM user '
            . 'WHERE mail = ?';
        $row = $this->getDb()->fetchAssoc($sql, array($email));

        //Condition pour verifier que l'email n'existe pas en base de donnée
        if ($row['mail'] == $email) {

            // CONDITIONS EMAIL
            if ((isset($email) && strlen(trim($email)) > 0) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = stripslashes(strip_tags($email));
            }
            // CONDITIONS password
            if ((isset($password)) && (strlen(trim($password)) > 0)) {
                $password = stripslashes(strip_tags($password));
            }

            //Préparer la requête
            $ql = 'UPDATE password '
                . 'FROM user '
                . 'WHERE mail = $email';
           



            return "1";
        } else {
            return "0";
        }
    }
}
