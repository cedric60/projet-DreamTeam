<?php

    namespace App\Controller;
    
    use Silex\Application;
    
    class LearnerController{
        
        /**
         * 
         * @param Application $app Silex application
         * @return void
         */
        public function LearnerAction(Application $app){
            $learnersList = $app['dao.learner']->findAll();
            return $app['twig']->render('learner.twig', array('learnersList' => $learnersList));
        }
    }