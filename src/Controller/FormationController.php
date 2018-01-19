<?php

    namespace App\Controller;
    
    use Silex\Application;
    
    class FormationController{
        
        /**
         * 
         * @param Application $app Silex application
         * @return void
         */
        public function FormationAction(Application $app){
            $formationList = $app['dao.formation']->findAll();
            return $app['twig']->render('formation.twig', array('formationList' => $formationList));
        }
        public function AddFormationAction(Application $app){
            
            return $app['twig']->render('addformation.twig');
        }
    }