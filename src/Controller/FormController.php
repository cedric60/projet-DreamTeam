<?php

namespace App\Controller;

use Silex\Application;

class FormController {

    public function formAction(Application $app) {
        return $app['twig']->render('formulaire_satisfaction.twig');
    }
    public function formContactAction(){

    }

    public function formValidate(Application $app){
        
        return $app['twig']->render('index.twig');
    }

}

