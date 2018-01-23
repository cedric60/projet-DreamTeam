<?php

namespace App\Controller;

use Silex\Application;

class FormValidationController {

    public function formValidationAction(Application $app) {

       $formation=(int)($_POST['selectbasic']);//valeur de l'option sélectionner 

       $smiley=(int)($_POST['action']); 
       
       $textarea=$_POST['textarea'];
   

        //vérif formulaire
            $error=0;

            if ($formation==0){
                $error+=1;
                
            }else{
                $error+=0;
            }

        //afficher messages erreur

           if ($smiley==0){
                $error+=1;
            }else{
                $error+=0;
            }

            if (($smiley==2 && $textarea=="") || ($smiley==3 && $textarea=="")){
                $error+=1;
            }else{
                $error+=0;
            }
            
            if ($error==0){

        //Préparer la requête
            $q = $app['db']->prepare(" INSERT INTO `given_answer` (`date`, `question_idquestion`, `chosen_smiley`, `why`, `formation_idformation`) VALUES (now(),1,'$smiley','$textarea','$formation')");
   
        // Envoyer la requête
            $q->execute(array());
            return $app['twig']->render('form_validation.twig');
            
            }else{
            }
    } 
 }





