<?php

use Silex\Application;

require_once __DIR__ . '/silex.phar';

$app = new Application();

$app->register(new Silex\Extension\TwigExtension(), array(
   'twig.path'  =>  __DIR__ . '/views' ,
    'twig.class_path' =>  __DIR__ . '/vendor/twig/lib',
));

$app->before(function() use ($app){
  $app['twig']->addGlobal('vendor_layout', $app['twig']->loadTemplate('vendor_layout.twig'));
  $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.twig'));
});

$app->get('/', function() use ($app) {
  return $app['twig']->render('index.twig');
});

return $app;