<?php

// Home page
$app->get('/',"App\Controller\IndexController::indexAction")
        ->bind('index');

$app->get('/form',"App\Controller\FormController::formAction")
        ->bind('form');

$app->get('/formContact',"App\Controller\FormController::formContactAction")
        ->bind('formContact');

// Login page
$app->get('/login',"App\Controller\UserController::LoginAction")
        ->bind('Login');


// Register page
$app->get('/register',"App\Controller\UserController::RegisterAction")
        ->bind('register');

        
// Forgot password
$app->get('/forgot_password',"App\Controller\UserController::ForgotPasswordAction")
        ->bind('forgot_password');


// Charts pages
$app->get('/charts',"App\Controller\ChartController::ChartAction")
        ->bind('charts');
// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts1',"App\Controller\ChartController::DrawChartAction")
        ->bind('dataCharts1');
// données pour graphique ---- Page non affichée mais utile pour recuperer les donnees
$app->get('/dataCharts',"App\Controller\ChartController::columnChartAction")
        ->bind('dataCharts');


// Formation page
$app->get('/formation',"App\Controller\FormationController::FormationAction")
        ->bind('formation');
$app->get('/addformation',"App\Controller\FormationController::AddFormationAction")
        ->bind('addformation');




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