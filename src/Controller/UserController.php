<?php


class UserController {

    public function LoginAction() {
        return $app['twig']->render('login.twig');
    }
    
}
