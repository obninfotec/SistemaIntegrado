<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'vendor/autoload.php';

$app = new DRouter\App();

$app->get('/', function(){
    echo 'Estou aqui, na Home';
});

$app->get('/contato/', function(){
    echo '<form action="" method="post">';
    echo '<input type="text" name="titulo" placeholder="titulo" /><br />';
    echo '<input type="text" name="valor" placeholder="valor" /><br />';
    echo '<input type="submit" value="Enviar" />';
    echo '</form>';
});

$app->post('/contato', function(){
    $request = $_POST;
    print_r($request);
});

$app->run();


