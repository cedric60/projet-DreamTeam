<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/* Le controller s'occupe d'une logique particuliere il a une serie de methode qui represente chaque action l'on peut faire au sein de l'application */

class UserController
{

    public function loginAction(Request $request, Application $app)// utilise request pour l'accés au formulaire et App pour la connexion a la base de donnéé
    {
        return $app['twig']->render('login.twig', array(// renvoie a la page login
              'error'         => $app['security.last_error']($request),
              'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    public function registerAction(Application $app) // Renvoie vers la pages d'enregistrement d'unadminidtrateur
    {
        return $app['twig']->render('register.twig');
    }

    public function saveRegisterAction(Request $request, Application $app) // Renvoie vers la fonction pour enregistrer un administrateur
    {
        $res = $app['dao.user']->RegisterAdmin($request, $app);
        return ($res) ? true : false;
    }

    public function forgotPasswordAction(Application $app) // Renvoie vers la page d'oublie de mots de passe
    {
        return $app['twig']->render('forgot-password.twig');
    }

    public function forgotPasswordValidAction(Request $request,Application $app) // Renvoie vers la fonction qui permet de mettre en place la reinitialisation du mot de passe
    {
        $res =$app['dao.user']->forgotPassword($request, $app);
        return ($res) ? true : false;
        
    }

    public function resetPasswordAction(Application $app)// Renvoie vers la page de modification du mot de passe 
    {
        return $app['twig']->render('reset_password.twig');
    }

    public function resetPasswordValidAction(Application $app)// Renvoie vers la fonction qui modifie le mot de passe en base de donnée
    {
       $res= $app['dao.user']->resetPassword();
       return($res) ? true : false;
    }
}
