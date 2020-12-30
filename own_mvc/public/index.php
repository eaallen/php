<?php
// Use php built in server, Don't use xammp just yet.  


require_once __DIR__.'/../vendor/autoload.php';

// use                           pass in the root directory
use app\controllers\SiteController;
$app = new app\core\Application(dirname(__DIR__));

$app->router->get('/',[SiteController::class, 'home']);

// $app->router->get('/contact','contact');
$app->router->get('/contact',[SiteController::class, 'contact']);
$app->router->post('/contact',[SiteController::class, 'contact']);
$app->router->get('/test','test');

$app->run();
