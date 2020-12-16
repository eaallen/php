<?php

require_once __DIR__.'/vendor/autoload.php';

// use ;
$app = new app\core\Application();

$app->router->get('own_mvc/',function(){
    return 'hello world';
});

$app->router->get('/contact',function(){
    return 'CONTACT';
});

$app->run();
