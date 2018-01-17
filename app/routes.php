<?php

// Home page
$app->get('/',"App\Controller\IndexController::indexAction")
        ->bind('index');

$app->get('/form',"App\Controller\FormController::formAction")
        ->bind('form');

$app->get('/formContact',"App\Controller\FormController::formContactAction")
        ->bind('formContact');

$app->get('/listeFormation',"App\Controller\ListeController::ListeFormationAction")
        ->bind('listeFormation');

// Login page
$app->get('/login',"App\Controller\UserController::LoginAction")
        ->bind('Login');


// Register page
$app->get('/register',"App\Controller\UserController::RegisterAction")
        ->bind('register');

// Forgot password
$app->get('/forgot_password',"App\Controller\UserController::ForgotPasswordAction")
        ->bind('forgot_password');
// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts1',"App\Controller\ChartController::DrawChartAction")
        ->bind('dataCharts1');
// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts',"App\Controller\ChartController::listSmileyTypeJsonAction")
        ->bind('dataCharts');
// Charts page
$app->get('/charts',"App\Controller\ChartController::ChartAction")
        ->bind('charts');
// Formation page
$app->get('/formation',"App\Controller\FormationController::FormationAction")
        ->bind('formation');
// Learner page
$app->get('/learners',"App\Controller\LearnerController::LearnerAction")
        ->bind('learners');