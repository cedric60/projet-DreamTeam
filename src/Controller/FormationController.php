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
            
            return $app['twig']->render('formation.twig');
        }
    }