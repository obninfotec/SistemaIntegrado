<?php
/* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 06-06-2017_DRouter-Agrupamento de rotas e lidando com views.mp4
 */
header('Content-Type: text/html; charset=utf-8');
require 'vendor/autoload.php';

$app = new DRouter\App();

$container = $app->getContainer();

$container->pdo = $container->shared(function(){
    return new PDO('mysql:host=localhost;dbname=videoaula', 'root', '');
});

$app->run();

