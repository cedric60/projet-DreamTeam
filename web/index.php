<?php

    require_once __DIR__.'/../vendor/autoload.php';

    $app = new Silex\Application();

    require __DIR__.'/../app/app.php';
    require __DIR__.'/../app/routes.php';
    /*
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=>__DIR__.'/../templates','twig.options'=>array('debug'=>true)));

    $app->get('/',function(){
        return 'Hello World';
    });
    $app->get('/hello/', function() use ($app) {
        return $app['twig']->render('hello.twig',array('name'=>'t',));
    });
    */
    
    $app->run();
    