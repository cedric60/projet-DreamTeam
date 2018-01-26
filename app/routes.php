<?php

// Home page
$app->get('/', "App\Controller\IndexController::indexAction")//Route vers la page d'accueil
    ->bind('index');

$app->get('/form', "App\Controller\FormController::formAction")
    ->bind('form');

$app->get('/formContact', "App\Controller\FormController::formContactAction")
    ->bind('formContact');



////////////////////USER CONTROLLER ////////////////////////////
// Login page
$app->get('/login', "App\Controller\UserController::LoginAction")//Route vers la page de connexion
    ->bind('Login');

// Register page
$app->get('/register', "App\Controller\UserController::RegisterAction")//Route vers la page d'enregistrement d'un nouvelle administrateur
    ->bind('register');

$app->get('/saveregister', "App\Controller\UserController::saveRegisterAction")//Route vers la fonction de verification du formulaire
    ->bind('saveregister');

// Forgot password
$app->get('/forgot_password', "App\Controller\UserController::ForgotPasswordAction")//Route vers la page d'oubli de mot de passe
    ->bind('forgot_password');

$app->get('/forgotpasswordvalid', "App\Controller\UserController::forgotPasswordValidAction")//Route vers la fonction page d'oubli de mot de passe
    ->bind('forgotpasswordvalid');

// Reset password
$app->get('/reset_password', "App\Controller\UserController::ResetPasswordAction")//Route vers la page de reinitialisation du mot de passe
    ->bind('reset_password');

$app->get('/resetpasswordvalid', "App\Controller\UserController::resetPasswordValidAction")//Route vers la page de reinitialisation du mot de passe
    ->bind('resetpasswordvalid');


////////////////////// CHART CONTROLLER////////////////////////////////
// Charts page
$app->get('/charts', "App\Controller\ChartController::ChartAction")
    ->bind('charts');

// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts1', "App\Controller\ChartController::DrawChartAction")
    ->bind('dataCharts1');
// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts', "App\Controller\ChartController::columnChartAction")
    ->bind('dataCharts');

// Charts pages
$app->get('/charts', "App\Controller\ChartController::ChartAction")
    ->bind('charts');



////////////////////// FORMATION CONTROLLER///////////////////////////////
// Formation page
$app->get('/formation', "App\Controller\FormationController::FormationAction")
    ->bind('formation');
$app->get('/addformation', "App\Controller\FormationController::AddFormationAction")
    ->bind('addformation');
$app->post('/saveformation', "App\Controller\FormationController::SaveFormationAction")
    ->bind('saveformation');
$app->get('/sessionactive/{id}', "App\Controller\FormationController::sessionActiveAction")
    ->bind('sessionactive');



// Learners page
$app->get('/learners', "App\Controller\LearnerController::LearnerAction")
    ->bind('learners');

$app->get('/addlearners', "App\Controller\LearnerController::addLearnerAction")
    ->bind('addlearners');
$app->post('/savelearners', "App\Controller\LearnerController::addNewLearnerAction")
    ->bind('savelearners');

$app->get('/modiflearners/{id}', "App\Controller\LearnerController::modifLearnerAction")
    ->bind('modiflearners');
$app->post('/savemodiflearners/{id}', "App\Controller\LearnerController::saveModifLearnerAction")
    ->bind('savemodiflearners');


// data pour recuperer les sessions d'une formation
$app->get('/datasessions/{id}', "App\Controller\LearnerController::dataSessionsAction")
    ->bind('dataSessions');


// Form validation
$app->post('/form_validation', "App\Controller\FormValidationController::formValidationAction")
    ->bind('form_validation');

$app->post('/SaveFormAction', "App\Controller\FormValidationController::SaveFormAction")
    ->bind('SaveFormAction'); //Route vers la fonction de verification du formulaire à faire et modifier regarder userdao