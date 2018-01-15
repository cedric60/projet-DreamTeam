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

$app->get('/dataCharts1',"App\Controller\ChartController::DrawChartAction")
        ->bind('dataCharts1');

$app->get('/dataCharts',"App\Controller\ChartController::listSmileyTypeJsonAction")
        ->bind('dataCharts');

$app->get('/charts',"App\Controller\ChartController::ChartAction")
        ->bind('charts');