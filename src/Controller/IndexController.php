<?php

    namespace App\Controller;
    
    use Silex\Application;
    
    class IndexController{
        
        /**
         * 
         * @param Application $app Silex application
         * @return void
         */
        public function indexAction(Application $app){
            
            return $app['twig']->render('index.twig');
        }
    }
    
