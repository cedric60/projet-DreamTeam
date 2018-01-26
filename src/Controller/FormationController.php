<?php

namespace App\Controller;

use Silex\Application;

class FormationController
{

    /**
     * 
     * @param Application $app Silex application
     * @return void
     */
    public function FormationAction(Application $app)
    {
        $formationList = $app['dao.formation']->findAll();
        return $app['twig']->render('formation.twig', array('formationList' => $formationList));
    }

    /**
     * 
     * @param Application $app
     * @return type
     */
    public function AddFormationAction(Application $app)
    {
        $formationList = $app['dao.formation']->findAll();
        $sessionList   = $app['dao.formation']->findActiveSessions();
        return $app['twig']->render('addformation.twig', array('formationList' => $formationList,
              'sessionList'   => $sessionList));
    }

    /**
     * 
     * @param Application $app
     * @return type array
     */
    public function saveFormationAction(Application $app)
    {
        $formationId  = (int) ($_POST['formation']);
        $newformation = $_POST['newformation'];
        $start        = $_POST['start_date'];
        $end          = $_POST['end_date'];
        $error        = false;

        var_dump($_POST);
        if ($formationId == 0) {
            echo 'Veuillez selectionner une categorie';
            $error = true;
        }
        if ($formationId == 9999) {
            if ($newformation == "") {
                echo 'Veuillez selectionner une formation';
                $error = true;
            }
        }
        if ($start == "") {
            echo 'Veuillez selectionner une date de debut';
            $error = true;
        }
        if ($end == "") {
            echo 'Veuillez selectionner une date de fin';
            $error = true;
        }


        if ($error == false && $formationId == 9999) {
            $q                = $app['db']->prepare("INSERT INTO `formation`(`name`) VALUES ('$newformation')");
            $q->execute(array());
            $arrayformationId = $app['dao.formation']->findLastId();
            $idFormation      = (int) ($arrayformationId["MAX( idformation )"]);
            $sql              = $app['db']->prepare("INSERT INTO `session`(`start_date`, `end_date`, `formation_idformation`) VALUES ('$start', '$end', '$idFormation')");
            $sql->execute(array());
        }
        if ($error == false && $formationId != 9999) {
            $q = $app['db']->prepare("INSERT INTO `session`(`start_date`, `end_date`, `formation_idformation`) VALUES ('$start', '$end', '$formationId')");
            $q->execute(array());
        }


        $formationList = $app['dao.formation']->findAll();
        return $app['twig']->render('addformation.twig', array('formationList' => $formationList));
    }

    /**
     * 
     * @param type $id
     * @param Application $app
     * @return type
     */
    public function sessionActiveAction($id, Application $app)
    {
        $formationList = $app['dao.formation']->findAll();
        $sessionList   = $app['dao.formation']->findActiveSession($id);

        return $app->json($sessionList);
    }
}
