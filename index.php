<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'vendor/autoload.php';

$app = new DRouter\App();

$app->get('/', function(){
    echo 'Estou na Home';
});

$app->get('/contato', function(){
    echo 'Estou no contato';
});

$app->run();