<?php

// Home page
$app->get('/',"App\Controller\IndexController::indexAction")
        ->bind('index');//Route vers la page d'accueil

$app->get('/form',"App\Controller\FormController::formAction")
        ->bind('form');

$app->get('/formContact',"App\Controller\FormController::formContactAction")
        ->bind('formContact');

$app->get('/listeFormation',"App\Controller\ListeController::ListeFormationAction")
        ->bind('listeFormation');

 ////////////////////USER CONTROLLER ////////////////////////////

// Login page
$app->get('/login',"App\Controller\UserController::LoginAction")
        ->bind('Login');//Route vers la page de connexion

// Register page
$app->post('/register',"App\Controller\UserController::RegisterAction")
        ->bind('register');//Route vers la page d'enregistrement d'un nouvelle administrateur 
$app->post('/saveregister',"App\Controller\UserController::SaveregisterAction")
        ->bind('saveregister');//Route vers la fonction de verification du formulaire

// Forgot password
$app->get('/forgot_password',"App\Controller\UserController::ForgotPasswordAction")
        ->bind('forgot_password');//Route vers la page Mot de place oublié

// Reset password
$app->get('/reset_password',"App\Controller\UserController::ResetPasswordAction")
        ->bind('reset_password');//Route vers la page de reinitialisation du mot de passe


////////////////////// CHART CONTROLLER////////////////////////////////

// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts1',"App\Controller\ChartController::DrawChartAction")
        ->bind('dataCharts1');
// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts',"App\Controller\ChartController::listSmileyTypeJsonAction")
        ->bind('dataCharts');
// Charts page
$app->get('/charts',"App\Controller\ChartController::ChartAction")
        ->bind('charts');


////////////////////// FORMATION CONTROLLER///////////////////////////////

// Formation page
$app->get('/formation',"App\Controller\FormationController::FormationAction")
        ->bind('formation');
// Learner page
$app->get('/learners',"App\Controller\LearnerController::LearnerAction")
        ->bind('learners');