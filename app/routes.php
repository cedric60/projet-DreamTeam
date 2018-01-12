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
        ->bind('forgot_password')