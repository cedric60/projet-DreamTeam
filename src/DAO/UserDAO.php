<?php

namespace App\DAO;

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

 public function registerAdmin(Request $request,Application $app) //Fonction d'enregistrement d'un nouvelle administrateur
 {

  //vérification de l'existence de l'email dans la base de donée
  // requete pour demander si l'addresse mail entrer existe deja en BDD
  $sql = 'SELECT mail '
   . 'FROM user '
   . 'WHERE mail = ?';
  $row = $this->getDb()->fetchAssoc($sql, array($request)); // resultat obtenu par la requete ici sous forme de tableau
  
  //$email = 'test'; // test avec une chaine qui n'est pas une adresse email
$email = $_POST['email']; // test avec une chaine qui est une adresse email
 
// Vérifie si la chaine ressemble à un email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
} else {
     return false;
}
var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
  if ($row == true) { // Si le resultat demander est true donc l'addresse email existe en BDD on affiche un message erreur
   echo "Cet addresse email existe deja";
  } else { // Sinon si resultat est false l'email saisie n'existe pas en BDD on execute l'insertion
   // Préparer la requête
   $q = $app['db']->prepare('INSERT INTO user VALUES (\'' . $_POST['name'] . '\', \'' . $_POST['password'] . '\',\'' . $_POST['mail'] . '\',\'' . $_POST['phonenumber'] . '\')');
   try {
    // Envoyer la requête
    $q->execute(array());
   } catch (Doctrine\DBAL\DBALException $e) {
    // En cas d'erreur, afficher les informations dans le browser
    // et terminer (Beurk ! Pour debug uniquement)
    print_r($e->errorInfo());
    print_r($e->errorCode());
    return;
   }
  }
 }

 public function forgotPassword()//Fonction
 {

  //Processus récupération mot de passe : l'admin entre sont nom et addresse mail, puis recoit un lien sur son addresse mail pour changer son mot de passe
 }
}
