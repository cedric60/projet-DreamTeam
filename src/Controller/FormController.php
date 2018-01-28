<?php

namespace App\Controller;

use Silex\Application;

class FormController
{

    /**
     * 
     * @param Application $app
     * @return array
     */
    public function formAction(Application $app)
    {
        $formationList = $app['dao.formation']->findAll();
        return $app['twig']->render('formulaire_satisfaction.twig', array('formationList' => $formationList));
    }

    /**
     * 
     */
    public function formContactAction()
    {
        
    }

    /**
     * 
     * @param Application $app
     * @return boolean
     */
    public function formValidate(Application $app)
    {

        // return $app['twig']->render('index.twig');
        return false;
    }
}
