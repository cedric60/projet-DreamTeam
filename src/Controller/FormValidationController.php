<?php

namespace App\Controller;
use Silex\Application;
class FormValidationController {

    public function formValidationAction(Application $app) {
    
       if (isset($_POST['action'])){
         $smiley=(int)($_POST['action']);
       }else{
        $smiley=0;
       }
       $formation=(int)($_POST['selectbasic']);
        
       $textarea=$_POST['textarea'];
   
        //vérif formulaire
            $error=0;

            if ($formation==0){
                $error++; 
            }

            if ($smiley==0){
                $error++;
    
            }

            if (($smiley==2 && $textarea=="") || ($smiley==3 && $textarea=="")){
                $error++;
                
            }
            
            if ($error==0){

        //Préparer la requête
            $q = $app['db']->prepare(" INSERT INTO `given_answer` (`date`, `question_idquestion`, `chosen_smiley`, `why`, `formation_idformation`) VALUES (now(),1,'$smiley','$textarea','$formation')");
        // Envoyer la requête
            $q->execute(array());
            return $app['twig']->render('form_validation.twig');
            }else{
                $formationList = $app['dao.formation']->findAll();
                return $app['twig']->render('formulaire_satisfaction.twig', array('formationList' => $formationList));
            }
    } 
 }





