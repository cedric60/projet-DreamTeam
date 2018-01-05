<?php

// Home page
$app->get('/',"App\Controller\IndexController::indexAction")
        ->bind('index');
