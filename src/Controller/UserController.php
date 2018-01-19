<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


/* Le controller s'occupe d'une logique particuliere il a une serie de methode qui represente chaque action l'on peut faire au sein de l'application */

class UserController {

    public
            function loginAction(Request $request, Application $app) { // utilise request pour l'accés au formulaire et App pour la connexion a la base de donnéé
        return $app['twig']->render('login.twig', array(// renvoie a la page login
                    'error'         => $app['security.last_error']($request),
                    'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    public function registerAction(Application $app) {// Fonction pour renvoie vers la page d'enregistrement 
        return $app['twig']->render('register.twig');
    }

    public function saveregisterAction(Application $app) {// fonction pour s'enregistrer en tant qu'admin
        $registration = $app['dao.user']->RegisterAdmin();
        return $app['twig']->render('login.twig');
    }

    public
            function forgotPasswordAction(Application $app) {
        return $app['twig']->render('forgot-password.twig');
    }

    public
            function forgotPasswordValidAction(Application $app) {
        $registration = $app['dao.user']->forgotPassword();
        return $app['twig']->render('login.twig');
    }
    
     public function resetPasswordAction(Application $app) {
        return $app['twig']->render('reset_password.twig');
    }

}
