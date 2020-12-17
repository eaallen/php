<?php
// Use php built in server, Don't use xammp just yet.  


require_once __DIR__.'/../vendor/autoload.php';

// use ;
$app = new app\core\Application();

$app->router->get('/',function(){
    return 'hello world';
});

$app->router->get('/contact',function(){
    return 'CONTACT';
});

$app->run();
