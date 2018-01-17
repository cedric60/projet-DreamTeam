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
        ->bind('register');//Route vers la page register  
$app->get('/saveregister',"App\Controller\UserController::SaveregisterAction")
        ->bind('saveregister');//Route vers user controller qui nous renvoie vers la function utiliser pour faire un register

// Forgot password
$app->get('/forgot_password',"App\Controller\UserController::ForgotPasswordAction")
        ->bind('forgot_password');
$app->get('/dataCharts1',"App\Controller\ChartController::DrawChartAction")
        ->bind('dataCharts1');

$app->get('/dataCharts',"App\Controller\ChartController::listSmileyTypeJsonAction")
        ->bind('dataCharts');

$app->get('/charts',"App\Controller\ChartController::ChartAction")
        ->bind('charts');
