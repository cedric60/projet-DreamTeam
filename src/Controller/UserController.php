<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
/*Le controller s'occupe d'une logique particuliere il a une serie de methode qui represente chaque action l'on peut faire au sein de l'application*/
class UserController {

    public function LoginAction(Request $request, Application $app) {// fonction pour se connecter au dashboard Admin
        return $app['twig']->render('login.twig', array(// renvoie a la page login
            'error'         =>$app['security.last_error']($request),
            'last_username' =>$app['session']->get('_security.last_username'),
        ));
    }
    public function RegisterAction(Application $app) {// fonction pour s'enregistrer en tant qu'admin
        
        return $app['twig']->render('register.twig');
    }
}
