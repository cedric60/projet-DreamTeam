<?php

namespace App\Controller;

use Silex\Application;

class FormValidationController {

    public function formValidationAction(Application $app) {
       
        return $app['twig']->render('form_validation.twig');
    }
    public function SaveFormAction(Application $app) {
       $formation=$_POST[''];
    }

}





