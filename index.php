<?php

use Silex\Application;

require_once __DIR__ . '/silex.phar';

$app = new Application();

$app->get('/', function(){
  return 'Hello world';
});

$app->run();