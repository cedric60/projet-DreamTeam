<?php

namespace App\Controller;

class UserController {

    public function LoginAction(Application $app) {
        return $app['twig']->render('login.twig');
    }
    
}
