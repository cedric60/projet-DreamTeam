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
        public function AddLearnerAction(Application $app){
            $formationList = $app['dao.formation']->findAll();
            $sessionStartDate = $app['dao.formation']->sessionStartDate();
            $sessionEndDate = $app['dao.formation']->sessionEndDate();
            return $app['twig']->render('addlearner.twig', array('formationList' => $formationList,
                                                                 'sessionStartDate' => $sessionStartDate,
                                                                'sessionEndDate' => $sessionEndDate));
        }

        public function dataSessionStartAction(Application $app){
            
            $res = $app['dao.formation']->findSessionStartDate();
            $data = "";
            foreach ($res as $re) {
    
                $data .= '<option value="' . $re["start_date"] .'">' . $re["start_date"] . ' </option>';
            }
    
            return $data;

        
        }
        public function dataSessionEndAction(Application $app){
            
            $res = $app['dao.formation']->findSessionEndDate();
            $data = "";
            foreach ($res as $re) {
    
                $data .= '<option value="' . $re["end_date"] .'">' . $re["end_date"] . ' </option>';
            }
    
            return $data;

        
        }
    }