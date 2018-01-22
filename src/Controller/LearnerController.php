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

        public function dataSessionStartAction($id, Application $app){
            
            $res = $app['dao.formation']->findSessionStartDate($id);
            $data = "";
            foreach ($res as $re) {
                $startDate = \DateTime::createFromFormat('Y-m-d', $re["start_date"])->format('d/m/Y');
                $data .= '<option value="' . $re["start_date"] .'">' . $startDate . ' </option>';
            }
    
            return $data;

        
        }
        public function dataSessionEndAction($id, Application $app){
            
            $res = $app['dao.formation']->findSessionEndDate($id);
            $data = "";
            foreach ($res as $re) {
                $endDate = \DateTime::createFromFormat('Y-m-d', $re["end_date"])->format('d/m/Y');
                $data .= '<option value="' . $re["end_date"] .'">' . $endDate . ' </option>';
            }
    
            return $data;

        
        }
    }