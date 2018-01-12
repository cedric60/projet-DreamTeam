<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController {

    public function LoginAction(Request $request, Application $app) {
        return $app['twig']->render('login.twig', array(
            'error'         =>$app['security.last_error']($request),
            'last_username' =>$app['session']->get('_security.last_username'),
        ));
    }
    
}
