<?php

    use Silex\Provider\TwigServiceProvider;

    $app['debug'] = true;

    $app['db.options'] = array(//connexion a la base de donnee
        'drivers' => 'pdo_mysql',
        'charset' => 'utf8',
        'host' => 'localhost',
        'port' => '3306',
        'dbname' =>'projet_idc_conseil',
        'user' => 'root',
        'password' =>'',  
    );

    $app->registe(new Silex\Provider\DoctrineServiceProvider()); //creation du service

    // Register service providers
    $app->register(new Silex\Provider\TwigServiceProvider());

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path'=>__DIR__.'/../View',
        'twig.options'=>array('debug'=>true)
        ));
    
    //composer require dongww/silex-debugbar
    //$app->register(new Dongww\Silex\Provider\DebugBarServiceProvider());
    
    // Register services
    $app['dao.admin'] = function ($app) {
        return new \App\DAO\AdminDAO($app['db']);
    };