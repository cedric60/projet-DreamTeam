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
/**
 * 
 * @param Application $app
 * @return array
 */
        public function addLearnerAction(Application $app){
            $formationList = $app['dao.formation']->findAll();
            return $app['twig']->render('addlearners.twig', array('formationList' => $formationList));
        }
/**
 * 
 * @param Application $app
 * @return type array
 */
        public function addNewLearnerAction(Application $app){
            $lastname = $_POST['lastname'];
            $firstname =  $_POST['firstname']; 
            $mail = $_POST['mail'];
            $phonenumber = $_POST['phonenumber'];
            $formationId = (int)($_POST['formation']);
            $sessionId = (int)($_POST['session']);           
            $error = false;

            if(strlen($lastname) == 0 || strlen($lastname) > 45){
                $error = true;
            }
            if(strlen($firstname) == 0 || strlen($firstname) > 45){
                $error = true;
            }
            if(strlen($mail) == 0 || strlen($mail) > 45){
                $error = true;
            }
            if(filter_var($mail, FILTER_VALIDATE_EMAIL) == false) { //Validation d'une adresse de messagerie.
                $error = true;
            }
            if(strlen($phonenumber) != 0 && !is_numeric($phonenumber) || strlen($phonenumber) > 10){
                $error = true;
            }
            if($formationId == 0 ){
                $error = true;
            }
            if($sessionId == 0){
                $error = true;
            }

            if($error == false){
            //Préparer la requête
            $q = $app['db']->prepare("INSERT INTO `learner`(`lastname`, `firstname`, `mail`, `phonenumber`) VALUES ('$lastname', '$firstname', '$mail', '$phonenumber')");
            // Envoyer la requête
            $q->execute(array());
            $arraylearnerId = $app['dao.learner']->findLastId();
            $learnerId = (int)($arraylearnerId["MAX( idlearner )"]);
            $sql = $app['db']->prepare("INSERT INTO `session_has_learner`(`session_idsession`, `learner_idlearner`) VALUES ('$sessionId', '$learnerId')");
            $sql->execute(array());
            
            }
            
            $formationList = $app['dao.formation']->findAll();
            return $app['twig']->render('addlearners.twig', array('formationList' => $formationList));
            

        }
/**
 * 
 * @param type $id
 * @param Application $app
 * @return array
 */
        public function modifLearnerAction($id, Application $app){
            $learnersList = $app['dao.learner']->find($id);
            return $app['twig']->render('modiflearner.twig', array('learnersList' => $learnersList,));
        }
        /**
         * 
         * @param type $id
         * @param Application $app
         * @return array
         */
        public function saveModifLearnerAction($id, Application $app){
            $id = (int)($_POST['learnerId']);
            $lastname = $_POST['lastname'];
            $firstname =  $_POST['firstname']; 
            $mail = $_POST['mail'];
            $phonenumber = $_POST['phonenumber'];
            $error = false;

            if(strlen($lastname) == 0 || strlen($lastname) > 45){
                $error = true;
            }
            if(strlen($firstname) == 0 || strlen($firstname) > 45){
                $error = true;
            }
            if(strlen($mail) == 0 || strlen($mail) > 45){
                $error = true;
            }
            if(filter_var($mail, FILTER_VALIDATE_EMAIL) == false) { //Validation d'une adresse de messagerie.
                $error = true;
            }
            if(strlen($phonenumber) != 0 && !is_numeric($phonenumber) || strlen($phonenumber) > 10){
                $error = true;
            }

            if($error == false){
            //Préparer la requête
            $q = $app['db']->prepare(" UPDATE `learner` SET `lastname`= '$lastname',`firstname`= '$firstname',`mail`= '$mail',`phonenumber`= '$phonenumber' WHERE `idlearner`= $id");
            // Envoyer la requête
            $q->execute(array());
            }
     
            $learnersList = $app['dao.learner']->find($id);
            return $app['twig']->render('modiflearner.twig', array('learnersList' => $learnersList));
            

        }
/**
 * 
 * @param type $id
 * @param Application $app
 * @return string
 */
        public function dataSessionsAction($id, Application $app){
            
            $res = $app['dao.formation']->findSessions($id);
            $data = "";
            foreach ($res as $re) {
                $startDate = \DateTime::createFromFormat('Y-m-d', $re["start_date"])->format('d/m/Y');
                $endDate = \DateTime::createFromFormat('Y-m-d', $re["end_date"])->format('d/m/Y');
                $data .= '<option value="' . $re["idsession"] .'">Du '. $startDate . ' au ' . $endDate . ' </option>';
            }
    
            return $data;
        }

    }