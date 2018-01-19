<?php

// Home page
$app->get('/',"App\Controller\IndexController::indexAction")
        ->bind('index');//Route vers la page d'accueil

$app->get('/form',"App\Controller\FormController::formAction")
        ->bind('form');

$app->get('/formContact',"App\Controller\FormController::formContactAction")
        ->bind('formContact');



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
        ->bind('forgot_password');


// Charts pages
$app->get('/charts',"App\Controller\ChartController::ChartAction")
        ->bind('charts');
        

// Reset password
$app->get('/reset_password',"App\Controller\UserController::ResetPasswordAction")
        ->bind('reset_password');//Route vers la page de reinitialisation du mot de passe


////////////////////// CHART CONTROLLER////////////////////////////////
// Charts page
$app->get('/charts',"App\Controller\ChartController::ChartAction")
        ->bind('charts');

// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts1',"App\Controller\ChartController::DrawChartAction")
        ->bind('dataCharts1');
// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts',"App\Controller\ChartController::columnChartAction")
        ->bind('dataCharts');


////////////////////// FORMATION CONTROLLER///////////////////////////////
// Formation page
$app->get('/formation',"App\Controller\FormationController::FormationAction")
        ->bind('formation');
$app->get('/addformation',"App\Controller\FormationController::AddFormationAction")
        ->bind('addformation');
$app->get('/listeFormation',"App\Controller\ListeController::ListeFormationAction")
        ->bind('listeFormation');



// Learner page
$app->get('/learners',"App\Controller\LearnerController::LearnerAction")
        ->bind('learners');
$app->get('/addlearners',"App\Controller\LearnerController::AddLearnerAction")
        ->bind('addlearners');
// data pour recuperer les sessions d'une formation
$app->get('/datasessionstart',"App\Controller\LearnerController::dataSessionStartAction")
        ->bind('dataSessionStart');

$app->get('/datasessionend/{id}',"App\Controller\LearnerController::dataSessionEndAction")
        ->bind('dataSessionEnd');

// Form validation
$app->post('/form_validation',"App\Controller\FormValidationController::formValidationAction")
        ->bind('form_validation');

$app->post('/SaveFormAction',"App\Controller\FormValidationController::SaveFormAction")
        ->bind('SaveFormAction'); //Route vers la fonction de verification du formulaire à faire et modifier regarder userdao