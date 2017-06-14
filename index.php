<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'vendor/autoload.php';

$app = new DRouter\App();

$container = $app->getContainer();

$container->pdo = $container->shared(function(){
    return new PDO('mysql:host=localhost;dbname=videoaulas', 'root', '');
});

$app->get('/single/:slug', function($slug){
    echo 'Estou na página single do post <br />';
    echo 'O Slug é : <b>'.$slug.'</b>';
});

$app->get('/:categoria/:subcategoria', function($categoria, $subcategoria){
    echo 'Estou na subcategoria<br />';
    echo 'Categoria: <b>'.$categoria.'</b><br />';
    echo 'Subcategoria: <b>'.$subcategoria.'</b><br />';
});

$app->run();


