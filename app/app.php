<?php

use Silex\Provider\TwigServiceProvider;
use App\DAO\UserDAO;

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app['debug'] = true;

$app['db.options'] = array(//connexion a la base de donnee
  'drivers'  => 'pdo_mysql',
  'charset'  => 'utf8',
  'host'     => 'localhost',
  'port'     => '3306',
  'dbname'   => 'projet_idc_conseil',
  'user'     => 'root',
  'password' => '',
);
$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\SecurityServiceProvider(), array(// Utilisation pour le login
  'security.firewalls' => array(
    'secured' => array(
      'pattern'   => '^/',
      'anonymous' => true,
      'logout'    => true,
      'form'      => array('login_path' => '/login', 'check_path' => '/login_check'),
      'users'     => function() use ($app) {
          return new UserDAO($app['db']);
      },
    ),
  ),
));

$app->register(new Silex\Provider\DoctrineServiceProvider()); //creation du service
// Register service providers
$app->register(new Silex\Provider\TwigServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path'    => __DIR__ . '/../View',
  'twig.options' => array('debug' => true)
));


$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path'    => __DIR__ . '/../View',
  'twig.options' => array('debug' => true)
));

//composer require dongww/silex-debugbar
//$app->register(new Dongww\Silex\Provider\DebugBarServiceProvider());
// Register services
$app['dao.admin'] = function ($app) {
    return new \App\DAO\AdminDAO($app['db']);
};
$app['dao.user'] = function ($app) {
    return new \App\DAO\UserDAO($app['db']);
};
$app['dao.index'] = function ($app) {
    return new \App\DAO\IndexDAO($app['db']);
};
$app['dao.givenanswer'] = function($app) {
    return new \App\DAO\GivenAnswerDAO($app['db']);
};
$app['dao.learner'] = function($app) {
    return new \App\DAO\LearnerDAO($app['db']);
};
$app['dao.formation'] = function($app) {
    return new \App\DAO\FormationDAO($app['db']);
};


